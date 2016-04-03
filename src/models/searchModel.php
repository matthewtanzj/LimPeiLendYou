<?php
class SearchModel {

    public function __construct()
    {
        
    }

    public function searchByItemName($searchText)
    {
        $query = "SELECT *
                FROM item i
                WHERE lower(i.item_name) LIKE lower('%$searchText%')
                ";
                
        return pg_query($query);
    }

    public function advanceSearchForItem($item_name, $owner, $category, $price_start, $price_end, $location, $date_start, $date_end, $unavailable_item)
    {
        $true = 'TRUE';

        if (!empty($_POST['popSort'])) {
            $query = "SELECT i.owner, i.item_name, i.price, count(l.item_name)
                    FROM item i, loan_request l
                    WHERE lower(i.item_name) like lower('%$item_name%') AND lower(l.item_name) like lower(i.item_name)". 
                    " AND " . (empty($owner)? $true : "i.owner like '%$owner%'") .
                    " AND " . (empty($category)? $true : "i.category >= $category") .
                    " AND " . (empty($price_start)? $true : "i.price >= $price_start") .
                    " AND " . (empty($price_end)? $true : "i.price <= $price_end") .
                    " AND " . (empty($location)? $true : "i.location like '%$location%'       
            ");
        } else {
            $query = "SELECT i.owner, i.item_name, i.price
                FROM item i
                WHERE lower(i.item_name) like lower('%$item_name%')" . 
                " AND " . (empty($owner)? $true : "i.owner like '%$owner%'") .
                " AND " . (empty($category)? $true : "i.category >= $category") .
                " AND " . (empty($price_start)? $true : "i.price >= $price_start") .
                " AND " . (empty($price_end)? $true : "i.price <= $price_end") .
                " AND " . (empty($location)? $true : "i.location like '%$location%'       
            ");
        }
        

        if (!empty($date_start) && !empty($date_end) && empty($unavailable_item)) {
            $sdate = strtotime($date_start);
            $edate = strtotime($date_end);

            $query = $query . 
                " AND EXISTS (
                        SELECT *
                        FROM item_availability a
                        WHERE extract(epoch from a.date_start) >= $sdate
                        AND extract(epoch from a.date_end) <= $edate
                        AND " . (empty($item_name)? $true : " a.item_name like i.item_name") .
                        " AND " . (empty($owner)? $true : " a.owner like i.owner") .
                    ")";
        } else if (!empty($date_start) && !empty($date_end) && $unavailable_item == 1) {
            $sdate = strtotime($date_start);
            $edate = strtotime($date_end);

            $query = $query . 
                " AND ( EXISTS (
                            SELECT *
                            FROM item_availability a
                            WHERE extract(epoch from a.date_start) >= $sdate
                            AND extract(epoch from a.date_end) <= $edate
                            AND " . (empty($item_name)? $true : " a.item_name like i.item_name") .
                            " AND " . (empty($owner)? $true : " a.owner like i.owner") .
                        ") OR NOT EXISTS (
                            SELECT *
                            FROM item_availability a2
                            WHERE a2.item_name like i.item_name
                            AND a2.owner like i.owner
                        )
                    )
                ";
        } else if (empty($date_start) && empty($date_end) && $unavailable_item == 1) {
            $query = $query . 
                " AND NOT EXISTS (
                        SELECT *
                        FROM item_availability a2
                        WHERE a2.item_name like i.item_name
                        AND a2.owner like i.owner
                    ) 
                ";
        }

        $itemSort = empty($_POST['itemSort'])? '' : $_POST['itemSort'];
        $ownerSort = empty($_POST['ownerSort'])? '' : $_POST['ownerSort'];
        $categorySort = empty($_POST['categorySort'])? '' : $_POST['categorySort'];
        $priceSort = empty($_POST['priceSort'])? '' : $_POST['priceSort'];
        $locationSort = empty($_POST['locationSort'])? '' : $_POST['locationSort'];
        //$dateSort = empty($_POST['dateSort'])? '' : $_POST['dateSort'];
        $popSort = empty($_POST['popSort'])? '' : $_POST['popSort'];

        if (!empty($_POST['popSort'])) {
            $query = $query .
                " GROUP BY i.owner, i.item_name, i.price, l.item_name";
        }

        $query = $query .
            " ORDER BY "
                . (empty($popSort)? $true . "," : "count(l.item_name) $popSort,")
                . (empty($itemSort)? $true . "," : "i.item_name $itemSort,")
                . (empty($ownerSort)? $true . "," : "i.owner $ownerSort,")
                . (empty($categorySort)? $true . "," : "i.category $categorySort,")
                . (empty($priceSort)? $true . "," : "i.price $priceSort,")
                . (empty($locationSort)? $true : "i.location $locationSort");

        return pg_query($query);
    }


}
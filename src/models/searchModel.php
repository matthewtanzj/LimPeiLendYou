<?php
class SearchModel {

    public function __construct()
    {
        
    }

    public function searchByItemName($searchText)
    {
        $query = "SELECT *
                FROM item i
                WHERE i.item_name LIKE '%$searchText%'
                ";
                
        return pg_query($query);
    }


}
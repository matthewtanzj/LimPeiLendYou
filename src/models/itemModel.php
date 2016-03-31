<?php
class ItemModel {

    public function __construct()
    {
        
    }

    public function getItemKeyByMostLoanrequest()
    {
    	$query = "SELECT l.owner, l.item_name
				FROM loan_request l
                WHERE is_valid = 1
				GROUP BY l.owner, l.item_name
                ORDER BY count(l.item_name) DESC
				";
				
		$result = pg_query($query);

        return $result;
    }

    public function getByKey($owner, $itemName)
    {
        $query = "SELECT * FROM item i 
                WHERE i.owner = '". $owner ."' 
                AND i.item_name = '". $itemName ."' 
                AND i.is_valid = 1";

        return pg_query($query);
    }

    public function getAllItemsOfUser($owner) {
        $query = "SELECT * FROM item WHERE owner = '$owner'";
        return pg_query($query);
    }
}
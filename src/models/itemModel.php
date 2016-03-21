<?php
class ItemModel {

    public function __construct()
    {
        
    }

    public function getItemIdByMostLoanrequest()
    {
    	$query = "SELECT l.item_id
				FROM loan_request l
                WHERE is_valid = 1
				GROUP BY l.item_id
                ORDER BY count(l.item_id) DESC
				";
				
		$result = pg_query($query);

        return $result;
    }

    public function getById($id)
    {
        $query = "SELECT * FROM item i WHERE i.id = ". $id ." AND i.is_valid = 1";

        return pg_query($query);
    }

}
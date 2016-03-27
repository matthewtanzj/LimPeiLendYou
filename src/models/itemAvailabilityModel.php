<?php
class ItemAvailabilityModel {

    public function __construct()
    {
        
    }

    public function getAllByItemKey($owner, $itemName)
    {
        $query = "SELECT * FROM item_availability i WHERE i.owner = '". $owner . "' AND i.item_name = '". $itemName ."'";

        return pg_query($query);
    }

}
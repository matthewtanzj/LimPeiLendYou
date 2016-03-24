<?php
class ItemAvailabilityModel {

    public function __construct()
    {
        
    }

    public function getAllById($itemId)
    {
        $query = "SELECT * FROM item_availability i WHERE i.item_id = ". $itemId;

        return pg_query($query);
    }

}
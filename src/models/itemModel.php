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
    
    public function addLoan($item_name, $owner, $category, $price, $description, $location) {			
		$query = "INSERT INTO item (item_name, owner, category, price, description, location) 
					VALUES('$item_name', '$owner', '$category', '$price', '$description', '$location')";
		$result = pg_query($query);
		return $result; // true if successfully inserted, false otherwise
	}
    
    public function getCoverImageOfItem($item, $owner) {
        $query = "SELECT image_url FROM item_image WHERE item_name = '$item' AND owner = '$owner' AND is_cover = 1";
        $result = pg_query($query);
        return $result;
    }
    
    public function getTotalItems() {
        $query = "SELECT * FROM item";
		$result = pg_query($query);
		return pg_num_rows($result);
    }
    
    public function getTotalItemsPastWeek() {
        $query = "SELECT * FROM item WHERE created_at > NOW() - INTERVAL '7 days'";
		$result = pg_query($query);
		return pg_num_rows($result);
    }
    
    public function getTotalItemsPastMonth() {
        $query = "SELECT * FROM item WHERE created_at > NOW() - INTERVAL '30 days'";
		$result = pg_query($query);
		return pg_num_rows($result);
    }
    
    public function getTotalItemsPastYear() {
        $query = "SELECT * FROM item WHERE created_at > NOW() - INTERVAL '365 days'";
		$result = pg_query($query);
		return pg_num_rows($result);
    }
    
    public function getTotalItemImages() {
        $query = "SELECT * FROM item_image";
		$result = pg_query($query);
		return pg_num_rows($result);
    }
    
    public function getTrendingItemList() {
        $query = "SELECT t.item_name, t.owner, t.price, ii.image_url, SUM(t.activity) 
                FROM (
                    (SELECT i.item_name, i.owner, i.price, COUNT(*) as activity
                    FROM item i, comment c
                    WHERE c.item_name = i.item_name AND c.owner = i.owner
                    AND c.created_at > NOW() - INTERVAL '7 days'
                    GROUP BY i.item_name, i.owner)
                    UNION ALL
                    (SELECT i.item_name, i.owner, i.price, 0
                    FROM item i
                    WHERE NOT EXISTS (
                        SELECT c.owner FROM comment c 
                        WHERE c.item_name = i.item_name 
                        AND c.owner = i.owner)
                    GROUP BY i.item_name, i.owner)
                    UNION ALL
                    (SELECT i.item_name, i.owner, i.price, COUNT(*) as activity
                    FROM item i, loan_request l
                    WHERE l.item_name = i.item_name AND l.owner = i.owner
                    AND l.created_at > NOW() - INTERVAL '7 days'
                    GROUP BY i.item_name, i.owner)
                    UNION ALL
                    (SELECT i.item_name, i.owner, i.price, 0 
                    FROM item i
                    WHERE NOT EXISTS (
                        SELECT l.owner FROM loan_request l 
                        WHERE l.item_name = i.item_name 
                        AND l.owner = i.owner)
                    GROUP BY i.item_name, i.owner)
                    ) t, item_image ii
                WHERE ii.item_name = t.item_name
                AND ii.owner = t.owner
                GROUP BY t.item_name, t.owner, t.price, ii.image_url
                ORDER BY sum DESC";
        $result = pg_query($query);
        return $result;
    }
}
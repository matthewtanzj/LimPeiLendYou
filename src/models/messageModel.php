<?php
class MessageModel{

    public function __construct()
    {

    }

    public function getChatHistoryInOrder($itemName, $itemOwner, $itemBorrower)
    {
            $query = "SELECT *
                                FROM message m
                                WHERE item_name = '".$itemName."' AND
                                            item_owner = '".$itemOwner."' AND
                                            (sender = '".$itemBorrower."' OR
                                            receiver = '".$itemBorrower."')
                                ORDER BY created_at";
            $result = pg_query($query);
            return $result;
    }

    public function addMessage($itemName, $itemOwner, $sender, $receiver, $content, $createdAt)
    {
            $query ="INSERT INTO message (item_name, item_owner, sender, receiver, content, created_at)
                            VALUES('$itemName', '$itemOwner', '$sender', '$receiver', '$content', '$createdAt')";

            $result = pg_query($query);
            return $result;	// true if successfully inserted, false otherwise
    }
    
    public function getTotalMessage() {
        $query = "SELECT * FROM message";
        $result = pg_query($query);
        return pg_num_rows($result);
	}
    
    public function getTotalMessagePastWeek() {
        $query = "SELECT * FROM message WHERE created_at > NOW() - INTERVAL '7 days'";
		$result = pg_query($query);
		return pg_num_rows($result);
    }
    
    public function getTotalMessagePastMonth() {
        $query = "SELECT * FROM message WHERE created_at > NOW() - INTERVAL '30 days'";
		$result = pg_query($query);
		return pg_num_rows($result);
    }
    
    public function getTotalMessagePastYear() {
        $query = "SELECT * FROM message WHERE created_at > NOW() - INTERVAL '365 days'";
		$result = pg_query($query);
		return pg_num_rows($result);
    }
}

<?php
class MessageModel{

		public function __construct()
		{

		}

		public function getChatHistory($itemName, $itemOwner, $itemBorrower)
		{
				$query = "SELECT m.sender, m.content, m.created_at 
									FROM message m
									WHERE m.item_name = $itemName AND
												m.item_owner =$itemOwner AND
												(m.sender= $itemBorrower OR
												m.receiver=$itemBorrower)";

				return pg_query($query);
		}

		public function addMessage($itemName, $itemOwner, $sender, $receiver, $content, $createdAt)
		{
				$query ="INSERT INTO message (item_name, item_owner, sender, receiver, content, created_at)
								VALUES('$itemName', '$itemOwner', '$sender', '$receiver', '$content', '$createdAt')";

				$result = pg_query($query);
				return $result;	// true if successfully inserted, false otherwise
		}
}

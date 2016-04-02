<?php
class messageModel{

		public function __construct()
		{

		}

		public function getOldMessages($item_name, $item_owner, $item_borrower)
		{
				$query = "SELECT m.sender, m.content, m.created_at 
									FROM message m
									WHERE m.item_name = $item_name AND
												m.item_owner =$item_owner AND
												(m.sender= $item_borrower OR
												m.receiver=$item_borrower)";

				return pg_query($query);
		}

		public function addMessage($item_name, $item_owner, $sender, $receiver, $content, $created_at)
		{
				$query ="INSERT INTO message (item_name, item_owner, sender, receiver, content, created_at)
								VALUES('$item_name', '$item_owner', '$sender', '$receiver', '$content', '$created_at')";

				return pg_query($query);
		}
}
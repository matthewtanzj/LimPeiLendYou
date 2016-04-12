<?php

class InboxController {
	public function __construct()
	{

	}

	public function view()
	{
		session_start();

		if( empty($_SESSION['username'])) {
			$this->goToPreviousPage();
			return;
		}

		$currentUser = $_SESSION['username'];

		// Get members
		include ('models/memberModel.php');
		$memberModel = new memberModel();

		// Get all messages
		include ('models/messageModel.php');
		$messageModel = new messageModel();
		$queryResult = $messageModel->getMessageByUser($currentUser);

		$conversationArray = array();

		while ($row = pg_fetch_array($queryResult)) {
			var_dump($row);
			$otherParty = $row['sender']; 	// defaults to sender
			if ($otherParty == $currentUser) {
				$otherParty = $row['receiver'];  //change to receiver
			}
			$altQueryResult = $memberModel->getUserByUsername($otherParty);
			$currentMember = pg_fetch_row($altQueryResult);
			$otherPartyIcon = $currentMember[5];
			$itemIcon =  $row['image_url'];

			$conversation = array($otherParty, $otherPartyIcon, $itemIcon);
			array_push($conversationArray, $conversation);
		}		

		include('views/inbox.php');
	}

	  private function goToPreviousPage(){
      $previous = "javascript:history.go(-1)";
      if(isset($_SERVER['HTTP_REFERER'])) {
          $previous = $_SERVER['HTTP_REFERER'];
      }
      header("Location: " . $previous);
  }
}
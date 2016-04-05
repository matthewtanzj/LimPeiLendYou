<?php
class MessageController {
	public function __construct()
	{

	}

	public function view()
	{
		session_start();
		$itemName = '';
		$itemOwner = '';
		$itemBorrower = '';

		if (!empty($_GET['item']) && !empty($_GET['owner'])) {
			$itemName = $_GET['item'];
			$itemOwner = $_GET['owner'];
			$itemBorrower = $_SESSION['username'];

			//get all past messages
			include('models/messageModel.php');
			$messageModel = new messageModel();
			$chatHistory = $messageModel->getChatHistory($itemName, $itemOwner, $itemBorrower);
		}
			$chatHistory = $messageModel->getChatHistoryInOrder($itemName, $itemOwner, $itemBorrower);

		include('views/message.php');
	}
}

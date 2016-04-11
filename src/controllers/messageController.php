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

    // Check that URL has required fields
    if (empty($_GET['item']) || empty($_GET['owner']) || empty($_GET['borrower'])) {
      header("Location:index.php");
      return;
    }

    $itemName = $_GET['item'];
    $itemOwner = $_GET['owner'];
    $itemBorrower = $_GET['borrower'];
    $currentUser = $_SESSION['username'];

    // Getting the item
    include ('models/itemModel.php');
    $itemModel = new itemModel();
    $queryResult = $itemModel->getByKey($itemOwner, $itemName);

    // Checks that message session is for item that exist
    if ($queryResult == false) {
      $this->goToPreviousPage();
      return;
    }

    $item = pg_fetch_array($queryResult);
    $itemImage = $item['image_url'];
    $itemPrice = $item['price'];

    // Getting the members
    include('models/memberModel.php');
    $memberModel = new memberModel();

    // Checks that message session is for members that exist
    if (!$memberModel->memberExist($itemOwner) || !$memberModel->memberExist($itemBorrower)) {
      $this->goToPreviousPage();
      return;
    }

    // Ensures that current logged in user belongs to message session
    if ($currentUser != $itemOwner && $currentUser != $itemBorrower) {
      $this->goToPreviousPage();
      return;
    }

    // Ensures that user is not sending message to self
    if ($itemOwner == $itemBorrower) {
      $this->goToPreviousPage();
      return;
    }

    // get all past messages
    include('models/messageModel.php');
    $messageModel = new messageModel();
    $chatHistory = $messageModel->getChatHistoryInOrder($itemName, $itemOwner, $itemBorrower);

    // get user profile images
    $ownerProfile = $memberModel->getUserByUsername($itemOwner);
    $ownerIcon = pg_fetch_row($ownerProfile)[5];
    $borrowerProfile = $memberModel->getUserByUsername($itemBorrower);
    $borrowerIcon = pg_fetch_row($borrowerProfile)[5];
    
    // put all messages into an array
    $messageArray = array();
    while ($row = pg_fetch_row($chatHistory)) {
      $msgSender = $row[2];
      if ($msgSender == $itemOwner) {
        $msgSenderIcon = $ownerIcon;
      } else {
        $msgSenderIcon = $borrowerIcon;
      }
      $msgContent = $row[4];
      $msgTimestamp = $row[5];

      $message = array($msgSender, $msgSenderIcon, $msgContent, $msgTimestamp);

      array_push($messageArray, $message);
    }

    include('views/message.php');
  }

  private function goToPreviousPage(){
      $previous = "javascript:history.go(-1)";
      if(isset($_SERVER['HTTP_REFERER'])) {
          $previous = $_SERVER['HTTP_REFERER'];
      }
      header("Location: " . $previous);
  }
}

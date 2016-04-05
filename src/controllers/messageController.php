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

    // Getting the members
    include('models/memberModel.php');
    $memberModel = new memberModel();

    // Checks that message session is for members that exist
    if (!$memberModel->memberExist($itemOwner) || !$memberModel->memberExist($itemBorrower)) {
      header("Location: index.php");
      return;
    }

    // Ensures that current logged in user belongs to message session
    if ($currentUser != $itemOwner && $currentUser != $itemBorrower) {
      header("Location: index.php");
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
      if ($msgSender == $itemOWner) {
        $msgSenderIcon =$ownerIcon;
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
}

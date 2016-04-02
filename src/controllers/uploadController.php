<?php
class uploadController {
	public function __construct()
	{
		
	}

	public function uploadFile() {
		$target_dir = "img/display_pic/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$newfilename = null;
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		// if everything is ok, try to upload file
		} else {
			$temp = explode(".", $_FILES["fileToUpload"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfilename)) {
		    } else {
		        $newfilename = null;
		    }
		}

		return $newfilename;
	}

	public function uploadDisplayPic($username) {
		$fileName = $this->uploadFile();
		if ($fileName != null) {
			$memberModel = new memberModel();
       		$queryResult = $memberModel->updateDisplayPic($username, $fileName);
		}
	}
}
?>
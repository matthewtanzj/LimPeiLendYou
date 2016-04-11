<?php
class imageController {
	public function __construct()
	{
		
	}

	public function uploadFile() {
		$target_dir = "img/items/";
		$target_file = $target_dir . basename($_FILES["photo"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$newfilename = null;
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["photo"]["tmp_name"]);
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
		if ($_FILES["photo"]["size"] > 500000) {
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
			$temp = explode(".", $_FILES["photo"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);
		    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir . $newfilename)) {
		    } else {
		        $newfilename = null;
		    }
		}

		return $newfilename;
	}

	public function uploadCoverPhoto($item_name, $owner) {     
      
       $fileName = $this->uploadFile();
		if ($fileName != null) {
        
            $itemModel = new itemModel();
            $queryResult = false;
       	    $queryResult = $itemModel->addCoverImage($item_name, $owner, $fileName);
            
                 if (!$queryResult) {
                    $photoUploadError = true;
                    $photoUploadErrorMessage = "<p class=\"text-danger\">Image upload Failed! Please contact admin.</p>";
                }
        }
	}
}
?>
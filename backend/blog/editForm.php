<?php 
session_start();
include_once '../../config/config.php';
include_once '../../config/functions.php';

$page = $_SERVER['HTTP_REFERER'];

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

	if ( !empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['cat_id']) && !empty($_POST['content']) && (!empty($_POST['img']) or $_FILES["image"]["tmp_name"]) && (!empty($_POST['vid']) or $_FILES["video"]["tmp_name"])) {

        $db = new DB();
		$id = $db->escape($_POST["id"]);
		$title = $db->escape($_POST["title"]);
		$description = $db->escape($_POST["description"]);
		$cat_id = $db->escape($_POST["cat_id"]);
		$content = $db->escape($_POST["content"]);

		if ($_POST['is_monset'] == 1) {
			$is_monset = 1;
		}else{
			$is_monset = 0;
		}

		if ($_POST['status'] == 1) {
			$status = 1;
		}else{
			$status = 0;
		}	
		
		$img = '';
		$vid = '';

		$rand = rand(10000,99999);

		if ($_FILES["image"]["tmp_name"]) {

			$imgFolder = "assets/img";
			if(!file_exists("../assets")){mkdir("../assets");}
			if(!file_exists('../'.$imgFolder)){mkdir('../'.$imgFolder);}

			$imgFormat = array("image/jpeg", "image/gif", "image/png");

			$image = $imgFolder."/".$rand.$_FILES["image"]["name"];
			$imgway = '../'.$image;

			if(in_array($_FILES["image"]["type"], $imgFormat)){
				if(move_uploaded_file($_FILES["image"]["tmp_name"], $imgway)){

					$img=$image;
					if (file_exists('../'.$_POST['img']) ){
						unlink('../'.$_POST['img']);
					}

				}else{
					$errorMessage = "An error occurred while uploading the image. Please try again.";
					errorHeader($errorMessage, $page);
				}
			}else{
				$errorMessage = "Download images in jpeg, gif, png formate.";
				errorHeader($errorMessage, $page);
			}
		}elseif (getimagesize('../'.$_POST['img']) ){
			$img = $_POST['img'];
		}
		else{
			$errorMessage = "There is no such picture";
			errorHeader($errorMessage, $page);
		}


		if ($_FILES["video"]["tmp_name"]) {

			$videoFolder = "assets/video";
			if(!file_exists("../assets")){mkdir("../assets");}
			if(!file_exists('../'.$videoFolder)){mkdir('../'.$videoFolder);}

			$videoFormat = array("video/mp4", "video/mov", "video/wmv", "video/avi", "video/flv");

			$video = $videoFolder."/".$rand.$_FILES["video"]["name"];
			$videoway = '../'.$video;

			if(in_array($_FILES["video"]["type"], $videoFormat)){
				if(move_uploaded_file($_FILES["video"]["tmp_name"], $videoway)){

					$vid = $video;
					if (file_exists('../'.$_POST['vid'])){
						unlink('../'.$_POST['vid']);
					}

				}else{
					$errorMessage = "An error occurred while uploading the video. Please try again";
					errorHeader($errorMessage, $page);
				}
			}else{
				$errorMessage = "Download videos in mp4, mov, wmv, avi, flv format.";
				errorHeader($errorMessage, $page);;
			}
		}elseif (filesize('../'.$_POST['vid'])>0 ){
			$vid = $_POST['vid'];
		}
		else{
			$errorMessage = "There is no such video.";
			errorHeader($errorMessage, $page);
		}

		$sql = "UPDATE blog SET 
		title='$title',
		description='$description',
		cat_id='$cat_id',
		content='$content',
		is_monset='$is_monset',
		status='$status',
		image='$img',
		video='$vid'
		WHERE id=$id";

		if ($db->update($sql) > 0) {

            $_SESSION['success_message'] = "Successful";
            header("Location: $page");
		} else {
			$errorMessage = "An error occurred while loading the database";
			errorHeader($errorMessage, $page);
		}
	}
	else {
		$errorMessage = "blank cannot be passed";
		errorHeader($errorMessage, $page);
	}
}
?>
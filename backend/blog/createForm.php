<?php
session_start();
include_once '../../config/config.php';
include '../../config/insert.php';

$page = $_SERVER['HTTP_REFERER'];
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

	if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['cat_id']) && !empty($_POST['content']) && $_FILES["image"]["name"] && $_FILES["video"]["name"]) {

        $db = new DB();

		$title = $db->escape($_POST["title"]);
		$description = $db->escape($_POST["description"]);
		$cat_id = $db->escape($_POST["cat_id"]);
		$content = $db->escape($_POST["content"]);

		if ($_POST['is_monset'] == 1) {
			$is_monset = '1';
		}else{
			$is_monset = '0';
		}

		if ($_POST['status'] == 1) {
			$status = '1';
		}else{
			$status = '0';
		}

		$imgFolder = "assets/img";
		$videoFolder = "assets/video";

		if(!file_exists("../assets")){mkdir("../assets");}
		if(!file_exists('../'.$imgFolder)){mkdir('../'.$imgFolder);}
		if(!file_exists('../'.$videoFolder)){mkdir('../'.$videoFolder);}

		$imgFormat = array("image/jpeg", "image/gif", "image/png");
		$videoFormat = array("video/mp4", "video/mov", "video/wmv", "video/avi", "video/flv");

		$rand = rand(10000,99999);


		$image = $imgFolder."/".$rand.$_FILES["image"]["name"];
		$video = $videoFolder."/".$rand.$_FILES["video"]["name"];

		$imgway = '../'.$image;
		$videoway = '../'.$video;

		if(in_array($_FILES["image"]["type"], $imgFormat) && in_array($_FILES["video"]["type"], $videoFormat)){
			if(move_uploaded_file($_FILES["image"]["tmp_name"], $imgway)){
				if(move_uploaded_file($_FILES["video"]["tmp_name"], $videoway)){

                    $column = ['title', 'description', 'image', 'video', 'cat_id', 'content', 'is_monset', 'status'];
                    $value = [$title, $description, $image, $video, $cat_id, $content, $is_monset, $status];

                    Insert::insert('blog',$column, $value);
                }else{
					$_SESSION['error_message'] = "An error occurred while uploading the video. Please try again";
                }
            }else{
				$_SESSION['error_message'] = "An error occurred while uploading the image. Please try again";
            }
        }else{
			$_SESSION['error_message'] = "Download images in jpeg, gif, png formate. Download videos in mp4, mov, wmv, avi, flv formate.";
        }

    }else {
		$_SESSION['error_message'] = "blank cannot be passed";
    }
}
header("Location: $page");
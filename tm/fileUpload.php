<?php
/*
<!--
        @author: Sanjib Narzary
        @email: o-._.-o@live.com or alayaran@gmail.com
        @profession: M. Tech Student
        @colleges: NIT Silchar, B.Tech and NIT Calicut, M.Tech 2012
        @experienced: None
        @license: GNU/GPL
//-->
*/
  header('location: editPage.php?id=' . $_POST['id'] . '');
include('mysql.php');
if($_POST['id']){
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 20000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
	$pageName=$_POST['id'];
	$fileName = $_FILES["file"]["name"];
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("../uploads/".$pageName."/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../uploads/".$pageName."/"  . $_FILES["file"]["name"]);
      echo "Stored in: " . "../uploads/" .$pageName."/" . $_FILES["file"]["name"];
	  $query = "INSERT INTO `".$pageName."_images` (filename) VALUES ('" . $fileName . "')";
	  if (!mysql_query($query)) {
			print mysql_error();
		}
	else {
		print "finished Uploading your images!";
	}
      }
    }
	
  }
else
  {
  echo "Invalid file";
  }

  }
  else{ echo "Error!";}
?> 
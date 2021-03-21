<?php
if(isset($_POST['submit'])){
  $file=$_FILES['file'];
  $fileName=$_FILES['file']['name'];
  $fileTmpName=$_FILES['file']['tmp_name'];
  $fileSize=$_FILES['file']['size'];
  $fileError=$_FILES['file']['error'];
  $fileType=$_FILES['file']['type'];
  $fileExt=explode('.',$fileName);
  $fileAxtualExt=strtolower(end($fileExt));
  $allowed=array('jpg','jpeg','png','obj');
  if(in_array($fileActualExt,$allowed)){
    if($fileError ===0){
      if($fileSize<50000000){
        $fileNameNew=uniqid('',true).".".$fileActualExt;

        $fileDestination='uploads/'.$fileNameNew;
        move_uploded_file($fileTmpName,$fileDestination);
        header("Location:upload.html?");

      }
      else{
        echo"File too big";
      }

    }else{
      echo"there is an error in uploading your file";
    }


  }
  else{
    echo"you can not uplod this file";

  }
  
}
?>
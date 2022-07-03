<!-- Prevzate od pana Mateja Rabeka -->
<?php
    if(isset($_POST['title'])) {

        $name = $_POST['title'];
        $extension = pathinfo($_FILES["fileToUpload"]["name"])['extension'];
        $filename = "uploads/".$name.".$extension";
        if(file_exists($filename)){

            $name = $_POST['title'].filemtime("uploads/".$_FILES["file"]["tmp_name"]);
            $filename = "uploads/".$name.".$extension";
        }
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filename);
        header("Location: index.php");

        exit;
    }
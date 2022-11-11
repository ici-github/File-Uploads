<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label for="">Select file to upload:</label><br>
        <input type="file" name="upload_file" id=""><br> <br>

        <button type="submit" name="submit_upload"> Submit Upload </button>

        <?php
            if(isset($_POST['submit_upload'])) {
                echo "<pre>";
                var_dump($_FILES['upload_file']);
                echo "</pre>";

                $filename = $_FILES['upload_file']['name'];
                $filetype = $_FILES['upload_file']['type'];
                $filesize = $_FILES['upload_file']['size'];
                $tmpfile  = $_FILES['upload_file']['tmp_name'];

                echo "The name of the selected file is <strong>$filename</strong><br>";
                echo "The name of the selected file is <strong>" . $_FILES['upload_file']['name'] . "</strong><br>";

                $destination ="uploads/$filename";

                if(move_uploaded_file($tmpfile, $destination)) {
                    echo "<h1> The file has been uploaded to $destination </h1>";
                } else {
                    echo "<h1 style='color:red'>Cannot upload file</h1>";
                }
            }
        ?>
    </form>
</body>
</html>
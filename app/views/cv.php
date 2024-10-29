<!DOCTYPE html>
<html>

<head>
    <title>CV Upload and Display</title>
    <style>
    body {
        font-family: Arial, sans-serif;

    }

    input[type=file] {
        margin-bottom: 10px;
    }

    button {
        margin-bottom: 20px;
    }

    iframe {
        width: 100%;
        height: 600px;
        border: 1px solid #ccc;
    }
    </style>
</head>

<body>
    <h1>Upload and Display Your CV</h1>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="cv_file" required>
        <button type="submit" name="upload">Upload CV</button>
    </form>

    <?php
    if (isset($_FILES['cv_file']) && $_FILES['cv_file']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["cv_file"]["name"]);

        if (move_uploaded_file($_FILES["cv_file"]["tmp_name"], $target_file)) {
            echo "<iframe src='" . $target_file . "'></iframe>";
            echo "<br><a href='?delete=" . basename($_FILES["cv_file"]["name"]) . "'>Delete CV</a>";
        } else {
            echo "There was an error uploading your file.";
        }
    }

    if (isset($_GET['delete'])) {
        $file_to_delete = "uploads/" . $_GET['delete'];
        if (file_exists($file_to_delete)) {
            if (unlink($file_to_delete)) {
                echo "CV has been deleted.";
            } else {
                echo "There was an error deleting your CV.";
            }
        }
    }
    ?>
</body>

</html>
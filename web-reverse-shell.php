<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file'])) {
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir . basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
            echo "File uploaded successfully. ";
            echo "<a href='$upload_file'>Access File</a>";
        } else {
            echo "Error uploading file.";
        }
    }
}
?>

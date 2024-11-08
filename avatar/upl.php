
<?php
if (isset($_POST["upload"]) && !empty($_POST)) {
  $userid = uniqid('prefix');
  $file = $_FILES['photo'];
  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('jpg', 'jpeg', 'png');
  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 1000000) {
        $fileNameNew = "avatar.png";
        $fileDestination = 'uploads/' . $fileNameNew;
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
          echo "Your file has been successfully uploaded.";
        }
      } else {
        echo "Your file is too big!";
      }
    } else {
      echo "There was an error in uploading your file!";
    }
  } else {
    echo "You Cannot upload files of this type!";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Avatar</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }
    form {
      max-width: 100%;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    label {
      display: block;
      margin-bottom: 10px;
    }
    input[type="file"] {
      width: 100%;
      height: 40px;
      margin-bottom: 10px;
      padding: 10px;
      border: 1px solid #ccc;
    }
    button[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
      margin-top: 20px;
    }
    /* Add media query for mobile devices */
    @media (max-width: 768px) {
      form {
        padding: 10px;
      }
      input[type="file"] {
        height: 30px;
      }
      button[type="submit"] {
        padding: 5px 10px;
      }
    }
  </style>
</head>
<body>
  <form method="post" enctype="multipart/form-data">
    <label>Upload Avatar Template</label>
    <input type="file" name="photo">
    <button type="submit" name="upload">Upload</button>
  </form>
</body>
</html>

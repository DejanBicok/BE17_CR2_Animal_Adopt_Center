<?php
session_start();

require_once '../../components/db_connect.php';
require_once '../../components/file_upload.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../../index.php");
    exit;
}
if (isset($_SESSION['user'])) {
    header("Location: ../../home.php");
    exit;
}


if ($_POST) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $vaccination = $_POST['vaccination'];
    
     $uploadError = '';
    // //this function exists in the service file upload.
     $picture = file_upload($_FILES['picture'], 'animals');

    //  if ($animal == 'none') {
        //checks if the animals is undefined and insert null in the DB
        $sql = "INSERT INTO animals(name, location, description, size, age, vaccination, picture) 
        VALUES ('$name', '$location', '$description', '$size', '$age', '$vaccination', '$picture->fileName')";
    

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $name = ['name']</td>
            <td> $location = ['location']</td>
            <td> $description = ['description']</td>
            <td> $size = ['size']</td>
            <td> $age = ['age'] </td>
            <td> $vaccination = ['vaccination']</td>
            
            </tr></table><hr>";
         $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
         $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <?php require_once '../../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>
</body>
</html>
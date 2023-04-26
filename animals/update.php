<?php
session_start();

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}
if (isset($_SESSION['user'])) {
    header("Location: ../home.php"); 
    exit;
}

require_once '../components/db_connect.php';

if ($_GET['id']) { 
    $id = $_GET['id']; 
    $sql = "SELECT * FROM animals WHERE animal_id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $location = $data['location'];
        $picture = $data['picture'];
        $description = $data['description'];
        $size = $data['size'];
        $age = $data['age'];
        $vaccination = $data['vaccination'];
    
    
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Details</title>
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='../pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
        <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
            <table class="table">
            <tr>
                <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="Name" value="<?php echo $name ?>" /></td>
                <th>Picture</th>
                    <td><input class="form-control" type="file" name="picture" /></td>
                </tr>
                <tr>
                <th>Location</th>
                    <td><input class='form-control' type="text" name="location" placeholder="Location" value="<?php echo $location ?>"  /></td>
                </tr>
                <tr>
                <th>Description</th>
                    <td><input class='form-control' type="text" name="description" placeholder="Description" value="<?php echo $description ?>"/></td>
                </tr>
                <tr>
                <th>Size</th>
                    <td><input class='form-control' type="text" name="size" placeholder="Size" value="<?php echo $size ?>" /></td>    
                </tr>   
                <tr>
                <th>Age</th>
                    <td><input class='form-control' type="text" name="age" placeholder="Age" sort= any value="<?php echo $age ?>" /></td>
                </tr>    
                <tr>
                <th>Vaccination</th>
                    <td><input class='form-control' type="text" name="vaccination" placeholder="Vaccination" value="<?php echo $vaccination ?>" /></td>
                </tr>
                <tr>
                
                    </td>
                </tr>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $data['animal_id'] ?>" />
                    <input type="hidden" name="picture" value="<?php echo $data['picture'] ?>" />
                    <td><button class="btn btn-success" type="submit">Save Changes</button></td>
                    <td><a href="index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>
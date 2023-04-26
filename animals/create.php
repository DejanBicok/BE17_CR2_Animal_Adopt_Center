<?php
session_start();
require_once '../components/db_connect.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}
if (isset($_SESSION['user'])) {
    header("Location: ../home.php");
    exit;
}

$sql = "SELECT * FROM animals ";
$animals = "";
$result = mysqli_query($connect, $sql);

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $animals .=
        "<option value='{$row['animal_id']}'>{$row['name']}</option>";
}
// print_r($animals);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php' ?>
    <title>Add animal</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Add Animal Details</legend>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="Name" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="file" name="picture" /></td>
                </tr>
                <tr>
                <th>Location</th>
                    <td><input class='form-control' type="text" name="location" placeholder="Location"  /></td>
                </tr>
                <tr>
                <th>Description</th>
                    <td><input class='form-control' type="text" name="description" placeholder="Description" /></td>
                </tr>
                <tr>
                <th>Size</th>
                    <td><input class='form-control' type="text" name="size" placeholder="Size" /></td>    
                </tr>   
                <tr>
                <th>Age</th>
                    <td><input class='form-control' type="text" name="age" placeholder="Age" sort= any /></td>
                </tr>    
                <tr>
                <th>Vaccination</th>
                    <td><input class='form-control' type="text" name="vaccination" placeholder="Vaccination" /></td>
                </tr>
                <tr>
                <th>Status</th>
                    <td><input class='form-control' type="text" name="status" placeholder="Status" /></td>   
                    
                 
                 <td>
                        <select class="form-select" name="animal" aria-label="Default select example">
                            <?php echo $animals; ?>
                           <option class="btn btn-success ms-1" selected value='none'>Available</option>
                           <option class="btn btn-danger ms-1" selected value='none'>Not Available</option>
                           
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Add</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>
<?php
session_start();
require_once '../components/db_connect.php';
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
if (isset($_SESSION["adm"])) {
    header("Location: dashboard.php");
    exit;
}

$tbody = '';
$sql = "SELECT * FROM animals WHERE age <= '2014-01-01'";
$seniors = mysqli_query($connect, $sql);

// print_r ($seniors);

if ($seniors->num_rows > 0) {
    while ($row = $seniors->fetch_array(MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img class='img-thumbnail rounded-circle' src='../pictures/" . $row['picture'] . "' alt=" . $row['name'] . "></td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['location'] . "</td>
            <td>" . $row['description'] . "</td>
            <td>" . $row['size'] . "</td>
            <td>" . $row['age'] . "</td>
            <td>" . $row['vaccination'] . "</td>
            <td>" . $row['status'] . "</td>


            
         </tr>";
         
    }
} else {
    $tbody = "<tr><td colspan='7'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior Animals</title>
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        .img-thumbnail {
            width: 300px !important;
            height: 120px !important;
        }

        td {
            text-align: left;
            vertical-align: middle;
        }

        tr {
            text-align: center;
        }

        .userImage {
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-2">
                
                <p class="">Senior Animals</p>
                <a class="btn btn-danger" href="../home.php">Back to - List of Animals</a>
                
            </div>
            <div class="col-8 mt-2">
                <p class='h2'>Seniors</p>

                <table class='table table-striped'>
                    <thead class='table-success'>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th>Size</th>
                            <th>Age</th>
                            <th>Vaccination</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?= $tbody ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php
session_start();
require_once '../components/db_connect.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}
if (isset($_SESSION['adm'])) {
    header("location: ../dashboard.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT animal.id FROM booking 
            LEFT JOIN users ON animals.animal_id = user.id
            WHERE animal.id = {$id};";

    $result = mysqli_query($connect, $sql);
    $tbody = '';
    if (mysqli_num_rows($result)  > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $daysCount = floatval(substr($row['to_date'], -2)) - floatval(substr($row['from_date'], -2));
            $total_price = number_format((floatval($row['price']) * $daysCount), 2);

            $tbody .= "
                <tr>
                    <td><img class='img-thumbnail' src='../pictures/" . $row['picture'] . "'</td>
                    <td style='text-align:center'>" . $row['make'] . "</td>
                    <td style='text-align:center'>" . $row['model'] . "</td>
                    <td style='text-align:center'>" . $row['price'] . "</td>
                    <td style='text-align:center'>" . $row['from_date'] . "</td>
                    <td style='text-align:center'>" . $row['to_date'] . "</td>
                    <td style='text-align:center'> $total_price  €</td>
                    <td style='text-align:center'><a href='actions/a_cancel.php?id=" . $row['id'] . "'><button class='btn btn-danger btn-sm' type='button'>
                    Cancel Reservation</button></a>
                </tr>
            ";
        };
    } else {
        $tbody =  "<tr><td colspan='8'><center>No Data Available </center></td></tr>";
    }
} else {
    header("location: error.php");
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Cars</title>
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }

        td {
            text-align: left;
            vertical-align: middle;
        }

        tr {
            text-align: center;
        }

        .hero {
            background: rgb(2, 0, 36);
            background: linear-gradient(24deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 100%);
        }
    </style>
</head>

<body>
    <div class="hero" style="text-align: center;">
        <div style='display:flex; justify-content:space-around;'>
            <a href='../home.php'><button class='btn btn-outline-secondary' style='margin:3px; color:yellow;'>Home</button></a>
            <a href='#'><button class='btn btn-outline-secondary' style='margin:3px; color:yellow;'>My Reservations</button></a>
            <a href="../cars/index.php"><button class="btn btn-outline-secondary" style="margin:3px; color:yellow;">New Reservation</button></a>
            <a href='../logout.php?logout'><button class='btn btn-outline-secondary' style='margin:3px; color:yellow; font-style:italic;'>Sign Out</button></a>
        </div>
    </div>
    <div class="manageProduct w-75 mt-3">
        <p class='h2'>Booked Cars</p>
        <table class='table table-striped table-light'>
            <thead class='thead-dark'>
                <tr>
                    <th>Picture</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Price per Day</th>
                    <th>From:</th>
                    <th>To:</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
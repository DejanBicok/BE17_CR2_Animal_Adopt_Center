<?php
session_start();
require_once 'components/db_connect.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header('Location: dashboard.php');
    exit;
}
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
// select logged-in users details - procedural style
$query = "SELECT * FROM users WHERE user_id={$_SESSION['user']}";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

$fname = $row['first_name'];
$lname = $row['last_name'];
$dateOfBirth = $row['date_of_birth'];
$email = $row['email'];
$picture = $row['picture'];
$status = $row['status'];



$sql = "SELECT * FROM animals";
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img class='img-thumbnail' src='pictures/" . $row['picture'] . "'</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['location'] . "</td>
            <td>" . $row['age'] . "</td>
           
            
            


            <td><a href='delete.php?id=" . $row['animal_id'] . "'><button class='btn btn-success btn-sm' type='button'> Adopt me    !</button></a>
            <a href='details.php?animal_id=" . $row['animal_id'] . "'><button class='btn btn-primary btn-sm' type='button'>Show Details</button></a>
          
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";


}


mysqli_close($connect);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?= $fname ?></title>
    <?php require_once 'components/boot.php' ?>
    
    <style type="text/css">
        .manageProduct {
            margin: middle;
        }

        .img-thumbnail {
            width: 170px !important;
            height: 150px !important;
        }

        td {
            text-align: left;
            vertical-align: middle;
        }

        tr {
            text-align: middle;
        }
    </style>
</head>
<body>
    <div class="container py-4 h100">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="pictures/<?= $picture ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-4">Hi, <?= $fname ?></h5>
                        <div class="d-flex justify-content-center mb-2">
                            <a class="btn btn-success ms-1" href="animals/seniors.php">Show Seniors Only</a>
                            <a class=" btn btn-primary ms-1" href="update.php?id=<?= $_SESSION['user'] ?>">Update your profile</a>
                            <a class="btn btn-outline-danger ms-1" href="logout.php?logout">Log Out</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card card-body ">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $fname ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Last name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $lname ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Date of Birth</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $dateOfBirth ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $email ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Status</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $status ?></p>
                        </div>
                        <title>Animal Center</title>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="manageProduct w-100 mt-2">
        <div class='mb-3'>
        </div>
         <p class='h2 text-center'>List of Animals</p> 
        <table class='table table-striped'> 
            <thead class='table-info'>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Age</th>
                    
                    
            <tbody>
                <?= $tbody; ?>
            </tbody>
</body>

</html>
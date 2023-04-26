<?php
session_start();


require_once 'components/db_connect.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}
if (isset($_SESSION['adm'])) {
    header("Location: ../dashboard.php");
    exit;
}


 if ($_GET['animal_id']) {
    $id = $_GET['animal_id'];
    $sql = "SELECT * FROM animals WHERE animal_id= {$id}";
    
    $result = mysqli_query($connect, $sql);
    $animals = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $name = $animals['name'];
        $picture = $animals['picture'];
        $location = $animals['location'];
        $description = $animals['description'];
        $size = $animals['size'];
        $age = $animals['age'];
        $vaccination = $animals['vaccination'];
        
     $tbody="<tr>
     <td><img class='img-thumbnail' src='pictures/" . $animals['picture'] . "'</td>
         <td>$name</td> 
         <td>$location</td> 
         <td>$description</td>
         <td>$size</td> 
         <td>$age</td> 
         <td>$vaccination</td></tr>";

       
    } else {
         header("location: animals/adopt.php");
        // echo 
    }
    mysqli_close($connect);
} else {
    header("location: animals/error.php");
    // echo 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Details</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
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
                
                
                <a class="btn btn-danger" href="home.php">Back to - List of Animals</a>
                
            </div>
            <div class="col-10 mt-4">
                <p class='h2'>Details of:</p>

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
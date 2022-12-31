<?php

// database connection
$con = mysqli_connect('localhost', 'root', '', 'project') or die(mysqli_error($con)) ;

// display the chosen user by his id
$id = $_GET['id'] ;
$query = "SELECT * FROM users WHERE id = '$id' " ;
$result = mysqli_query($con, $query) or die(mysqli_error($con)) ;
$row = mysqli_fetch_assoc($result) ;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
  </head>
  <body>
    <div class="container mt-5 w-50">
      <h1 class="alert alert-warning text-center text-capitalize mt-5">
         user
        <?= $row['name'] ?>
      </h1>
      <table class="table table-striped">
        <tr>
          <th>Name</th>
          <td><?= $row['name'] ?></td>
        </tr>
        <tr>
          <th>Email</th>
          <td><?= $row['email'] ?></td>
        </tr>
        <tr>
          <th>Phone</th>
          <td><?= $row['phone'] ?></td>
        </tr>
      </table>
      <a href="users.php" class="btn btn-warning">Go back</a>
    </div>
  </body>
</html>

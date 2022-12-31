<?php

// start new session
session_start();

// login checking
if( !isset($_SESSION['loggedUser'])){
  header('location:login.php');
}
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
    <?php

// database connection
    $con = mysqli_connect('localhost', 'root', '', 'project') or die(mysqli_error($con)) ;
    $query = 'SELECT * FROM users' ;
    $result = mysqli_query($con, $query) or die(mysqli_error($con)) ;
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC) ;

// delete data from database
    if(isset($_GET['id'])){
       $id = $_GET['id'] ;
       $query = "DELETE FROM users where id = '$id' " ;
       mysqli_query($con, $query) or die(mysqli_error($con)) ;
       header('location:users.php');
    }
    ?>
    <div class="container mt-5">
      <h1
        class="alert bg-secondary text-light text-center text-capitalize mt-5"
      >
        users list
      </h1>
      <table class="table table-striped">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th class="text-secondary">Actions</th>
          <th><a href="add.php" class="btn btn-success">Add User</a></th>
        </tr>

<!-- data display -->
        <?php foreach($rows as $row): ?>
        <tr>
          <td><?= $row['name']?></td>
          <td><?= $row['email']?></td>
          <td><?= $row['phone']?></td>
          <td>
            <a href="view.php?id=<?= $row['id']?>" class="btn btn-warning"
              >View</a
            >
            <a href="edit.php?id=<?= $row['id']?>" class="btn btn-primary"
              >Edit</a
            >
            <a
              href="index.php?id=<?= $row['id']?>"
              class="btn btn-danger"
              onclick="return confirm('You want to delete <?= $row['name'] ?> ?')"
              >Delete</a
            >
          </td>
          <td></td>
        </tr>
        <?php endforeach ?>
      </table>

    </div>
  </body>
</html>

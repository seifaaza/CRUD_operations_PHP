<?php

// database connection
$con = mysqli_connect('localhost', 'root', '', 'project') or die(mysqli_error($con)) ;

// display the chosen user by his id
$id = $_GET['id'] ;
$query = "SELECT * FROM users where id = '$id' " ;
$result = mysqli_query($con, $query) or die (mysqli_error($con)) ;
$row = mysqli_fetch_assoc($result);

// update user data
if (isset($_POST['submit'])) {
  extract($_POST);
  $query = "UPDATE users SET name='$name', email='$email', phone='$phone' where id='$id' ";
  mysqli_query($con, $query) or die(mysqli_error($con)) ;

// directing to users page
  header('location:users.php');
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
    <div class="container mt-5 w-50">
      <h1 class="alert alert-primary text-capitalize text-center mt-5">
        edit user
        <?= $row['name'] ?>
      </h1>
      <form method="post">
        <label for="">Name</label>
        <input
          type="text"
          name="name"
          value="<?= $row['name'] ?>"
          class="form-control"
        />
        <label for="">Email</label>
        <input
          type="text"
          name="email"
          value="<?= $row['email'] ?>"
          class="form-control"
        />
        <label for="">Phone</label>
        <input
          type="text"
          name="phone"
          value="<?= $row['phone'] ?>"
          class="form-control"
        /> <br>
        <a href="users.php" class="btn btn-primary">Go back</a>
        <input
          type="submit"
          name="submit"
          value="Submit"
          class="btn btn-success"
        />
      </form>
    </div>
  </body>
</html>

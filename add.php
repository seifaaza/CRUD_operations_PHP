<?php

// database connection and error handling
$con = mysqli_connect('localhost', 'root', '', 'project') or die(mysqli_error($con)) ;
if(isset($_POST['submit'])){
  extract($_POST) ;

// Send data to the database
  $query = "INSERT INTO users VALUES(null, '$name', '$email', '$phone')" ;
  mysqli_query($con, $query) or die(mysqli_error($con)) ;

// directing to users page
  header("location:users.php") ;
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
      <h1 class="alert alert-success text-center text-capitalize mt-5">
        Add user
      </h1>
      <form method="post">
        <input
          type="text"
          name="name"
          placeholder="User name"
          class="form-control"
        /><br />
        <input
          type="text"
          name="email"
          placeholder="User email"
          class="form-control"
        /><br />
        <input
          type="text"
          name="phone"
          placeholder="User phone"
          class="form-control"
        /><br />
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

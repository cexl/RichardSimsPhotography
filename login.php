<?php
//login.php

include('connection.php');

if(isset($_SESSION['type']))
{
 header("location:index.php");
}

$message = '';

if(isset($_POST["login"]))
{
 $query = "
 SELECT * FROM user_details 
  WHERE user_email = :user_email
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
    'user_email' => $_POST["user_email"]
   )
 );
 $count = $statement->rowCount();
 if($count > 0)
 {
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   if(password_verify($_POST["user_password"], $row["user_password"]))
   {
    if($row['user_status'] == 'Active')
    {
     $_SESSION['type'] = $row['user_type'];
     $_SESSION['user_id'] = $row['user_id'];
     $_SESSION['user_name'] = $row['user_name'];
     header("location:dashboard.php");
    }
    else
    {
     $message = "<label>Your account is disabled, Contact Master</label>";
    }
   }
   else
   {
    $message = "<label>Wrong Password</label>";
   }
  }
 }
 else
 {
  $message = "<label>Wrong Email Address</labe>";
 }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>&copy; Richard Sims - Photography</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </head>

  <body class="text-center">
    <form class="form-signin" method="post">
	<img src="assets/logo/logo.png" class="mb-2" />
		<?php echo $message; ?>
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" id="login" name="login">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2014 - 2018 <br /> Richard Sims Photography</p>
    </form>
  </body>
</html>

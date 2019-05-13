<!doctype html>
<html>

<head>
<title>IS218 Project 2</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/validate.js"></script>

</head>

<body>

<div class="container">

  <div class="page-header">
    <h1>Sign Up Page</h1>
  </div>

  <form name="form" onsubmit="return validate();" action="index.php" method="post">
      <table class='table-create'>
          <tr>
              <td>Username: </td>
              <td><input type='text' name='email' class='form-control' /></td>
          </tr>
          <tr>
              <td>Password: </td>
              <td><input name='password' type='password' class='form-control'></textarea></td>
          </tr>
          <tr>
              <td>First name: </td>
              <td><input type='text' name='fname' class='form-control'/></td>
          </tr>
          <tr>
              <td>Last name: </td>
              <td><input type='text' name='lname'class='form-control'/></td>
          </tr>
          <tr>
              <td>College: </td>
              <td><input type='text' name='college' class='form-control'/></td>
          </tr>
          <tr>
              <td>Major: </td>
              <td><input type='text' name='major' class='form-control'/></td>
          </tr>
          <tr>
              <td></td>
              <td>
                  <a href='index.php'><input class="btn btn-primary" type="submit" name="submit" value="Sign Up"></a>
                  <a href='login.php' class='btn btn-danger'>Already have an account? Sign in.</a>
              </td>
          </tr>
      </table>
  </form>

</div>

</body>

</html>

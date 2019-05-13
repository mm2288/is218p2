<!DOCTYPE HTML>
<html>
<head>
    <title>To Do List</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

    <div class="container">

        <div class="page-header">
            <h1>Edit Item in To Do List</h1>
        </div>

        <?php
          $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

          include 'config/database.php';
          try {
            $query = "SELECT id, dates, title, description FROM todo WHERE id = ? LIMIT 0,1";

            $stmt = $con->prepare( $query );
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $dates = $row['dates'];
            $title = $row['title'];
            $description = $row['description'];
          }

          catch(PDOException $exception){
              die('ERROR: ' . $exception->getMessage());
          }
          ?>

          <?php
          if($_POST){

              try{
                  $query = "UPDATE todo
                              SET dates=:dates, title=:title, description=:description
                              WHERE id = :id";
                  $stmt = $con->prepare($query);

                  $dates=htmlspecialchars(strip_tags($_POST['dates']));
                  $title=htmlspecialchars(strip_tags($_POST['title']));
                  $description=htmlspecialchars(strip_tags($_POST['description']));

                  $stmt->bindParam(':dates', $dates);
                  $stmt->bindParam(':title', $title);
                  $stmt->bindParam(':description', $description);
                  $stmt->bindParam(':id', $id);

                  if($stmt->execute()){
                      echo "<div class='alert alert-success'>Record was updated.</div>";
                  }else{
                      echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
                  }

              }

              catch(PDOException $exception){
                  die('ERROR: ' . $exception->getMessage());
              }
          }
          ?>

          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
          <table class='table table-hover table-responsive table-bordered'>
          <tr>
              <td>Date</td>
              <td><input type='date' name='dates' value="<?php echo htmlspecialchars($dates, ENT_QUOTES);  ?>" class='form-control' /></td>
          </tr>
          <tr>
              <td>Title</td>
              <td><textarea name='title' class='form-control'><?php echo htmlspecialchars($title, ENT_QUOTES);  ?></textarea></td>
          </tr>
          <tr>
              <td>Description</td>
              <td><input type='text' name='description' value="<?php echo htmlspecialchars($description, ENT_QUOTES);  ?>" class='form-control' /></td>
          </tr>
          <tr>
              <td></td>
              <td>
                  <input type='submit' value='Save Changes' class='btn btn-primary' />
                  <a href='index.php' class='btn btn-danger'>Back to List</a>
                  <a href='signedout.php' class="btn btn-primary">Sign Out</a>
              </td>
          </tr>
          </table>
          </form>

    </div>

</body>
</html>

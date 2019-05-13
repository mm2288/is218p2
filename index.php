<!DOCTYPE HTML>
<html>
<head>
    <title>To Do List</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    </style>

</head>
<body>

    <div class="container">

        <div class="page-header">
            <h1>To Do List</h1>
        </div>

        <?php
        include 'config/database.php';

        $action = isset($_GET['action']) ? $_GET['action'] : "";
        if($action=='deleted'){
          echo "<div class='alert alert-success'>Successfully deleted.</div>";
        }

        $query = "SELECT id, dates, title, description FROM todo ORDER BY id DESC";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num>0){
          echo "<table class='table table-hover table-responsive table-bordered'>";
          echo "<tr>";
          echo "<th>ID</th>";
          echo "<th>Dates</th>";
          echo "<th>Title</th>";
          echo "<th>Description</th>";
          echo "<th>Make Modifications</th>";
          echo "</tr>";

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$dates}</td>";
            echo "<td>{$title}</td>";
            echo "<td>{$description}</td>";
            echo "<td>";
            echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";
            echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
            echo "</td>";
            echo "</tr>";
          }
          echo "</table>";
  echo "<a href='create.php' class='btn btn-primary'>Create New To Do List Item</a>";
  echo "<a href='signedout.php' class='btn btn-danger'>Sign Out</a>";
  }
  else{
    echo "<div class='alert alert-danger'>No items on list found.</div>";
  }
?>

    </div>


<script type='text/javascript'>
function delete_user( id ){

    var answer = confirm('Are you sure you would like to delete the to do list item?');
    if (answer){
        window.location = 'delete.php?id=' + id;
    }
}
</script>

</body>
</html>

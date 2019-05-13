<!DOCTYPE HTML>
<html>
<head>
    <title>To Do List</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Create New To Do List Item</h1>
        </div>

        <?php
if($_POST){

    // include database connection
    include 'config/database.php';

    try{
        $query = "INSERT INTO todo SET dates=:dates, title=:title, description=:description";

        $stmt = $con->prepare($query);

        $dates=htmlspecialchars(strip_tags($_POST['dates']));

        $title=htmlspecialchars(strip_tags($_POST['title']));

        $description=htmlspecialchars(strip_tags($_POST['description']));

        $stmt->bindParam(':dates', $dates);

        $stmt->bindParam(':title', $title);

        $stmt->bindParam(':description', $description);

        if($stmt->execute()) {
            echo "<div class='alert alert-success'>Record was saved.</div>";
        } else {
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }

    }

    // show error
    catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
    <form action = "<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>" method="post">
        <table class='table-create'>
            <tr>
                <td>Date: </td>
                <td><input type='date' name='dates' class='form-control' /></td>
            </tr>
            <tr>
                <td>Title: </td>
                <td><textarea name='title' class='form-control'></textarea></td>
            </tr>
            <tr>
                <td>Description: </td>
                <td><input type='text' name='description' class='form-control' /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='submit' value='Save Changes' class='btn btn-primary' />
                    <a href='index.php' class='btn btn-danger'>Back To To Do List</a>
                    <a href='signedout.php' class='btn btn-primary'>Sign Out</a>
                </td>
            </tr>
        </table>
    </form>

    </div>
</body>
</html>

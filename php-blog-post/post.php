<?php
ini_set('display_errors', 0);
require_once "includes/database.php";

$id = htmlentities(@$_REQUEST['id']);

// Database queries
$sql = "SELECT id, title, content, author, created_on FROM $table where id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
else {
    header("Location: index.php");
    exit;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Purna's Blog</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="pull-left margin-top-15">Purna's Blog</h3>
            <a class="btn btn-success pull-right margin-top-bottom-15" href="index.php">Back to Home</a>
        </div>
        <div class="col-md-12">
            <h4><?= $row['title'] ?></h4>
            <div><?= htmlspecialchars_decode($row['content']) ?></div>
            <div>
                <span class="text-info">Written by <?= $row['author'] ?>
                    , on <?= date('Y-m-d H:i:s', strtotime($row['created_on'])) ?>.</span>
            </div>

        </div>
    </div>
</div>
</body>
</html>

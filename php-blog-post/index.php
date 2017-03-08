<?php
ini_set('display_errors', 0);
require_once "includes/database.php";

// Database queries
$sql = "SELECT id, title, content, author, created_on FROM $table ORDER BY id DESC";
$result = $conn->query($sql);
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
            <a class="btn btn-success pull-right margin-top-bottom-15" href="add.php">Add New Post</a>
        </div>
    </div>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="row post">
                <div class="col-md-12">
                    <h4><?= $row['title'] ?></h4>
                    <div><?= htmlspecialchars_decode(substr($row['content'], 0, 255)) ?></div>
                    <div>
                        <span class="text-info">Written by <?= $row['author'] ?>
                            , on <?= date('Y-m-d H:i:s', strtotime($row['created_on'])) ?>.</span>
                        <a class="btn btn-info btn-xs pull-right" href="post.php?id=<?= $row['id'] ?>">Read More...</a>
                    </div>
                </div>
            </div>
            <?php
        } // End of result loop
    } else {
        ?>
        <div class="row">
            <div class="col-md-12">
                <p>No Posts found to display. <a href="add.php">Click here</a> to create one. </p>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</body>
</html>

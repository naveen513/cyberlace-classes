<?php
ini_set('display_errors', 0);
require_once "includes/database.php";
if(!empty(@$_POST['title']) && !empty(@$_POST['content']) && !empty(@$_POST['author'])) {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $author = htmlspecialchars($_POST['author']);
    $sql = "INSERT INTO $table (title, content, author) VALUES ('$title', '$content', '$author')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Purna's Blog</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="pull-left margin-top-15">Purna's Blog - Add New Post</h3>
            <a class="btn btn-success pull-right margin-top-bottom-15" href="index.php">Back to Home</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>
                    <div class="col-md-7">
                        <input type="input" class="form-control" id="title" name="title" placeholder="Title" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-2 control-label">Content</label>
                    <div class="col-md-7">
                        <textarea class="form-control" id="content" name="content" placeholder="Content" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="author" class="col-sm-2 control-label">Author</label>
                    <div class="col-md-7">
                        <input type="input" class="form-control" id="author" name="author" placeholder="Your Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <span id="helpBlock" class="help-block">* All fields are required.</span>
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </div>
                </div>
                <script>
                    CKEDITOR.replace('content');
                </script>
            </form>
        </div>
    </div>
</div>
</body>
</html>


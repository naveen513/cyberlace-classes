<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$db = 'purna_blog';
$table = 'posts';

// Create connection
$conn = new mysqli($host, $username, $password, $db);

// Check connection and if error die
if ($conn->connect_error) {
    echo "Unable to Connect to database check credentials in ".__FILE__;
    die();
}

// Check if table exists
$sql = "SHOW TABLES LIKE '$table'";
$result = $conn->query($sql);
if($result->num_rows != 1) {
    // Setup Script
    $sql = <<<SQL
CREATE TABLE $table (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL;
    $conn->query($sql);
}

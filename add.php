<?php

use function PHPSTORM_META\type;

if (isset($_POST['update'])) {
    require_once('db.database.php');
    $pdoconnect = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $pdoconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $title = $_POST['title'];
    $length = (int)$_POST['length_in_minutes'];
    $release = $_POST['released_at'];
    $country = $_POST['country_of_origin'];
    $summary = $_POST['summary'];
    $trailer = $_POST['youtube_trailer_id'];

    $query = "INSERT INTO `movies` (`title`, `length_in_minutes`, `released_at`, `country_of_origin`,
        `summary`, `youtube_trailer_id`)
        VALUES (:title, :length, :release, :country, :summary, :trailer)";

    $pdoresult = $pdoconnect->prepare($query);

    $pdoExec = $pdoresult->execute(array(
        ":title" => $title,
        ":length" => $length,
        ":release" => $release,
        ":country" => $country,
        ":summary" => $summary,
        ":trailer" => $trailer,
    ));

    if ($pdoExec) {
        echo "Data Inserted";
    } else {
        echo "ERROR";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
            }
    
            form {
                max-width: 400px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
    
            input {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                box-sizing: border-box;
            }
    
            input[type="submit"] {
                background-color: #4caf50;
                color: #fff;
                cursor: pointer;
            }
    
            input[type="submit"]:hover {
                background-color: #45a049;
            }
        </style>
</head>

<body>
<form action="add_film.php" method="post">
        <input type="text" name="title" required placeholder="title"><br><br>
        <input type="text" name="length_in_minutes" required placeholder="length"><br><br>
        <input type="date" name="released_at" required placeholder="released"><br><br>
        <input type="text" name="country_of_origin" required placeholder="country"><br><br>
        <input type="text" name="summary" placeholder="summary"><br><br>
        <input type="text" name="youtube_trailer_id" required placeholder="trailer"><br><br>
        <input type="submit" name="update" value="Update Data"><br><br>
    </form>
</body>

</html>
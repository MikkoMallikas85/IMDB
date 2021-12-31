<?php

require_once("db.php");
$conn = createDbConnection();

$sql = "SELECT `primary_title`
FROM `titles` INNER JOIN title_genres
ON titles.title_id = title_genres.title_id 
WHERE genre LIKE `%Documentary%`
LIMIT 10;";

$prepare = $conn->prepare($sql);
$prepare->execute();

$rows = $prepare->fetchAll();
var_dump($rows);
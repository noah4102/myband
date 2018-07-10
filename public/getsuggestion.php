<?php

function make_connection() {
    $mysqli = new mysqli('localhost', 'root', '', 'myband_db');
    if ($mysqli -> connect_errno) {
        die('Connection error:' . $mysqli->connect_errno . '<br>');

    }
    return $mysqli;
}

$q = $_REQUEST["q"];

$mysqli = make_connection();
$query = "SELECT title FROM articles WHERE title LIKE '$q%' OR content LIKE '$q%'";
$stmt = $mysqli->prepare($query) or die ('Error preparing 1.');
$stmt->bind_result($title) or die ('Error binding results 1');
$stmt->execute() or die ('Error executing');
$results = array();
while ($stmt->fetch()){
    $results[] = $title;
}
$hint = "";

if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($results as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = "<a class='search_results' href='index.php?page=news&searchterm=$name'>$name</a>";
            } else {
                $hint .= "<br><a class='search_results' href='index.php?page=news&searchterm=$name'>$name</a>";
            }
        }
    }
}

echo $hint === "" ? "Nothing found" : "<h4>Suggested search values:</h4>" . $hint;
?>
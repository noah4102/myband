<?php

function make_connection() {
    $mysqli = new mysqli('localhost', 'root', '', 'myband_db');
    if ($mysqli -> connect_errno) {
        die('Connection error:' . $mysqli->connect_errno . '<br>');

    }
    return $mysqli;
}

function get_articles(){
    $mysqli = make_connection();
    $query = "SELECT Title FROM articles";
    $stmt = $mysqli->prepare($query) or die ('Error preparing 1.');
    $stmt->bind_result($title) or die ('Error binding results 1');
    $stmt->execute() or die ('Error executing');
    $results = array();
    while ($stmt->fetch()){
        $results[] = $title;
    }
    return $results;
}

function get_some_articles() {
    global $pageno, $searchterm;
    $mysqli = make_connection();
    $number_of_pages = calculate_pages() or die ('error calculate');
    $firstrow = ($pageno -1) * ARTICLES_PER_PAGE;
    $per_page = ARTICLES_PER_PAGE;
    $query = "SELECT Title, Content, Image, date ";
    $query .= "FROM articles ";
    $query .= "WHERE Title LIKE ? OR ";
    $query .= "Content LIKE ? ";
    $query .= "ORDER BY id ";
    $query .= "DESC LIMIT $firstrow,$per_page";
    $stmt = $mysqli->prepare($query) or die ('Error preparing 2.');
    $stmt->bind_param('ss',$searchterm, $searchterm) or die ('Error binding searchterm');
    $stmt->bind_result($title, $content, $image, $date) or die ('Error binding results 1');
    $stmt->execute() or die ('Error executing');
    $results = array();
    while ($stmt->fetch()){
        $article = array();
        $article[] = $title;
        $article[] = $content;
        $article[] = $image;
        $article[] = $date;
        $results[] = $article;
    }
    return $results;

}

function calculate_pages() {
    $mysqli = make_connection();
    $query = "SELECT * FROM articles";
    $result = $mysqli->query($query) or die ('Error preparing 1.');
    $rows = $result->num_rows;
    $number_of_pages = ceil($rows / ARTICLES_PER_PAGE);
    return $number_of_pages;
}

function beheer_articles() {
    $mysqli = make_connection();
    $query = "SELECT * FROM articles";
    $stmt = $mysqli->prepare($query);
    $result = $stmt->execute() or die ('Error selecting.');
    $stmt->bind_result($id,$title,$content,$imagelink,$date);
    $results = array();
    while ($stmt->fetch()) {
        $id = substr($id, 0, 50);
        $title = substr($title, 0, 50);
        $content = substr($content, 0, 50) . '...';
        $imagelink = substr($imagelink, 0, 50) . '...';
        $article = array();
        $article[] = $id;
        $article[] = $title;
        $article[] = $content;
        $article[] = $imagelink;
        $results[] = $date;
        $results[] = $article;
    }
    return $results;
}

function showEdit(){
    $id = $_GET['id'];
    $mysqli = make_connection();
    $query = "SELECT title, content, image FROM articles WHERE id = $id";
    $stmt = $mysqli->prepare($query);
    $result = $stmt->execute() or die ('Error fetching.');
    $stmt->bind_result($title,$content,$imagelink);
    $results = array();
    while ($stmt->fetch()) {
        $article = array();
        $article[] = $id;
        $article[] = $title;
        $article[] = $content;
        $article[] = $imagelink;
        $results[] = $article;
    }
    return $results;
}

function verwerk_edit() {
    $mysqli = make_connection();
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imagelink = $_POST['imagelink'];
    $id = $_POST['id'];

    $query = "UPDATE articles SET Title = '$title', Content='$content', image='$imagelink' WHERE id = $id";

    $stmt = $mysqli->prepare($query);
    $result = $stmt->execute() or die ('Error updating');
}

function upload_post() {
    if(!isset($_POST['submit'])){
        echo 'error 45';
        exit();
    }
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imagelink = $_POST['imagelink'];
    $date = $_POST['date'];

    $positionjpg = strpos($_POST['imagelink'],'.jpg');
    $positionpng = strpos($_POST['imagelink'],'.png');
    $positiongif = strpos($_POST['imagelink'],'.gif');
    $positionjpeg = strpos($_POST['imagelink'],'.jpeg');
    $positionhttp = strpos($_POST['imagelink'],'http');
    $positionhttps = strpos($_POST['imagelink'],'https');
    $positiondata = strpos($_POST['imagelink'],'data');


    if (!$positionjpg || $positionpng || $positiongif || $positionjpeg || $positionhttp || $positionhttps || $positiondata) {
        echo'Dit was geen Image!';
        exit();
    }
    $mysqli = make_connection();
    $query = "INSERT INTO articles VALUES (0,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssss', $title, $content, $imagelink, $date);
    $result = $stmt->execute() or die ('Error inserting user.');
}

function article_display() {
    $mysqli = make_connection();
    $query = "SELECT title,content,image FROM articles ORDER BY RAND() LIMIT 4";
    $stmt = $mysqli->prepare($query) or die ('Error preparing 1.');
    $stmt->bind_result($title, $content, $image) or die ('Error binding results 1');
    $stmt->execute() or die ('Error executing');
    $results = array();
        while ($stmt->fetch()) {
            $home = array();
            $home[] = $title;
            $home[] = $content;
            $home[] = $image;
            $results[] = $home;
        }
        return $results;
}

function verify_login(){
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == 'admin123' && $password == 'root123'){
        $_SESSION['username']=$username;
        header('Location: index.php?page=admin');
    }
    else
    {
        header('Location: index.php?page=news');
    }
}

function check_valid_session(){
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('Location: index.php');
    }
}

function logout() {
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location:index.php');
    }
    unset($_SESSION['username']);     session_destroy();
    header('location:index.php');
}

function delete_post(){
    $id = $_GET['id'];
    $mysqli = make_connection();
    $query = "DELETE FROM article WHERE id = '$id'";
    $stmt = $mysqli->prepare($query);
    $result = $stmt->execute() or die ('Error deleting.');
}

function get_events() {
    $mysqli = make_connection();
    $query = "SELECT * FROM events";
    $stmt = $mysqli->prepare($query);
    $result = $stmt->execute() or die ('Error deleting.');
    $stmt->bind_result($id,$title,$content,$date);
    $results = array();
    while ($stmt->fetch()) {
        $article = array();
        $article[] = $id;
        $article[] = $title;
        $article[] = $content;
        $article[] = $date;
        $results[] = $article;
    }
    return $results;
}

function upload_event() {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];

    $mysqli = make_connection();
    $query = "INSERT INTO events VALUES (0,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('sss', $title, $content, $date);
    $result = $stmt->execute() or die ('Error inserting date.');
}
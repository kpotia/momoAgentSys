<?php 

session_start();

$details = $_SESSION['username'].': logout';
// insert into logs
include_once '../db.php';
$sql = 'INSERT INTO logs(userid,details) VALUES (:userid, :details)';
$sth = $pdo->prepare($sql);
    $sth->bindparam(':userid', $_SESSION['id']);
    $sth->bindparam(':details', $details);
if($sth->execute()){
session_destroy();
	
      header('location: ../login.php');
    }


// destroy session
 ?>
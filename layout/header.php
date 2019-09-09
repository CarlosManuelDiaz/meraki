<?php
include('../config/config.php');
include('../log/session.php');
$userDetails=$userClass->userDetails($session_uid);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link href="../css/styles.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600&display=swap" rel="stylesheet">
</head>
<body>



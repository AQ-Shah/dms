<?php 
	confirm_user_logged_in();
	$user = find_user_by_id($_SESSION["id"]);
    confirm_access($user,$current_page);
?>
<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ATC Dispatching</title>
    <?php include("../includes/layouts/public_stylesheets.php"); ?>
</head>

<body>
    <div class="wrapper">
        <?php include("../includes/views/public_navbar.php"); ?>
        <div class="content-page">
            <div class="content">
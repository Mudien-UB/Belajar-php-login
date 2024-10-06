<?php
session_start();

    if(!isset($_SESSION['username'])){
        header("Location: ../log");

        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
    <p>Ini adalah dashboard Anda.</p>
    <a href="../log/process_logout.php">Logout</a> 
</body>
</html>
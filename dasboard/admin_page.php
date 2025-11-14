<?php

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../auth/login.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Teacher | Wira Harapan</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body style="background= #fff;">
    
    <div class="box">
        <h1>Welcome, <span><?= $_SESSION['name']; ?></span></h1>
        <p>This is an <span>admin</span> page</p>
        <button><a href="../index.html">Logout</a></button>
    </div>

</body>
</html>
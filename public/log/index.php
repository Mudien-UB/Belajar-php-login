<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login bro</title>
    <link rel="stylesheet" href="../css/Style.css">
</head>
<body>
    <section>
        <form action="process_login.php" method="POST">
            <h1>LOGIN</h1>
            <label for="emailOrName">Email/Username</label>
            <input type="text" name="emailOrName" placeholder="Username" required>
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" required>
            <p>Belum punya akun ? <a href="../daftar/">buat akun</a> dulu !</p>
            <br>
            <?php
                session_start();
                if(isset($_SESSION['error'])){
                    echo "<h5 Style='color:red'>". $_SESSION['error'] . "</h5>";
                    unset($_SESSION['error']);
                } ?>
            <button type="submit">Login</button>
        </form>
        
    </section>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/login.css">
</head>
<body>       
    <div class="background-container">
        <img src="../public/images/market.jpeg" alt="Market Image" class="background-image">
    </div>
  
    <div class="wrapper">
        <h1>Superette</h1>

        <form action="loginprocess.php" method="post">
            <div class="input-box">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" id="mdp" name="mdp" placeholder="Password" required>
                <i class="bx bx-lock"></i>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>

</body>
</html>

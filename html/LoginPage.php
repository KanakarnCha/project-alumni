<!DOCTYPE html>
<html lang="en">
<?php session_start(); 
    if(isset($_SESSION["username"]) ){
        header( "Location: AdminPage.php" );
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="../image/logoApp.png" alt="" srcset=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" style="justify-content: end;margin-right:10%" id="navbarText">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Registeralumni.php">ลงทะเบียนศิษย์เก่า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alumniShow.php">รายชื่อศิษย์เก่า</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="LoginPage.php">แอดมิน</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div style="display: flex; display: flex;   align-items: center;justify-content: center; margin-top: 20px">
        <form method="POST" style=" margin:10px ;border-radius: 25px;border: 2px solid;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 20px">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" name="username">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <div style="text-align: center;">
                <button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>


<?php

require 'connection.php';
if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $stmt = $conn->prepare("SELECT * FROM `tb_admin` WHERE admin_username = :username AND admin_password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if(isset($user["admin_username"]) ){
        $_SESSION['username'] = $user['admin_username'];
        header( "Location: AdminPage.php" );
    }else{
        echo "Fail";
    }
}
?>
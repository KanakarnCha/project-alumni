<!DOCTYPE html>
<html lang="en">
<?php
require 'connection.php';
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: LoginPage.php");
} else {
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/alumniShow.css">
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
                        <a class="nav-link active" href="AddAdminPage.php">หน้าเพิ่มเเอดมิน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="LoginPage.php">แอดมิน</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div style="display: flex; display: flex;   align-items: center;justify-content: center; margin-top: 20px">
            <form method="POST" style=" margin:10px ;border-radius: 25px;border: 2px solid;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 50px">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ขื่อ :</label>
                    <input type="text" name="admin_firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">นามสกุล :</label>
                    <input type="text" name="admin_lastname" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Username :</label>
                    <input type="text" class="form-control" name="admin_username" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password :</label>
                    <input type="password" class="form-control" name="admin_password" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">สถานะ</label>
                    <input type="number" min=0 max=1 class="form-control" name="admin_status" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">วันที่สมัคร</label>
                    <input type="Date" class="form-control" name="admin_created_at" id="exampleInputPassword1" required>
                </div>
                <div style="text-align: center;">
                    <button type="submit" name="submit" class="btn btn-primary" onClick="return confirm('คุณต้องการที่จะยืนยันข้อมูลนี้หรือไม่ ?');">เพิ่มแอดมิน</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php

require 'connection.php';
if (isset($_POST['submit'])) {
    $admin_firstname =  $_POST['admin_firstname'];
    $admin_lastname = $_POST['admin_lastname'];
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    $admin_created_at = $_POST['admin_created_at'];
    $admin_status = $_POST['admin_status'];
    $admin_created_by = $_SESSION['username'];
    $sql = "INSERT INTO `tb_admin`(`admin_firstname`, `admin_lastname`, `admin_username`, `admin_password`, `admin_status`, `admin_created_by`,admin_created_at) VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $admin_firstname);
    $stmt->bindParam(2, $admin_lastname);
    $stmt->bindParam(3, $admin_username);
    $stmt->bindParam(4, $admin_password);
    $stmt->bindParam(5, $admin_status);
    $stmt->bindParam(6, $admin_created_by);
    $stmt->bindParam(7, $admin_created_at);
    $stmt->execute();
}

?>
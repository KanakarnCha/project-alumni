<!DOCTYPE html>
<html lang="en">
<?php
require 'connection.php';
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
                        <a class="nav-link active" href="alumniShow.php">รายชื่อศิษย์เก่า</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="LoginPage.php">แอดมิน</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="box">
        <div class="container" style="margin-top: 50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-bottom: 20px;  background: linear-gradient(
        10deg,
        rgba(255, 0, 0, 1) 0%,
        rgba(255, 154, 0, 1) 10%,
        rgba(208, 222, 33, 1) 20%,
        rgba(79, 220, 74, 1) 30%,
        rgba(63, 218, 216, 1) 40%,
        rgba(47, 201, 226, 1) 50%,
        rgba(28, 127, 238, 1) 60%,
        rgba(95, 21, 242, 1) 70%,
        rgba(186, 12, 248, 1) 80%,
        rgba(251, 7, 217, 1) 90%,
        rgba(255, 0, 0, 1) 100%
    );  padding:5px; ">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th style="text-align: center;">ชื่อ-นามสกุล</th>
                        <th style="text-align: center;">ข้อมูล</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $conn->prepare("SELECT tb_alumni.alumni_id, tb_alumni.alumni_year_in, tb_alumni.alumni_year_out, tb_alumni.alumni_prefix
                , tb_alumni.alumni_firstname, tb_alumni.alumni_lastname, tb_alumni.alumni_birthday, tb_alumni.alumni_email, 
                tb_alumni.alumni_phone, tb_alumni.alumni_address, tb_alumni.alumni_idcard, tb_alumni.alumni_comment, 
                tb_alumni.alumni_status, tb_alumni.alumni_sex, tb_alumni_school.school_name, tb_alumni_school.school_province, tb_alumni_school.school_url, tb_alomni_education.education_year, tb_alomni_education.education_level, 
                tb_alomni_education.education_faculty, tb_alomni_education.education_branch, tb_alomni_education.education_university, tb_alumni_work.company_name, tb_alumni_work.company_address, tb_alumni_work.company_start, 
                tb_alumni_work.company_end, tb_alumni_work.company_performance, tb_alumni_work.company_position
                FROM tb_alumni JOIN tb_alumni_school ON tb_alumni.alumni_id  = tb_alumni_school.alumni_id
                JOIN tb_alomni_education ON tb_alumni.alumni_id  = tb_alomni_education.alumni_id
                JOIN tb_alumni_work ON tb_alumni.alumni_id  = tb_alumni_work.alumni_id");
                    $stmt->execute();
                    $user = $stmt->fetchAll();
                    foreach ($user as $row) {
                        if ($row["alumni_status"] == 1) {
                    ?>
                            <tr id="<?php echo $row["alumni_id"] ?>">
                                <td>
                                    <div class="d-flex align-items-center" style="align-items: center; margin-left: 10%">
                                        <img src="https://uxwing.com/wp-content/themes/uxwing/download/business-professional-services/computer-user-icon.png" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1"><?php echo $row["alumni_prefix"] . "  " . $row["alumni_firstname"] . "  " . $row["alumni_lastname"] ?></p>
                                            <p class="text-muted mb-0"><?php echo $row["alumni_email"] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align: center;">
                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal<?php echo $row["alumni_id"] ?>">ข้อมูล</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal<?php echo $row["alumni_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">ข้อมูลทั้งหมด</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex justify-content-center" style="flex-direction: column;">
                                                <div>
                                                    <h3 style="border-bottom: 2px solid black;">ข้อมูลส่วนตัว</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>รหัสนักศึกษา :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["alumni_id"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>ชื่อ-นามสกุล :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["alumni_prefix"] . "  " . $row["alumni_firstname"] . "  " . $row["alumni_lastname"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>ปีที่เข้า-จบการศึกษา :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["alumni_year_in"] . "-" . $row["alumni_year_out"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>วันเกิด :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["alumni_birthday"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>อีเมล :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["alumni_email"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>เบอร์โทร :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["alumni_phone"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>ที่อยู่ :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["alumni_address"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>เพศ :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["alumni_sex"] ?></p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h3 style="border-bottom: 2px solid black;">ข้อมูลโรงเรียน</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>ชื่อโรงเรียน :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["school_name"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>ที่อยู่โรงเรียน :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["school_province"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>ลิงค์โรงเรียน :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["school_url"] ?></p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h3 style="border-bottom: 2px solid black;">ข้อมูลมหาลัย</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>ชื่อมหาลัย :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["education_university"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>คณะ :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["education_faculty"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>สาขา :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["education_branch"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>ระดับการศึกษา :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["education_level"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>ปีการศึกษา :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["education_year"] ?></p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h3 style="border-bottom: 2px solid black;">ข้อมูลการทำงาน</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>บริษัท :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["company_name"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>ตำแหน่ง :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["company_position"] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>เริ่ม-สิ้นสุด :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["company_start"] . "-" . $row["company_end"]  ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>ที่อยู่ :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["company_address"]  ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: end;">
                                                        <p>ผลงานที่โดดเด่น :</p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?php echo $row["company_performance"]  ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
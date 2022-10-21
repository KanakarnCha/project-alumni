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
                        <a class="nav-link" href="AddAdminPage.php">หน้าเพิ่มเเอดมิน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">ออกจากระบบ</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top: 50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  background: linear-gradient(
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
    );  padding:2px; ">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th style="text-align: center;">ชื่อ-นามสกุล</th>
                    <th style="text-align: center;">สถานะ</th>
                    <th style="text-align: center;">ยืนยัน</th>
                    <th style="text-align: center;">ลบ</th>
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
                            <p class="fw-normal mb-1"><?php if ($row["alumni_status"] == 0) {
                                                            echo "ยังไม่ได้ยืนยัน";
                                                        } else {
                                                            echo "ยืนยันแล้ว";
                                                        } ?></p>
                        </td>
                        <form method="POST">
                            <td style="text-align: center;">
                                <?php if ($row["alumni_status"] == 0) { ?>
                                    <button class="btn btn-primary" name="changeState" value="<?php echo $row["alumni_id"] ?>" onClick="return confirm('คุณต้องการที่จะยืนยันข้อมูลนี้หรือไม่ ?');">ยืนยัน</button>
                                <?php } else {
                                    echo "สำเร็จ";
                                } ?>
                            </td>
                            <td style="text-align: center;">
                                <button class="btn btn-danger" name="deleteState" value="<?php echo $row["alumni_id"] ?>">ลบ</button>
                            </td>
                        </form>
                        <td style="text-align: center;">
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal<?php echo $row["alumni_id"] ?>">ข้อมูล</button>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal<?php echo $row["alumni_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="" method="POST">
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
                                            <div class="row style=" margin-top: 5px;"">
                                                <div class="col" style="text-align: end;">
                                                    <p>รหัสนักศึกษา :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" name="alumni_id" value="<?php echo $row["alumni_id"] ?>"></input>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>บัตรประชาชน :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="text" name="alumni_idcard" value="<?php echo $row["alumni_phone"] ?>" placeholder="เลขบัตรประชาชน" class="form-control form-control inputText" required />
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>ชื่อ-นามสกุล :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" value="<?php echo $row["alumni_prefix"] ?>" placeholder="คำนำหน้า" name="alumni_prefix" />
                                                    <input type="Text" class="form-control" value="<?php echo $row["alumni_firstname"] ?>" placeholder="ชื่อ" name="alumni_firstname" />
                                                    <input type="Text" class="form-control" value="<?php echo $row["alumni_lastname"] ?>" placeholder="นามสกุล" name="alumni_lastname" />
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>ปีที่เข้า-จบการศึกษา :</p>
                                                </div>

                                                <div class="col" style="display: flex;">
                                                    <input type="Text" class="form-control" value="<?php echo $row["alumni_year_in"] ?>" placeholder="ปีที่เข้าการศึกษา" name="alumni_year_in" />
                                                    <input type="Text" class="form-control" value="<?php echo $row["alumni_year_out"] ?>" placeholder="ปีที่จบการศึกษา" name="alumni_year_out" />

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>วันเกิด :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="date" name="alumni_birthday" placeholder="วันเกิด" class="form-control" value="<?php echo $row["alumni_birthday"] ?>"></input>

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>อีเมล :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="email" name="alumni_email" placeholder="E-mail" class="form-control" value="<?php echo $row["alumni_email"] ?>" />

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>เบอร์โทร :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" name="alumni_phone" placeholder="เบอร์โทร" value="<?php echo $row["alumni_phone"] ?>" />

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>ที่อยู่ :</p>
                                                </div>
                                                <div class="col">
                                                    <textarea type="Text" class="form-control" name="alumni_address"> <?php echo $row["alumni_address"] ?></textarea>

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>เพศ :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" name="alumni_sex" value="<?php echo $row["alumni_sex"] ?>" />

                                                </div>
                                            </div>
                                            <div>
                                                <h3 style="border-bottom: 2px solid black;">ข้อมูลโรงเรียน</h3>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>ชื่อโรงเรียน :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" value="<?php echo $row["school_name"] ?>" name="school_name" placeholder="ชื่อโรงเรียน" />

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>ที่อยู่โรงเรียน :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" value="<?php echo $row["school_province"] ?>" name="school_province" placeholder="จังหวัด" />

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>ลิงค์โรงเรียน :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" value="<?php echo $row["school_url"] ?>" name="school_url" placeholder="URL Web โรงเรียน" />

                                                </div>
                                            </div>
                                            <div>
                                                <h3 style="border-bottom: 2px solid black;">ข้อมูลมหาลัย</h3>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>ชื่อมหาลัย :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" name="education_university" value="<?php echo $row["education_university"] ?>" />

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>คณะ :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" placeholder="คณะ" name="education_faculty" value="<?php echo $row["education_faculty"] ?>" />


                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>สาขา :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" placeholder="สาขา" name="education_branch" value="<?php echo $row["education_branch"] ?>" />

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>ระดับการศึกษา :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" value="<?php echo $row["education_level"] ?>" name="education_level" />

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>ปีการศึกษา :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" name="education_year" placeholder="ปีที่เข้าศึกษาต่อ" value="<?php echo $row["education_year"] ?>" />

                                                </div>
                                            </div>
                                            <div>
                                                <h3 style="border-bottom: 2px solid black;">ข้อมูลการทำงาน</h3>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>บริษัท :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" placeholder="ชื่อบริษัท" name="company_name" value="<?php echo $row["company_name"] ?>" />

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>ตำแหน่ง :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" placeholder="ตำแหน่งงาน" name="company_position" value="<?php echo $row["company_position"] ?>" />

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>เริ่ม-สิ้นสุด :</p>
                                                </div>
                                                <div class="col" style="display: flex;">
                                                    <input type="Text" class="form-control" name="company_start" placeholder="ปีที่เริ่มการทำงาน" value="<?php echo $row["company_start"] ?>" />
                                                    <input type="Text" class="form-control" name="company_end" placeholder="ปีสิ้นสุดการทำงาน" value="<?php echo $row["company_end"] ?>" />

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>ที่อยู่ :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" placeholder="ที่อยู่บริษัท" name="company_address" value="<?php echo $row["company_address"]  ?>" />

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>ผลงานที่โดดเด่น :</p>
                                                </div>
                                                <div class="col">
                                                    <input type="Text" class="form-control" placeholder="ผลงานที่โดดเด่น" name="company_performance" value="<?php echo $row["company_performance"]  ?>" />

                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px;">
                                                <div class="col" style="text-align: end;">
                                                    <p>ความคิดเห็น :</p>
                                                </div>
                                                <div class="col">
                                                    <textarea type="Text" class="form-control" placeholder="ผลงานที่โดดเด่น" name="alumni_comment" value="<?php echo $row["alumni_comment"]  ?>" ><?php echo $row["alumni_comment"]  ?></textarea>

                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary " name="clickEdit" value="clickEdit">แก้ไข</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                        </form>
                    </div>

                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>


<?php
if (isset($_POST['changeState'])) {
    $stmt = $conn->prepare("UPDATE tb_alumni SET alumni_status = 1 WHERE alumni_id =:id");
    $stmt->bindParam(':id', $_POST['changeState']);
    $stmt->execute();
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=AdminPage.php\">";
}
if (isset($_POST['deleteState'])) {
    $stmt = $conn->prepare("DELETE FROM tb_alumni WHERE alumni_id=:id");
    $stmt->bindParam(':id', $_POST['deleteState']);
    $stmt->execute();
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=AdminPage.php\">";
}

?>
<?php
if (isset($_POST['clickEdit'])) {
  $alumni_id =  $_POST['alumni_id'];
  $alumni_prefix = $_POST['alumni_prefix'];
  $alumni_firstname = $_POST['alumni_firstname'];
  $alumni_lastname = $_POST['alumni_lastname'];
  $alumni_year_in = $_POST['alumni_year_in'];
  $alumni_year_out = $_POST['alumni_year_out'];
  $alumni_birthday = $_POST['alumni_birthday'];
  $alumni_email = $_POST['alumni_email'];
  $alumni_phone = $_POST['alumni_phone'];
  $alumni_address = $_POST['alumni_address'];
  $alumni_idcard = $_POST['alumni_idcard'];
  $alumni_comment = $_POST['alumni_comment'];
  $school_name = $_POST['school_name'];
  $school_province = $_POST['school_province'];
  $school_url = $_POST['school_url'];
  $company_name = $_POST['company_name'];
  $company_address = $_POST['company_address'];
  $company_start = $_POST['company_start'];
  $company_end = $_POST['company_end'];
  $company_performance = $_POST['company_performance'];
  $company_position = $_POST['company_position'];
  $education_year = $_POST['education_year'];
  $education_level = $_POST['education_level'];
  $education_faculty = $_POST['education_faculty'];
  $education_branch = $_POST['education_branch'];
  $education_university = $_POST['education_university'];
  if ($alumni_prefix == "นาย") {
    $alumni_sex = "ชาย";
  } else {
    $alumni_sex = "หญิง";
  }
  function phpAlert($msg)
  {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }

  //ไฟล์เชื่อมต่อฐานข้อมูล
  require 'connection.php';

  try {
    $stmt = $conn->prepare("UPDATE tb_alumni SET alumni_prefix=?, alumni_firstname=?, alumni_lastname=?, alumni_birthday=?, alumni_email=?, alumni_phone=?, alumni_address=?, alumni_idcard=?, alumni_comment=?, alumni_sex=?, alumni_year_in=?, alumni_year_out=? WHERE alumni_id=?");
    $stmt->bindParam(1, $alumni_prefix);
    $stmt->bindParam(2, $alumni_firstname);
    $stmt->bindParam(3, $alumni_lastname);
    $stmt->bindParam(4, $alumni_birthday);
    $stmt->bindParam(5, $alumni_email);
    $stmt->bindParam(6, $alumni_phone);
    $stmt->bindParam(7, $alumni_address);
    $stmt->bindParam(8, $alumni_idcard);
    $stmt->bindParam(9, $alumni_comment);
    $stmt->bindParam(10, $alumni_sex);
    $stmt->bindParam(11, $alumni_year_in);
    $stmt->bindParam(12, $alumni_year_out);
    $stmt->bindParam(13, $alumni_id);

    
    $stmt2 = $conn->prepare("UPDATE tb_alumni_school SET school_name=?, school_province=?, school_url=? WHERE alumni_id=?");
    $stmt2->bindParam(1, $school_name);
    $stmt2->bindParam(2, $school_province);
    $stmt2->bindParam(3, $school_url);
    $stmt2->bindParam(4, $alumni_id);

    if (!empty($education_year)) {
      $stmt3 = $conn->prepare("UPDATE tb_alomni_education SET education_year=?, education_level=?, education_faculty=?, education_branch=?, 	education_university=? WHERE alumni_id=?");
      $stmt3->bindParam(1, $education_year);
      $stmt3->bindParam(2, $education_level);
      $stmt3->bindParam(3, $education_faculty);
      $stmt3->bindParam(4, $education_branch);
      $stmt3->bindParam(5, $education_university);
      $stmt3->bindParam(6, $alumni_id);
      $stmt3->execute();
    }
    if (!empty($company_name)) {
      $stmt4 = $conn->prepare("UPDATE tb_alumni_work SET company_name=?, company_address=?, company_start=?, company_end=?, 	company_performance=?, company_position=? WHERE alumni_id=?");
      $stmt4->bindParam(1, $company_name);
      $stmt4->bindParam(2, $company_address);
      $stmt4->bindParam(3, $company_start);
      $stmt4->bindParam(4, $company_end);
      $stmt4->bindParam(5, $company_performance);
      $stmt4->bindParam(6, $company_position);
      $stmt4->bindParam(7, $alumni_id);
      $stmt4->execute();
    } 

    
    $stmt->execute();
    $stmt2->execute();
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=AdminPage.php\">";
    phpAlert("บันทึกเรียบร้อย");
  } catch (PDOException $e) {
    phpAlert("Error: " . $e->getMessage());
  }
}
$conn = null;
exit;
?>

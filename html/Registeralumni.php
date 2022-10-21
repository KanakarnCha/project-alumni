<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/Register.css">
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
                        <a class="nav-link active" href="Registeralumni.php">ลงทะเบียนศิษย์เก่า</a>
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
    <div class="container" style="margin-top: 20px;">
        <div style="display: flex; align-items: center;justify-content: center;  ">
            <form method="POST">
                <div style=" margin:10px ;border-radius: 25px;border: 2px solid #73AD21;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 30px">
                    <div style="padding:20px;border: 2px solid #F7941D; border-radius:25px; margin-bottom: 10px;">
                        <div style="display: flex;   align-items: center;justify-content: center;">
                        
                            <div style="display: flex;flex-direction: row;">
                                <div style="display: flex; flex-direction: column;">
                                    <select class="select form-control form-control inputText" name="alumni_prefix" required>
                                        <option value="0" disabled>เลือกคำนำหน้า</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                        <option value="นาง">นาง</option>
                                    </select>
                                    <input class="form-control inputText" type="text" placeholder="ชื่อ" name="alumni_firstname" required>
                                    <input class="form-control inputText" type="text" placeholder="รหัสนักศึกษา" name="alumni_id" required>
                                    <input class="form-control inputText" type="text" placeholder="ปีที่เข้าการศึกษา" name="alumni_year_in" required>
                                    <input class="form-control inputText" type="text" placeholder="ปีที่จบการศึกษา" name="alumni_year_out" required>
                                    <input type="text" name="alumni_phone" placeholder="เบอร์โทร" class="form-control inputText" required />
                                </div>
                                <div style="display: flex;flex-direction: column; margin-left:5px">
                                    <input type="text" name="alumni_idcard" placeholder="เลขบัตรประชาชน" class="form-control form-control inputText" required />

                                    <input class="form-control inputText" type="text" placeholder="นามสกุล" name="alumni_lastname" required>
                                    <input type="date" name="alumni_birthday" placeholder="วันเกิด" class="form-control inputText" required />
                                    <input type="email" name="alumni_email" placeholder="E-mail" class="form-control form-control inputText" required />
                                    <textarea class="form-control" style="margin:5px" id="" cols="1" rows="2" placeholder="ที่อยู่" name="alumni_address" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding:20px;border: 2px solid #F7941D; border-radius:25px;  margin-bottom: 10px;" class="headText">
                        <div style="text-align: center;">
                            <h4 class="lableText">ข้อมูลการศึกษาระดับมัธยม</h4>
                        </div>

                        <div style="display: flex;   align-items: center;justify-content: start;">

                            <div style="display: flex;flex-direction: row;">
                                <div style="display: flex; flex-direction: column;">
                                    <input class="form-control inputText" type="text" name="school_name" placeholder="ชื่อโรงเรียน" required>
                                    <input class="form-control inputText" type="text" name="school_province" placeholder="จังหวัด" required>
                                    <input class="form-control inputText" type="text" name="school_url" placeholder="URL Web โรงเรียน" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding:20px;border: 2px solid #F7941D; border-radius:25px;  margin-bottom: 10px;">
                        <div style="text-align: center;">
                            <h4>ข้อมูลการศึกษาต่อ</h4>
                        </div>

                        <div style="display: flex;   align-items: center;justify-content: center;">
                            <div style="display: flex;flex-direction: row;">
                                <div style="display: flex; flex-direction: column;">
                                    <input class="form-control inputText" type="text" placeholder="มหาวิทยาลัย" name="education_university" required>
                                    <select placeholder="ระดับการศึกษา" class="select form-control inputText" name="education_level" required>
                                        <option value="1" disabled>เลือกระดับการศึกษาต่อ</option>
                                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                                        <option value="ปริญญาโท">ปริญญาโท</option>
                                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                                    </select>
                                </div>
                                <div style="display: flex;flex-direction: column; margin-left:5px">
                                    <input class="form-control inputText" type="text" placeholder="คณะ" name="education_faculty" required>
                                    <input class="form-control inputText" type="text" placeholder="สาขา" name="education_branch" required>
                                    <input type="number" name="education_year" placeholder="ปีที่เข้าศึกษาต่อ" class="form-control form-control inputText" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding:20px;border: 2px solid #F7941D; border-radius:25px;  margin-bottom: 10px; ">
                        <div style="text-align: center;">
                            <h4>ข้อมูลการทำงาน</h4>
                        </div>
                        <div style="display: flex;   align-items: center;justify-content: center;">
                            <div>
                                <div style="display: flex;flex-direction: row;">
                                    <div style="display: flex; flex-direction: column;">
                                        <input class="form-control inputText" type="text" placeholder="ชื่อบริษัท" name="company_name" required>
                                        <input class="form-control inputText" type="text" placeholder="ที่อยู่บริษัท" name="company_address" required>
                                        <input class="form-control inputText" type="text" placeholder="ตำแหน่งงาน" name="company_position" required>

                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        <input class="form-control inputText" type="text" name="company_start" placeholder="ปีที่เริ่มการทำงาน" required>
                                        <input class="form-control inputText" type="text" name="company_end" placeholder="ปีสิ้นสุดการทำงาน" required>
                                    </div>
                                </div>
                                <div>
                                    <textarea class="form-control" style="margin:5px" id="" cols="1" rows="2" placeholder="ผลงานที่โดดเด่น" name="company_performance" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding:20px;border: 2px solid #F7941D; border-radius:25px;  margin-bottom: 10px;">
                        <div style="display: flex; flex-direction: column;  align-items: center;justify-content: center;">
                            <h4>ข้อคิดเห็น</h4>
                            <div>
                                <div style="display: flex;flex-direction: row;">
                                    <textarea class="form-control" style="margin:5px" name="alumni_comment" cols="50" rows="2" placeholder="ข้อคิดเห็น" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center;">
                        <button class="btn btn-primary" type="submit" name="submit" value="ลงทะเบียน">ลงทะเบียน</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>



<?php

if (isset($_POST['submit'])) {
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
    $alumni_id = $_POST['alumni_id'];
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
        $stmt = $conn->prepare("INSERT INTO tb_alumni(alumni_id, alumni_prefix, alumni_firstname, alumni_lastname, alumni_birthday, alumni_email, alumni_phone, alumni_address, alumni_idcard, alumni_comment, alumni_sex, alumni_year_in, alumni_year_out) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1, $alumni_id);
        $stmt->bindParam(2, $alumni_prefix);
        $stmt->bindParam(3, $alumni_firstname);
        $stmt->bindParam(4, $alumni_lastname);
        $stmt->bindParam(5, $alumni_birthday);
        $stmt->bindParam(6, $alumni_email);
        $stmt->bindParam(7, $alumni_phone);
        $stmt->bindParam(8, $alumni_address);
        $stmt->bindParam(9, $alumni_idcard);
        $stmt->bindParam(10, $alumni_comment);
        $stmt->bindParam(11, $alumni_sex);
        $stmt->bindParam(12, $alumni_year_in);
        $stmt->bindParam(13, $alumni_year_out);


        $stmt2 = $conn->prepare("INSERT INTO tb_alumni_school(alumni_id, school_name, school_province, school_url) VALUES(?,?,?,?)");
        $stmt2->bindParam(1, $alumni_id);
        $stmt2->bindParam(2, $school_name);
        $stmt2->bindParam(3, $school_province);
        $stmt2->bindParam(4, $school_url);

        if (!empty($education_year)) {
            $stmt3 = $conn->prepare("INSERT INTO tb_alomni_education(education_year, education_level, education_faculty, education_branch, 	education_university, alumni_id) VALUES(?,?,?,?,?,?)");
            $stmt3->bindParam(1, $education_year);
            $stmt3->bindParam(2, $education_level);
            $stmt3->bindParam(3, $education_faculty);
            $stmt3->bindParam(4, $education_branch);
            $stmt3->bindParam(5, $education_university);
            $stmt3->bindParam(6, $alumni_id);
            $stmt3->execute();
        }
        if (!empty($company_name)) {
            $stmt4 = $conn->prepare("INSERT INTO tb_alumni_work(company_name, company_address, company_start, company_end, 	company_performance, alumni_id, company_position) VALUES(?,?,?,?,?,?,?)");
            $stmt4->bindParam(1, $company_name);
            $stmt4->bindParam(2, $company_address);
            $stmt4->bindParam(3, $company_start);
            $stmt4->bindParam(4, $company_end);
            $stmt4->bindParam(5, $company_performance);
            $stmt4->bindParam(6, $alumni_id);
            $stmt4->bindParam(7, $company_position);
            $stmt4->execute();
        }

        echo ($submit);
        $stmt->execute();
        $stmt2->execute();
        phpAlert("บันทึกเรียบร้อย");
        header("Location: Registeralumni.php");
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=AdminPage.php\">";
    } catch (PDOException $e) {
        phpAlert("Error: " . $e->getMessage());
    }
}
$conn = null;
exit;
?>
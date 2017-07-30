<?php
require_once("admin/libs/Db.php");
$objDb = new Db();
$db = $objDb->database;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="./assets/img/favicon.png" type="image/png" sizes="16x16">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>ตรวจสอบรายวิชาที่สามารถเทียบโอน</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/now-ui-kit.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/css/demo.css" rel="stylesheet" />
    <link href="./assets/css/dropdown.css" rel="stylesheet" />
    <style media="screen">
        @import url('https://fonts.googleapis.com/css?family=Kanit:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
             body{
               font-family: 'Kanit', sans-serif;
             }
    </style>
</head>

<body class="index-page">
    <?php require_once 'menu.php'; ?>
    <!-- Start class="wrapper" -->
    <div class="wrapper">
      <!-- Start class="main" -->
        <div class="main"><br>
            <!-- Typography -->
            <!-- Start class="section" -->
            <div class="section">
                <div class="container">
                    <h3 class="title">ตรวจสอบรายวิชาที่สามารถเทียบโอน</h3><hr><br><br>
                    <div id="typography">
                          <div class="row">
                            <div class="container">
                              <form action="check_course.php?Action=Save" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>มหาวิทยาลัย</label>
                                        <select class="form-control" id="field_university_id1" name="field_university_id1" required="require">
                                          <option value="">-- เลือกมหาวิทยาลัย --</option>
                                          <?php
                                            $query = $db->prepare("SELECT * FROM university");
                                            $query->execute(); //ประมวลผลคำสั่ง sql
                                            if($query->rowCount() > 0){ //rowCount เช็คจำนวนแถวที่ได้มา
                                            while($viewcat = $query->fetch(PDO::FETCH_ASSOC)){ //ดึงข้อมูลแต่ละรอบใส่ใน $row?>
                                            <option id="<?php echo $viewcat['university_id'];?>" value="<?php echo $viewcat['university_id'];?>"><?php echo $viewcat['university_name_th'];?></option>
                                          <?php }} ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>มหาวิทยาลัย</label>
                                        <select class="form-control" id="field_university_id2" name="field_university_id2" required="require">
                                          <option value="">-- เลือกมหาวิทยาลัย --</option>
                                          <?php
                                            $query = $db->prepare("SELECT * FROM university");
                                            $query->execute(); //ประมวลผลคำสั่ง sql
                                            if($query->rowCount() > 0){ //rowCount เช็คจำนวนแถวที่ได้มา
                                            while($viewcat = $query->fetch(PDO::FETCH_ASSOC)){ //ดึงข้อมูลแต่ละรอบใส่ใน $row?>
                                            <option id="<?php echo $viewcat['university_id'];?>" value="<?php echo $viewcat['university_id'];?>"><?php echo $viewcat['university_name_th'];?></option>
                                          <?php }} ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>หลักสูตร</label>
                                        <select class="form-control" id="field_course_id1" name="field_course_id1" required="require">
                                          <option value="">-- เลือกหลักสูตร --</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>หลักสูตร</label>
                                        <select class="form-control" id="field_course_id2" name="field_course_id2" required="require">
                                          <option value="">-- เลือกหลักสูตร --</option>
                                        </select>
                                      </div>
                                    </div>

                                    <br><br><br><br><br>
                                    <div class="col text-center">
                                      <button class="btn btn-success btn-round" type="submit">
                                          <i class="now-ui-icons gestures_tap-01"></i> ตรวจสอบ
                                      </button>
                                      <button class="btn btn-danger btn-round" type="reset" onclick="window.location.href='check_course.php'">
                                          <i class="now-ui-icons ui-1_simple-remove"></i> ยกเลิก
                                      </button>
                                    </div>
                                </div>
                              </form><br>
                              <?php
                              $field_course_id1=$_POST['field_course_id1'];
                              $field_course_id2=$_POST['field_course_id2'];
                                if($_GET["Action"] == "Save"){?>
                                  <form action="report.php?action=report" method="post">

                <div class="row">
                    <?php
                        $query2 = $db->prepare("SELECT * FROM transfer WHERE university_id1=:university1 AND university_id2=:university2");
                        $query2->execute(["university1"=>$_POST['field_university_id1'],"university2"=>$_POST['field_university_id2']]);
                        $count2 = $query2->rowCount();
                        if ($count2>0) {
                            $query5 = $db->prepare("SELECT * FROM transfer WHERE selector_id=:id AND university_id1=:university1 AND university_id2=:university2 AND transfer_status=0");
                            $query5->execute(["id"=>$_SESSION['id'],"university1"=>$_POST['field_university_id1'],"university2"=>$_POST['field_university_id2']]);
                            $count5 = $query5->rowCount();
                            $query6 = $db->prepare("SELECT * FROM transfer WHERE selector_id=:id AND university_id1=:university1 AND university_id2=:university2 AND transfer_status=2");
                            $query6->execute(["id"=>$_SESSION['id'],"university1"=>$_POST['field_university_id1'],"university2"=>$_POST['field_university_id2']]);
                            $count6 = $query6->rowCount();
                            $query7 = $db->prepare("SELECT * FROM transfer WHERE selector_id=:id AND university_id1=:university1 AND university_id2=:university2 AND transfer_status=1");
                            $query7->execute(["id"=>$_SESSION['id'],"university1"=>$_POST['field_university_id1'],"university2"=>$_POST['field_university_id2']]);
                            $count7 = $query7->rowCount();
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">วิชาหลัก</th>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">วิชาเทียบ</th>
                                </tr>
                            </thead>
                        <?php while($row2 = $query2->fetch(PDO::FETCH_ASSOC)){ ?>
                            <tbody>
                                <tr>
                                    <?php
                                        $query3 = $db->prepare("SELECT * FROM subject NATURAL JOIN course WHERE subject_id=:subject AND course_id=:course");
                                        $query3->execute(["subject"=>$row2['subject_id1'],"course"=>$_POST['field_course_id1']]);
                                        $row3 = $query3->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <td width="40%" class="text-center"><?=$row3['subject_id'].'  '.$row3['subject_name_th']?></td>
                                    <td width="20%" class="text-center">
                                    <?php if ($row2['transfer_status']==0) {
                                        echo "<font color='#94b8b8'>รอดำเนินการ</font>";
                                      }else if($row2['transfer_status']==1) {
                                        echo "<font color='green'>สามารถเทียบโอนได้</font>";
                                      }else{
                                        echo "<font color='red'>ไม่สามารถเทียบโอนได้</font>";
                                      }?>
                                    </td>
                                    <?php
                                        $query4 = $db->prepare("SELECT * FROM subject NATURAL JOIN course WHERE subject_id=:subject AND course_id=:course");
                                        $query4->execute(["subject"=>$row2['subject_id2'],"course"=>$_POST['field_course_id2']]);
                                        $row4 = $query4->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <td width="40%" class="text-center"><?=$row4['subject_id'].'  '.$row4['subject_name_th']?></td>

                                </tr>
                            </tbody>
                        <?php } ?>
                        </table>
                    </div>
                    <?php }else{ ?>
                        <h5 class="text-center">ไม่พบข้อมูลการเทียบโอน...</h5>
                    <?php } ?>
                </div>
                </form>
                <?php } ?>
                            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End class="main" -->
        <!-- Start class="footer" -->
        <footer class="footer" data-background-color="black">
            <div class="container">
                <nav>
                  <ul>
                      <li>
                          <img src="./assets/img/favicon.png" width="30" height="25"/>
                      </li>
                      <li>
                          <a href="index.php">
                              หน้าหลัก
                          </a>
                      </li>
                      <li>
                          <a href="check_course.php">
                              ตรวจสอบรายวิชา
                          </a>
                      </li>
                      <li>
                          <a href="step_transfer.php">
                              ขั้นตอนการเทียบโอน
                          </a>
                      </li>
                      <li>
                          <a href="transfer.php">
                              เทียบโอนหน่วยกิจ
                          </a>
                      </li>
                      <li>
                          <a href="contact.php">
                              ติดต่อเรา
                          </a>
                      </li>
                  </ul>
                </nav>
                <div class="copyright">
                    YRUNISZA
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>. All rights reserved.
                    <a href="http://www.yru.ac.th/" target="_blank">YRU</a>.
                    <a href="https://www.unisza.edu.my/index.php?lang=ms" target="_blank">UNISZA</a>.
                </div>
            </div>
        </footer>
        <!-- End class="footer" -->
    </div>
    <!-- End class="wrapper" -->
</body>
<!--   Core JS Files   -->
<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/core/tether.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="./assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/now-ui-kit.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }
</script>

<script type="text/javascript">
 $('#field_university_id1').change(function() {
            var aaa=$(this).val()
            $.ajax({

                    type: 'GET',
                    data: {field_university_id1:aaa},
                    url: 'ajax.php',
                    success: function(data) {
                            $('#field_course_id1').html(data);
                    }
            });
    });
    $('#field_course_id1').change(function() {
               var bbb=$(this).val()
               $.ajax({

                       type: 'GET',
                       data: {field_course_id1:bbb},
                       url: 'ajax.php',
                       success: function(data) {
                               $('#field_subject_id1').html(data);
                       }
               });
       });
</script>
<script type="text/javascript">
 $('#field_university_id2').change(function() {
            var xxx=$(this).val()
            $.ajax({

                    type: 'GET',
                    data: {field_university_id2:xxx},
                    url: 'ajax1.php',
                    success: function(data) {
                            $('#field_course_id2').html(data);
                    }
            });
    });
    $('#field_course_id2').change(function() {
               var yyy=$(this).val()
               $.ajax({

                       type: 'GET',
                       data: {field_course_id2:yyy},
                       url: 'ajax1.php',
                       success: function(data) {
                               $('#field_subject_id2').html(data);
                       }
               });
       });
</script>

</html>

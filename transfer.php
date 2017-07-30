<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
require_once("admin/libs/Db.php");
$objDb = new Db();
$db = $objDb->database;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>เทียบโอนหน่วยกิต</title>
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
    <link href="./assets/css/menu.css" rel="stylesheet" />
    <link href="./assets/css/loading.min.css" rel="stylesheet" />
    <link href="./assets/css/cssprogress.css" rel="stylesheet" />
    <style media="screen">
        @import url('https://fonts.googleapis.com/css?family=Kanit:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
             body{
               font-family: 'Kanit', sans-serif;
             }
    </style>
</head>

<body class="index-page">
    <?php require_once 'menu.php'; ?><br><br><br>
    <div class="row affix-row">
      <div class="col-sm-3 col-md-2 affix-sidebar">
          <div class="sidebar-nav">
            <nav class="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item" id="main-menu" style="margin-top:30px;">
                        <a class="nav-link" href="step_transfer.php">
                            <p><font color="black" size="2">ขั้นตอนการเทียบโอน</font></p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="transfer.php">
                            <p><font color="black" size="2">เทียบโอนรายวิชา</font></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transfer1.php">
                            <p><font color="black" size="2">เทียบคำอธิบายรายวิชา</font></p>
                        </a>
                    </li>
                </ul>
            </nav>
          </div>
      </div>
    <div class="col-sm-9 col-md-10 affix-content">
      <div class="container"><br><br>
        <font size="5">เทียบโอนหน่วยกิต</font> <hr><br>
        <form action="transfer_check.php?Action=Save" method="post">
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
              <div class="col-md-6">
                <div class="form-group">
                  <label>วิชา</label>
                  <select class="form-control" id="field_subject_id1" name="field_subject_id1" required="require">
                    <option value="">-- เลือกวิชา --</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>วิชา</label>
                  <select class="form-control" id="field_subject_id2" name="field_subject_id2" required="require">
                    <option value="">-- เลือกวิชา --</option>
                  </select>
                </div>
              </div>

              <br><br><br><br><br>
              <div class="col text-center">
                <button class="btn btn-success btn-round" type="submit">
                    <i class="now-ui-icons gestures_tap-01"></i> ตรวจสอบ
                </button>
                <button class="btn btn-danger btn-round" type="reset">
                    <i class="now-ui-icons ui-1_simple-remove"></i> ยกเลิก
                </button>
              </div>
          </div>
        </form>
        <?php
          if($_GET["Action"] == "Save"){
          echo "<hr>";

              $query = $db->prepare("SELECT * FROM subject WHERE subject_id=".$_POST['field_subject_id1']." ");
              $query->execute(); //ประมวลผลคำสั่ง sql
              if($query->rowCount() > 0); //rowCount เช็คจำนวนแถวที่ได้มา
              $objResult = $query->fetch(PDO::FETCH_ASSOC);
                $a = $objResult['subject_id'];
                $b = $objResult['subject_name_th'];
                $c = $objResult['subject_description_th'];
                $d = $objResult['subject_description_eng'];

                $query = $db->prepare("SELECT * FROM subject WHERE subject_id=".$_POST['field_subject_id2']." ");
                $query->execute(); //ประมวลผลคำสั่ง sql
                if($query->rowCount() > 0); //rowCount เช็คจำนวนแถวที่ได้มา
                $objResult = $query->fetch(PDO::FETCH_ASSOC);
                  $e = $objResult['subject_id'];
                  $f = $objResult['subject_name_th'];
                  $g = $objResult['subject_description_th'];
                  $h = $objResult['subject_description_eng'];

              //$number = similar_text($c, $g, $percent);
              $number = similar_text($d, $h, $percent);
              if ($percent==100) {?>
                <br>
                <div id="example-5" class="examples">
                <div class="cssProgress">
                  <div class="progress2">
                    <div class="cssProgress-bar cssProgress-success cssProgress-active" data-percent="<?php echo (int)$percent; ?>" style="width: <?php echo (int)$percent."%"; ?>;">
                      <span class="cssProgress-label"><?php echo (int)$percent."%"; ?></span>
                    </div>
                  </div>
                </div>
                </div><!-- @end #example-5 -->
                <center>ผ่าน <img src="./assets/img/success.png" width='20px' height='20px'></center>
              <?php
            }elseif ($percent>=80) {?>
              <br>
              <div id="example-5" class="examples">
              <div class="cssProgress">
                <div class="progress2">
                  <div class="cssProgress-bar cssProgress-success cssProgress-active" data-percent="<?php echo (int)$percent; ?>" style="width: <?php echo (int)$percent."%"; ?>;">
                    <span class="cssProgress-label"><?php echo (int)$percent."%"; ?></span>
                  </div>
                </div>
              </div>
              </div><!-- @end #example-5 -->
              <center>ผ่าน <img src="./assets/img/success.png" width='20px' height='20px'></center>
              <?php
            }elseif ($percent>=75) {?>
              <br>
              <div id="example-5" class="examples">
              <div class="cssProgress">
                <div class="progress2">
                  <div class="cssProgress-bar cssProgress-warning cssProgress-active" data-percent="<?php echo (int)$percent; ?>" style="width: <?php echo (int)$percent."%"; ?>;">
                    <span class="cssProgress-label"><?php echo (int)$percent."%"; ?></span>
                  </div>
                </div>
              </div>
              </div><!-- @end #example-5 -->
              <center>ปานกลาง <img src="./assets/img/warning.png" width='20px' height='20px'></center>
              <?php
            }else {?>
              <br>
              <div id="example-5" class="examples">
              <div class="cssProgress">
                <div class="progress2">
                  <div class="cssProgress-bar cssProgress-danger cssProgress-active" data-percent="<?php echo (int)$percent; ?>" style="width: <?php echo (int)$percent."%"; ?>;">
                    <span class="cssProgress-label"><?php echo (int)$percent."%"; ?></span>
                  </div>
                </div>
              </div>
              </div><!-- @end #example-5 -->
              <center>ไม่ผ่าน <img src="./assets/img/not.png" width='20px' height='20px'></center>
              <?php
              }
              ?>
              <br>
              <div class="table-responsive">
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                            <th class="text-center" width="1000">คำอธิบายรายวิชาในหลักสูตรที่ใช้เทียบ</th>
                            <th class="text-center" width="1000">คำอธิบายรายวิชาในหลักสูตรที่เทียบ</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>
                              <?php
                                echo "<br><b>วิชา</b> : ";
                                echo $b."<br><br>";
                                echo "<b>คำอธิบายรายวิชาภาษาท้องถิ่น</b><br>";
                                echo "&nbsp &nbsp &nbsp &nbsp".$c."<br><br>";
                                echo "<b>คำอธิบายรายวิชาภาษาอังกฤษ</b><br>";
                                echo "&nbsp &nbsp &nbsp &nbsp".$d;
                              ?>
                            </td>
                            <td>
                              <?php
                                echo "<br><b>วิชา</b> : ";
                                echo $f."<br><br>";
                                echo "<b>คำอธิบายรายวิชาภาษาท้องถิ่น</b><br>";
                                echo "&nbsp &nbsp &nbsp &nbsp".$g."<br><br>";
                                echo "<b>คำอธิบายรายวิชาภาษาอังกฤษ</b><br>";
                                echo "&nbsp &nbsp &nbsp &nbsp".$h;
                              ?>
                            </td>
                        </tr>
                      </tbody>
                  </table>
              </div>
              <?php
                }
              ?>

        <br><br><br><br><br><br><br><br><br>
        <!-- Start class="footer" -->
        <footer class="footer">
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
        </div><br><br><br>
      </div>
    </div>

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
<script src="./assets/js/functions.js" type="text/javascript"></script>
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

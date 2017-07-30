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
                    <h3 class="title">ตอบแบบสอบถาม</h3><hr><br>
                    <div id="typography">
                          <div class="row">
                            <div class="container">
                              <script language="JavaScript">
                              	function fncSubmit()
                              	{

                              		if(document.frmMain.rdo_gender_0.checked == false && document.frmMain.rdo_gender_1.checked == false)
                              	{
                              		alert('กรุณาระบุ เพศ');
                              		return false;
                              	}

                              	if(document.frmMain.rdo_age_0.checked == false && document.frmMain.rdo_age_1.checked == false && document.frmMain.rdo_age_2.checked == false && document.frmMain.rdo_age_3.checked == false && document.frmMain.rdo_age_4.checked == false && document.frmMain.rdo_age_5.checked == false)
                              	{
                              		alert('กรุณาระบุ อายุ');
                              		return false;
                              	}

                              		if(document.frmMain.rdo_education_0.checked == false && document.frmMain.rdo_education_1.checked == false && document.frmMain.rdo_education_2.checked == false && document.frmMain.rdo_education_3.checked == false )
                              	{
                              		alert('กรุณาระบุ ระดับการศึกษาสูงสุด');
                              		return false;
                              	}

                              	if(document.frmMain.rdo_state_0.checked == false && document.frmMain.rdo_state_1.checked == false && document.frmMain.rdo_state_2.checked == false && document.frmMain.rdo_state_3.checked == false && document.frmMain.rdo_state_4.checked == false && document.frmMain.rdo_state_5.checked == false && document.frmMain.rdo_state_6.checked == false)
                              	{
                              		alert('กรุณาระบุ  สถานะภาพ');
                              		return false;
                              	}

                              		var Rows = document.frmMain.hdnRows.value;
                              		for(x=1;x<=Rows;x++)
                              		{
                              			var op1 = document.getElementById("radionNo"+x+"_1");
                              			var op2 = document.getElementById("radionNo"+x+"_2");
                              			var op3 = document.getElementById("radionNo"+x+"_3");
                              			var op4 = document.getElementById("radionNo"+x+"_4");
                              			var op5 = document.getElementById("radionNo"+x+"_5");
                              			if(op1.checked == false && op2.checked == false && op3.checked == false  && op4.checked == false  && op5.checked == false)
                              			{
                              				alert('Please select Answer No ' + x);
                              				return false;
                              			}
                              		}

                              	}
                              </script>

                              <form name="frmMain" method="post" action="questionnaire_save.php" OnSubmit="return fncSubmit();">
                              <table class="responsive" width="950" border="0" align="center" cellpadding="2" cellspacing="2">

                                <tr bgcolor="#CCCCCC">
                                  <td>&nbsp;</td>
                                  <td colspan="7"><b>ตอนที่ 1</b> ข้อมูลพื้นฐาน</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td width="157">เพศ</td>
                                  <td width="387">
                                    <label>
                                      <input type="radio" name="rdo_gender" value="ชาย" id="rdo_gender_0" />
                                      ชาย</label>
                                    <label>
                                      <input type="radio" name="rdo_gender" value="หญิง" id="rdo_gender_1" />
                                      หญิง</label>
                                  </td>
                                  <td width="68">&nbsp;</td>
                                  <td width="60">&nbsp;</td>
                                  <td width="69">&nbsp;</td>
                                  <td width="65">&nbsp;</td>
                                  <td width="78">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>อายุ</td>
                                  <td>
                                    <label>
                                      <input type="radio" name="rdo_age" value="อายุ ต่ำกว่า 20 ปี" id="rdo_age_0" />
                                      อายุ ต่ำกว่า 20 ปี</label>
                                    <br />
                                    <label>
                                      <input type="radio" name="rdo_age" value="อายุระหว่าง 21 - 30 ปี" id="rdo_age_1" />
                                      อายุระหว่าง 21 - 30 ปี</label>
                                    <br />
                                    <label>
                                      <input type="radio" name="rdo_age" value="อายุระหว่าง 31 - 40 ปี" id="rdo_age_2" />
                                      อายุระหว่าง 31 - 40 ปี</label>
                                    <br />
                                    <label>
                                      <input type="radio" name="rdo_age" value="อายุระหว่าง 41 - 50 ปี" id="rdo_age_3" />
                                      อายุระหว่าง 41 - 50 ปี</label>
                                    <br />
                                    <label>
                                      <input type="radio" name="rdo_age" value="อายุระหว่าง 51 - 59 ปี" id="rdo_age_4" />
                                      อายุระหว่าง 51 - 59 ปี</label>
                                     <br />
                                      <label>
                                      <input type="radio" name="rdo_age" value="อายุ 60 ปีขึ้นไป" id="rdo_age_5" />
                                      อายุ 60 ปีขึ้นไป</label>

                                  </td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>ระดับการศึกษาสูงสุด</td>
                                  <td>
                                    <label>
                                      <input type="radio" name="rdo_education" value="ประถมศึกษา" id="rdo_education_0">
                                      ประถมศึกษา</label>
                                    <br>
                                    <label>
                                      <input type="radio" name="rdo_education" value="มัธยมศึกษาตอนต้น/ตอนปลาย/เทียบเท่า" id="rdo_education_1">
                                      มัธยมศึกษาตอนต้น/ตอนปลาย/เทียบเท่า</label>
                                    <br>
                                    <label>
                                      <input type="radio" name="rdo_education" value="ปริญญาตรี" id="rdo_education_2">
                                      ปริญญาตรี</label>
                                    <br>
                                    <label>
                                      <input type="radio" name="rdo_education" value="สูงกว่าปริญญาตรี" id="rdo_education_3">
                                      สูงกว่าปริญญาตรี</label>
                                    <br>
                                  </td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>สถานะภาพ</td>
                                  <td>
                                    <label>
                                      <input type="radio" name="rdo_state" value="ผู้บริหาร" id="rdo_state_0" />
                                      ผู้บริหาร</label>
                                    <br />
                                    <label>
                                      <input type="radio" name="rdo_state" value="อาจารย์" id="rdo_state_1" />
                                      อาจารย์</label>
                                    <br />
                                    <label>
                                      <input type="radio" name="rdo_state" value="เจ้าหน้าที่" id="rdo_state_2" />
                                      เจ้าหน้าที่</label>
                                    <br />
                                    <label>
                                      <input type="radio" name="rdo_state" value="นักเรียน/นักศึกษา" id="rdo_state_3" />
                                      นักเรียน/นักศึกษา</label>
                                    <br />
                                    <label>
                                      <input type="radio" name="rdo_state" value="ศิษย์เก่า" id="rdo_state_4" />
                                      ศิษย์เก่า</label>
                                    <br />
                                    <label>
                                      <input type="radio" name="rdo_state" value="ประชาชนทั่วไป" id="rdo_state_5" />
                                      ประชาชนทั่วไป</label>
                                    <br />
                                    <label>
                                      <input type="radio" name="rdo_state" value="อื่นๆ" id="rdo_state_6" />
                                      อื่นๆ</label>
                                    </td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td colspan="7">&nbsp;</td>
                                </tr>
                                <tr bgcolor="#CCCCCC">
                                  <td width="16">&nbsp;</td>
                                  <td colspan="7"><b>ตอนที่ 2</b> ความพึงพอใจของผู้ใช้เว็บไซต์</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>ข้อคำถาม</td>
                                  <td align="center">มากที่สุด</td>
                                  <td align="center">มาก</td>
                                  <td align="center">ปานกลาง</td>
                                  <td align="center">น้อย</td>
                                  <td align="center">น้อยที่สุด</td>
                                </tr>
                              </table>
                                <table width="950" border="0" align="center">
                                  <?php
                                    $query = $db->prepare("SELECT * FROM tb_question");
                                    $query->execute();
                                    $i=1;
                                    if($query->rowCount() > 0){
                                    while($viewcat = $query->fetch(PDO::FETCH_ASSOC)){
                                      $id_chk = $viewcat['id_question']; //รหัสคำถาม
                                      $name = $viewcat['question']; // ชื่อคำถาม
                                   ?>

                                  <tr>
                                    <td width="574"><?php echo $name ?> </td>
                                    <td width="70" align="center"><input name="radionNo<?php echo $i ?>" id="radionNo<?php echo $i ?>_1" type="radio" value="5"></td>
                                    <td width="63" align="center"><input name="radionNo<?php echo $i ?>" id="radionNo<?php echo $i ?>_2" type="radio" value="4"></td>
                                    <td width="71" align="center"><input name="radionNo<?php echo $i ?>" id="radionNo<?php echo $i ?>_3" type="radio" value="3"></td>
                                    <td width="65" align="center"><input name="radionNo<?php echo $i ?>" id="radionNo<?php echo $i ?>_4" type="radio" value="2"></td>
                                    <td width="81" align="center"><input name="radionNo<?php echo $i ?>" id="radionNo<?php echo $i ?>_5" type="radio" value="1"></td>
                                  </tr>
                              <?php
                              	$i++;
                              	}
                              }

                               ?>
                                </table>
                                <input type="hidden" name="hdnRows" value="<?php $i-1; ?>">
                              <center><br><br><br><button type="submit" class="btn btn-success">ตอบแบบสอบถาม</button></center>

                              </form>
                            </div><br><br><br><br><br><br>
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

</html>

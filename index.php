<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>ระบบแลกเปลี่ยนและเทียบโอนหน่วยกิตนักศึกษา</title>
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
  <!-- Navbar -->
  <nav class="navbar navbar-toggleable-md bg-info fixed-top navbar-transparent" color-on-scroll="500"> <!--color-on-scroll="500"-->
      <div class="container">
          <div class="navbar-translate">
              <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
              </button>
              <a class="navbar-brand" href="index.php" rel="tooltip" title="กลับสู่หน้าหลัก" data-placement="bottom">
                  <p><font size="2">HOME</font></p>
              </a>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
              <ul class="navbar-nav">
                  <!--<li class="nav-item dropdown">
                      <a class="nav-link" href="#">
                          <i class="now-ui-icons users_circle-08"></i>
                          <p><font size="2">Page Test</font></p>
                            <div class="dropdown-content">
                              <a href="page1.php">Link 1</a>
                              <a href="page2.php">Link 2</a>
                              <a href="page3.php">Link 3</a>
                              <a href="page4.php">Link 4</a>
                            </div>
                      </a>
                  </li>-->
                  <li class="nav-item">
                      <a class="nav-link" href="check_course.php" rel="tooltip" title="ตรวจสอบรายวิชาที่สามารถเทียบโอน" data-placement="bottom">
                          <i class="now-ui-icons education_paper"></i>
                          <p><font size="2">ตรวจสอบรายวิชา</font></p>
                      </a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link" href="#">
                          <i class="now-ui-icons users_circle-08"></i>
                          <p><font size="2">เทียบโอน</font></p>
                            <div class="dropdown-content">
                              <a href="step_transfer.php">ขั้นตอนการเทียบโอน</a>
                              <a href="transfer.php">เทียบโอนรายวิชา</a>
                              <a href="transfer1.php">เทียบคำอธิบายรายวิชา</a>
                            </div>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="contact.php" rel="tooltip" title="ข้อมูลสำหรับติดต่อสถาบัน" data-placement="bottom">
                          <i class="now-ui-icons tech_mobile"></i>
                          <p><font size="2">ติดต่อเรา</font></p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="questionnaire.php" rel="tooltip" title="ทำแบบสอบถาม" data-placement="bottom">
                          <i class="now-ui-icons files_paper"></i>
                          <p><font size="2">แบบสอบถาม</font></p>
                      </a>
                  </li>
                  <!--<li class="nav-item">
                      <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
                          <i class="fa fa-twitter"></i>
                          <p class="hidden-lg-up">Twitter</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                          <i class="fa fa-facebook-square"></i>
                          <p class="hidden-lg-up">Facebook</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                          <i class="fa fa-instagram"></i>
                          <p class="hidden-lg-up">Instagram</p>
                      </a>
                  </li>-->
              </ul>
          </div>
      </div>
  </nav>
  <!-- End Navbar -->

      <div class="wrapper">
        <div class="page-header clear-filter" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('./assets/img/bacground_yru.jpg');">
            </div>
            <div class="container">
                <div class="content-center brand">
                    <img src="./assets/img/now-logo.png" alt="" width="340" height="220">
                    <h2 class="h1-seo">ระบบแลกเปลี่ยนและเทียบโอนหน่วยกิตนักศึกษา</h2>
                    <h4>มหาวิทยาลัยราชภัฏยะลา (YRU) ร่วมกับ Universiti Sultan Zainal Abidin (UniSZA) </h4>
                </div>
            </div>
        </div><br><br><br>

        </div>
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

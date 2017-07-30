<?php
  require_once("libs/Db.php");
  $objDb = new Db();
  $db = $objDb->database;

  require_once 'login_check.php';
?>
<style media="screen">
    @import url('https://fonts.googleapis.com/css?family=Kanit:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
    body{
      font-family: 'Kanit', sans-serif;
    }
</style>
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="home.php" class="site_title text-center" style="padding-left: 0px"><span>YRU & UNISZA</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <img src="build/images/user.png" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
            <span>Welcome,</span>
            <h2><?=$_SESSION['name'] ?></h2>
          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>เมนูรายการ</h3>
            <ul class="nav side-menu">
              <?php if ($_SESSION['position']==1) { ?>
              <li><a href="home.php"><i class="fa fa-home"></i> หน้าหลัก</a></li>
              <li><a><i class="fa fa-edit"></i> จัดการหลักสูตร <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="subject.php">จัดการรายวิชา</a></li>
                  <li><a href="committee.php">เลือกคณะกรรมการ</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-desktop"></i> จัดการการเทียบโอน<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="transfer.php">เทียบโอน</a></li>
                  <li><a href="committee_info.php">รายการเทียบโอน</a></li>
                  <li><a href="transfer_info.php">รายการที่เทียบโอนแล้ว</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-file"></i> แบบสอบถาม<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="questionnaire_add.php">เพิ่มคำถามในแบบสอบถาม</a></li>
                  <li><a href="questionnaire_view.php">ดูข้อมูลคำถาม</a></li>
                  <li><a href="questionnaire_show.php">สรุปผลแบบสอบถาม</a></li>
                </ul>
              </li>
              <li><a href="report.php"><i class="fa fa-file-text-o"></i> รายงานการเทียบโอน</a></li>
              <?php

              /*require_once 'header.php';*/
              $query = $db->prepare("SELECT * FROM member WHERE member_id!=:member AND university_id=:university AND course_id=:course AND member_verified=0");
              $query->execute(["university"=>$_SESSION['university'],"course"=>$_SESSION['course']
                            ,"member"=>$_SESSION['id']]);

              if ($query->rowCount()>0) {?>
              <li><a href="accept.php"><i class="fa fa-user-plus"></i> ยืนยันตัวตนกรรมการหลักสูตร</a></li>
              <?php }

              } else if($_SESSION['position']==0){ ?>
                <li><a href="admin.php"><i class="fa fa-users"></i> ยืนยันตัวตนประธานหลักสูตร</a></li>
              <?php }else{  ?>
              <li><a href="home.php"><i class="fa fa-home"></i> หน้าหลัก</a></li>
              <li><a><i class="fa fa-exchange"></i> จัดการการเทียบโอน<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="commit.php">รายการเทียบโอน</a></li>
                  <li><a href="transfer_mine.php">รายการที่เทียบโอนแล้ว</a></li>
                </ul>
              </li>
              <?php } ?>
            </ul>
          </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          <a disabled>
            <span class="glyphicon" aria-hidden="true"></span>
          </a>
          <?php if ($_SESSION['position']==0){ ?>
          <a>
            <span class="glyphicon" aria-hidden="true"></span>
          </a>
          <a>
            <span class="glyphicon" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="ออกจากระบบ" href="logout.php">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
          <?php }else{ ?>
          <a data-toggle="tooltip" data-placement="top" title="จัดการข้อมูลส่วนตัว" href="personal.php">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="ออกจากระบบ" href="logout.php">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
          <a>
            <span class="glyphicon" aria-hidden="true"></span>
          </a>
          <?php } ?>


        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="build/images/user.png" alt=""><?=$_SESSION['name'] ?>
                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
              <?php if ($_SESSION['position']==0){ ?>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> ออกจากระบบ</a></li>
              <?php }else{ ?>
                <li><a href="personal.php"><i class="fa fa-user"></i> จัดการข้อมูลส่วนตัว</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> ออกจากระบบ</a></li>
              </ul>
              <?php } ?>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->

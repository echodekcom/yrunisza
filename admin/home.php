<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>ยินดีต้อนรับเข้าสู่ระบบสารสนเทศความต้องการแลกเปลี่ยนและเทียบโอนหน่วยกิตนักศึกษาระหว่าง | YRU & UniSZA</title>


    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">

    <?php require_once 'header.php'; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <br><br><br>
          
            <?php
            if ($_SESSION['position']==1) { ?>
              <div class="panel panel-default">
                <div class="panel-body">
                  <h1>ยินดีต้อนรับ</h1>
                  <hr>
                  <?php $query = $db->prepare("SELECT member_verified FROM member WHERE university_id=:university AND course_id=:course AND member_verified=0");
                    $query->execute(["university"=>$_SESSION['university'],"course"=>$_SESSION['course']]);
                    $row = $query->rowCount();
                    if ($row==0) { ?>
                    <div class="col-md-6">
                        <div class="panel panel-back noti-box">
                          <a href="" class="list-group-item" id="btnBottom" data-placement="top" title="คลิกเพื่อดูรายละเอียดเพิ่มเติม">
                          <div class="col-md-3 text-center"><i class="fa fa-user-plus fa-5x"></i></div>
                            <div class="col-md-9"><h3>ยืนยันตัวตนอาจารย์</h3></div>
                              <h4>&nbsp; 
                              <font>ไม่มีการขอเข้าใช้งานระบบในขณะนี้</font></h4>
                          </a>
                        </div>
                    </div>
                  <?php }else{ ?>
                    <div class="col-md-6">
                        <div class="panel panel-back noti-box">
                          <a href="accept.php" class="list-group-item" id="btnBottom" data-placement="top" title="คลิกเพื่อดูรายละเอียดเพิ่มเติม">
                          <div class="col-md-3 text-center"><i class="fa fa-user-plus fa-5x"></i></div>
                            <div class="col-md-9"><h3>ยืนยันตัวตนกรรมการในหลักสูตร</h3></div>
                              <h4>&nbsp;
                              <font >คุณมี <?=$row?> รายการที่รอการอนุมัติเข้าใช้งานระบบ</font></h4>
                          </a>
                        </div>
                    </div>
            <?php } 
                    $query = $db->prepare("SELECT * FROM transfer WHERE transfer_status=0 AND selector_id=:id ORDER BY transfer_id ");
                    $query->execute(["id"=>$_SESSION['id']]);
                    $row = $query->rowCount();
                    if ($row==0) { ?>
                    <div class="col-md-6">
                        <div class="panel panel-back noti-box">
                          <a href="" class="list-group-item" id="btnTop" data-placement="top" title="คลิกเพื่อดูรายละเอียดเพิ่มเติม">
                          <div class="col-md-3 text-center"><i class="fa fa-exchange fa-5x"></i></div>
                            <div class="col-md-9"><h3>รายการเทียบโอน</h3></div>
                              <h4>&nbsp; 
                              <font >ไม่มีรายการเทียบโอนในขณะนี้</font></h4>
                          </a>
                        </div>
                    </div>
                  <?php }else{ ?> 
                    <div class="col-md-6">
                        <div class="panel panel-back noti-box">
                          <a href="committee_info.php" class="list-group-item" id="btnTop" data-placement="top" title="คลิกเพื่อดูรายละเอียดเพิ่มเติม">
                          <div class="col-md-3 text-center"><i class="fa fa-exchange fa-5x"></i></div>
                            <div class="col-md-9"><h3>รายการเทียบโอน</h3></div>
                              <h4>&nbsp; 
                              <font >คุณมี <?=$row?> ที่ยังไม่ดำเนินการเทียบโอน</font></h4>
                          </a>
                        </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                    <div class="container-fluid">
                      <div style="float: right;padding-top: 15px">
                        <a href="transfer_info.php">ดูทั้งหมด...</a>
                      </div>
                      <h3>ประวัติการเทียบโอน</h3>
                      <hr>
                      <?php 
                        $query1 = $db->prepare("SELECT * FROM transfer WHERE selector_id=:id AND transfer_status!=0 ORDER BY transfer_id DESC LIMIT 3");
                        $query1->execute(["id"=>$_SESSION['id']]);
                        if ($query1->rowCount()>0) { 
                      ?>
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th class="text-center">วิชาหลัก</th>
                              <th class="text-center">วิชาเทียบ</th>
                              <th class="text-center">หลักสูตร</th>
                              <th class="text-center">มหาวิทยาลัย</th>
                              <th class="text-center">ผลการประเมิน</th>
                              <th class="text-center">สถานะ</th>
                              <!-- <th class="text-center">ดำเนินการ</th> -->
                            </tr>
                          </thead>

                          <?php
                              while ($row1 = $query1->fetch(PDO::FETCH_ASSOC)) {
                          ?>

                          <tbody>
                            <tr>
                              <?php 
                              $query2 = $db->prepare("SELECT * FROM subject NATURAL JOIN course NATURAL JOIN university WHERE subject_id='".$row1['subject_id1']."'");
                              $query2->execute();
                              $row2 = $query2->fetch(PDO::FETCH_ASSOC); 
                              ?>
                              <td><?=$row1['subject_id1'].' '.$row2['subject_name_th']?></td>
                              <?php 
                              $query3 = $db->prepare("SELECT * FROM subject NATURAL JOIN course NATURAL JOIN university WHERE subject_id='".$row1['subject_id2']."'");
                              $query3->execute();
                              $row3 = $query3->fetch(PDO::FETCH_ASSOC); 
                              ?>
                              <td><?=$row1['subject_id2'].' '.$row3['subject_name_th']?></td>
                              <td><?=$row3['course_name_th']?></td>
                              <td><?=$row3['university_name_th']?></td>
                              <td width="10%">
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#detail<?=$row1['transfer_id']?>">
                                <i class="fa fa-user"></i> ผลการประเมิน
                                </button>

                                <form action="transfer.php?action=transfer" method="post">
                                  <div class="modal fade" id="detail<?=$row1['transfer_id']?>">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header text-center">
                                          <h2>รายการผู้ประเมิน</h2>
                                        </div>
                                        <div class="modal-body">
                                          <div class="form-group">
                                            <?php 
                                            $query4 = $db->prepare("SELECT * FROM transfer_detail NATURAL JOIN member NATURAL JOIN course WHERE transfer_id='".$row1['transfer_id']."'");
                                            $query4->execute();
                                            ?>
                                            <div class="table-responsive">
                                              <table class="table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th class="text-center">ชื่อ - นามสกุลผู้ประเมิน</th>
                                                    <th class="text-center">หลักสูตร</th>
                                                    <th class="text-center">สถานะ</th>
                                                  </tr>
                                                </thead>
                                                <?php
                                                  while ($row4 = $query4->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tbody>
                                                  <tr>
                                                    <td><?=$row4['member_name'].' '.$row4['member_lastname'] ?></td>
                                                    <td><?=$row4['course_name_th'].' / '.$row4['course_name_eng'] ?></td>
                                                    <td class="text-center">
                                                      <?php if ($row4['td_status']==0) {
                                                        echo "<span class='label label-default'>ยังไม่ดำเนินการ</span>";
                                                      }else if($row4['td_status']==1) {
                                                        echo "<span class='label label-success'>อนุมัติ</span>";
                                                      }else{
                                                        echo "<span class='label label-danger'>ไม่อนุมัตื</span>";
                                                      }
                                                      ?>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                                <?php } ?>
                                              </table>
                                            </div>
                                          </div>
                                          <div style="text-align: right;">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                                
                              </td>
                              <td class="text-center">
                              <?php  
                              if($row1['transfer_status']==1) {
                                echo "<span class='label label-success'>อนุมัติ</span>";
                              }else{
                                echo "<span class='label label-danger'>ไม่อนุมัตื</span>";
                              }
                              ?>
                                
                              </td>
                            </tr>

                          </tbody>
                          <?php }?>
                        </table>
                      </div>
                        <?php }else{ ?>
                          <div style="float: right">
                            <button class="btn btn-success" type="button" onclick="window.location.href='committee_info.php'"><i class="fa fa-file-text-o"></i> รายการเทียบโอน</button>
                          </div>
                          <h5>ไม่พบข้อมูลการเทียบโอน...</h5>
                        <?php } ?>
                    </div>
                  </div>
                </div>
              </div>  
              <br>
                  
                  

            <?php }else{ ?>
              <div class="panel panel-default">
                <div class="panel-body">
                  <h1>ยินดีต้อนรับ</h1>
                  <hr>
                  <?php 
                   $query = $db->prepare("SELECT * FROM transfer_detail NATURAL JOIN transfer WHERE td_status=0 AND member_id=:id ORDER BY transfer_id ");
                    $query->execute(["id"=>$_SESSION['id']]);
                    $row = $query->rowCount();
                    if ($row==0) { ?>
                    <div class="col-md-6">
                        <div class="panel panel-back noti-box">
                          <a href="" class="list-group-item" id="btnBottom" data-placement="top" title="คลิกเพื่อดูรายละเอียดเพิ่มเติม">
                          <div class="col-md-3 text-center"><i class="fa fa-users fa-5x"></i></div>
                            <div class="col-md-9"><h3>รายการประเมิน</h3></div>
                              <h4>&nbsp; 
                              <font>ไม่มีวิชาที่ให้ท่านประเมินในขณะนี้</font></h4>
                          </a>
                        </div>
                    </div>
                  <?php }else{ ?>
                    <div class="col-md-6">
                        <div class="panel panel-back noti-box">
                          <a href="commit.php" class="list-group-item" id="btnBottom" data-placement="top" title="คลิกเพื่อดูรายละเอียดเพิ่มเติม">
                          <div class="col-md-3 text-center"><i class="fa fa-users fa-5x"></i></div>
                            <div class="col-md-9"><h3>รายการประเมิน</h3></div>
                              <h4>&nbsp;
                              <font >คุณมี <?=$row?> รายการที่รอดำเนินการ</font></h4>
                          </a>
                        </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                    <div class="container-fluid">
                      <h3>ประวัติการเทียบโอน</h3>
                      <hr>
                      <?php 
                        $query1 = $db->prepare("SELECT * FROM transfer_detail NATURAL JOIN transfer WHERE td_status!=0 AND member_id=:id ORDER BY transfer_id DESC LIMIT 3");
                        $query1->execute(["id"=>$_SESSION['id']]);
                        if ($query1->rowCount()>0) { 
                      ?>
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th class="text-center">วิชาหลัก</th>
                              <th class="text-center">วิชาเทียบ</th>
                              <th class="text-center">หลักสูตร</th>
                              <th class="text-center">มหาวิทยาลัย</th>
                              <th class="text-center">ผลการประเมิน</th>
                            </tr>
                          </thead>

                          <?php
                            while ($row1 = $query1->fetch(PDO::FETCH_ASSOC)) {
                          ?>

                          <tbody>
                            <tr>
                              <?php 
                              $query2 = $db->prepare("SELECT * FROM subject NATURAL JOIN course NATURAL JOIN university WHERE subject_id='".$row1['subject_id1']."'");
                              $query2->execute();
                              $row2 = $query2->fetch(PDO::FETCH_ASSOC); 
                              ?>
                              <td><?=$row1['subject_id1'].' '.$row2['subject_name_th']?></td>
                              <?php 
                              $query3 = $db->prepare("SELECT * FROM subject NATURAL JOIN course NATURAL JOIN university WHERE subject_id='".$row1['subject_id2']."'");
                              $query3->execute();
                              $row3 = $query3->fetch(PDO::FETCH_ASSOC); 
                              ?>
                              <td><?=$row1['subject_id2'].' '.$row3['subject_name_th']?></td>
                              <td><?=$row3['course_name_th']?></td>
                              <td><?=$row3['university_name_th']?></td>
                              <td class="text-center">
                              <?php  
                              if($row1['td_status']==1) {
                                echo "<span class='label label-success'>อนุมัติ</span>";
                              }else{
                                echo "<span class='label label-danger'>ไม่อนุมัตื</span>";
                              }
                              ?>
                                
                              </td>
                            </tr>

                          </tbody>
                          <?php } ?>
                        </table>
                      </div>
                        <?php }else{ echo "<h5>ไม่พบข้อมูลการเทียบโอน...</h5>";} ?>
                    </div>
                  </div>
                </div>
              </div>  
              <br>
            <?php } ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        
        <!-- /footer content -->
      </div>
    </div>

    <script src="build/js/jquery.min.js"></script>
    <script src="build/js/bootstrap.min.js"></script>
    <script src="build/js/custom.min.js"></script>
    <script type="text/javascript">
      $('#btnTop').tooltip();
      $('#btnBottom').tooltip();
      $('#btnLeft').tooltip();
      $('#btnRight').tooltip();
    </script>

  </body>
</html>

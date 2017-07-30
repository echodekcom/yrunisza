<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>รายการที่เทียบโอนแล้ว | YRU & UniSZA</title>

    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">

    <?php require_once 'header.php'; ?>

        <!-- page content -->
        <div class="right_col">
          <br><br><br>
          <div class="panel panel-default">
            <div class="panel-body">
                <h3>รายการที่เทียบโอนแล้ว</h3>
                <hr>
                
                  <?php if($_GET["txtKeyword"] != "");

                  $query = $db->prepare("SELECT * FROM transfer WHERE transfer_status!=0 AND selector_id=:id AND (subject_id1 LIKE '%".$_GET["txtKeyword"]."%' OR subject_id2 LIKE '%".$_GET["txtKeyword"]."%')  ORDER BY transfer_id ");
                  $query->execute(["id"=>$_SESSION['id']]);
                ?>
                <form class="form-inline" name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
                  <div>
                      <div class="form-group">
                        <input name="txtKeyword" class="form-control" type="text" autocomplete="off" placeholder="ค้นหาด้วยรหัสวิชา..." id="txtKeyword" value="<?php echo $_GET["txtKeyword"];?>">
                      </div>
                      <div class="form-group">
                          <button class="btn btn-success" type="submit" style="margin-bottom: -1px"><i class="fa fa-search"></i> ค้นหา</button>
                      </div>
                      <div class="form-group">
                          <a href="transfer_info.php" class="btn btn-info" style="margin-bottom: -1px"><i class="fa fa-repeat"></i></a>
                      </div>
                      <button class="btn btn-success" type="button" style="float: right;" onclick="window.location.href='committee_info.php'"><i class="fa fa-file-text-o"></i> รายการเทียบโอน</button>
                  </div>
                </form>
                <?php if ($query->rowCount()>0) { ?>
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
                      <th class="text-center">ดำเนินการ</th>
                    </tr>
                  </thead>

                  <?php
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <form action="transfer.php?action=transfer" method="post">
                  <tbody>
                    <tr>
                      <?php 
                      $query1 = $db->prepare("SELECT * FROM subject NATURAL JOIN course NATURAL JOIN university WHERE subject_id='".$row['subject_id1']."'");
                      $query1->execute();
                      $row1 = $query1->fetch(PDO::FETCH_ASSOC); 
                      ?>
                      <td><?=$row['subject_id1'].' - '.$row1['subject_name_th']?></td>
                      <?php 
                      $query2 = $db->prepare("SELECT * FROM subject NATURAL JOIN course NATURAL JOIN university WHERE subject_id='".$row['subject_id2']."'");
                      $query2->execute();
                      $row2 = $query2->fetch(PDO::FETCH_ASSOC); 
                      ?>
                      <td><?=$row['subject_id2'].' - '.$row2['subject_name_th']?></td>
                      <td><?=$row2['course_name_th']?></td>
                      <td><?=$row2['university_name_th']?></td>
                      <td width="10%">
                        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#detail<?=$row['transfer_id']?>">
                        <i class="fa fa-user"></i> ผลการประเมิน
                        </button>

                          <div class="modal fade" id="detail<?=$row['transfer_id']?>">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header text-center">
                                  <h2>รายการผู้ประเมิน</h2>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                    <?php 
                                    $query3 = $db->prepare("SELECT * FROM transfer_detail NATURAL JOIN member NATURAL JOIN course WHERE transfer_id='".$row['transfer_id']."'");
                                    $query3->execute();
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
                                          while ($row3 = $query3->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tbody>
                                          <tr>
                                            <td><?=$row3['member_name'].' '.$row3['member_lastname'] ?></td>
                                            <td><?=$row3['course_name_th'].' / '.$row3['course_name_eng'] ?></td>
                                            <td class="text-center">
                                              <?php if ($row3['td_status']==0) {
                                                echo "<span class='label label-default'>ยังไม่ดำเนินการ</span>";
                                              }else if($row3['td_status']==1) {
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
                                    <input type="hidden" name="subject_id1" value="<?=$row['subject_id1'] ?>">
                                    <input type="hidden" name="subject_id2" value="<?=$row['subject_id2'] ?>">
                                    <input type="hidden" name="transfer_id" value="<?=$row['transfer_id'] ?>">
                                  </div>
                                  <div style="text-align: center;">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>  
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        
                      </td>
                      <td class="text-center">
                      <?php  
                      if($row['transfer_status']==1) {
                        echo "<span class='label label-success'>อนุมัติ</span>";
                      }else{
                        echo "<span class='label label-danger'>ไม่อนุมัตื</span>";
                      }
                      ?>
                      </td>
                      <td class="text-center">
                        <button class="btn btn-info" type="submit"><i class="fa fa-edit"></i></button>
                      </td>
                    </tr>
                  </tbody>
                  </form>
                  <?php
                    }
                  }else{ ?>
                    <h5 class="text-center">ไม่พบรายการที่ท่านเทียบโอนแล้วในขณะนี้...</h5>
                  <?php } ?>
                </table>
                </div>
                
            </div>
          </div>
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

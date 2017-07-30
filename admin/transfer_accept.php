<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>รายการเทียบโอน | YRU & UniSZA</title>

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
                <h3>รายการเทียบโอน</h3>
                <hr>
                
                  <?php if($_GET["txtKeyword"] != "");

                  $query = $db->prepare("SELECT * FROM assessor WHERE  member_id=:id AND assessor_status1=0");
                  $query->execute(["id"=>$_SESSION['id']]);
                ?>
                <form class="form-inline" name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
                  <div style="padding-bottom: 5px">
                      <div class="form-group">
                        <input name="txtKeyword" class="form-control" type="text" autocomplete="off" placeholder="ค้นหาข้อมูล..." id="txtKeyword" value="<?php echo $_GET["txtKeyword"];?>">
                      </div>
                      <div class="form-group">
                          <button class="btn btn-success" type="submit" style="margin-bottom: -1px"><i class="fa fa-search"></i> ค้นหา</button>
                      </div>
                      <div class="form-group">
                          <a href="committee_info.php" class="btn btn-info" style="margin-bottom: -1px"><i class="fa fa-repeat"></i></a>
                      </div>
                  </div>
                </form>
                <?php if ($query->rowCount()>0) { ?>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">วิชาหลัก</th>
                      <th class="text-center">วิชาเทียบ</th>
                      <th class="text-center">รายละเอียด</th>
                      <th class="text-center">ดำเนินการ</th>
                      <!-- <th class="text-center">ดำเนินการ</th> -->
                    </tr>
                  </thead>

                  <?php
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                  ?>

                  <tbody>
                    <tr>
                      <?php 
                      $query1 = $db->prepare("SELECT * FROM subject NATURAL JOIN course NATURAL JOIN university WHERE subject_id='".$row['subject_id1']."'");
                      $query1->execute();
                      $row1 = $query1->fetch(PDO::FETCH_ASSOC); 
                      ?>
                      <td><?=$row['subject_id1'].' '.$row1['subject_name_th']?></td>
                      <?php 
                      $query2 = $db->prepare("SELECT * FROM subject NATURAL JOIN course NATURAL JOIN university WHERE subject_id='".$row['subject_id2']."'");
                      $query2->execute();
                      $row2 = $query2->fetch(PDO::FETCH_ASSOC); 
                      ?>
                      <td><?=$row['subject_id2'].' '.$row2['subject_name_th']?></td>
                      <td class="text-center">
                        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#details<?=$row['assessor_id']?>"><i class="fa fa-eye"></i> ดูรายละเอียด</button>
                      </td>
                      <td class="text-center">
                        <button class="btn btn-success" type="submit">อนุมัติ</button>
                        <button class="btn btn-danger" type="submit">ไม่อนุมัติ</button>
                      </td>

                      <div class="modal fade" id="show_subject_detail<?=$row['assessor_id']?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h2>คำอธิบายรายวิชา</h2>
                            </div>
                            <div class="row">
                              <form class="form-horizontal">
                                <div class="modal-body">
                                  <div class="form-group">
                                      <label class="col-md-3 col-md-offset-1 control-label"> คำอธิบายรายวิชา (ภาษาท้องถิ่น) </label>
                                      <div class="col-md-8">
                                          <p><?=$row['subject_description_th']?></p>
                                      </div>
                                  </div>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                      <label class="col-md-3 col-md-offset-1 control-label"> คำอธิบายรายวิชา (ภาษาท้องถิ่น) </label>
                                      <div class="col-md-8">
                                          <p><?=$row['subject_description_th']?></p>
                                      </div>
                                  </div>
                                </div>
                                <br>
                                <div class="modal-body">
                                  <div class="form-group">
                                      <label class="col-md-3 col-md-offset-1 control-label"> คำอธิบายรายวิชา (ภาษาอังกฤษ) </label>
                                      <div class="col-md-8">
                                          <p><?=$row['subject_description_eng']?></p>
                                      </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer text-center">
                              <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    </tr>

                  </tbody>
                  <?php
                    }
                  }else{ ?>
                    <h5 class="text-center">ไม่มีผลลัพธ์</h5>
                  <?php } ?>
                </table>
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

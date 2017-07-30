<?php 
  session_start();
    if($_SESSION['position']!="0"){
      echo "<script>window.location='home.php';</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>ยืนยันตัวตนประธานหลักสูตร | YRU & UniSZA</title>

    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">

    <?php require_once 'header.php'; ?>
        
        <!-- page content -->
        <form action="update.php?action=verified_head" method="post">
        <div class="right_col">
          <br><br><br>
          <div class="panel panel-default">
            <div class="panel-body">
                <h3>Verified / ยืนยันตัวตน</h3>
                <hr>
                <?php 
                  $query = $db->prepare("SELECT * FROM member NATURAL JOIN course NATURAL JOIN university WHERE member_position=1 AND member_verified=0");
                  $query->execute();

                  if ($query->rowCount()>0) {
                ?>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ชื่อ - นามสกุล</th>
                      <th>ประธานหลักสูตร</th>
                      <th class="text-center" width="15%">ยืนยันตัวตน</th>
                    </tr>
                  </thead>

                  <?php
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                  ?>

                  <tbody>
                    <tr>
                      <td><?=$row['member_name'].' '.$row['member_lastname']?></td>
                      <td><?=$row['course_name_th'].' / '.$row['course_name_eng']?></td>
                      <td class="text-center">
                        <input type="radio" name="select[<?=$row['member_id']?>]" value="1"> อนุมัติ
                        <input type="radio" name="select[<?=$row['member_id']?>]" value="2"> ไม่อนุมัติ
                      </td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
                <div class="form-group" style="float: right;">
                  <button class="btn btn-success" type="submit" onclick="return confirm('ยืนยันการบันทึกข้อมูล ?');">บันทึก</button>
                  <button class="btn btn-danger" type="reset">ยกเลิก</button>
                </div>
                <?php }else{ ?>
                <h5 class="text-center">ไม่พบข้อมูล</h5>
                <?php } ?>
            </div>
          </div>
        </div>
        </form>
        <!-- /page content -->

        <!-- footer content -->
        
        <!-- /footer content -->

      </div>
    </div>

    <script src="build/js/jquery.min.js"></script>
    <script src="build/js/bootstrap.min.js"></script>
    <script src="build/js/custom.min.js"></script>

  </body>
</html>

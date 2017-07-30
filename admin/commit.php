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

                  $query = $db->prepare("SELECT * FROM transfer_detail NATURAL JOIN transfer WHERE td_status=0 AND member_id=:id ORDER BY transfer_id ");
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
                          <a href="commit.php" class="btn btn-info" style="margin-bottom: -1px"><i class="fa fa-repeat"></i></a>
                      </div>
                  </div>
                </form>
                <?php if ($query->rowCount()>0) { ?>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>วิชาหลัก</th>
                      <th>วิชาเทียบ</th>
                      <th class="text-center">ดำเนินการ</th>
                    </tr>
                  </thead>

                  <?php
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                  ?>

                  <tbody>
                    <tr>
                      <?php 
                      $query1 = $db->prepare("SELECT subject_name_th FROM subject WHERE subject_id='".$row['subject_id1']."'");
                      $query1->execute();
                      $row1 = $query1->fetch(PDO::FETCH_ASSOC); 
                      ?>
                      <td><?=$row['subject_id1'].'-'.$row1['subject_name_th']?></td>
                      <?php 
                      $query2 = $db->prepare("SELECT subject_name_th FROM subject WHERE subject_id='".$row['subject_id2']."'");
                      $query2->execute();
                      $row2 = $query2->fetch(PDO::FETCH_ASSOC); 
                      ?>
                      <td><?=$row['subject_id2'].'-'.$row2['subject_name_th']?></td>
                        <input type="hidden" name="subject_id1" value="<?=$row['subject_id1'] ?>">
                        <input type="hidden" name="subject_id2" value="<?=$row['subject_id2'] ?>">
                        <input type="hidden" name="transfer_id" value="<?=$row['td_id'] ?>">
                      <td class="text-center">
                        <button class="btn btn-success" title="เทียบโอน" type="submit" onclick="window.location.href='commit_transfer.php?action=submit&s1=<?=$row['subject_id1'] ?>&s2=<?=$row['subject_id2'] ?>&td=<?=$row['td_id'] ?>'"><i class="fa fa-exchange"></i> เทียบโอน</button>
                      </td>
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

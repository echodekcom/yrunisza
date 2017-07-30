<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>จัดการข้อมูลรายวิชา | YRU & UniSZA</title>

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
                <h3>จัดการข้อมูลรายวิชา</h3>
                <hr>
                
                  <?php if($_GET["txtKeyword"] != "");

                  $query = $db->prepare("SELECT * FROM subject WHERE course_id=:course AND (subject_id LIKE '%".$_GET["txtKeyword"]."%' OR subject_name_th LIKE '%".$_GET["txtKeyword"]."%' OR subject_name_eng LIKE '%".$_GET["txtKeyword"]."%' OR subject_credit LIKE '%".$_GET["txtKeyword"]."%') ");
                  $query->execute(["course"=>$_SESSION['course']]);
                ?>
                <form class="form-inline" name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
                  <div>
                      <div class="form-group">
                        <input name="txtKeyword" class="form-control" type="text" autocomplete="off" placeholder="ค้นหาข้อมูล..." id="txtKeyword" value="<?php echo $_GET["txtKeyword"];?>">
                      </div>
                      <div class="form-group">
                          <button class="btn btn-success" type="submit" style="margin-bottom: -1px"><i class="fa fa-search"></i> ค้นหา</button>
                      </div>
                      <div class="form-group">
                          <a href="subject.php" class="btn btn-info" style="margin-bottom: -1px"><i class="fa fa-repeat"></i></a>
                      </div>
                      <button class="btn btn-success" type="button" style="float: right;" onclick="window.location.href='add_subject.php'"><i class="fa fa-plus"></i> เพิ่มวิชา</button>
                  </div>
                </form>
                <?php if ($query->rowCount()>0) { ?>
                <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>รหัสวิชา</th>
                      <th>ชื่อวิชา (ภาษาท้องถิ่น)</th>
                      <th>ชื่อวิชา (ภาษาอังกฤษ)</th>
                      <th class="text-center">หน่วยกิต</th>
                      <th class="text-center">คำอธิบายรายวิชา</th>
                      <th class="text-center">ดำเนินการ</th>
                    </tr>
                  </thead>

                  <?php
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                  ?>

                  <tbody>
                    <tr>
                      <td><?=$row['subject_id']?></td>
                      <td><?=$row['subject_name_th']?></td>
                      <td><?=$row['subject_name_eng']?></td>
                      <td class="text-center"><?=$row['subject_credit']?></td>
                      <td class="text-center">
                        <a href="subject_detail.php?subject_id=<?=$row['subject_id']?>" class="btn btn-default"><i class="fa fa-eye" title="ดูรายละเอียด"></i> ดูรายละเอียด</a> 
                      </td>
                      <td class="text-center">
                        <a href="update_subject.php?subject_id=<?=$row['subject_id']?>" class="btn btn-info"><i class="fa fa-edit" title="แก้ไข"></i></a> 
                        <a href="delete.php?action=subject&subject_id=<?=$row['subject_id']?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบข้อมูลนี้ ?');"><i class="fa fa-trash" title="ลบ"></i></a>
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

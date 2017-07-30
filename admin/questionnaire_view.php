<?php
  require_once("libs/Db.php");
  $objDb = new Db();
  $db = $objDb->database;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>เพิ่มข้อคำถามแบบสอบถาม | YRU & UniSZA</title>

    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">

    <?php
    require_once 'header.php';
    ?>

        <!-- page content -->
        <div class="right_col">
          <br><br><br>
          <div class="panel panel-default">
            <div class="panel-body">
                <h3>ข้อคำถามในแบบสอบถาม</h3><hr>
                <div class="container">
                  <div class="row">
                  <?php $query = $db->prepare("SELECT * FROM tb_question");
                  $query->execute();
                  if ($query->rowCount()>0) {
                  ?>
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th class="text-center">คำถามแบบสอบถาม</th>
                        <th class="text-center" width="70">แก้ไข</th>
                        <th class="text-center" width="70">ลบ</th>
                      </tr>
                    </thead>

                    <?php
                      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tbody>
                      <tr>
                        <td><?=$row['question']?></td>
                        <td class="text-center"><a href="questionnaire_edit.php?id_question=<?=$row['id_question']?>" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
                        <td class="text-center"><a href="delete.php?action=question_delete&id_question=<?=$row['id_question']?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบข้อมูลนี้ ?');"><i class="fa fa-trash" title="ลบ"></i></a></td>
                      </tr>
                    </tbody>
                    <?php
                      }
                    }else{ ?>
                      <h5 class="text-center">ไม่พบรายการคำถามในแบบสอบถามในขณะนี้...</h5>
                    <?php }
                    ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

    <script src="build/js/jquery.min.js"></script>
    <script src="build/js/bootstrap.min.js"></script>
    <script src="build/js/custom.min.js"></script>

  </body>
</html>

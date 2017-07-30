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
    $query = $db->prepare("SELECT * FROM tb_question WHERE id_question = :id_question ");
    $query->execute(["id_question" => $_GET['id_question']]);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    ?>

        <!-- page content -->
        <div class="right_col">
          <br><br><br>
          <div class="panel panel-default">
            <div class="panel-body">
                <h3>ข้อคำถามในแบบสอบถาม</h3><hr>
                <div class="container">
                  <div class="row">
                    <form class="form-horizontal" action="update.php?action=question_edit&id_question=<?=$row['id_question']?>" method="post">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">เพิ่มคำถามที่ต้องการแก้ไข</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" autocomplete="off" name="field_question" value="<?=$row['question']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                          <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                          <button type="button" class="btn btn-danger" onclick="history.go(-1)">ยกเลิก</button>
                        </div>
                      </div>
                    </form>
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

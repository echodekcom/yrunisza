<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>รายละเอียดวิชา | YRU & UniSZA</title>

    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">

    <?php
    require_once 'header.php';
    $query = $db->prepare("SELECT * FROM subject NATURAL JOIN course NATURAL JOIN university WHERE subject_id = :subject_id ");
    $query->execute(["subject_id" => $_GET['subject_id']]);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    ?>

        <!-- page content -->
        <div class="right_col">
          <br><br><br>
          <div class="panel panel-default">
            <div class="panel-body">
                <h3>รายละเอียดวิชา</h3>
                <hr>
                <ol class="breadcrumb">
        					<li><a href="subject.php">จัดการรายวิชา</a></li>
        					<li class="active">รายละเอียดวิชา</li>
        				</ol>
                <form class="form-horizontal">
                <font size="2">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">มหาวิทยาลัย</label>
                    <div class="col-sm-6 control-label" style="text-align: left;">
                      <?=$row['university_name_th']." / ".$row['university_name_eng']?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">หลักสูตร</label>
                    <div class="col-sm-6 control-label" style="text-align: left;">
                      <?=$row['course_name_th']." / ".$row['course_name_eng']?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">รหัสวิชา</label>
                    <div class="col-sm-6 control-label" style="text-align: left;">
                      <?=$row['subject_id']?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">ชื่อวิชา (ภาษาไทย)</label>
                    <div class="col-sm-6 control-label" style="text-align: left;">
                      <?=$row['subject_name_th']?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">ชื่อวิชา (ภาษาอังกฤษ)</label>
                    <div class="col-sm-6 control-label" style="text-align: left;">
                      <?=$row['subject_name_eng']?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">คำอธิบายรายวิชา (ภาษาไทย)</label>
                    <div class="col-sm-6 control-label" style="text-align: left;">
                      <?=$row["subject_description_th"];?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">คำอธิบายรายวิชา (ภาษาไทย)</label>
                    <div class="col-sm-6 control-label" style="text-align: left;">
                      <?=$row["subject_description_eng"];?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">หน่วยกิต</label>
                    <div class="col-sm-6 control-label" style="text-align: left;">
                      <?=$row['subject_credit']?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-6">
                      <button type="button" class="btn btn-danger" onclick="history.go(-1)"><i class="fa fa-undo"></i> ย้อนกลับ</button>
                    </div>
                  </div>
                  </font>
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

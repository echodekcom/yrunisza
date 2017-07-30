<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>เพิ่มวิชา | YRU & UniSZA</title>

    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">

    <?php
        require_once 'header.php';
        $query = $db->prepare("SELECT * FROM course NATURAL JOIN university WHERE course_id=:course");
        $query->execute(["course"=>$_SESSION['course']]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
    ?>

        <!-- page content -->
        <div class="right_col">
          <br><br><br>
          <div class="panel panel-default">
            <div class="panel-body">
                <h3>เพิ่มวิชา</h3>
                <hr>
                <ol class="breadcrumb">
        					<li><a href="subject.php">จัดการรายวิชา</a></li>
        					<li class="active">เพิ่มรายวิชา</li>
        				</ol>
                <form class="form-horizontal" action="insert.php?action=subject" method="post">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">มหาวิทยาลัย</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" value="<?=$row['university_name_th']." / ".$row['university_name_eng']?>" disabled>
                      <input type="hidden" name="field_university_id" value="<?=$row['university_id']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">หลักสูตร</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" value="<?=$row['course_name_th']." / ".$row['course_name_eng']?>" disabled>
                      <input type="hidden" name="field_course_id" value="<?=$row['course_id']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">รหัสวิชา <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="field_subject_id" autocomplete="off" placeholder="รหัสวิชา" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">ชื่อวิชา (ภาษาท้องถิ่น)</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="field_subject_name_th" autocomplete="off" placeholder="ชื่อวิชาภาษาท้องถิ่น">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">ชื่อวิชา (ภาษาอังกฤษ) <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="field_subject_name_eng" required autocomplete="off" placeholder="ชื่อวิชาภาษาอังกฤษ">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">คำอธิบายรายวิชา (ภาษาท้องถิ่น) <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <textarea class="form-control" placeholder="คำอธิบายรายวิชา (ภาษาท้องถิ่น)" rows="5" name="field_subject_description_th"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">คำอธิบายรายวิชา (ภาษาอังกฤษ) <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <textarea class="form-control" placeholder="คำอธิบายรายวิชา (ภาษาอังกฤษ)" rows="5" name="field_subject_description_eng"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">หน่วยกิต <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="field_subject_credit" autocomplete="off" placeholder="หน่วยกิต">
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

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>แก้ไขวิชา | YRU & UniSZA</title>

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
                <h3>แก้ไขวิชา</h3>
                <hr>
                <ol class="breadcrumb">
        					<li><a href="subject.php">จัดการรายวิชา</a></li>
        					<li class="active">แก้ไขรายวิชา</li>
        				</ol>
                <form class="form-horizontal" action="update.php?action=subject&subject_id=<?=$row['subject_id']?>" method="post">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">มหาวิทยาลัย <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" value="<?=$row['university_name_th']." / ".$row['university_name_eng']?>" disabled>
                      <input type="hidden" name="field_university_id" value="<?=$row['university_id']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">หลักสูตร <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" value="<?=$row['course_name_th']." / ".$row['course_name_eng']?>" disabled>
                      <input type="hidden" name="field_course_id" value="<?=$row['course_id']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">รหัสวิชา <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="field_subject_id" autocomplete="off" placeholder="รหัสวิชา" value="<?=$row['subject_id']?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">ชื่อวิชา (ภาษาไทย)</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="field_subject_name_th" autocomplete="off" placeholder="ชื่อวิชาภาษาไทย" value="<?=$row['subject_name_th']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">ชื่อวิชา (ภาษาอังกฤษ) <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="field_subject_name_eng" required autocomplete="off" placeholder="ชื่อวิชาภาษาอังกฤษ" value="<?=$row['subject_name_eng']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">คำอธิบายรายวิชา (ภาษาไทย) <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <?php $value=$row["subject_description_th"]; ?>
                      <textarea class="form-control" placeholder="คำอธิบายรายวิชา (ภาษาไทย)" rows="5" name="field_subject_description_th" value="<?=$row["subject_description_th"];?>"><?php echo htmlentities($value);?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">คำอธิบายรายวิชา (ภาษาไทย) <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <?php $value=$row["subject_description_eng"]; ?>
                      <textarea class="form-control" placeholder="คำอธิบายรายวิชา (ภาษาไทย)" rows="5" name="field_subject_description_eng" value="<?=$row["subject_description_eng"];?>" required><?php echo htmlentities($value);?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">หน่วยกิต <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="field_subject_credit" autocomplete="off" placeholder="หน่วยกิต" value="<?=$row['subject_credit']?>" required>
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

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>แก้ไขข้อมูลส่วนตัว | YRU & UniSZA</title>

    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">

    <?php
    require_once 'header.php';
    $query = $db->prepare("SELECT * FROM member NATURAL JOIN course NATURAL JOIN university WHERE member_id = :member");
    $query->execute(["member" => $_GET['member_id']]);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    ?>

        <!-- page content -->
        <div class="right_col">
          <br><br><br>
          <div class="panel panel-default">
            <div class="panel-body">
                <h3>แก้ไขข้อมูลส่วนตัว</h3>
                <hr>
                <ol class="breadcrumb">
        					<li><a href="home.php">หน้าแรก</a></li>
                  <li><a href="personal.php">จัดการข้อมูลส่วนตัว</a></li>
        					<li class="active">แก้ไขข้อมูลส่วนตัว</li>
        				</ol>
                <form class="form-horizontal" action="update.php?action=member&member_id=<?=$row['member_id']?>" method="post">
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
                    <label class="col-sm-3 control-label">ชื่อ <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="member_name" autocomplete="off" placeholder="ชื่อ" value="<?=$row['member_name']?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">นามสกุล <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="member_lastname" autocomplete="off" placeholder="นามสกุล" value="<?=$row['member_lastname']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">เบอร์โทรศัพท์ <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="number" name="member_tel" required autocomplete="off" placeholder="เบอร์โทรศัพท์" value="<?=$row['member_tel']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">อีมเล์ <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="email" name="member_email" required autocomplete="off" placeholder="อีมเล์" value="<?=$row['member_email']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">ที่อยู่ <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <?php $value=$row["member_address"]; ?>
                      <textarea class="form-control" placeholder="ที่อยู่" rows="5" name="member_address" value="<?=$row["member_address"];?>" required><?php echo htmlentities($value);?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">รหัสผ่าน <span class="required">*</span></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="password" name="old_password" autocomplete="off" placeholder="รหัสผ่านเดิม" required>
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

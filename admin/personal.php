<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>จัดการข้อมูลส่วนตัว | YRU & UniSZA</title>

    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">

    <?php
    require_once 'header.php';
    $query = $db->prepare("SELECT * FROM member NATURAL JOIN course NATURAL JOIN university WHERE member_id = :member ");
    $query->execute(["member" => $_SESSION['id']]);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    ?>

        <!-- page content -->
        <div class="right_col">
          <br><br><br>
          <div class="panel panel-default">
            <div class="panel-body">
                <h3>จัดการข้อมูลส่วนตัว</h3>
                <hr>
                <ol class="breadcrumb">
                  <li><a href="home.php">หน้าหลัก</a></li>
                  <li class="active">จัดการข้อมูลส่วนตัว</li>
                </ol>
                <form class="form-horizontal">
                <font size="3">
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
                    <label class="col-sm-4 control-label">ชื่อ</label>
                    <div class="col-sm-6 control-label" style="text-align: left;">
                      <?=$row['member_name']?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">นามสกุล</label>
                    <div class="col-sm-6 control-label" style="text-align: left;">
                      <?=$row['member_lastname']?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">เบอร์โทรศัพท์</label>
                    <div class="col-sm-6 control-label" style="text-align: left;">
                      <?=$row['member_tel']?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">อีเมล์</label>
                    <div class="col-sm-6 control-label" style="text-align: left;">
                      <?=$row["member_email"];?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">ที่อยู่</label>
                    <div class="col-sm-6 control-label" style="text-align: left;">
                      <?=$row["member_address"];?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-6">
                      <a href="personal_update.php?member_id=<?=$row['member_id']?>" class="btn btn-info"><i class="fa fa-edit" title="แก้ไขข้อมูลส่วตัว"></i> แก้ไขข้อมูลส่วตัว</a> 
                      <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#password"><i class="fa fa-key"></i> แก้ไขรหัสผ่าน</button>
                      <button type="button" class="btn btn-danger" onclick="window.location.href='home.php'"><i class="fa fa-undo"></i> ย้อนกลับ</button>
                    </div>
                  </div>
                  </font>
                </form>

                <form class="form-horizontal" action="update.php?action=password&member_id=<?=$row['member_id']?>" name="form_password" onsubmit="return fncSubmit();" method="post">
                <div class="modal fade" id="password">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="text-center">แก้ไขรหัสผ่าน</h2>
                      </div>
                      <div class="row">
                          <div class="modal-body">
                            <div class="form-group">
                              <label class="col-sm-4 control-label" style="text-align: right;">รหัสผ่านเดิม <span class="required">*</span></label>
                              <div class="col-sm-6">
                                <input class="form-control" type="password" name="old_password" required autocomplete="off" placeholder="รหัสผ่านเดิม">
                              </div>
                            </div>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label class="col-sm-4 control-label" style="text-align: right;">รหัสผ่านใหม่ <span class="required">*</span></label>
                              <div class="col-sm-6">
                                <input class="form-control" type="password" name="new_password" required autocomplete="off" placeholder="รหัสผ่านใหม่">
                              </div>
                            </div>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label class="col-sm-4 control-label" style="text-align: right;">ยืนยันรหัสผ่าน <span class="required">*</span></label>
                              <div class="col-sm-6">
                                <input class="form-control" type="password" name="con_password" required autocomplete="off" placeholder="ยืนยันรหัสผ่าน">
                              </div>
                            </div>
                          </div>
                      </div>
                      <br>
                      <div class="modal-footer" style="text-align: center">
                        <button type="submit" class="btn btn-success">บันทึก</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                      </div>
                    </div>
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

    <script type="text/javascript">
      function fncSubmit()
          {
          if(document.form_password.new_password.value != document.form_password.con_password.value)
              {
                  alert('รหัสผ่านไม่ตรงกัน');
                  document.form_password.con_password.focus();
                  return false;
              }
          }
      </script>

  </body>
</html>

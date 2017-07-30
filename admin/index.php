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

    <title>LOGIN | ระบบสารสนเทศความต้องการแลกเปลี่ยนและเทียบโอนหน่วยกิตนักศึกษาระหว่าง | YRU & UniSZA</title>

    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="build/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">

    <script language="javascript">

        function show_input_university(id) {
          if(id == 'new_u') {
            document.getElementById("insert_university").style.display = "";
            document.getElementById("select_course").style.display = "none";

          }else{
            document.getElementById("insert_university").style.display = "none";
            document.getElementById("select_course").style.display = "";
          }
        }

        function show_input_course(id){
          if(id == 'new_c') {
            document.getElementById("insert_course").style.display = "";
          }else{
            document.getElementById("insert_course").style.display = "none";
          }
        }

    </script>
    <style media="screen">
        @import url('https://fonts.googleapis.com/css?family=Kanit:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
        body{
          font-family: 'Kanit', sans-serif;
        }
    </style>

  </head>

  <body style="background-color: rgba(107, 108, 109, 0.08);">

  <!-- page content -->
      <div class="container" style="padding-top:20px">


        <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
          <div class="x_panel">

            <div class="x_content">

              <center><img src="build/images/index.png" alt="" class="img-responsive text-center" width="200px"></center>

                <h4 class="text-center">ระบบสารสนเทศความต้องการแลกเปลี่ยนและเทียบโอนหน่วยกิตนักศึกษา</h4>
                <center><h3>YRU & UNISZA</h3></center>
              <hr>
              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Login / เข้าสู่ระบบ</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Register / ลงทะเบียน</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <!--<h3>Sign In</h3>-->
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label>E-mail <span class="required">*</span></label>
                            <input type="email" name="field_member_email" class="form-control" required placeholder="อีเมล์ / E-mail" autocomplete="off" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Password <span class="required">*</span></label>
                            <input type="password" name="field_member_password" class="form-control" placeholder="รหัสผ่าน / Password" autocomplete="off">
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Login</button>
                            <button class="btn btn-danger" type="reset">Cancel</button>

                        </div>
                    </form>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <!--<h3>Sign Up</h3>-->
                    <form action="register.php" method="post" name="form_register" onsubmit="return fncSubmit();">
                        <div class="form-group">
                            <label>University <span class="required">*</span></label>
                            <select class="form-control" id="field_university_id" name="field_university_id" required  onclick="show_input_university(this.value);">
                            <option value="">--เลือกมหาวิทยาลัย / Select University--</option>
                            <?php
                            $query1 = $db->prepare("SELECT * FROM university WHERE university_id != '".$row['university_id']."'");
                            $query1->execute();

                            if ($query1->rowCount()>0) {
                              while ($row1 = $query1->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <option value="<?=$row1['university_id']?>"><?=$row1['university_name_th']." / ".$row1['university_name_eng']?></option>
                            <?php
                              }
                            }?>
                            <option value="new_u">อื่น / Others ...</option>
                            </select>

                            <div id="insert_university" style="display: none;" class="form-group form-group-sm">
                                <br><blockquote>
                                <h5>โปรดระบุมหาวิทยาลัยของท่าน / Please Insert Your University <span class="required">*</span></h5>
                                    <input class="form-control" type="text" name="field_university_name_th" placeholder="ชื่อภาษาไทย / Thai Name" autofocus autocomplete="off"><br>
                                    <input class="form-control" type="text" name="field_university_name_eng" placeholder="ชื่อภาษาอังกฤษ / English Name" autocomplete="off"><br>

                                    <select class="form-control" name="field_university_status">
                                        <option value="">-- เลือกสถานะ / Select Status --</option>
                                        <option value="1">รัฐ / Public</option>
                                        <option value="2">เอกชน / Private</option>
                                    </select><br>

                                    <h6>ประเทศ / Country</h6>
                                    <div class="bfh-selectbox bfh-countries" data-country="TH" data-flags="true" data-name="field_university_country"></div>

                                    <!-- <input class="form-control" type="text" name="field_university_country" placeholder="ประเทศ / Country" autocomplete="off"> -->

                                    <hr>
                                <h5>โปรดระบุหลักสูตรของท่าน / Please Insert Your Course <span class="required">*</span></h5>
                                    <input class="form-control" type="text" name="field_course_name_th1" placeholder="ชื่อภาษาไทย / Thai Name" autofocus autocomplete="off"><br>
                                    <input class="form-control" type="text" name="field_course_name_eng1" placeholder="ชื่อภาษาอังกฤษ / English Name" autocomplete="off">
                                </blockquote>
                            </div>


                        </div>
                        <div class="form-group" id="select_course">
                            <label>Course <span class="required">*</span></label>
                            <select class="form-control" id="field_course_id" name="field_course_id" onclick="show_input_course(this.value);">
                                <option value="">-- เลือกหลักสูตร / Select Course --</option>
                            </select>

                            <div id="insert_course" style="display: none;" class="form-group form-group-sm">
                                <br><blockquote>
                                <h5>โปรดระบุหลักสูตรของท่าน / Please Insert Your Course <span class="required">*</span></h5>
                                    <input class="form-control" type="text" name="field_course_name_th2" placeholder="ชื่อภาษาไทย / Thai Name" autofocus><br>
                                    <input class="form-control" type="text" name="field_course_name_eng2" placeholder="ชื่อภาษาอังกฤษ / English Name"  >
                                </blockquote>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Name <span class="required">*</span></label>
                            <input type="text" name="field_member_name" class="form-control" placeholder="ชื่อ / Name" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Lastname <span class="required">*</span></label>
                            <input type="text" name="field_member_lastname" class="form-control" placeholder="นามสกุล / Lastname" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Telephone Number</label>
                            <input type="number" name="field_member_tel" class="form-control" placeholder="เบอร์โทรศัพท์ / Telephone Number" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>E-mail <span class="required">*</span></label>
                            <input type="email" name="field_member_email" class="form-control" placeholder="อีเมล์ / E-mail" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" placeholder="ที่อยู่ / Address" rows="3" name="field_member_address"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Position <span class="required">*</span></label>
                            <select class="form-control" name="field_member_position">
                                <!-- <option value="">-- เลือกตำแหน่ง / Select Position --</option> -->
                                <option value="1" selected>ประธานหลักสูตร / Course president</option>
                                <option value="2">อาจารย์ประจำหลักสูตร / Lecturer</option>
                                <option value="3">เจ้าหน้าที่ประจำหลักสูตร / Regular staff</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password <span class="required">*</span></label>
                            <input type="password" id="field_member_password" name="field_member_password" class="form-control" placeholder="รหัสผ่าน / Password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password <span class="required">*</span></label>
                            <input type="password" id="field_confirm_password" name="field_confirm_password" class="form-control" placeholder="ยืนยันรหัสผ่าน / Confirm Password" required>
                        </div>
                        <!-- <div class="form-group">
                            <label>File (Identification card) <span class="required">*</span></label>
                            <input type="file" name="field_file" class="form-control" required>
                        </div> -->
                        <br>
                        <div class="form-group text-center">
                            <button class="btn btn-success" type="submit">Register</button>
                            <button class="btn btn-danger" type="reset">Cancel</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        </div>
  <!-- /page content -->

        <script src="build/js/jquery.min.js"></script>
        <script src="build/js/bootstrap.min.js"></script>
        <script src="build/js/custom.min.js"></script>
        <script src="build/form-helpers/js/bootstrap-formhelpers.min.js"></script>

        <script type="text/javascript">
        function fncSubmit()
            {
            if(document.form_register.field_member_password.value != document.form_register.field_confirm_password.value)
                {
                    alert('รหัสผ่านไม่ตรงกัน');
                    document.form_register.field_confirm_password.focus();
                    return false;
                }
            }
        </script>

        <script type="text/javascript">
            $('#field_university_id').change(function() {
                var aaa=$(this).val()
                $.ajax({
                    type: 'GET',
                    data: {field_university_id:aaa},
                    url: 'ajax.php',
                    success: function(data) {
                        $('#field_course_id').html(data);
                    }
                });
            });
        </script>


  </body>
</html>

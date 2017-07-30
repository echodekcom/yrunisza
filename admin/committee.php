<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>เลือกคณะกรรมการ | YRU & UniSZA</title>

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
                <h3>เลือกคณะกรรมการ</h3>
                <hr>
                <?php
                  $query = $db->prepare("SELECT * FROM member NATURAL JOIN course WHERE university_id=:university AND member_id!=:member AND member_verified=1");
                  $query->execute(["university"=>$_SESSION['university'],"member"=>$_SESSION['id']]);

                  if ($query->rowCount()===0) {
                    echo "ขออภัย ระบบไม่พบข้อมูลอาจารย์ที่สังกัดมหาวิทยาลัยของท่านใหขณะนี้...";
                  }else {
                ?>
                <form class="form-horizontal" action="insert.php?action=committee" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">หลักสูตรของบุคคลากร</label>
                    <div class="col-sm-9 control-label" style="text-align: left;">
                        <select class="form-control" id="course">
                          <option>--เลือกหลักสูตร--</option>
                          <?php
                          $q = $db->prepare("SELECT * FROM course NATURAL JOIN university WHERE university_id = :university");
                          $q->execute(["university"=>$_SESSION['university']]);

                          if ($q->rowCount()>0) {
                            while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value="<?=$r['course_id']?>"><?=$r['course_name_th']." / ".$r['course_name_eng']?></option>
                          <?php
                            }
                          }?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9 control-label" style="text-align: left;">
                      <div id="commit">
                        
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">คณะกรรรการที่เลือก</label>
                    <div class="col-sm-9 control-label" style="text-align: left;">
                      <?php

                          $itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                          if (isset($_SESSION['cart']) and $itemCount > 0)
                          {
                              $itemIds = "";
                              foreach ($_SESSION['cart'] as $itemId)
                              {
                                  $itemIds = $itemIds . $itemId . ",";
                                  $itemId;
                              }
                              $inputItems = rtrim($itemIds, ",");
                              
                              $q1 = $db->prepare("SELECT * FROM member NATURAL JOIN course WHERE member_id in ({$inputItems}) ");
                              $q1->execute();

                              $c1 = $q1->rowCount();
                          } else
                          {
                              $c1 = 0;
                          }

                          if ($c1==0) {
                              echo "ยังไม่มีกรรมการที่เลือกในขณะนี้...";
                          }else{
                          ?>

                          <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th class="text-center" width="100">ชื่อ - นามสกุล</th>
                                  <th class="text-center" width="80">ตำแหน่ง</th>
                                  <th class="text-center" width="100">หลักสูตร</th>
                                  <th class="text-center" width="80">ดำเนินการ</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              while ($r1 = $q1->fetch(PDO::FETCH_ASSOC)) {
                              
                                  $key = array_search($r1['member_id'], $_SESSION['cart']);

                                  ?>
                                  <tr>
                                      <td>
                                          <?php echo $r1['member_name'].' '.$r1['member_lastname']; ?>
                                          <input type="hidden" name="member_id[]" value="<?php echo $r1['member_id']; ?>" 
                                      </td>
                                      <td>
                                      <?php 
                                      if ($r1['member_position']==1) {
                                        echo "ประธานหลักสูตร";
                                      }else if ($r1['member_position']==2) {
                                        echo "อาจารย์ประจำหลักสูตร";
                                      }else{
                                        echo "เจ้าหน้าที่ประจำหลักสูตร";
                                      }

                                       ?>
                                      </td>
                                      <td class="text-center">
                                      <?php echo $r1['course_name_th'].' / '.$r1['course_name_eng']; ?>
                                      </td>

                                      <td class="text-center">
                                          <a class="btn btn-danger" href="admin_remove_cart.php?itemId=<?php echo $r1['member_id']; ?>" role="button">
                                              <i class="glyphicon glyphicon-trash"></i>
                                              ไม่เลือก</a>
                                      </td>
                                  </tr>
                              <?php } ?>
                          </tbody>
                      </table>
                      <?php } ?>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">เลือกวิชา</label>
                    <div class="col-sm-9 control-label" style="text-align: left;">
                      <div class="col-md-6" style="border-right: solid #eeeeee;padding-left: 0px">
                            <?php
                                $query1 = $db->prepare("SELECT * FROM course NATURAL JOIN university WHERE course_id=:course");
                                $query1->execute(["course"=>$_SESSION['course']]);
                                $row1 = $query1->fetch(PDO::FETCH_ASSOC);
                            ?>
                              <div class="form-group">
                                  <label>มหาวิทยาลัย</label>
                                  <select class="form-control" name="field_university_id" required="required" disabled>
                                  <option value="<?=$row1['university_id']?>"><?=$row1['university_name_th']." / ".$row1['university_name_eng']?></option>
                                  </select>
                                  <input type="hidden" name="university1" value="<?=$row1['university_id']?>">
                              </div>
                              <div class="form-group">
                                  <label>หลักสูตร</label>
                                  <select class="form-control" name="field_course_id" required="required" disabled>
                                  <option value="<?=$row1['course_id']?>"><?=$row1['course_name_th']." / ".$row1['course_name_eng']?></option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>วิชา</label>
                                  <select class="form-control" id="field_subject_id3" name="field_subject_id" required >
                                  <option value="">-- เลือกวิชา / Select Subject --</option>
                                  <?php
                                  $query2 = $db->prepare("SELECT * FROM subject WHERE course_id = :course");
                                  $query2->execute(["course"=>$row1['course_id']]);

                                  if ($query2->rowCount()>0) {
                                    while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
                                  ?>
                                  <option value="<?=$row2['subject_id']?>" data-target="#detail"><?=$row2['subject_name_th']." / ".$row2['subject_name_eng']?></option>
                                  <?php
                                    }
                                  }?>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>คำอธิบายรายวิชา</label>
                                  <br>
                                  <div class="panel panel-default">
                                  <div class="panel-body">
                                      <p id="field_subject_description_th3" style="color:#605560;font-size: 14px">
                                      กรุณาเลือกวิชา...
                                      </p>
                                  </div>
                                  </div>
                              </div>
                              <br>
                          </div>                            
                          <div class="col-md-6" style="padding-right: 0px">
                              <div class="form-group">
                                  <label>มหาวิทยาลัย</label>
                                  <select class="form-control" id="field_university_id1" name="university2" required>
                                      <option value="">-- เลือกวิชา / Select Subject --</option>
                                      <?php
                                      $query2 = $db->prepare("SELECT * FROM university WHERE university_id != :university");
                                      $query2->execute(["university"=>$_SESSION['university']]);

                                      if ($query2->rowCount()>0) {
                                        while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
                                      ?>
                                      <option value="<?=$row2['university_id']?>" data-target="#detail"><?=$row2['university_name_th']." / ".$row2['university_name_eng']?></option>
                                      <?php
                                        }
                                      }?>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>หลักสูตร</label>
                                  <select class="form-control" id="field_course_id" required>
                                      <option>-- เลือกหลักสูตร / Select Course --</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>วิชา</label>
                                  <select class="form-control" id="field_subject_id2" name="field_subject_id2" required>
                                      <option value="">-- เลือกวิชา / Select Subject --</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>คำอธิบายรายวิชา</label>
                                  <br>
                                  <div class="panel panel-default">
                                  <div class="panel-body">
                                      <p id="field_subject_description_th2" style="color:#605560;font-size: 14px">
                                      กรุณาเลือกวิชา...
                                      </p>
                                  </div>
                                  </div>
                              </div>
                          </div>
                        <input type="hidden" name="selector" value="<?=$_SESSION['id']?>">
                    </div>
                  </div>
                <div class="form-group" style="float: right;">
                  <button class="btn btn-success" type="submit">บันทึก</button>
                  <button class="btn btn-danger" type="reset">ยกเลิก</button>
                </div>
                </form>
                <?php } ?>
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
        $('#field_subject_id3').change(function() {
            var eee=$(this).val()
            $.ajax({
                type: 'GET',
                data: {field_subject_id3:eee},
                url: 'ajax.php',
                success: function(data) {
                    $('#field_subject_description_th3').html(data);
                }
            });
        });
        $('#field_university_id1').change(function() {
            var bbb=$(this).val()
            $.ajax({
                type: 'GET',
                data: {field_university_id1:bbb},
                url: 'ajax.php',
                success: function(data) {
                    $('#field_course_id').html(data);
                }
            });
        });
        $('#field_course_id').change(function() {
            var ccc=$(this).val()
            $.ajax({
                type: 'GET',
                data: {field_course_id:ccc},
                url: 'ajax.php',
                success: function(data) {
                    $('#field_subject_id2').html(data);
                }
            });
        });
        $('#field_subject_id2').change(function() {
            var ddd=$(this).val()
            $.ajax({
                type: 'GET',
                data: {field_subject_id2:ddd},
                url: 'ajax.php',
                success: function(data) {
                    $('#field_subject_description_th2').html(data);
                }
            });
        });
        $('#course').change(function() {
            var course=$(this).val()
            $.ajax({
                type: 'GET',
                data: {course:course},
                url: 'ajax.php',
                success: function(data) {
                    $('#commit').html(data);
                }
            });
        });
    </script>

  </body>
</html>

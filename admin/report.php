<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>รายงานการเทียบโอน | YRU & UniSZA</title>

    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">


  </head>

  <body class="nav-md">

    <?php 
        require_once 'header.php';
        if ($_GET["action"]=="report") {

            $query = $db->prepare("SELECT * FROM course NATURAL JOIN university WHERE course_id=:course");
            $query->execute(["course"=>$_POST['field_course_id1']]);
            $row = $query->fetch(PDO::FETCH_ASSOC);

            $query1 = $db->prepare("SELECT * FROM course NATURAL JOIN university WHERE course_id=:course");
            $query1->execute(["course"=>$_POST['field_course_id2']]);
            $row1 = $query1->fetch(PDO::FETCH_ASSOC);
    ?>

        <!-- page content -->
        <div class="right_col">
          <br><br><br>
          <div class="panel panel-default">
            <div class="panel-body">
                <h3>Transfer Report / รายงานการเทียบโอน</h3>
                <hr>
                <form action="report.php?action=report" method="post">
                <div class="row">
                    <div class="col-md-6" style="border-right: solid #eeeeee;">
                        <div class="form-group">
                            <label>มหาวิทยาลัย</label>
                            <select class="form-control" disabled>
                            <option value="<?=$row['university_id']?>"><?=$row['university_name_th']." / ".$row['university_name_eng']?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>หลักสูตร</label>
                            <select class="form-control" disabled>
                            <option value="<?=$row['course_id']?>"><?=$row['course_name_th']." / ".$row['course_name_eng']?></option>
                            </select>
                        </div>
                    </div>                            
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>มหาวิทยาลัย</label>
                            <select class="form-control" disabled>
                            <option value="<?=$row1['university_id']?>"><?=$row1['university_name_th']." / ".$row1['university_name_eng']?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>หลักสูตร</label>
                            <select class="form-control" disabled>
                            <option value="<?=$row1['course_id']?>"><?=$row1['course_name_th']." / ".$row1['course_name_eng']?></option>
                            </select>
                        </div>
                    </div>
                    <br>
                </div>
                <hr>
                <div class="row"> 
                    <?php 
                        $query2 = $db->prepare("SELECT * FROM transfer WHERE selector_id=:id AND university_id1=:university1 AND university_id2=:university2");
                        $query2->execute(["id"=>$_SESSION['id'],"university1"=>$_POST['field_university_id1'],"university2"=>$_POST['field_university_id2']]);
                        $count2 = $query2->rowCount(); 
                        if ($count2>0) { 
                            $query5 = $db->prepare("SELECT * FROM transfer WHERE selector_id=:id AND university_id1=:university1 AND university_id2=:university2 AND transfer_status=0");
                            $query5->execute(["id"=>$_SESSION['id'],"university1"=>$_POST['field_university_id1'],"university2"=>$_POST['field_university_id2']]);
                            $count5 = $query5->rowCount();
                            $query6 = $db->prepare("SELECT * FROM transfer WHERE selector_id=:id AND university_id1=:university1 AND university_id2=:university2 AND transfer_status=2");
                            $query6->execute(["id"=>$_SESSION['id'],"university1"=>$_POST['field_university_id1'],"university2"=>$_POST['field_university_id2']]);
                            $count6 = $query6->rowCount();
                            $query7 = $db->prepare("SELECT * FROM transfer WHERE selector_id=:id AND university_id1=:university1 AND university_id2=:university2 AND transfer_status=1");
                            $query7->execute(["id"=>$_SESSION['id'],"university1"=>$_POST['field_university_id1'],"university2"=>$_POST['field_university_id2']]);
                            $count7 = $query7->rowCount(); 
                    ?>
                    <div class="container">
                        <h5>การเทียบโอนระหว่าง <?=$row['university_name_th']?> กับ <?=$row1['university_name_th']?> ได้ดำเนินการเทียบโอนทั้งหมด <?=$count2?> รายการ แบ่งได้ ดังนี้</h5>
                        <li><?=$count5?> รายการที่ยังไม่ดำเนินการ</li> 
                        <li><?=$count6?> รายการที่ไม่สามารถเทียบโอนได้</li> 
                        <li><?=$count7?> รายการที่สามารถเทียบโอนได้</li> 
                    </div>

                    <br>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">วิชาหลัก</th>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">วิชาเทียบ</th>
                                </tr>
                            </thead>
                        <?php while($row2 = $query2->fetch(PDO::FETCH_ASSOC)){ ?>
                            <tbody>
                                <tr>
                                    <?php 
                                        $query3 = $db->prepare("SELECT * FROM subject NATURAL JOIN course WHERE subject_id=:subject AND course_id=:course");
                                        $query3->execute(["subject"=>$row2['subject_id1'],"course"=>$_POST['field_course_id1']]);
                                        $row3 = $query3->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <td width="45%"><?=$row3['subject_id'].'  '.$row3['subject_name_th']?></td>
                                    <td width="10%" class="text-center">
                                    <?php if ($row2['transfer_status']==0) {
                                        echo "<span class='label label-default'>ยังไม่ดำเนินการ</span>";
                                      }else if($row2['transfer_status']==1) {
                                        echo "<span class='label label-success'>สามารถเทียบโอนได้</span>";
                                      }else{
                                        echo "<span class='label label-danger'>ไม่สามารถเทียบโอนได้</span>";
                                      }?>
                                    </td>
                                    <?php 
                                        $query4 = $db->prepare("SELECT * FROM subject NATURAL JOIN course WHERE subject_id=:subject AND course_id=:course");
                                        $query4->execute(["subject"=>$row2['subject_id2'],"course"=>$_POST['field_course_id2']]);
                                        $row4 = $query4->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <td width="45%"><?=$row4['subject_id'].'  '.$row4['subject_name_th']?></td>
                                    
                                </tr>
                            </tbody>
                        <?php } ?>
                        </table>
                    </div>
                    <?php }else{ ?>
                        <h5 class="text-center">ไม่พบข้อมูลการเทียบโอน...</h5>
                    <?php } ?>
                </div>
                <div style="text-align: center;">
                    <!-- <button class="btn btn-danger" type="submit">ไม่สามารถเทียบโอนได้</button> -->
                    <button class="btn btn-danger" type="button" onclick="window.location.href='report.php'"><i class="fa fa-undo"></i> ย้อนกลับ</button>
                </div>
                </form>
                
            </div>
          </div>
        </div>
    <?php 
        }else{ 
            $query = $db->prepare("SELECT * FROM course NATURAL JOIN university WHERE course_id=:course");
            $query->execute(["course"=>$_SESSION['course']]);
            $row = $query->fetch(PDO::FETCH_ASSOC);
    ?>
        <div class="right_col">
          <br><br><br>
          <div class="panel panel-default">
            <div class="panel-body">
                <h3>Transfer Report / รายงานการเทียบโอน</h3>
                <hr>
                <form action="report.php?action=report" method="post">
                <div class="row">
                    <div class="col-md-6" style="border-right: solid #eeeeee;">
                        <div class="form-group">
                            <label>มหาวิทยาลัย</label>
                            <select class="form-control" name="field_university_id1" disabled>
                            <option value="<?=$row['university_id']?>"><?=$row['university_name_th']." / ".$row['university_name_eng']?></option>
                            </select>
                            <input type="hidden" name="field_university_id1" value="<?=$row['university_id']?>">
                        </div>
                        <div class="form-group">
                            <label>หลักสูตร</label>
                            <input type="hidden" name="field_course_id1" value="<?=$row['course_id']?>">
                            <select class="form-control" name="field_course_id1" disabled>
                            <option value="<?=$row['course_id']?>"><?=$row['course_name_th']." / ".$row['course_name_eng']?></option>
                            </select>
                        </div>
                    </div>                            
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>มหาวิทยาลัย</label>
                            <select class="form-control" id="field_university_id1" name="field_university_id2" required>
                                <option value="">-- เลือกวิชา / Select Subject --</option>
                                <?php
                                $query2 = $db->prepare("SELECT * FROM university WHERE university_id != :university");
                                $query2->execute(["university"=>$_SESSION['university']]);

                                if ($query2->rowCount()>0) {
                                  while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <option value="<?=$row2['university_id']?>"><?=$row2['university_name_th']." / ".$row2['university_name_eng']?></option>
                                <?php
                                  }
                                }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>หลักสูตร</label>
                            <select class="form-control" id="field_course_id" name="field_course_id2" required>
                                <option>-- เลือกหลักสูตร / Select Course --</option>
                            </select>
                        </div>
                    </div>
                

                </div>
                <br>
                <div style="text-align: center;">
                    <!-- <button class="btn btn-danger" type="submit">ไม่สามารถเทียบโอนได้</button> -->
                    <button class="btn btn-success" type="submit"><i class="fa fa-file-text-o"></i> รายงาน</button>
                </div>
                </form>
                
            </div>
          </div>
        </div>
    <?php } ?>
        <!-- /page content -->

        <!-- footer content -->
        
        <!-- /footer content -->

      </div>
    </div>

    <script src="build/js/jquery.min.js"></script>
    <script src="build/js/bootstrap.min.js"></script>
    <script src="build/js/custom.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // the body of this function is in assets/js/now-ui-kit.js
            nowuiKit.initSliders();
        });

        function scrollToDownload() {

            if ($('.section-download').length != 0) {
                $("html, body").animate({
                    scrollTop: $('.section-download').offset().top
                }, 1000);
            }
        }
    </script>

    <script type="text/javascript">
        $('#field_subject_id1').change(function() {
            var aaa=$(this).val()
            $.ajax({
                type: 'GET',
                data: {field_subject_id1:aaa},
                url: 'ajax.php',
                success: function(data) {
                    $('#field_subject_description_th1').html(data);
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
        $('#field_subject_description_th2').change(function() {
            var a=$(this).val()
            var b=$('field_subject_description_th1').val();
            var c=$('field_subject_description_th2').val();
            $.ajax({
                type: 'GET',
                data: {field_subject_description_th2:a},
                data: {field_subject_description_th1:b},
                data: {field_subject_description_th2:c},
                url: 'ajax.php',
                success: function(data) {
                    $('#process').html(data);
                }
            });
        });
    </script>
  </body>
</html>

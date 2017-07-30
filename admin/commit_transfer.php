<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>เทียบโอนหน่วยกิต | YRU & UniSZA</title>

    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="build/css/cssprogress.css" rel="stylesheet">


  </head>

  <body class="nav-md">

    <?php 

        require_once 'header.php';

        $query = $db->prepare("SELECT * FROM subject NATURAL JOIN course NATURAL JOIN university WHERE subject_id=:subject");
        $query->execute(["subject"=>$_GET['s1']]);
        $row = $query->fetch(PDO::FETCH_ASSOC);


        $query1 = $db->prepare("SELECT * FROM subject NATURAL JOIN course NATURAL JOIN university WHERE subject_id=:subject");
        $query1->execute(["subject"=>$_GET['s2']]);
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
    ?>

        <!-- page content -->
        <div class="right_col">
          <br><br><br>
          <div class="panel panel-default">
            <div class="panel-body">
                <h3>Transfer Credit / เทียบโอนหน่วยกิต</h3>
                <hr>
                <form action="update.php?action=commit_transfer" method="post">
                <div class="row">
                    <div class="col-md-6" style="border-right: solid #eeeeee;">
                        <div class="form-group">
                            <label>มหาวิทยาลัย</label>
                            <select class="form-control" name="field_university_id" disabled>
                            <option value="<?=$row['university_id']?>"><?=$row['university_name_th']." / ".$row['university_name_eng']?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>หลักสูตร</label>
                            <select class="form-control" name="field_course_id" disabled>
                            <option value="<?=$row['course_id']?>"><?=$row['course_name_th']." / ".$row['course_name_eng']?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>วิชา</label>
                            <select class="form-control" name="field_subject_id1" disabled>
                            <option value="<?=$row['subject_id']?>"><?=$row['subject_name_th']." / ".$row['subject_name_eng']?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>คำอธิบายรายวิชา</label>
                            <br>
                            <div class="panel panel-default">
                            <div class="panel-body" style="color:#605560;font-size: 14px">
                                <p id="field_subject_description_th1">
                                   <h5>ภาษาท้องถิ่น</h5><?=$row['subject_description_th'] ?><br><br><h5>ภาษาอังกฤษ</h5><?=$row['subject_description_eng']?>;
                                </p>
                            </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-6" style="border-right: solid #eeeeee;">
                        <div class="form-group">
                            <label>มหาวิทยาลัย</label>
                            <select class="form-control" name="field_university_id" disabled>
                            <option value="<?=$row1['university_id']?>"><?=$row1['university_name_th']." / ".$row1['university_name_eng']?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>หลักสูตร</label>
                            <select class="form-control" name="field_course_id" disabled>
                            <option value="<?=$row1['course_id']?>"><?=$row1['course_name_th']." / ".$row1['course_name_eng']?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>วิชา</label>
                            <select class="form-control" name="field_subject_id2" disabled>
                            <option value="<?=$row1['subject_id']?>"><?=$row1['subject_name_th']." / ".$row1['subject_name_eng']?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>คำอธิบายรายวิชา</label>
                            <br>
                            <div class="panel panel-default">
                            <div class="panel-body" style="color:#605560;font-size: 14px">
                                <p id="field_subject_description_th1">
                                   <h5>ภาษาท้องถิ่น</h5><?=$row1['subject_description_th'] ?><br><br><h5>ภาษาอังกฤษ</h5><?=$row1['subject_description_eng']?>;
                                </p>
                            </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <?php 
                    $description1 = $row['subject_description_eng'];
                    $description2 = $row1['subject_description_eng'];
                    $number = similar_text($description1, $description2, $percent);

                    if ($percent==100) {?>
                        <br>
                        <div id="example-5" class="examples">
                            <div class="cssProgress">
                                <div class="progress2">
                                    <div class="cssProgress-bar cssProgress-success cssProgress-active" data-percent="<?php echo (int)$percent; ?>" style="width: <?php echo (int)$percent."%"; ?>;">
                                        <span class="cssProgress-label"><?php echo (int)$percent."%"; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>ผ่าน</center>
                    <?php }else if ($percent>=80) {?>
                        <br>
                        <div id="example-5" class="examples">
                            <div class="cssProgress">
                                <div class="progress2">
                                    <div class="cssProgress-bar cssProgress-success cssProgress-active" data-percent="<?php echo (int)$percent; ?>" style="width: <?php echo (int)$percent."%"; ?>;">
                                        <span class="cssProgress-label"><?php echo (int)$percent."%"; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>ผ่าน</center>
                    <?php }else if ($percent>=75) {?>
                        <br>
                        <div id="example-5" class="examples">
                            <div class="cssProgress">
                                <div class="progress2">
                                    <div class="cssProgress-bar cssProgress-warning cssProgress-active" data-percent="<?php echo (int)$percent; ?>" style="width: <?php echo (int)$percent."%"; ?>;">
                                        <span class="cssProgress-label"><?php echo (int)$percent."%"; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>ปานกลาง</center>
                    <?php }else {?>
                        <br>
                        <div id="example-5" class="examples">
                            <div class="cssProgress">
                                <div class="progress2">
                                    <div class="cssProgress-bar cssProgress-danger cssProgress-active" data-percent="<?php echo (int)$percent; ?>" style="width: <?php echo (int)$percent."%"; ?>;">
                                        <span class="cssProgress-label"><?php echo (int)$percent."%"; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- @end #example-5 -->
                        <center>ไม่ผ่าน</center>
                    <?php } ?>
                </div>
                <div class="col-md-6" style="padding-left: 0px">
                    <button class="btn btn-danger" type="button" onclick="history.go(-1)"><i class="fa fa-undo"></i> ย้อนกลับ</button>
                </div>
                <input type="hidden" name="td_id" value="<?=$_GET['td'] ?>">
                <input type="hidden" name="member_id" value="<?=$_SESSION['id'] ?>">
                <div style="float: right;">
                    <button class="btn btn-danger" id="nook" name="ok" value="2" type="submit"><i class="fa fa-times-circle-o"></i> ไม่สามารถเทียบโอนได้</button>
                    <button class="btn btn-success" id="ok" name="ok" value="1" type="submit"><i class="fa fa-check-circle-o"></i> สามารถเทียบโอนได้</button>
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
    <script src="build/js/now-ui-kit.js"></script>
    <script src="build/js/functions.js"></script>

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

  </body>
</html>

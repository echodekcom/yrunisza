<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
  require_once("libs/Db.php");
  $objDb = new Db();
  $db = $objDb->database;



	if($_GET['field_university_id']) {
    $field_university_id = isset($_GET['field_university_id']) ? $_GET['field_university_id'] : "";

    $query = $db->prepare("SELECT c.*,u.* FROM course c left join university u ON c.university_id = u.university_id
			WHERE c.university_id='{$field_university_id}' ORDER BY course_id");
    $query->execute();

    if ($query->rowCount()>0) {
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      echo "<option value=\"" . $row['course_id'] . "\">".$row['course_name_th'] ." / ".$row['course_name_eng']."</option>";
			}
      echo "<option value='new_c'>อื่น / Others ...</option>";
		}else{
			echo "<option value=\"\">ไม่พบหลักสูตร</option>";
      echo "<option value='new_c'>อื่น / Others ...</option>";
		}

	}else if($_GET['field_subject_id1']) {
    $field_subject_id = isset($_GET['field_subject_id1']) ? $_GET['field_subject_id1'] : "";

    $query = $db->prepare("SELECT * FROM subject WHERE subject_id='{$field_subject_id}' ");
    $query->execute();

    if ($query->rowCount()>0) {
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $value1=$row["subject_description_th"];
        $value2=$row["subject_description_eng"];

        echo "<h5>ภาษาท้องถิ่น</h5>".$value1."<br><br><h5>ภาษาอังกฤษ</h5>".$value2;
      }
    }else{
      echo "ไม่พบข้อมูล";
    }
    
  }else if($_GET['field_university_id1']) {
   $field_university_id = isset($_GET['field_university_id1']) ? $_GET['field_university_id1'] : "";

    $query = $db->prepare("SELECT c.*,u.* FROM course c left join university u ON c.university_id = u.university_id
      WHERE c.university_id='{$field_university_id}' ORDER BY course_id");
    $query->execute();

    if ($query->rowCount()>0) {
      echo "<option>-- เลือกหลักสูตร / Select Course --</option>";
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      echo "<option value=\"" . $row['course_id'] . "\">".$row['course_name_th'] ." / ".$row['course_name_eng']."</option>";
      }
    }else{
      echo "<option value=\"\">ไม่พบหลักสูตร</option>";
    }

  }else if($_GET['field_course_id']) {
    $field_course_id = isset($_GET['field_course_id']) ? $_GET['field_course_id'] : "";

    $query = $db->prepare("SELECT s.*,c.* FROM subject s left join course c ON s.course_id = c.course_id
      WHERE s.course_id='{$field_course_id}' ORDER BY subject_id");
    $query->execute();

    if ($query->rowCount()>0) {
      echo"<option>-- เลือกวิชา / Select Subject --</option>";
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      echo "<option value=\"" . $row['subject_id'] . "\">".$row['subject_name_th'] ." / ".$row['subject_name_eng']."</option>";
      }
    }else{
      echo "<option value=\"\">ไม่พบวิชา</option>";
    }

  }else if($_GET['field_subject_id2']) {
    $field_subject_id = isset($_GET['field_subject_id2']) ? $_GET['field_subject_id2'] : "";

    $query = $db->prepare("SELECT * FROM subject WHERE subject_id='{$field_subject_id}' ");
    $query->execute();

    if ($query->rowCount()>0) {
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      
      $value1=$row["subject_description_th"];
      $value2=$row["subject_description_eng"];

      
      echo "<h5>ภาษาท้องถิ่น</h5>".$value1."<br><br><h5>ภาษาอังกฤษ</h5>".$value2;
      }
    }else{
      echo "ไม่พบข้อมูล";
    }
  }else if($_GET['field_subject_id3']) {
    $field_subject_id = isset($_GET['field_subject_id3']) ? $_GET['field_subject_id3'] : "";

    $query = $db->prepare("SELECT * FROM subject WHERE subject_id='{$field_subject_id}' ");
    $query->execute();

    if ($query->rowCount()>0) {
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      
      $value1=$row["subject_description_th"];
      $value2=$row["subject_description_eng"];

      
      echo "<h5>ภาษาท้องถิ่น</h5>".$value1."<br><br><h5>ภาษาอังกฤษ</h5>".$value2;
      }
    }else{
      echo "ไม่พบข้อมูล";
    }
  }else if($_GET['field_subject_description_th2']) {
    $field_subject_id = isset($_GET['field_subject_id2']) ? $_GET['field_subject_id2'] : "";

    $query = $db->prepare("SELECT * FROM subject WHERE subject_id='{$field_subject_id}' ");
    $query->execute();

    if ($query->rowCount()>0) {
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      
      $value1=$row["subject_description_th"];
      }
    }
    $b='กหหฟฟ';
    $number = similar_text($value1, $b, $percent);
    
    if ($percent==100) {?>
          <br>
          <div class="progress">
          <div class="progress-bar progress-bar-success loading" role="progressbar" aria-valuenow="<?php echo (int)$percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (int)$percent."%";?>">
              <?php echo (int)$percent."%"; ?>
          </div>
          </div>
          <br>
          <center>ผ่าน</center>
      <?php }elseif ($percent>=80) {?>
          <br>
          <div class="progress">
          <div class="progress-bar progress-bar-success loading" role="progressbar" aria-valuenow="<?php echo (int)$percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (int)$percent."%";?>">
              <?php echo (int)$percent."%"; ?>
          </div>
          </div>
          <br>
          <center>ผ่าน</center>
      <?php }elseif ($percent>=75) {?>
          <br>
          <div class="progress">
          <div class="progress-bar progress-bar-success loading" role="progressbar" aria-valuenow="<?php echo (int)$percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (int)$percent."%";?>">
              <?php echo (int)$percent."%"; ?>
          </div>
          </div>
          <center>ปานกลาง <img src="./assets/img/warning.png" width='20px' height='20px'></center>
      <?php }else {?>
          <br>
          <div class="progress">
          <div class="progress-bar progress-bar-success loading" role="progressbar" aria-valuenow="<?php echo (int)$percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (int)$percent."%";?>">
              <?php echo (int)$percent."%"; ?>
          </div>
          </div>
          ไม่ผ่าน
      <?php } 
  
  }else if ($_GET['course']) {
      session_start();
      $course = isset($_GET['course']) ? $_GET['course'] : "";

      $query = $db->prepare("SELECT m.*,c.* FROM member m left join course c ON m.course_id = c.course_id
        WHERE m.course_id='{$course}' AND member_id!=:id ORDER BY member_id");
      $query->execute(["id"=>$_SESSION['id']]);

      if ($query->rowCount()>0) { ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ชื่อ - นามสกุล</th>
              <th>ตำแหน่ง</th>
              <th class="text-center" width="10%">ดำเนินการ</th>
            </tr>
          </thead>
          <?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
          <tbody>
            <tr>
              <td><?=$row['member_name'].' '.$row['member_lastname'] ?></td>
              <td>
                <?php 
                  if ($row['member_position']==1) {
                    echo "ประธานหลักสูตร";
                  }else if($row['member_position']==2){
                    echo "อาจารย์ประจำหลักสูตร";
                  }else{
                    echo "เจ้าหน้าที่ประจำหลักสูตร";
                  }
                ?>
              </td>
              <td class="text-center"><button class="btn btn-default" type="button" onclick="window.location.href='admin_update_cart.php?itemId=<?php echo $row["member_id"]; ?>'"> <i class="fa fa-plus"> เลือกกรรมการ</i></button></td>
            </tr>
          </tbody>
          <?php } ?>
        </table>  

<?php }else{
        echo "ไม่พบข้อมูลอาจารย์ในหลักสูตรนี้";
      } 
   }else if ($_GET['course1']) {
      session_start();
      $course = isset($_GET['course1']) ? $_GET['course1'] : "";

      $query = $db->prepare("SELECT m.*,c.* FROM member m left join course c ON m.course_id = c.course_id
        WHERE m.course_id='{$course}' AND member_id!=:id ORDER BY member_id");
      $query->execute(["id"=>$_SESSION['id']]);

      if ($query->rowCount()>0) { ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ชื่อ - นามสกุล</th>
              <th>ตำแหน่ง</th>
              <th class="text-center" width="10%">ดำเนินการ</th>
            </tr>
          </thead>
          <?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
          <tbody>
            <tr>
              <td><?=$row['member_name'].' '.$row['member_lastname'] ?></td>
              <td>
                <?php 
                  if ($row['member_position']==1) {
                    echo "ประธานหลักสูตร";
                  }else if($row['member_position']==2){
                    echo "อาจารย์ประจำหลักสูตร";
                  }else{
                    echo "เจ้าหน้าที่ประจำหลักสูตร";
                  }
                ?>
              </td>
              <td class="text-center"><button class="btn btn-default" type="button" onclick="window.location.href='admin_update_cart1.php?itemId1=<?php echo $row["member_id"]; ?>'"> <i class="fa fa-plus"> เลือกกรรมการ</i></button></td>
            </tr>
          </tbody>
          <?php } ?>
        </table>  

<?php }else{
        echo "ไม่พบข้อมูลอาจารย์ในหลักสูตรนี้";
      } 
  }

?>

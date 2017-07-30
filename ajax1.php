<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
require_once("admin/libs/Db.php");
$objDb = new Db();
$db = $objDb->database;

if($_GET['field_university_id2']) {
		$field_university_id2 = isset($_GET['field_university_id2']) ? $_GET['field_university_id2'] : "";

		$query = $db->prepare("SELECT c.*,u.* FROM course c left join university u ON c.university_id = u.university_id WHERE c.university_id='{$field_university_id2}'");
		$query->execute(); //ประมวลผลคำสั่ง sql
    ?>
    <option value="">-- เลือกหลักสูตร --</option>
    <?php
		if($query->rowCount() > 0){ //rowCount เช็คจำนวนแถวที่ได้มา
		while($Result = $query->fetch(PDO::FETCH_ASSOC)){ //ดึงข้อมูลแต่ละรอบใส่ใน $row
			echo "<option value=\"" . $Result['course_id'] . "\">" . $Result['course_name_th'] ."</option>";
			}
		}else{
			echo "<option value=\"\">ไม่มีหลักสูตรในมหาวิทยาลัยนี้</option>";
		}

	}else {
		$field_course_id2 = isset($_GET['field_course_id2']) ? $_GET['field_course_id2'] : "";

		$query = $db->prepare("SELECT s.*,c.* FROM subject s left join course c ON s.course_id = c.course_id WHERE s.course_id='{$field_course_id2}'");
		$query->execute(); //ประมวลผลคำสั่ง sql
    ?>
    <option value="">-- เลือกวิชา --</option>
    <?php
		if($query->rowCount() > 0){ //rowCount เช็คจำนวนแถวที่ได้มา
		while($Result = $query->fetch(PDO::FETCH_ASSOC)){ //ดึงข้อมูลแต่ละรอบใส่ใน $row
				echo "<option value=\"" . $Result['subject_id'] . "\">" . $Result['subject_name_th'] ."</option>";
			}
		}else{
			echo "<option value=\"\">ไม่มีวิชาในสาขานี้</option>";
		}
	}

?>

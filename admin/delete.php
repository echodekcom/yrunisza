<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
require_once("libs/Db.php");
$objDb = new Db();
$db = $objDb->database;

if ($_GET['action']=="university") {

  $query = $db->prepare("DELETE FROM university WHERE university_id = :university_id");
  $result = $query->execute([ "university_id" => $_GET['university_id'],]);

  if($result){
		echo "<script>window.location.href='university.php'</script>";
	}else{
		echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
		echo "<script>history.back();</script>";
	}

}else if ($_GET['action']=="course") {

  $query = $db->prepare("DELETE FROM course WHERE course_id = :course_id");
  $result = $query->execute([ "course_id" => $_GET['course_id'],]);

  if($result){
		echo "<script>window.location.href='course.php'</script>";
	}else{
		echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
		echo "<script>history.back();</script>";
	}
}else if ($_GET['action']=="subject") {

  $query = $db->prepare("DELETE FROM subject WHERE subject_id = :subject_id");
  $result = $query->execute([ "subject_id" => $_GET['subject_id'],]);

  if($result){
		echo "<script>window.location.href='subject.php'</script>";
	}else{
		echo "<script>alert('ไม่สามารถลบวิชาที่เทียบโอนได้ กรุณาตรวจสอบวิชาเทียบโอน');</script>";
		echo "<script>history.back();</script>";
	}
}else if ($_GET['action']=="transfer") {
  $query = $db->prepare("DELETE FROM transfer_detail WHERE transfer_id = :transfer_id");
  $result = $query->execute([ "transfer_id" => $_GET['transfer_id']]);

  $query1 = $db->prepare("DELETE FROM transfer WHERE transfer_id = :transfer_id");
  $result1 = $query1->execute([ "transfer_id" => $_GET['transfer_id']]);

  if($result1){
		echo "<script>window.location.href='committee_info.php'</script>";
  }else{
		echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
		echo "<script>history.back();</script>";
  }
}else if ($_GET['action']=="question_delete") {
  $query = $db->prepare("DELETE FROM tb_question WHERE id_question = :id_question");
  $result = $query->execute([ "id_question" => $_GET['id_question']]);

  $query1 = $db->prepare("DELETE FROM tb_question WHERE id_question = :id_question");
  $result1 = $query1->execute([ "id_question" => $_GET['id_question']]);

  if($result1){
    echo "<script>alert('คุณได้ทำการลบข้อมูลเรียบร้อยแล้ว');</script>";
		echo "<script>window.location.href='questionnaire_view.php'</script>";
  }else{
		echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
		echo "<script>history.back();</script>";
  }
}
?>

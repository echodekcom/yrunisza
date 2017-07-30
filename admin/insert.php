<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
require_once("libs/Db.php");
$objDb = new Db();
$db = $objDb->database;

session_start();

if ($_GET['action']=="subject") {

  $query = $db->prepare("INSERT INTO subject (subject_id, subject_name_th, subject_name_eng, subject_description_th, subject_description_eng, subject_credit, course_id) VALUES (:subject_id, :subject_name_th, :subject_name_eng, :subject_description_th, :subject_description_eng, :subject_credit, :course_id);");
  $result = $query->execute(["subject_id" => $_POST['field_subject_id'],"subject_name_th" => $_POST['field_subject_name_th'],"subject_name_eng" => $_POST['field_subject_name_eng'],"subject_description_th" => $_POST['field_subject_description_th'],"subject_description_eng" => $_POST['field_subject_description_eng'],"subject_credit" => $_POST['field_subject_credit'],"course_id" => $_POST['field_course_id'],]);
  if($result){
		echo "<script>alert('คุณได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว');</script>";
		echo "<script>window.location.href='subject.php'</script>";
	}else{
		echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
		echo "<script>history.back();</script>";
	}
}else if ($_GET['action']=="committee") {

	
		$query = $db->prepare("INSERT INTO transfer (selector_id,subject_id1,university_id1,subject_id2,university_id2) VALUES(:selector,:subject1,:university1,:subject2,:university2);");
		$query->execute(["subject1"=>$_POST['field_subject_id'],"subject2"=>$_POST['field_subject_id2'],"selector"=>$_POST['selector'],"university1"=>$_POST['university1'],"university2"=>$_POST['university2']]);
		$transfer = $db->lastInsertId();
		
		if ($query) {
			foreach ($_POST['member_id'] as $key => $value) {
				$query1 = $db->prepare("INSERT INTO transfer_detail (transfer_id,member_id) VALUES (:transfer,:member);");
				$query1->execute(["transfer"=>$transfer,"member"=>$value]);
			}
		}

	if($query1){
		unset($_SESSION['cart']);
		unset($_SESSION['qty']);
		echo "<script>alert('คุณได้ทำการเลือกกรรมการเรียบร้อยแล้ว');</script>";
		echo "<script>window.location.href='committee_info.php'</script>";
	}else{
		echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
		echo "<script>history.back();</script>";
	}
}else if ($_GET['action']=="transfer") {

  $query = $db->prepare("INSERT INTO transfer (member_id,selector_id,subject_id1,subject_id2,assessor_status) VALUES(:member,:selector,:subject1,:subject2,:status);");
  $query->execute(["member"=>$_POST['id'],"subject1"=>$_POST['field_subject_id1'],"subject2"=>$_POST['field_subject_id2'],"selector"=>$_POST['id'],"status"=>'1']);
  if($query){
		echo "<script>alert('คุณได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว');</script>";
		echo "<script>window.location.href='subject.php'</script>";
	}else{
		echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
		echo "<script>history.back();</script>";
	}
}
?>

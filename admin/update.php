<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
require_once("libs/Db.php");
$objDb = new Db();
$db = $objDb->database;

if ($_GET['action']=="university") {

  	$query = $db->prepare("UPDATE university SET university_name_th=:university_name_th,university_name_eng=:university_name_eng , university_status=:university_status, university_country=:university_country WHERE university_id=:university_id");
  	$result = $query->execute(["university_name_th" => $_POST['field_university_name_th'],"university_name_eng" => $_POST['field_university_name_eng']
                            ,"university_status" => $_POST['field_university_status'],"university_country" => $_POST['field_university_country'],"university_id"=>$_GET['university_id']]);
  	if($result){
		echo "<script>alert('คุณได้ทำการแก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
		echo "<script>window.location.href='university.php'</script>";
	}else{
		echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
		echo "<script>history.back();</script>";
	}
}else if ($_GET['action']=="course") {

  	$query = $db->prepare("UPDATE course SET course_name_th=:course_name_th,course_name_eng=:course_name_eng , university_id=:university_id WHERE course_id=:course_id");
  	$result = $query->execute(["course_name_th" => $_POST['field_course_name_th'],"course_name_eng" => $_POST['field_course_name_eng']
                            ,"university_id" => $_POST['field_university_id'],"course_id"=>$_GET['course_id']]);
  	if($result){
		echo "<script>alert('คุณได้ทำการแก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
		echo "<script>window.location.href='course.php'</script>";
	}else{
		echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
		echo "<script>history.back();</script>";
	}
}else if ($_GET['action']=="subject") {

  	$query = $db->prepare("UPDATE subject SET subject_id=:subject_id, subject_name_th=:subject_name_th, subject_name_eng=:subject_name_eng, subject_description_th=:subject_description_th, subject_description_eng=:subject_description_eng, subject_credit=:subject_credit WHERE subject_id=:subject_id");
  	$result = $query->execute(["subject_id" => $_POST['field_subject_id']
  							,"subject_name_th" => $_POST['field_subject_name_th']
  							,"subject_name_eng" => $_POST['field_subject_name_eng']
                            ,"subject_description_th" => $_POST['field_subject_description_th']
                            ,"subject_description_eng" => $_POST['field_subject_description_eng']
                            ,"subject_credit" => $_POST['field_subject_credit']
                            ,"subject_id" => $_GET['subject_id'],]);
  	if($result){
		echo "<script>alert('คุณได้ทำการแก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
		echo "<script>window.location.href='subject.php'</script>";
	}else{
		echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
		echo "<script>history.back();</script>";
	}

}else if($_GET['action']=="verified_head"){

	foreach ($_POST['select'] as $key => $value) {
		$query = $db->prepare("UPDATE member SET member_verified=:value WHERE member_id=:key");
		$query->execute(["value"=>$_POST['select'][$key],"key"=>$key]);
	}

	if($query){
		echo "<script>alert('คุณได้ทำการยืนยันตัวตนเรียบร้อยแล้ว');</script>";
		echo "<script>window.location.href='admin.php'</script>";
	}else{
		echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
		echo "<script>history.back();</script>";
	}
}else if($_GET['action']=="verified"){

	foreach ($_POST['select'] as $key => $value) {
		$query = $db->prepare("UPDATE member SET member_verified=:value WHERE member_id=:key");
		$query->execute(["value"=>$_POST['select'][$key],"key"=>$key]);
	}

	if($query){
		echo "<script>alert('คุณได้ทำการยืนยันตัวตนเรียบร้อยแล้ว');</script>";
		echo "<script>window.location.href='home.php'</script>";
	}else{
		echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
		echo "<script>history.back();</script>";
	}
}else if ($_GET['action']=="transfer") {

	if ($_POST['ok']==1) {
		$query = $db->prepare("UPDATE transfer SET transfer_status=1 WHERE transfer_id=:transfer");
		$query->execute(["transfer"=>$_POST['transfer_id']]);

	  	if($query){
			echo "<script>alert('คุณได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว');</script>";
			echo "<script>window.location.href='transfer_info.php'</script>";
		}else{
			echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
			echo "<script>history.back();</script>";
		}
	}else{
		$query = $db->prepare("UPDATE transfer SET transfer_status=2 WHERE transfer_id=:transfer");
		$query->execute(["transfer"=>$_POST['transfer_id']]);

	  	if($query){
			echo "<script>alert('คุณได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว');</script>";
			echo "<script>window.location.href='transfer_info.php'</script>";
		}else{
			echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
			echo "<script>history.back();</script>";
		}
	}

}else if ($_GET['action']=="commit_transfer") {

	if ($_POST['ok']==1) {
		$query = $db->prepare("UPDATE transfer_detail SET td_status=1 WHERE td_id=:transfer");
		$query->execute(["transfer"=>$_POST['td_id']]);

	  	if($query){
			echo "<script>alert('คุณได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว');</script>";
			echo "<script>window.location.href='transfer_mine.php'</script>";
		}else{
			echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
			echo "<script>history.back();</script>";
		}
	}else{
		$query = $db->prepare("UPDATE transfer_detail SET td_status=2 WHERE td_id=:transfer");
		$query->execute(["transfer"=>$_POST['td_id']]);

	  	if($query){
			echo "<script>alert('คุณได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว');</script>";
			echo "<script>window.location.href='transfer_mine.php'</script>";
		}else{
			echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
			echo "<script>history.back();</script>";
		}
	}

}else if ($_GET['action']=="member") {

	$query = $db->prepare("SELECT * FROM member WHERE member_password=:member_password");
    $query->execute(["member_password" => md5($_POST['old_password'])]);

     if ($query->rowCount()>0) {
    	$query = $db->prepare("UPDATE member SET member_name=:name,member_lastname=:lastname,member_tel=:tel,member_email=:email,member_address=:address WHERE member_id=:id");
		$query->execute(["name"=>$_POST['member_name'],"lastname"=>$_POST['member_lastname'],"tel"=>$_POST['member_tel'],"email"=>$_POST['member_email'],"address"=>$_POST['member_address'],"id"=>$_GET['member_id']]);

	  	if($query){
			echo "<script>alert('คุณได้ทำการแก้ขข้อมูลเรียบร้อยแล้ว');</script>";
			echo "<script>window.location.href='personal.php'</script>";
		}else{
			echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
			echo "<script>history.back();</script>";
		}
    }else{
    	echo "<script>alert('กรุณากรอกรหัสผ่านให้ถูกต้อง');</script>";
		echo "<script>history.back();</script>";
    }

}else if ($_GET['action']=="password") {

	$query = $db->prepare("SELECT * FROM member WHERE member_password=:member_password");
    $query->execute(["member_password" => md5($_POST['old_password'])]);

     if ($query->rowCount()>0) {
    	$query = $db->prepare("UPDATE member SET member_password=:password WHERE member_id=:id");
		$query->execute(["password"=>md5($_POST['new_password']),"id"=>$_GET['member_id']]);

	  	if($query){
			echo "<script>alert('คุณได้ทำการแก้ขข้อมูลเรียบร้อยแล้ว');</script>";
			echo "<script>window.location.href='personal.php'</script>";
		}else{
			echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
			echo "<script>history.back();</script>";
		}
    }else{
    	echo "<script>alert('กรุณากรอกรหัสผ่านเดิมให้ถูกต้อง');</script>";
		echo "<script>history.back();</script>";
    }

}else if ($_GET['action']=="question_edit") {

  	$query = $db->prepare("UPDATE tb_question SET question=:question WHERE id_question=:id_question");
  	$result = $query->execute(["question" => $_POST['field_question'],"id_question"=>$_GET['id_question']]);
  	if($result){
		echo "<script>alert('คุณได้ทำการแก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
		echo "<script>window.location.href='questionnaire_view.php'</script>";
	}else{
		echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
		echo "<script>history.back();</script>";
	}

}
?>

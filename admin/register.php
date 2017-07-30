<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
require_once("libs/Db.php");
$objDb = new Db();
$db = $objDb->database;

if ($_POST['field_university_id']=='new_u') {
  $query_insert_u = $db->prepare("INSERT INTO university (university_name_th,university_name_eng,university_status,university_country) VALUES (:university_name_th,:university_name_eng,:university_status,:university_country);");
  $result_insert_u = $query_insert_u->execute(["university_name_th" => $_POST['field_university_name_th']
  ,"university_name_eng" => $_POST['field_university_name_eng'],"university_status" => $_POST['field_university_status']
  ,"university_country" => $_POST['field_university_country'],]);
  $id_u = $db->lastInsertId();

  if($result_insert_u){
    $query_insert_c = $db->prepare("INSERT INTO course (university_id,course_name_th,course_name_eng) VALUES (:university_id,:course_name_th,:course_name_eng);");
    $result_insert_c = $query_insert_c->execute(["university_id" => $id_u 
    ,"course_name_th" => $_POST['field_course_name_th1']
    ,"course_name_eng" => $_POST['field_course_name_eng1'],]);
    $id_c = $db->lastInsertId();

    if ($result_insert_c) {
      $query_insert_m = $db->prepare("INSERT INTO member (university_id,course_id,member_name,member_lastname,member_tel,member_email,member_address,member_position,member_password) VALUES (:university_id,:course_id,:member_name,:member_lastname,:member_tel,:member_email,:member_address,:member_position,:member_password);");
      $result_insert_m = $query_insert_m->execute(["university_id" => $id_u,"course_id" => $id_c
        ,"member_name" => $_POST['field_member_name'],"member_lastname" => $_POST['field_member_lastname']
        ,"member_tel" => $_POST['field_member_tel'],"member_email" => $_POST['field_member_email']
        ,"member_address" => $_POST['field_member_address'],"member_position" => $_POST['field_member_position']
        ,"member_password" => md5($_POST['field_member_password']),]);
      if($result_insert_m){
        echo "<script>alert('คุณได้ทำการสมัครเรียบร้อยแล้ว');</script>";
        echo "<script>window.location.href='index.php'</script>";
      }else{
        echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
        echo "<script>window.location.href='index.php'</script>";
      }
    }else{
      echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
      echo "<script>window.location.href='index.php'</script>";
    }
  }else{
    echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
    echo "<script>window.location.href='index.php'</script>";
  } 
}else if ($_POST['field_course_id']=='new_c') {
  $query_insert_c = $db->prepare("INSERT INTO course (university_id,course_name_th,course_name_eng) VALUES (:university_id,:course_name_th,:course_name_eng);");
  $result_insert_c = $query_insert_c->execute(["university_id" => $_POST['field_university_id']
  ,"course_name_th" => $_POST['field_course_name_th2']
  ,"course_name_eng" => $_POST['field_course_name_eng2'],]);
  $id_c = $db->lastInsertId();

  if ($result_insert_c) {
    $query_insert_m = $db->prepare("INSERT INTO member (university_id,course_id,member_name,member_lastname,member_tel,member_email,member_address,member_position,member_password) VALUES (:university_id,:course_id,:member_name,:member_lastname,:member_tel,:member_email,:member_address,:member_position,:member_password);");
    $result_insert_m = $query_insert_m->execute(["university_id" => $_POST['field_university_id'],"course_id" => $id_c
    ,"member_name" => $_POST['field_member_name'],"member_lastname" => $_POST['field_member_lastname']
    ,"member_tel" => $_POST['field_member_tel'],"member_email" => $_POST['field_member_email']
    ,"member_address" => $_POST['field_member_address'],"member_position" => $_POST['field_member_position']
    ,"member_password" => md5($_POST['field_member_password']),]);
    
    if($result_insert_m){
        echo "<script>alert('คุณได้ทำการสมัครเรียบร้อยแล้ว');</script>";
        echo "<script>window.location.href='index.php'</script>";
      }else{
        echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
        echo "<script>window.location.href='index.php'</script>";
      }
    }else{
      echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
      echo "<script>window.location.href='index.php'</script>";
    }
}else{

  $query = $db->prepare("INSERT INTO member (university_id,course_id,member_name,member_lastname,member_tel,member_email,member_address,member_position,member_password) VALUES (:university_id,:course_id,:member_name,:member_lastname,:member_tel,:member_email,:member_address,:member_position,:member_password);");
  $result = $query->execute(["university_id" => $_POST['field_university_id'],"course_id" => $_POST['field_course_id']
  ,"member_name" => $_POST['field_member_name'],"member_lastname" => $_POST['field_member_lastname']
  ,"member_tel" => $_POST['field_member_tel'],"member_email" => $_POST['field_member_email']
  ,"member_address" => $_POST['field_member_address'],"member_position" => $_POST['field_member_position']
  ,"member_password" => md5($_POST['field_member_password']),]);
  if($result){
		echo "<script>alert('คุณได้ทำการสมัครเรียบร้อยแล้ว');</script>";
		echo "<script>window.location.href='index.php'</script>";
	}else{
		echo "<script>alert('ระบบไม่สามารถทำรายการได้ในขณะนี้ กรุณาทำรายการภายหลัง');</script>";
		echo "<script>window.location.href='index.php'</script>";
	}

}

?>

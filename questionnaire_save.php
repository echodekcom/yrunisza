<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
require_once("admin/libs/Db.php");
$objDb = new Db();
$db = $objDb->database;

	// INSERT TABLE tb_roomreserv
	$query = $db->prepare("INSERT INTO tb_person (created,gender,age,education,status) VALUES ('".date("d-m-Y H:i:s")."','".$_POST["rdo_gender"]."','". $_POST["rdo_age"] ."','".$_POST["rdo_education"]."','".$_POST["rdo_state"]."')");
	$query->execute();
	if($query)
	{

		$query = $db->prepare("SELECT id_person FROM tb_person ORDER BY id_person  DESC LIMIT 1");
		$query->execute();
		if($query->rowCount() > 0){
		$objResult3 = $query->fetch(PDO::FETCH_ASSOC);

		if(!$objResult3)
		{
			$id_person  = 1;
		}
		else
		{
			$id_person  = $objResult3["id_person"];

	}
	}
}
	else
	{
	echo "Error Save tb_person 	 [".$strSQL."]";
	}

	for($i=1;$i<=8;$i++)
		{
				if($_POST["radionNo".$i] != "")
			{

				$query = $db->prepare("INSERT INTO tb_answer (id_person,id_question,score) VALUES ('".$id_person."','". $i ."','".$_POST["radionNo".$i]."')");
				$query->execute();
			}
		}

			echo "<script>";
			echo "alert('คุณได้ส่งแบบสอบถามเรียบร้อยแล้ว');";
			echo "window.location='index.php';";
			echo "</script>";


?>

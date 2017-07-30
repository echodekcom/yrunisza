<?php
  require_once("libs/Db.php");
  $objDb = new Db();
  $db = $objDb->database;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo-header.png" type="image/png" sizes="16x16">

    <title>สรุปผลแบบสอบถาม | YRU & UniSZA</title>

    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">

    <?php
    require_once 'header.php';
    ?>

        <!-- page content -->
        <div class="right_col">
          <br><br><br>
          <div class="panel panel-default">
            <div class="panel-body">
                <h3>สรุปผลแบบสำรวจความพึงพอใจของผู้ใช้ระบบสารสนเทศ</h3>
                <hr>
                <font size="3">
                <div class="row">
                  <div class="container table-responsive">
                    <table width="950" border="0" align="center" cellpadding="2" cellspacing="2">
                      <tr>
                        <td colspan="6" bgcolor="#CCCCCC"><b>ตอนที่ 1</b> ข้อมูลพื้นฐาน</td>
                      </tr>
                      <tr>
                        <td width="104">&nbsp;</td>
                        <td width="326">&nbsp;</td>
                        <td width="263">&nbsp;</td>
                        <td width="72">&nbsp;</td>
                        <td width="72">&nbsp;</td>
                        <td width="75">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align="center" bgcolor="#33CCFF">เพศ</td>
                        <td align="center" bgcolor="#33CCFF">จำนวน(คน)</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <?php
                          $query = $db->prepare("SELECT gender, COUNT(id_person) as qty FROM tb_person GROUP BY gender");
                          $query->execute();
                          if($query->rowCount() > 0){
                          while($row = $query->fetch(PDO::FETCH_ASSOC)){
                         ?>

                        <td>&nbsp;</td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['qty']; ?></td>
                        <td></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    <?php }} ?>
                      <tr>
                    <?php
                      $query = $db->prepare("SELECT COUNT(id_person) as qty FROM tb_person");
                      $query->execute();
                      if($query->rowCount() > 0){
                      while($row = $query->fetch(PDO::FETCH_ASSOC)){
                     ?>
                        <td>&nbsp;</td>
                        <td align="center">รวม</td>
                        <td><?php echo $row['qty']; ?></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    <?php }} ?>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td >&nbsp;</td>
                        <td >&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align="center" bgcolor="#FFCC99">อายุ</td>
                        <td align="center" bgcolor="#FFCC99">จำนวน(คน)</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                      <?php
                        $query = $db->prepare("SELECT age, COUNT(id_person) as qtyage FROM tb_person GROUP BY age");
                        $query->execute();
                        if($query->rowCount() > 0){
                        while($row = $query->fetch(PDO::FETCH_ASSOC)){
                       ?>
                        <td>&nbsp;</td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['qtyage']; ?></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    <?php }} ?>

                      <tr>

                    <?php
                      $query = $db->prepare("SELECT COUNT(id_person) as qty FROM tb_person");
                      $query->execute();
                      if($query->rowCount() > 0){
                      while($row = $query->fetch(PDO::FETCH_ASSOC)){
                     ?>
                        <td>&nbsp;</td>
                        <td align="center">รวม</td>
                        <td><?= $row['qty']; ?></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    <?php }} ?>
                      </tr>

                      <tr>
                        <td>&nbsp;</td>
                        <td >&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align="center" bgcolor="#CCCCFF">สถานภาพ</td>
                        <td align="center" bgcolor="#CCCCFF">จำนวน(คน)</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                    <?php
                      $query = $db->prepare("SELECT status, COUNT(id_person) as qtystatus FROM tb_person GROUP BY status");
                      $query->execute();
                      if($query->rowCount() > 0){
                      while($row = $query->fetch(PDO::FETCH_ASSOC)){
                     ?>
                        <td>&nbsp;</td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['qtystatus']; ?></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    <?php }} ?>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="6" bgcolor="#CCCCCC"><b>ตอนที่ 2</b> ความพึงพอใจของผู้ใช้เว็บไซต์</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align="center">รายการ</td>
                        <td align="center">คะแนนเฉลี่ย</td>
                        <td align="center">ระดับ</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                      <?php
                        $query = $db->prepare("SELECT tb_question.*,tb_answer.id_question, sum(tb_answer.score) as qtyscore ,count(tb_answer.id_person) as qtyperson FROM tb_answer LEFT JOIN tb_question ON tb_answer.id_question = tb_question.id_question GROUP BY tb_answer.id_question");
                        $query->execute();
                        if($query->rowCount() > 0){
                        while($row = $query->fetch(PDO::FETCH_ASSOC)){
                       ?>
                        <td>&nbsp;</td>
                        <td><?php echo $row['question']; ?></td>
                        <td align="center"><?php echo number_format(($row['qtyscore'] / $row['qtyperson']),2); ?></td>
                        <td align="center"><?php
                    	 $answer = (number_format(($row['qtyscore'] / $row['qtyperson']),2));

                    	if ($answer >= 4.50)
                    	{
                    	    echo  "มากที่สุด";

                    	} else if ($answer >= 3.50)
                    	{
                    		echo "มาก";
                    	}else if ($answer >= 2.50)
                    	{
                    		echo "ปานกลาง";
                    	}else if ($answer >= 1.50)
                    	{
                    		echo "น้อย";
                    	}else
                    		echo "น้อยที่สุด";
                    	 ?></td>
                        <td></td>
                        <td></td>
                      </tr>
                    <?php }} ?>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                  </div><br><br><br><br><br><br>
                </div>
                </font>

            </div>
          </div>
        </div>

    <script src="build/js/jquery.min.js"></script>
    <script src="build/js/bootstrap.min.js"></script>
    <script src="build/js/custom.min.js"></script>

  </body>
</html>

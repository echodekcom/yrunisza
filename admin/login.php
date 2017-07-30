<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
    session_start();
    require_once("libs/Db.php");
    $objDb = new Db();
    $db = $objDb->database;

    $query = $db->prepare("SELECT * FROM member WHERE member_email=:member_email AND member_password=:member_password");
    $query->execute(["member_email" => $_POST['field_member_email'],"member_password" => md5($_POST['field_member_password'])]);

    if ($query->rowCount()>0) {
    $row = $query->fetch(PDO::FETCH_ASSOC);

        if ($row['member_verified']==0 AND $row['member_position']==0) {
            
            $_SESSION['id']=$row['member_id'];
            $_SESSION['name']=$row['member_name'];
            $_SESSION['lastname']=$row['member_lastname'];
            $_SESSION['email']=$row['member_email'];
            $_SESSION['position']=$row['member_position'];
            $_SESSION['university']=$row['university_id'];
            $_SESSION['course']=$row['course_id'];


            echo "<script>alert('ยินดีต้อนรับ ".$_SESSION['name']." ..!');</script>";
            echo "<script>window.location.href='admin.php'</script>";

        }else if ($row['member_verified']==0 AND $row['member_position']==1) {
            
            echo "<script>alert('คุณยังไม่ได้รับการอนุมัติจากผู้ดูแลระบบ กรุณารอการอนุมัติ');</script>";
            echo "<script>history.back();</script>";

        }else if ($row['member_verified']==2 AND $row['member_position']==1) {
            
            echo "<script>alert('คุณไม่ได้รับการอนุมัติจากผู้ดูแลระบบ กรุณาติดต่อประธานหลักสูตรเพื่อดำเนินการต่อไป');</script>";
            echo "<script>history.back();</script>";

        }else if ($row['member_verified']==0 AND $row['member_position']!=0 AND $row['member_position']!=1) {
            
            echo "<script>alert('คุณยังไม่ได้รับการอนุมัติจากประธานหลักสูตร กรุณารอการอนุมัติ');</script>";
            echo "<script>history.back();</script>";

        }else if ($row['member_verified']==2 AND $row['member_position']!=0 AND $row['member_position']!=1) {
            
            echo "<script>alert('คุณไม่ได้รับการอนุมัติจากประธานหลักสูตร กรุณาติดต่อประธานหลักสูตรเพื่อดำเนินการต่อไป');</script>";
            echo "<script>history.back();</script>";

        }else{
            $_SESSION['id']=$row['member_id'];
            $_SESSION['name']=$row['member_name'];
            $_SESSION['lastname']=$row['member_lastname'];
            $_SESSION['email']=$row['member_email'];
            $_SESSION['position']=$row['member_position'];
            $_SESSION['university']=$row['university_id'];
            $_SESSION['course']=$row['course_id'];

            
            echo "<script>alert('ยินดีต้อนรับ ".$_SESSION['name']." ..!');</script>";
            echo "<script>window.location.href='home.php'</script>";
        }

    }else{
        
        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง');</script>";
        echo "<script>history.back();</script>";
    }
?>

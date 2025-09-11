<!-- هنا سنقوم باضافة طلاب الي قاعدة البيانات -->
<?php

include_once "../Conect.php";
if (isset($_POST['first_name'])) {
    $obgConect = new Conect();
    if ($obgConect->insert($_POST, 'student_info')) {
        // الانتقال الي صفحة جدول التلاميذ 
        // مطلوب تسجيل كوكيز لمعرفة اخر طالب تم اضافته و يتم عرض بيانات هذا الطالب فى الهوم بشكل احترافى 
        // 1-طريقة عرض ال cookies
         setcookie("laststudent", $_POST['first_name'], time()+(86400 * 7), '/');
        header('location:/school_system/student/index.php?add=success');
        exit;
        // print "<div class='alert alert-success'>yes you add</div>";   // مطلوب عن اضافة تلميذ جديد يظهر رساله للمستخدم تفيد بنجاح اضافة التلميذ alert or moadel bootstrap  
    } else {
        print "<div class='alert alert-danger'> No studet was added</div>";
    }
}
include_once "../header.php";
?>
<div class="alert alert-success">page add student</div>
<?php
if(isset($_SESSION['username'])){?>
  <div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name='first_name' class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name='last_name'>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name='email' class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">age</label>
                <input type="number" name='age' class="form-control">
            </div>
            <input type="hidden" name="user_id" value="<?php print  $_SESSION['Id']?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<?php }else{
    // print "<div class='alert alert-danger'> you donot login in site"
    header("location:/school_system/users/login.php");
}?>
<?php include_once "../footer.php";


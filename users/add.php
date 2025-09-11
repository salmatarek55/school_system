<!-- هنا سنقوم باضافة طلاب الي قاعدة البيانات -->
<?php

include_once "../Conect.php";
if (isset($_POST['user_name'])) {
    $obgConect = new Conect();
    if ($obgConect->insert($_POST, 'users')) {
        // الانتقال الي صفحة جدول المستخدمين  
        header('location:/school_system/users/index.php?add=success');
        exit;
        // print "<div class='alert alert-success'>yes you add</div>";   // مطلوب عن اضافة تلميذ جديد يظهر رساله للمستخدم تفيد بنجاح اضافة التلميذ alert or moadel bootstrap  
    } else {
        print "<div class='alert alert-danger'> no your user not add</div>";
    }
}
include_once "../header.php";
?>

<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" name='user_name' class="form-control">
                <div class="form-text">add your user name.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name='email'>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name='password' class="form-control">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-3"></div>
</div>


<?php include_once "../footer.php";

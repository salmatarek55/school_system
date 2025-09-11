<?php
include_once "../header.php";
if(!isset($_SESSION ['username'])){
    header('location:/school_system/users/login.php');
}
include_once "../Conect.php";
$conct = new Conect();
$student = $conct->selectOne('student_info', $_GET['Id']);

if (isset($_POST['first_name'])) {
    $conct->update($_POST, 'student_info', $student['Id']);
    header('location:/school_system/student/index.php?edit=success');
    exit;
}
?>

<div class="row justify-content-center">
    <div class="col-6 bg-info">
        <h1>page edit student <?php print  $student['first_name'] ?></h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-6">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" value="<?php print $student['first_name'] ?>" name='first_name' class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" value="<?php print $student['last_name'] ?>" class="form-control" name='last_name'>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" value="<?php print $student['email'] ?>" name='email' class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">age</label>
                <input type="number" value="<?php print $student['age'] ?>" name='age' class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<!-- close container -->
<?php include_once "../footer.php";

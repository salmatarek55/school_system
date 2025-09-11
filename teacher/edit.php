<?php
include_once "../header.php";
 
 if(!isset($_SESSION ['username'])){
     header('location:/school_system/users/login.php');
     exit;
}
include_once "../conect.php";
 $conect=new Conect();
if(!isset($_GET['Id'])){
   header('Location: /school_system/users/index.php');
    exit;
}   
$teacher = $conect->selectOne('teachers', $_GET['Id']);
 if(isset($_POST['first_name'])){
       $conect->update($_POST, 'teachers', $teacher['Id']);
       header('location:/school_system/teacher/index.php?edit=success');
       exit;
 }
?>
<div class="row justify-content-center">
    <div class="col-6 bg-info">
        <h1>page edit Teacher <?php print  $teacher['first_name'] ?></h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-6">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" value="<?php print $teacher['first_name'] ?>" name='first_name' class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" value="<?php print $teacher['last_name'] ?>" class="form-control" name='last_name'>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" value="<?php print $teacher['email'] ?>" name='email' class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Subject</label>
                <input type="text" value="<?php print $teacher['subject'] ?>" name='subject' class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<?php
  include_once "../footer.php";
?>
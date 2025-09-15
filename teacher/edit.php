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
<style>
  .card-custom {
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  }
  .card-title {
    font-weight: bold;
    color: #0d6efd;
  }
  .form-label {
    font-weight: 600;
  }
  .input-group-text {
    background-color: #0d6efd;
    color: #fff;
  }
</style>

<div class="row justify-content-center mt-5">
  <div class="col-md-6">
    <div class="card card-custom">
      <div class="card-body p-4">
        <h3 class="text-center mb-4 card-title">
          <i class="fa-solid fa-user-pen"></i> Edit Teacher: 
          <span class="text-secondary"><?php print $teacher['first_name'] ?></span>
        </h3>

        <form method="POST">
          <div class="mb-3">
            <label class="form-label">First Name</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
              <input type="text" value="<?php print $teacher['first_name'] ?>" name="first_name" class="form-control">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Last Name</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
              <input type="text" value="<?php print $teacher['last_name'] ?>" name="last_name" class="form-control">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
              <input type="email" value="<?php print $teacher['email'] ?>" name="email" class="form-control">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Subject</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-book"></i></span>
              <input type="text" value="<?php print $teacher['subject'] ?>" name="subject" class="form-control">
            </div>
          </div>

          <button type="submit" class="btn btn-primary w-100">
            <i class="fa-solid fa-floppy-disk"></i> Save Changes
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include_once "../footer.php"; ?>

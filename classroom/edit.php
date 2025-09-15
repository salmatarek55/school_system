<?php
include_once "../header.php";
 
  if(!isset($_SESSION['username'])){
       header('location:/school_system/users/login.php');
  }
    include_once "../conect.php";
  $conect=new Conect();
if(!isset($_GET['Id'])){
    header('Location: /school_system/classroom/index.php');
    exit;
}
 $classroom = $conect->selectOne('classrooms', $_GET['Id']);
   if(isset($_POST['name'])){
       $conect->update($_POST, 'classrooms', $classroom['Id']);
       header('location:/school_system/classroom/index.php?edit=success');
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
          <i class="fa-solid fa-chalkboard"></i> Edit Classroom: 
          <span class="text-secondary"><?php print $classroom['name'] ?></span>
        </h3>

        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Name of Classroom</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-door-open"></i></span>
              <input 
                type="text" 
                value="<?php print $classroom['name'] ?>" 
                name="name" 
                class="form-control"
              >
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Number of Students</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-users"></i></span>
              <input 
                type="number" 
                value="<?php print $classroom['number_students'] ?>" 
                name="number_students" 
                class="form-control"
              >
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

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
          <i class="fa-solid fa-user-pen"></i> Edit Student (<?php print $student['first_name']; ?>)
        </h3>

        <form method="POST">
          <div class="mb-3">
            <label class="form-label">First Name</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
              <input type="text" value="<?php print $student['first_name'] ?>" name="first_name" class="form-control" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Last Name</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
              <input type="text" value="<?php print $student['last_name'] ?>" name="last_name" class="form-control" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
              <input type="email" value="<?php print $student['email'] ?>" name="email" class="form-control" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Age</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-cake-candles"></i></span>
              <input type="number" value="<?php print $student['age'] ?>" name="age" class="form-control" required>
            </div>
          </div>

          <button type="submit" class="btn btn-primary w-100">
            <i class="fa-solid fa-save"></i> Save Changes
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include_once "../footer.php"; ?>

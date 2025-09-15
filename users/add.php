<?php
include_once "../Conect.php";
include_once "../header.php";

if (isset($_POST['user_name'])) {
    $obgConect = new Conect();
    if ($obgConect->insert($_POST, 'users')) {
        $_SESSION['registered'] = "✅ Account created successfully, please log in.";
        header('location:/school_system/users/login.php');
        exit;
    } else {
        print "<div class='alert alert-danger'> No, your user was not added</div>";
    }
}
include_once "../header.php";
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
          <i class="fa-solid fa-user-plus"></i> Add User
        </h3>

        <form method="POST">
          <div class="mb-3">
            <label class="form-label">User Name</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
              <input type="text" name="user_name" class="form-control" placeholder="Enter username">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
              <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
              <input type="password" name="password" class="form-control" placeholder="Enter password">
            </div>
          </div>

          <button type="submit" class="btn btn-primary w-100">
            <i class="fa-solid fa-plus"></i> Submit
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include_once "../footer.php"; ?>

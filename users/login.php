<?php
include_once "../conect.php";
include_once "../header.php";
$conect= new conect();
$error = "";
if(isset ($_POST['user_name'])){
    $user=$conect->login($_POST['user_name'],$_POST['password']);
    if(count($user)>0){
        $_SESSION['username']=$user['user_name'];
        $_SESSION['Id']=$user['Id'];
        header('location:/school_system/home.php');
    }
    else{
         $error = "Invalid username or password";
    }
}

?>
<style>
  body {
    min-height: 80vh;
    background: #f8f9fa; 
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #e3f2fd, #ffffff);
  }

  .login-card {
    width: 100%;
    max-width: 500px; 
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    background:fdfdfd;
  }
    .login-title {
    color: #0d6efd; 
    font-weight: bold;
    margin-bottom: 5px;
  }
    .form-label {
    font-weight: 500;
    margin-bottom: 5px;
  }
  .input-group-text{
      background-color: gray;
      color: #fff;
  }
    .is-invalid {
    border-color: #dc3545; 
  }

</style>

<div class="login-container">
  <div class="card login-card">
    <div class="card-body p-5">
      <h3 class="text-center mb-4 login-title">Login</h3>
      
      <?php if(isset($_SESSION['registered'])): ?>
        <div class="alert alert-success text-center">
          <?= $_SESSION['registered']; ?>
        </div>
        <?php unset($_SESSION['registered']); ?>
      <?php endif; ?>

      <?php if($error): ?>
        <div class="alert alert-danger text-center"><?= $error ?></div>
      <?php endif; ?>

      <form method="POST" autocomplete="off">
        <div class="mb-3">
          <label for="user_name" class="form-label">Username</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input 
              type="text" 
              name="user_name" 
              id="user_name" 
              class="form-control <?php if($error) echo 'is-invalid'; ?>" 
              placeholder="Enter username" 
              required
            >
          </div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
            <input 
              type="password" 
              name="password" 
              id="password" 
              class="form-control <?php if($error) echo 'is-invalid'; ?>" 
              placeholder="Enter password" 
              required
            >
          </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>

      <p class="text-center mt-3 text-muted">
        Don't have an account? 
        <a href="/school_system/users/add.php" class="text-primary fw-bold">Register now</a>
      </p>
    </div>
  </div>
</div>



<?php
include_once "../footer.php";
?>

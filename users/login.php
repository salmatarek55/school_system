<?php
include_once "../conect.php";
include_once "../header.php";
$conect= new conect();
if(isset ($_POST['user_name'])){
    $user=$conect->login($_POST['user_name'],$_POST['password']);
    if(count($user)>0){
        // print "user login success";
        // يتم تسجيل جلسة سيشن  فيها بيانات المستخدم
        $_SESSION['username']=$user['user_name'];
        $_SESSION['Id']=$user['Id'];
        header('location:/school_system/home.php');
    }
    else{
        print "user not login";
    }
}

?>
<style>
  body {
    background: #f8f9fa; 
     margin: 0;
  }
  .login-container {
    /* min-height: calc(100vh - 56px);  */
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .login-card {
    width: 100%;
    max-width: 400px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  }
</style>
<div class="row justify-content-center">
   <h1 style="text-align: center;">Login Page</h1>
</div>
<div class="login-container">
  <div class="card login-card">
    <div class="card-body p-4">
      <h3 class="text-center mb-3">Welcome to our School</h3>
      <p class="text-center text-muted">Login to manage Students, Teachers, and Classrooms</p>

      <form method="POST">
        <div class="mb-3">
          <label class="form-label">User name</label>
          <input type="text" name="user_name" id="user_name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </div>
</div>

<?php
include_once "../footer.php";
?>
<?php
 include_once('../conect.php');
 if(isset($_POST['first_name'])){
           $conect=new Conect();
           if($conect->insert($_POST,'teachers')){
                 header('location:/school_system/teacher/index.php?add=success');
           }
           else{
            print " <div class='alert alert-danger'>No Teacher was added </div>";
           }

 }
 include_once('../header.php');
?>
<div class="alert alert-success">page add Teacher</div>

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
                     <label class="form-label">Subject</label>
                     <input type="text" name='subject' class="form-control">
                </div>
            <input type="hidden" name="user_id" value="<?php print  $_SESSION['Id']?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
             </div>
          </div>
     

<?php }else{
    header("location:/school_system/users/login.php");
    exit;
}?>




<?php
   include_once('../footer.php');
?>
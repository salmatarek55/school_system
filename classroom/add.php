<?php
   include_once "../conect.php";
    if(isset($_POST['name'])){
           $conect=new Conect();
           if($conect->insert($_POST,'classrooms')){
                 header('location:/school_system/classroom/index.php?add=success');
           }
           else{
            print " <div class='alert alert-danger'>No classroom was added </div>";
           }
   }
 include_once "../header.php";
?>
<div class="alert alert-success">page add classroom</div>
<?php if(isset($_SESSION['username'])){?>
          <div class="row">
             <div class="col-3"></div>
             <div class="col-6">
                <form method="POST">
                   <div class="mb-3">
                      <label class="form-label">Name of classroom</label>
                      <input type="text" name='name' class="form-control">
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Number of Students</label>
                      <input type="number" class="form-control" name='number_students'>
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
   include_once "../footer.php";
?>
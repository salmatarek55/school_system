<?php
 include_once('../conect.php');
 if(isset($_POST['first_name'])){
           $conect=new Conect();
           if($conect->insert($_POST,'teachers')){
                 header('location:/school_system/teacher/index.php?add=success');
                 exit;
           }
           else{
            print "<div class='alert alert-danger'>❌ No Teacher was added</div>";
           }
 }
 include_once('../header.php');
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
    font-weight: 600; /* خط متقل */
  }
  .input-group-text {
    background-color: #0d6efd;
    color: #fff;
  }
</style>

<div class="container mt-5">

  <?php 
     if(isset($_SESSION['username'])){?>
       <div class="row justify-content-center">
         <div class="col-md-6">
           <div class="card card-custom">
             <div class="card-body p-4">
               <h3 class="text-center mb-4 card-title">
                 <i class="fa-solid fa-chalkboard-user"></i> Add Teacher
               </h3>

               <form method="POST">
                 <div class="mb-3">
                   <label class="form-label">First Name</label>
                   <div class="input-group">
                     <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                     <input type="text" name="first_name" class="form-control" placeholder="Enter first name">
                   </div>
                 </div>

                 <div class="mb-3">
                   <label class="form-label">Last Name</label>
                   <div class="input-group">
                     <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                     <input type="text" name="last_name" class="form-control" placeholder="Enter last name">
                   </div>
                 </div>

                 <div class="mb-3">
                   <label class="form-label">Email</label>
                   <div class="input-group">
                     <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                     <input type="email" name="email" class="form-control" placeholder="Enter email">
                   </div>
                 </div>

                 <div class="mb-3">
                   <label class="form-label">Subject</label>
                   <div class="input-group">
                     <span class="input-group-text"><i class="fa-solid fa-book-open"></i></span>
                     <input type="text" name="subject" class="form-control" placeholder="Enter subject">
                   </div>
                 </div>

                 <input type="hidden" name="user_id" value="<?php print $_SESSION['Id']?>">

                 <button type="submit" class="btn btn-primary w-100">
                   <i class="fa-solid fa-plus"></i> Submit
                 </button>
               </form>
             </div>
           </div>
         </div>
       </div>
  <?php } else {
      header("location:/school_system/users/login.php");
      exit;
  } ?>
</div>

<?php
   include_once('../footer.php');
?>

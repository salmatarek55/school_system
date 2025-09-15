<?php
include_once "../header.php";
include_once "../Conect.php";
if (isset($_POST['first_name'])) {
    $obgConect = new Conect();
    if ($obgConect->insert($_POST, 'student_info')) {
        // الانتقال الي صفحة جدول التلاميذ 
        // مطلوب تسجيل كوكيز لمعرفة اخر طالب تم اضافته و يتم عرض بيانات هذا الطالب فى الهوم بشكل احترافى 
        // 1-طريقة عرض ال cookies
         setcookie("laststudent", $_POST['first_name'], time()+(86400 * 7), '/');
          $_SESSION['success_msg'] = "✅ Student added successfully!";
         header('location:/school_system/student/index.php?add=success');
        exit;
        // print "<div class='alert alert-success'>yes you add</div>";   // مطلوب عن اضافة تلميذ جديد يظهر رساله للمستخدم تفيد بنجاح اضافة التلميذ alert or moadel bootstrap  
    } else {
        print "<div class='alert alert-danger'>❌ No studet was added</div>";
    }
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
<?php if (isset($_SESSION['username'])) { ?>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card card-custom">
          <div class="card-body p-4">
            <h3 class="text-center mb-4 card-title">
              <i class="fa-solid fa-user-graduate"></i> Add Student
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
                <label class="form-label">Age</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fa-solid fa-cake-candles"></i></span>
                  <input type="number" name="age" class="form-control" placeholder="Enter age">
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
  } ?>
</div>
<?php include_once "../footer.php";


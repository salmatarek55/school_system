<?php include_once "./header.php";
 ?>
  <style>
    body {
  margin: 0;
  padding: 0;
}
    .hero-section {
  background: url('/school_system/assets/schoolhome.jpeg') no-repeat center center/cover;
  min-height: 100vh;              
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}

.hero-section::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.hero-content {
  position: relative;
  z-index: 2;
  max-width: 700px;
  color: black;
}

.hero-content h1 {
  font-size: 3rem;
  font-weight: bold;
  color: black;
}

.hero-content p {
  font-size: 1.2rem;
  margin-bottom: 20px;
  color: black;
}
  </style>

<!-- content -->
<div class="row justify-content-center">
    <div class="col-12 text-center">
         <?php
           if(isset($_SESSION['username'])){
           print "<h1>welcome " . $_SESSION['username'] . "</h1>";

           }
        ?> 
<?php if(isset($_SESSION['username'])){ ?>  
<div class="container mt-5">
  <div class="row g-4"> 
    
    <!-- Student Card -->
       <div class="col-md-4">
          <div class="card h-100 d-flex flex-column" >
               <img class="card-img-top" src="assets/student.jpeg" alt="Student">
               <div class="card-body d-flex flex-column justify-content-between">
                   <h5 class="card-title text-center">Students</h5>
                   <a href="\school_system\student\index.php" class="btn btn-primary">Go to Student Show</a>
               </div>
          </div>
      </div>

    <!-- Teacher Card -->
     <div class="col-md-4 ">
        <div class="card h-100 d-flex flex-column">
           <img class="card-img-top" src="assets/teacher.jpeg" alt="Teacher">
           <div class="card-body d-flex flex-column justify-content-between">
               <h5 class="card-title text-center">Teachers</h5>
               <a href="\school_system\teacher\index.php" class="btn btn-primary">Go to Teacher Show</a>
           </div>
        </div>
    </div>

    <!-- Classroom Card -->
    <div class="col-md-4 ">
       <div class="card h-100 d-flex flex-column">
          <img class="card-img-top" src="assets/classroom.jpeg" alt="Classroom">
          <div class="card-body d-flex flex-column justify-content-between">
             <h5 class="card-title text-center">Classroom</h5>
             <a href="\school_system\classroom\index.php" class="btn btn-primary">Go to Classroom Show</a>
          </div>
       </div>
    </div>

  </div>
</div>
<!-- cookies -->
 <div class="container mt-5">
    <div class="card shadow h-100 text-center">
      <div class="card-header text-black">
          Last Added Student
        </div>
        <div class="card-body d-flex flex-column justify-content-between">
          <?php if(isset($_COOKIE['laststudent']) && !empty($_COOKIE['laststudent'])) { ?>
            <div>
              <h5 class="card-title"><?php echo htmlspecialchars($_COOKIE['laststudent']); ?></h5>
              <p class="card-text">This is the last student that was added to the database.</p>
            </div>
            <a href="/school_system/student/index.php" class="btn btn-primary mt-3 btn-sm d-block mx-auto" style="width: 500px;">View All Students</a>
          <?php } else { ?>
            <div>
              <h5 class="card-title">No Student Data Found</h5>
              <p class="card-text">The student information is not available right now.</p>
            </div>
            <a href="/school_system/student/add.php" class="btn btn-success mt-3 btn-sm d-block mx-auto" style="width: 500px;">Add New Student</a>
          <?php } ?>
        </div>
      </div>
    </div>
<?php } else { ?>  

<!-- Hero Section -->
<div class="hero-section d-flex align-items-center justify-content-center text-center text-white">
  <div class="hero-content">
    <h1 class="display-3 fw-bold">Welcome to Our School</h1>
    <p class="lead mb-4">
      We provide a modern school management system that helps you manage students, teachers, and classrooms with ease.
    </p>
    <a href="/school_system/users/login.php" class="btn btn-lg btn-primary px-5" style="color: black;">
      Login to Continue
    </a>
  </div>
</div>

<?php } ?>


<?php include_once "./footer.php"; ?>
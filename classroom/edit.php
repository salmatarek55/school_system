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
<div class="row justify-content-center">
    <div class="col-6 bg-info">
        <h1>page edit Classroom <?php print  $classroom['name'] ?></h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-6">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Name of Classroom</label>
                <input type="text" value="<?php print $classroom['name'] ?>" name='name' class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Number of Students</label>
                <input type="number" value="<?php print $classroom['number_students'] ?>" class="form-control" name='number_students'>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<?php
   include_once "../footer.php";
?>
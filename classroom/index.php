<?php
   include_once '../conect.php';
   $conect= new Conect();
   if (isset($_POST['Id'])) {
    if ($conect->delete('classrooms', $_POST['Id'])) {
        header('location:\school_system\classroom\index.php?delete=success');
        exit;
    }
}

$classroomData = $conect->select("classrooms");
   include_once '../header.php';
?>
<div class="row justify-content-center">
   <div class="col-6">
      <h1>welcome classroom show</h1>
   </div>
   <div class="row justify-content-center mt-5">
      <div class="col-6 text-center">
        <a href="/school_system/classroom/add.php" class="btn btn-success">Add new classroom</a>
        <?php
        if (isset($_GET['add']) && $_GET['add'] == "success") {
            print "<div class='alert alert-success'> you add classroom success</div>";
        }
        if (isset($_GET['delete']) && $_GET['delete'] == "success") {
            print "<div class='alert alert-danger'> you delete classroom success</div>";
        }
        if (isset($_GET['edit']) && $_GET['edit'] == "success") {
            print "<div class='alert alert-info'> you update classroom success</div>";
        }
        ?>
        <table class="table">
         <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">NumberofStudents</th>
              <th scope="col">Addby</th>
              <th scope="col">Delete</th>
              <th scope="col">Edit</th>
            </tr>
         </thead>
  <tbody>
    <?php foreach($classroomData as $key => $value){?>
      <tr>
        <th scope="row"><?=$key +1?></th>
        <td><?=$value['name']?></td>
        <td><?=$value['number_students']?></td>
        <td>
             <?= @$conect->selectOne('users',$value['user_id']) ['user_name']?>
        </td>
        <td>
           <form method="POST" onsubmit="return confirm('Are you sure to delete this classroom?')">
              <input type="hidden" name="Id" value="<?= $value['Id'] ?>">
               <input type="submit" class="btn btn-danger" value="Delete">
           </form>
        </td>
        <td>
             <a class="btn btn-info" href="/school_system/classroom/edit.php?Id=<?= $value['Id'] ?>">Edit</a>
        </td>
      </tr>
     <?php }?>
  </tbody>
</table>
      </div>
    </div>
</div>




<?php
   include_once '../footer.php';
?>
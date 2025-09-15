<?php
include_once "../Conect.php";
$conect = new Conect();

if (isset($_POST['Id'])) {
    if ($conect->delete('teachers', $_POST['Id'])) {
        header('location:/school_system/teacher/index.php?delete=success');
        exit;
    } else {
        header('location:/school_system/teacher/index.php?delete=fail');
        exit;
    }
}

$teacherData = $conect->select("teachers");
include_once "../header.php";
?>
<div class="row justify-content-center">
    <div class="col-6 ">
        <h1>welcome to Teacher show</h1>
    </div>
</div>
<div class="row justify-content-center mt-5">
    <div class="col-6 text-center">
        <a class="btn btn-success" href="/school_system/teacher/add.php">Add New Teacher</a>
        <?php
        if (isset($_GET['add']) && $_GET['add'] == "success") {
            print "<div class='alert alert-success'>You added a teacher successfully</div>";
        }
        if (isset($_GET['delete']) && $_GET['delete'] == "success") {
            print "<div class='alert alert-danger'>Teacher deleted successfully</div>";
        }
        if (isset($_GET['delete']) && $_GET['delete'] == "fail") {
            print "<div class='alert alert-warning'>Failed to delete teacher</div>";
        }
        if (isset($_GET['edit']) && $_GET['edit'] == "success") {
            print "<div class='alert alert-info'>Teacher updated successfully</div>";
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Added by</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teacherData as $key => $value) { ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $value['first_name'] ?></td>
                        <td><?= $value['last_name'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['subject'] ?></td>
                        <td><?= @$conect->selectOne('users', $value['user_id'])['user_name'] ?></td>
                        <td>
                            <form method="POST" onsubmit="return confirm('Are you sure you want to delete this teacher?')">
                                <input type="hidden" name="Id" value="<?= $value['Id'] ?>">
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-info" href="/school_system/teacher/edit.php?Id=<?= $value['Id'] ?>">Edit</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- container close -->
<?php include_once "../footer.php"; ?>

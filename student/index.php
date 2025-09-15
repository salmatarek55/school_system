<?php
include_once "../Conect.php";
$conect = new Conect();

if (isset($_POST['Id'])) {
    if ($conect->delete('student_info', $_POST['Id'])) {
        header('location:/school_system/student/index.php?delete=success');
        exit;
    } else {
        header('location:/school_system/student/index.php?delete=fail');
        exit;
    }
}

$studentData = $conect->select("student_info");
include_once "../header.php";
?>
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card shadow-lg rounded-3 p-4">
            <h1 class="mb-4 text-center">Welcome to Student Show</h1>

            <a class="btn btn-success mb-3" href="/school_system/student/add.php">Add New Student</a>

            <?php if (isset($_GET['add']) && $_GET['add'] == "success") { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check-circle"></i> Student added successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['delete']) && $_GET['delete'] == "success") { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-trash"></i> Student deleted successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['delete']) && $_GET['delete'] == "fail") { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-triangle-exclamation"></i> Failed to delete student!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['edit']) && $_GET['edit'] == "success") { ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-pen-to-square"></i> Student updated successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <table class="table table-striped table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Added by</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($studentData as $key => $value) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['first_name'] ?></td>
                            <td><?= $value['last_name'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['age'] ?></td>
                            <td><?= @$conect->selectOne('users', $value['user_id'])['user_name'] ?></td>
                            <td>
                                <form method="POST" onsubmit="return confirm('Are you sure you want to delete this student?')">
                                    <input type="hidden" name="Id" value="<?= $value['Id'] ?>">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-info" href="/school_system/student/edit.php?Id=<?= $value['Id'] ?>">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once "../footer.php"; ?>


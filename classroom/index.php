<?php
include_once '../conect.php';
$conect = new Conect();

if (isset($_POST['Id'])) {
    if ($conect->delete('classrooms', $_POST['Id'])) {
        header('location:/school_system/classroom/index.php?delete=success');
        exit;
    } else {
        header('location:/school_system/classroom/index.php?delete=fail');
        exit;
    }
}

$classroomData = $conect->select("classrooms");
include_once '../header.php';
?>
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card shadow-lg rounded-3 p-4">
            <h1 class="mb-4 text-center">Welcome to Classroom Show</h1>

            <a href="/school_system/classroom/add.php" class="btn btn-success mb-3">Add New Classroom</a>

            <?php if (isset($_GET['add']) && $_GET['add'] == "success") { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check-circle"></i> Classroom added successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['delete']) && $_GET['delete'] == "success") { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-trash"></i> Classroom deleted successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['delete']) && $_GET['delete'] == "fail") { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-triangle-exclamation"></i> Failed to delete classroom!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['edit']) && $_GET['edit'] == "success") { ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-pen-to-square"></i> Classroom updated successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <table class="table table-striped table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Number of Students</th>
                        <th>Added By</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($classroomData as $key => $value) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['number_students'] ?></td>
                            <td><?= @$conect->selectOne('users', $value['user_id'])['user_name'] ?></td>
                            <td>
                                <form method="POST" onsubmit="return confirm('Are you sure you want to delete this classroom?')">
                                    <input type="hidden" name="Id" value="<?= $value['Id'] ?>">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-info" href="/school_system/classroom/edit.php?Id=<?= $value['Id'] ?>">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once '../footer.php'; ?>

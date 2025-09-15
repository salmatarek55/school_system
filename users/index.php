<?php
include_once "../Conect.php";
$conect = new Conect();

if (isset($_POST['Id'])) {
    if ($conect->delete('users', $_POST['Id'])) {
        header('location:/school_system/users/index.php?delete=success');
        exit;
    } else {
        header('location:/school_system/users/index.php?delete=failed');
        exit;
    }
}

$userData = $conect->select("users");
include_once "../header.php";
?>

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card shadow-lg rounded-3 p-4">
            <h1 class="mb-4 text-center">Welcome to Users Show</h1>

            <a class="btn btn-success mb-3" href="/school_system/users/add.php">Add New User</a>

            <?php if (isset($_GET['add']) && $_GET['add'] == "success") { ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fa-solid fa-check-circle"></i> User added successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['delete']) && $_GET['delete'] == "success") { ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="fa-solid fa-trash"></i> User deleted successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['delete']) && $_GET['delete'] == "failed") { ?>
                <div class="alert alert-warning alert-dismissible fade show">
                    <i class="fa-solid fa-triangle-exclamation"></i> Cannot delete this user because it is linked to another record!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['edit']) && $_GET['edit'] == "success") { ?>
                <div class="alert alert-info alert-dismissible fade show">
                    <i class="fa-solid fa-pen-to-square"></i> User updated successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php } ?>

            <table class="table table-bordered table-hover mt-4">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userData as $key => $value) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['user_name'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td>
                                <form method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                    <input type="hidden" name="Id" value="<?= $value['Id'] ?>">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-info" href="/school_system/users/edit.php?Id=<?= $value['Id'] ?>">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once "../footer.php"; ?>


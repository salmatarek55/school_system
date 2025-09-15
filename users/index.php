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
    <div class="col-6 ">
        <h1 style="text-align:center;">Welcome to Users Show</h1>
    </div>
</div>

<div class="row justify-content-center mt-5">
    <div class="col-6 text-center">
        <a class="btn btn-success" href="/school_system/users/add.php">Add New Users</a>
        <?php
        if (isset($_GET['add']) && $_GET['add'] == "success") {
            print "<div class='alert alert-success alert-dismissible fade show mt-3'>
                      <i class='fa-solid fa-check-circle'></i> User added successfully!
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                   </div>";
        }
        if (isset($_GET['delete']) && $_GET['delete'] == "success") {
            print "<div class='alert alert-danger alert-dismissible fade show mt-3'>
                      <i class='fa-solid fa-trash'></i> User deleted successfully!
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                   </div>";
        }
        if (isset($_GET['delete']) && $_GET['delete'] == "failed") {
            print "<div class='alert alert-warning alert-dismissible fade show mt-3'>
                      <i class='fa-solid fa-triangle-exclamation'></i> Cannot delete this user because it is linked to a teacher!
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                   </div>";
        }
        if (isset($_GET['edit']) && $_GET['edit'] == "success") {
            print "<div class='alert alert-info alert-dismissible fade show mt-3'>
                      <i class='fa-solid fa-pen-to-square'></i> User updated successfully!
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                   </div>";
        }
        ?>
        <table class="table table-bordered table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userData as $key => $value) { ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $value['user_name'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td>
                            <form method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                <input type="hidden" name="Id" value="<?= $value['Id'] ?>">
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-info" href="/school_system/users/edit.php?id=<?= $value['Id'] ?>">Edit</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once "../footer.php"; ?>

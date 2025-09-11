<?php
include_once "../Conect.php";
$conect = new Conect();

if (isset($_POST['Id'])) {
    if ($conect->delete('users', $_POST['Id'])) {
        header('location:/school_system/users/index.php?delete=success');
        exit;
        // print "you delete record";
    }
}

$userData = $conect->select("users");
include_once "../header.php";
?>
<div class="row justify-content-center">
    <div class="col-6 ">
        <h1>welcome to users show</h1>
    </div>
</div>

<div class="row justify-content-center mt-5">
    <div class="col-6 text-center">
        <a class="btn btn-success" href="\school_system\users\add.php">Add New Users</a>
        <?php
        if (isset($_GET['add']) && $_GET['add'] == "success") {
            print "<div class='alert alert-success'> you add user success</div>";
        }
        if (isset($_GET['delete']) && $_GET['delete'] == "success") {
            print "<div class='alert alert-danger'> you delete user success</div>";
        }
        if (isset($_GET['edit']) && $_GET['edit'] == "success") {
            print "<div class='alert alert-info'> you update user success</div>";
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>

                </tr>
            </thead>
            <tbody>
                <?php
                // $i = 1;
                foreach ($userData as $key => $value) { ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $value['user_name'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td>
                            <form method="POST" onsubmit="return confirm('are you sure to delete user')">
                                <input type="hidden" name="Id" value="<?= $value['Id'] ?>">
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                        <td>
                           <a class="btn btn-info" href="/school_system/users/edit.php?id=<?= $value['Id'] ?>">Edit</a>


                        </td>
                    </tr>
                <?php
                    // $i++;
                } ?>

            </tbody>
        </table>
    </div>
</div>

<!-- container close -->
<?php include_once "../footer.php";

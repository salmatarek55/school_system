<?php
include_once "../Conect.php";
$conct = new Conect();
if (!isset($_GET['id'])) {
    die("Missing id");
}
$id = (int) $_GET['id'];
$user = $conct->selectOne('users', $id);


if (isset($_POST['user_name'])) {
    $conct->update($_POST, 'users', $user['Id']);
    header('location:/school_system/users/index.php?edit=success');
    exit;
}

include_once "../header.php";
?>
<div class="row justify-content-center">
    <div class="col-6 bg-info">
        <h1>page edit student <?php print  $user['user_name'] ?></h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-6">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">user name</label>
                <input type="text" value="<?php print $user['user_name'] ?>" name='user_name' class="form-control">
                <div class="form-text">add your user name.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name='email'>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name='password' class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<!-- close container -->
<?php include_once "../footer.php";

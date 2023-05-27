<?php
include_once '../libs/config.php';
include_once '../libs/library.php';
if (isset($_GET['data'])) {
    $id = $_GET['data'];

    $sql = "SELECT *,`users`.`id` AS `tagid`,`users`.`name` AS `uname`, `roles`.`name` AS `rolename`, `roles`.`id` AS `roleid` FROM `users`, `roles` WHERE `users`.`id`='".$id."' AND `users`.`role_id` = `roles`.`id`;";
    // echo $sql;

    $sqle = "SELECT * FROM `roles`";
    $querye = mysqli_query($conn, $sqle);

    $query = mysqli_query($conn, $sql);
    $no = mysqli_num_rows($query);
    if($no >= 1){
        $res = mysqli_fetch_assoc($query);
?>

<div class="card-header d-flex justify-content-around align-items-center">
    <div class="col-8">
        <h3>Users</h3>
    </div>
    <div class="col-4 d-flex justify-content-end">
        <a class="btn btn-success modality" href="#" data-targeted="add_user">Add user</a>
    </div>
</div>
<div class="card-body row">
    <form action="" method="post" class="col-lg-6 m-auto col-md-8 col-sm-12">
        <div class="form-group">
            <label class="form-label" for="nameInput">Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $res['uname']; ?>" id="nameInput" />
        </div>
        <div class="form-group">
            <label class="form-label" for="emailInput">Email:</label>
            <input type="email" class="form-control" value="<?php echo $res['email']; ?>" name="mail" id="emailInput" />
        </div>
        <div class="form-group">
            <label class="form-label" for="passwordInput">Pin:</label>
            <input type="text" class="form-control" name="password" id="passwordInput" />
        </div>
        <div class="form-group">
            <label class="form-label" for="roleInput">Role: <?php echo ucfirst($res['rolename']); ?></label>
            <select name="role" id="roleInput" class="form-control">
                <option value="" class="disabled text-muted">-- select --</option>
                <?php
                
                while ($row = mysqli_fetch_assoc($querye)) {
                    echo '<option value="' . $row['id'] . '"> ' . ucfirst($row['name']) . ' </option>';
                } ?>
            </select>
        </div>
        <div class="form-group my-2">
            <button type="submit" class="btn btn-success updater" name="update_user" value="<?php echo $res['tagid']; ?>" >Update</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>


<?php

    }
}
?>
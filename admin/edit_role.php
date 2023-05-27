<?php
include_once '../libs/config.php';
include_once '../libs/library.php';
if (isset($_GET['data'])) {
    $id = $_GET['data'];

    $sql = "SELECT * FROM `roles` WHERE `id`='$id';";

    $container = "SELECT * FROM `permissions` ORDER BY `permissions`.`permission` ASC;";
    $querye = mysqli_query($conn, $container);

    $used = "SELECT `permissions`.`permission` FROM `role_permission`, `permissions` WHERE `role_permission`.`role_id`='$id' AND `role_permission`.`permission_id` = `permissions`.`id`;";
    $squndler = mysqli_query($conn, $used);

    $ticked = [];
    while ($maker = mysqli_fetch_assoc($squndler)) {
        $ticked[$maker['permission']] = $maker['permission'];
    }

    $query = mysqli_query($conn, $sql);
    $no = mysqli_num_rows($query);
    if ($no >= 1) {
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
                    <label class="form-label" for="nameInput">Role:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $res['name']; ?>" id="nameInput" />
                </div>

                <div class="form-group d-flex flex-column">

                    <label class="form-label" for="permissInput">Permissions:</label>
                    <div class="w-100 d-flex flex-row row">
                        <?php
                        while ($row = mysqli_fetch_assoc($querye)) {
                            echo key_exists($row['permission'], $ticked)
                            ? '<div class="col-3" style="font-size: 12px"><input type="checkbox" class="form-check-input me-1" checked="true" data-pid="'.$row['id'].'" name="'.$row['permission'].'" id="permissInput-' . $row['id'] . '">' . str_replace('_', ' ', $row['permission']) . '</div>'
                            : '<div class="col-3" style="font-size: 12px"><input type="checkbox" class="form-check-input me-1" data-pid="'.$row['id'].'" name="'.$row['permission'].'" id="permissInput-' . $row['id'] . '">' . str_replace('_', ' ', $row['permission']) . '</div>';
                        } ?>
                    </div>
                </div>
                <div class="form-group my-2">
                    <button type="submit" class="btn btn-success updater" name="update_user" value="<?php echo $res['id']; ?>">Update</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>
            </form>
        </div>


<?php

    }
}
?>
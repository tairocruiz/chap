<?php
include_once '../libs/config.php';
include_once '../libs/library.php';

$sql = "SELECT * FROM `roles`";

$container = "SELECT * FROM `permissions` ORDER BY `permissions`.`permission` ASC;";
$querye = mysqli_query($conn, $container);

$query = mysqli_query($conn, $sql);
$no = mysqli_num_rows($query);
if ($no >= 1) {
    $res = mysqli_fetch_assoc($query);
?>

    <div class="card-header d-flex justify-content-around align-items-center">
        <div class="col-8">
            <h3>Roles</h3>
        </div>
        <div class="col-4 d-flex justify-content-end">
            <a class="btn btn-success modality" href="#" data-targeted="roles">
                <i class="fas fa-file-archive me-2 fa-fw"></i>
                List
            </a>
        </div>
    </div>
    <div class="card-body row">
        <form action="" method="POST" class="col-lg-6 m-auto col-md-8 col-sm-12">
            <div class="form-group">
                <label class="form-label" for="nameInput">Role:</label>
                <input type="text" class="form-control" name="name" id="nameInput" />
            </div>

            <div class="form-group d-flex flex-column">

                <label class="form-label" for="permissInput">Permissions:</label>
                <div class="w-100 d-flex flex-row row">
                    <?php
                    while ($row = mysqli_fetch_assoc($querye)) {
                        echo '<div class="col-3" style="font-size: 12px"><input type="checkbox" class="form-check-input me-1" data-pid="' . $row['id'] . '" name="' . $row['permission'] . '" id="permissInput-' . $row['id'] . '">' . str_replace('_', ' ', $row['permission']) . '</div>';
                    } ?>
                </div>
            </div>
            <div class="form-group my-2">
                <button type="submit" class="btn btn-success" name="add_role">Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </form>
    </div>
<?php
}

?>

<?php
include_once '../libs/config.php';
include_once '../libs/library.php';

$sql = "SELECT * FROM `permissions`";
$query = mysqli_query($conn, $sql);
$no = mysqli_num_rows($query);
$all = [];
while ($ts = mysqli_fetch_assoc($query)) {
    array_push($all, $ts['permission']);
}

?>

<div class="card-header d-flex justify-content-around align-items-center">
    <div class="col-8">
        <h3>Permissions</h3>
    </div>
    <div class="col-4 d-flex justify-content-end">
        <a class="btn btn-success modality" href="#" data-targeted="add_permissions">Add Permission</a>
    </div>
</div>
<div class="card-body row">
    <form action="" method="post" class="col-lg-6 m-auto col-md-8 col-sm-12">
        <div class="form-group">
            <label class="form-label" for="permissionInput">Name:</label>
            <input type="text" class="form-control" name="permission" id="permissionInput" />
        </div>
        
        <div class="form-group my-2">
            <button class="btn btn-success" name="add_permission" type="submit">Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>
<?php echo '<script> const permi = '.json_encode($all).' </script>'; ?>
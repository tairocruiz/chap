<?php
include_once '../libs/config.php';
include_once '../libs/library.php';

$sql = "SELECT * FROM `product_service`";
$query = mysqli_query($conn, $sql);
$no = mysqli_num_rows($query);


?>

<div class="card-header d-flex justify-content-around align-items-center">
    <div class="col-8">
        <h3>Services</h3>
    </div>
    <div class="col-4 d-flex justify-content-end">
        <a class="btn btn-success modality" href="#" data-targeted="add_service">Add Service</a>
    </div>
</div>
<div class="card-body row">
    <form action="" method="post" class="col-lg-6 m-auto col-md-8 col-sm-12">
        <div class="form-group">
            <label class="form-label" for="nameInput">Sevice Name:</label>
            <input type="text" class="form-control" name="name" id="nameInput" />
        </div>
        <div class="form-group">
            <label class="form-label" for="costInput">Cost:</label>
            <input type="text" class="form-control" name="cost" id="costInput" />
        </div>
        <div class="form-group">
            <label class="form-label" for="labelInput">label:</label>
            <select name="label" id="labelInput" class="form-control">
                <option value="" class=" disabled text-muted">-- select --</option>
                <?php while ($row = mysqli_fetch_assoc($query)) {
                    echo '<option value="' . $row['id'] . '"> ' . ucfirst($row['label']) . ' </option>';
                } ?>
            </select>
        </div>
        <div class="form-group my-2">
            <button class="btn btn-success" name="add_service" type="submit">Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>
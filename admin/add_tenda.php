<?php
include_once '../libs/config.php';
include_once '../libs/library.php';

$sql = "SELECT * FROM `product_service`";
$query = mysqli_query($conn, $sql);
$no = mysqli_num_rows($query);


?>

<div class="card-header d-flex justify-content-around align-items-center">
    <div class="col-8">
        <h3>Tendas</h3>
    </div>
    <div class="col-4 d-flex justify-content-end">
        <a class="btn btn-success modality" href="#" data-targeted="add_tenda">Add Tenda</a>
    </div>
</div>
<div class="card-body row">
    <form action="" method="post" class="col-lg-6 m-auto col-md-8 col-sm-12">
        <div class="form-group">
            <label class="form-label" for="nameInput">Name:</label>
            <input type="text" class="form-control" name="name" id="nameInput" />
        </div>
        <div class="form-group">
            <label class="form-label" for="customerInput">customer:</label>
            <input type="text" class="form-control" name="customer" id="customerInput" />
        </div>

        <div class="form-group">
            <label class="form-label" for="locationInput">Location:</label>
            <input type="text" class="form-control" name="location" id="locationInput" />
        </div>
        <div class="row w-100">
            <div class="form-group col-6">
                <label class="form-label" for="dueDateInput">Due date:</label>
                <input type="date" class="form-control" name="due_date" id="dueDateInput" />
            </div>
            <div class="form-group col-6">
                <label class="form-label" for="costInput">Cost:</label>
                <input type="text" class="form-control" name="cost" id="costInput" />
            </div>
        </div>
        <div class="form-group py-lg-1">
            <label class="form-check-label" for="typeInput">Scale:</label>
            <input type="radio" class="mx-lg-1" name="type" value="product" id="typeInput1" required />Quantify
            <input type="radio" class="mx-lg-1" name="type" value="service" id="typeInput2" />Qualify
        </div>
        <div class="form-group">
            <label class="form-label" for="roleInput">Item Label:</label>
            <select name="role" id="roleInput" class="form-control">
                <option value="" class=" disabled text-muted">-- select --</option>
                <?php while ($row = mysqli_fetch_assoc($query)) {
                    echo '<option value="' . $row['id'] . '"> ' . ucfirst($row['label']) . ' </option>';
                } ?>
            </select>
        </div>
        <div class="form-group my-2">
            <button class="btn btn-success" name="add_tenda" type="submit">Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>
<?php
include_once '../libs/config.php';
include_once '../libs/library.php';

$sql = "SELECT * FROM `roles`";
$query = mysqli_query($conn, $sql);
$no = mysqli_num_rows($query);


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
            <input type="text" class="form-control" name="name" id="nameInput" />
        </div>
        <div class="form-group">
            <label class="form-label" for="emailInput">Email:</label>
            <input type="email" class="form-control" name="mail" id="emailInput" />
        </div>
        <div class="form-group py-lg-1">
            <label class="form-check-label" for="genderInput">Gender:</label>
            <input type="radio" class="mx-lg-1" name="gender" value="male" id="genderInput1" required />Male
            <input type="radio" class="mx-lg-1" name="gender" value="female" id="genderInput2" />Female
        </div>
        <div class="form-group">
            <label class="form-label" for="passwordInput">Password:</label>
            <input type="password" class="form-control" name="password" id="passwordInput" />
        </div>
        <div class="form-group">
            <label class="form-label" for="roleInput">Role:</label>
            <select name="role" id="roleInput" class="form-control">
                <option value="" class=" disabled text-muted">-- select --</option>
                <?php while ($row = mysqli_fetch_assoc($query)) {
                    echo '<option value="' . $row['id'] . '"> ' . ucfirst($row['name']) . ' </option>';
                } ?>
            </select>
        </div>
        <div class="form-group my-2">
            <button class="btn btn-success" name="add_user" type="submit">Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>
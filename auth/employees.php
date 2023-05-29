<?php
include_once '../libs/config.php';
include_once '../libs/library.php';
session_start();

if (can('read_employees', $_SESSION['permissions'])) {
    $permi = getPermiId('read_employees', $conn);
    $sessid = getSessId($_SESSION['id'], $conn);
    $actlog = "INSERT INTO `activity_log` (`log_id`, `permission_id`) VALUES('" . $sessid . "', '" . $permi . "');";

$sql = "SELECT users.name, users.email, employees.id, employees.employee_no, employees.account_no, roles.name AS `level` FROM `employees`, users, roles WHERE users.role_id=roles.id AND employees.user_id=users.id;";
$query = mysqli_query($conn, $sql);
$no = mysqli_num_rows($query);

if ($no > 0) {

?>
    <div class="card-header bg-orange d-flex justify-content-around align-items-center">
        <div class="col-8">
            <h3 class="" style="font-weight: 600;">Workers</h3>
        </div>
        <div class="col-4 d-flex justify-content-end">
            <a class="btn btn-success modality" href="#" data-targeted="add_role">Add employee</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name-Email</th>
                    <th scope="col">Chap Reg-NO:</th>
                    <th scope="col">Level</th>
                    <th scope="col">Account No</th>
                    <?php if (can('delete_employees', $_SESSION['permissions']) || can('update_employees', $_SESSION['permissions'])) { ?>
                        <th scope="col" style="width: 10%;">Actions</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $loop = 1;

                while ($res = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <th scope="row"><?php echo $loop;
                                        $loop++; ?></th>
                        <td>
                            <?php echo ucfirst($res['name']); ?>
                            <br>
                        <small> <?php echo $res['email']; ?> </small>
                        </td>
                        <td><?php echo $res['employee_no']; ?></td>
                        <td><?php echo ucfirst($res['level']); ?></td>
                        <td><?php echo $res['account_no']; ?></td>
                        <?php if (can('delete_employees', $_SESSION['permissions']) || can('update_employees', $_SESSION['permissions'])) { ?>
                        <td>
                            <div class="col-12 d-flex flex-row align-items-center">
                                <div class="col-6 px-3">
                                    <a href="#role_edit/<?php echo $res['id']; ?>" title="Edit" class="text-white edition" data-edit="edit_role" data-tagid="<?php echo $res['id']; ?>">
                                 <i class="fas fa-edit fa-fw text-success"></i>
                                </a>
                                </div>
                                <div class="col-6 px-3">
                                    <form action="" class="w-100" method="post" onsubmit="return confirm('Are you sure wanna delete this')" id="delete-object-<?php echo $res['id']; ?>">
                                        <input type="text" name="del_id" value="<?php echo $res['id']; ?>" id="hiddenInput" hidden>
                                        <button type="submit" title="Delete" class="btn text-white bg-transparent" data-oid="<?php echo $res['id']; ?>" id="delete-btn-<?php echo $res['id']; ?>" name="delete_role">
                                        <i class="fas fa-trash-alt fa-fw text-danger"></i>
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <?php } ?>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

    <?php
        mysqli_query($conn, $actlog);
    }
} else {
    include 'includes/forbidden.php';
}

?>
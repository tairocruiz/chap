<?php
include_once '../libs/config.php';
include_once '../libs/library.php';
session_start();

if (can('read_tendas', $_SESSION['permissions'])) {
    $permi = getPermiId('read_tendas', $conn);
    $sessid = getSessId($_SESSION['id'], $conn);
    $actlog = "INSERT INTO `activity_log` (`log_id`, `permission_id`) VALUES('" . $sessid . "', '" . $permi . "');";


    $sql = "SELECT `tendas`.*, `product_service`.`label` FROM `tendas`, `product_service` WHERE `tendas`.`prodserv_id` = `product_service`.`id`;";
    $query = mysqli_query($conn, $sql);
    $no = mysqli_num_rows($query);

    if ($no > 0) {

?>
        <div class="card-header bg-orange d-flex justify-content-around align-items-center">
            <div class="col-8">
                <h3 class="" style="font-weight: 600;">Tendas</h3>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <a class="btn btn-success modality" href="#" data-targeted="add_tenda">Add Tenda</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tenda - Customer</th>
                        <th scope="col">Location</th>
                        <th scope="col">Label</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Quantity/Quality</th>
                        <th scope="col">Due</th>
                        <th scope="col" style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $loop = 1;

                    while ($res = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <th scope="row"><?php echo $loop;
                                            $loop++; ?></th>
                            <td><?php echo ucfirst($res['name']) . ' - ' . $res['customer']; ?></td>
                            <td><?php echo $res['location']; ?></td>
                            <td><?php echo ucfirst($res['label']); ?></td>
                            <td><?php echo ucfirst($res['cost']); ?></td>
                            <td><?php echo (($res['req_quantity'] !== NULL) ? $res['req_quantity'] : $res['serve_quality']); ?></td>

                            <td><?php echo ucfirst($res['due_date']); ?></td>
                            <td>
                                <div class="col-12 d-flex flex-row align-items-center">
                                    <div class="col-6 px-3">
                                        <a href="#tenda_edit/<?php echo $res['id']; ?>" title="Edit" class="text-white edition" data-edit="edit_tenda" data-tagid="<?php echo $res['id']; ?>">
                                            <i class="fas fa-edit fa-fw text-success"></i>
                                        </a>
                                    </div>
                                    <div class="col-6 px-3">
                                        <form action="" class="w-100" method="post" onsubmit="return confirm('Are you sure wanna delete this')" id="delete-object-<?php echo $res['id']; ?>">
                                            <input type="text" name="del_id" value="<?php echo $res['id']; ?>" id="hiddenInput" hidden>
                                            <button type="submit" title="Delete" class="btn text-white bg-transparent" data-oid="<?php echo $res['id']; ?>" id="delete-btn-<?php echo $res['id']; ?>" name="delete_tenda">
                                                <i class="fas fa-trash-alt fa-fw text-danger"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
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
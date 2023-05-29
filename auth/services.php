<?php

session_start();

include_once '../libs/config.php';
include_once '../libs/library.php';

if (can('read_services', $_SESSION['permissions'])) {
    $permi = getPermiId('read_services', $conn);
    $sessid = getSessId($_SESSION['id'], $conn);
    $actlog = "INSERT INTO `activity_log` (`log_id`, `permission_id`) VALUES('" . $sessid . "', '" . $permi . "');";

$sql = "SELECT `services`.*, `product_service`.*, `services`.`id` AS servi FROM `services`, `product_service` WHERE `product_service`.`id`=`services`.`prod_serv_id`;";
$query = mysqli_query($conn, $sql);
$no = mysqli_num_rows($query);

if ($no > 0) {

?>
    <div class="card-header bg-orange d-flex justify-content-around align-items-center">
        <div class="col-8">
            <h3 class="" style="font-weight: 600;">services</h3>
        </div>
        <div class="col-4 d-flex justify-content-end">
            <a class="btn btn-success modality" href="#" data-targeted="store">Add service</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Cost</th>
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
                        <td><?php echo ucfirst($res['label']); ?></td>
                        <td><?php echo $res['cost']; ?></td>
                        <td>
                            <div class="col-12 d-flex flex-row align-items-center">
                                <div class="col-6 px-3">
                                    <a href="#service_edit/<?php echo $res['servi']; ?>" title="Edit" class="text-white edition" data-edit="edit_service" data-tagid="<?php echo $res['servi']; ?>">
                                        <i class="fas fa-edit fa-fw text-success"></i>
                                    </a>
                                </div>
                                <div class="col-6 px-3">
                                    <form action="" class="w-100" method="post" onsubmit="return confirm('Are you sure wanna delete this')" id="delete-object-<?php echo $res['servi']; ?>">
                                        <input type="text" name="del_id" value="<?php echo $res['servi']; ?>" id="hiddenInput" hidden>
                                        <button type="submit" title="Delete" class="btn text-white bg-transparent" data-oid="<?php echo $res['servi']; ?>" id="delete-btn-<?php echo $res['servi']; ?>" name="delete_service">
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
} else {

?>

    <div class="card-header bg-white d-flex justify-content-around align-items-center">
        <div class="col-8">
            <h3 class="" style="font-weight: 600;">Services</h3>
        </div>
        <div class="col-4 d-flex justify-content-end">
            <a class="btn btn-success modality" href="#" data-targeted="store">Add Servicing</a>
        </div>
    </div>
    <div class="card-body">

        <span class="m-5 p-3">
            <h2>No Services, added yet</h2>
            
        </span>
    </div>
    
    <?php
        mysqli_query($conn, $actlog);
    }
} else {
    include 'includes/forbidden.php';
}
?>
<?php
include_once '../libs/config.php';
include_once '../libs/library.php';

$sql = "SELECT `logs`.`user_id`, `users`.`name`, `users`.`email`, `roles`.`name` AS `rolename`, COUNT(`logs`.`user_id`) AS `logs` FROM `logs` JOIN `users` ON `logs`.`user_id` = `users`.`id` JOIN `roles` ON `users`.`role_id` = `roles`.`id` GROUP BY `logs`.`user_id`, `users`.`name`, `users`.`email`, `roles`.`name`;";
$query = mysqli_query($conn, $sql);
$no = mysqli_num_rows($query);

if ($no > 0) {

?>
    <div class="card-header bg-white d-flex justify-content-around align-items-center">
        <div class="col-8">
            <h3 class="" style="font-weight: 600;">Logs</h3>
        </div>
        
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Role</th>
                    <th scope="col">Logs</th>
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
                        <td><?php echo ucfirst($res['name']); ?></td>
                        <td><?php echo ucfirst($res['rolename']); ?></td>
                        <td><?php echo $res['logs']; ?></td>
                        <td>
                            <div class="col-12 d-flex flex-row align-items-center">
                                <div class="col-6 px-3">
                                    <a href="#logs_show/<?php echo $res['user_id']; ?>" title="View" class="text-white edition" data-edit="user_logs" data-tagid="<?php echo $res['user_id']; ?>">
                                 <i class="fas fa-eye fa-fw text-success"></i>
                                </a>
                                </div>
                                <div class="col-6 px-3">
                                    <form action="" class="w-100" method="post" onsubmit="return confirm('Are you sure wanna delete this')" id="delete-object-<?php echo $res['user_id']; ?>">
                                        <input type="text" name="del_id" value="<?php echo $res['user_id']; ?>" id="hiddenInput" hidden>
                                        <button type="submit" title="Delete" class="btn text-white bg-transparent" data-oid="<?php echo $res['user_id']; ?>" id="delete-btn-<?php echo $res['user_id']; ?>" name="delete_logs">
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
}


?>
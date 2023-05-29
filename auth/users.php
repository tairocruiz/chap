<?php
session_start();
include_once '../libs/config.php';
include_once '../libs/library.php';
if (can('read_users', $_SESSION['permissions'])) {
    $permi = getPermiId('read_users', $conn);
    $sessid = getSessId($_SESSION['id'], $conn);
    $actlog = "INSERT INTO `activity_log` (`log_id`, `permission_id`) VALUES('" . $sessid . "', '" . $permi . "');";

    $sql = "SELECT *, `users`.`name` AS `uname`, `users`.`id` AS `uid`, `roles`.`name` AS `rolename` FROM `users`, `roles` WHERE `users`.`role_id` = `roles`.`id`;";
    $query = mysqli_query($conn, $sql);
    $no = mysqli_num_rows($query);


    if ($no > 0) {

?>
        <div class="card-header bg-orange d-flex justify-content-around align-items-center">
            <div class="col-8">
                <h3 class="" style="font-weight: 600;">Users</h3>
            </div>
            <?php if(can('create_users', $_SESSION['permissions'])){ ?>
                <div class="col-4 d-flex justify-content-end">
                    <a class="btn btn-success modality" href="#" data-targeted="add_user">Add user</a>
                </div>
            <?php } ?>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <?php if (can('update_users', $_SESSION['permissions']) || can('delete_users', $_SESSION['permissions'])) { ?>
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
                            <td><?php echo ucfirst($res['uname']); ?></td>
                            <td><?php echo $res['email']; ?></td>
                            <td><?php echo ucfirst($res['rolename']); ?></td>
                            <?php if (can('update_users', $_SESSION['permissions']) || can('delete_users', $_SESSION['permissions'])) { ?>
                                <td>
                                    <div class="col-12 d-flex flex-row align-items-center">
                                        <?php if (can('update_users', $_SESSION['permissions'])) { ?>
                                            <div class="col-6 px-3">
                                                <a href="#user_edit/<?php echo $res['uid']; ?>" title="Edit" class="text-white edition" data-edit="edit_user" data-tagid="<?php echo $res['uid']; ?>">
                                                    <i class="fas fa-edit fa-fw text-success"></i>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <?php if (can('delete_users', $_SESSION['permissions'])) { ?>
                                            <div class="col-6 px-3">
                                                <form action="" class="w-100" method="post" onsubmit="return confirm('Are you suer you wanna delete?')" id="delete-object-<?php echo $res['uid']; ?>">
                                                    <input type="text" name="del_id" value="<?php echo $res['uid']; ?>" id="hiddenInput" hidden>
                                                    <button type="submit" title="Delete" class="btn text-white bg-transparent" data-oid="<?php echo $res['uid']; ?>" name="delete_user">
                                                        <i class="fas fa-trash-alt fa-fw text-danger"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        <?php } ?>
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
}else {
    include 'includes/forbidden.php';
}

?>
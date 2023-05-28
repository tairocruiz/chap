<?php
include_once '../libs/config.php';
include_once '../libs/library.php';

if(isset($_GET['data'])){

$uid = $_GET['data'];

$sql = "SELECT users.name AS session_owner, activity_log.id as aid, logs.session, permissions.permission AS activity, DATE_FORMAT(activity_log.stamp, '%W %b ''%y %H:%i') AS stamp FROM logs, users, activity_log, permissions WHERE logs.id = activity_log.log_id AND logs.user_id=users.id AND logs.id='$uid' AND activity_log.permission_id=permissions.id;";
$query = mysqli_query($conn, $sql);
$no = mysqli_num_rows($query);

$sl = "SELECT `users`.`name` AS `owner`, `logs`.`session` FROM logs, users WHERE logs.user_id=users.id AND logs.id='$uid'; ";
$qr = mysqli_query($conn, $sl);
$user = mysqli_fetch_assoc($qr);

if ($no > 0) {

?>
    <div class="card-header bg-orange d-flex justify-content-around align-items-center">
        <div class="col-10">
            <h5 class="" style="font-weight: 600;"><?php echo ucfirst($user['owner']).'\'s Activities on session::'.$user['session']; ?> </h5>
        </div>
        
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Session ID</th>
                    <th scope="col">Activities</th>
                    <th scope="col">Time</th>
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
                        <td><?php echo $user['session']; ?></td>
                        <td><?php echo ucfirst($res['activity']); ?></td>
                        <td><?php echo ucfirst($res['stamp']); ?></td>
                        <td>
                            <div class="col-12 d-flex flex-row align-items-center">
                            
                                <div class="col-6 px-3">
                                    <form action="" class="w-100" method="post" onsubmit="return confirm('Are you sure wanna delete this')" id="delete-object-<?php echo $res['aid']; ?>">
                                        <input type="text" name="del_id" value="<?php echo $res['aid']; ?>" id="hiddenInput" hidden>
                                        <button type="submit" title="Delete" class="btn text-white bg-transparent" data-oid="<?php echo $res['aid']; ?>" id="delete-btn-<?php echo $res['aid']; ?>" name="delete_logs">
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
}

?>
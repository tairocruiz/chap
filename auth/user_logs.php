<?php
include_once '../libs/config.php';
include_once '../libs/library.php';

if(isset($_GET['data'])){

$uid = $_GET['data'];

$sql = "SELECT logs.id, logs.session, COUNT(activity_log.log_id) AS activities, DATE_FORMAT(logs.login, '%W %D %b ''%y %H:%i') AS login, DATE_FORMAT(logs.logout, '%W %D %b ''%y %H:%i') AS logout FROM logs INNER JOIN activity_log ON logs.id = activity_log.log_id WHERE logs.user_id='$uid' GROUP BY logs.id;";
$query = mysqli_query($conn, $sql);
$no = mysqli_num_rows($query);

$sl = "SELECT `name` FROM `users` WHERE `id`='$uid';";
$qr = mysqli_query($conn, $sl);
$user = mysqli_fetch_assoc($qr);

if ($no > 0) {

?>
    <div class="card-header bg-orange d-flex justify-content-around align-items-center">
        <div class="col-8">
            <h3 class="" style="font-weight: 600;"><?php echo ucfirst($user['name']).'\'s '; ?>Logs</h3>
        </div>
        
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Session ID</th>
                    <th scope="col">Activities</th>
                    <th scope="col">Login</th>
                    <th scope="col">Logout</th>
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
                        <td><?php echo $res['session']; ?></td>
                        <td><?php echo ucfirst($res['activities']); ?></td>
                        <td><?php echo ucfirst($res['login']); ?></td>
                        <td><?php echo ucfirst($res['logout']); ?></td>
                        <td>
                            <div class="col-12 d-flex flex-row align-items-center">
                                <div class="col-6 px-3">
                                    <a href="#logs_activities/<?php echo $res['id']; ?>" title="View" class="text-white edition" data-edit="log_activities" data-tagid="<?php echo $res['id']; ?>">
                                 <i class="fas fa-eye fa-fw text-success"></i>
                                </a>
                                </div>
                                <div class="col-6 px-3">
                                    <form action="" class="w-100" method="post" onsubmit="return confirm('Are you sure wanna delete this')" id="delete-object-<?php echo $res['id']; ?>">
                                        <input type="text" name="del_id" value="<?php echo $res['id']; ?>" id="hiddenInput" hidden>
                                        <button type="submit" title="Delete" class="btn text-white bg-transparent" data-oid="<?php echo $res['id']; ?>" id="delete-btn-<?php echo $res['id']; ?>" name="delete_logs">
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
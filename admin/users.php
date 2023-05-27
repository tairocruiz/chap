<?php
include_once '../libs/config.php';
include_once '../libs/library.php';

$sql = "SELECT *, `users`.`name` AS `uname`, `users`.`id` AS `uid`, `roles`.`name` AS `rolename` FROM `users`, `roles` WHERE `users`.`role_id` = `roles`.`id`;";
$query = mysqli_query($conn, $sql);
$no = mysqli_num_rows($query);
$cols = mysqli_fetch_fields($query);
$mysl = mysqli_fetch_all($query);
$actor = [];
$index = 0;  // Initialize the loop counter

foreach ($mysl as $row) {
    $actor[$index] = [];  // Create a new array for each row
    
    for ($j = 0; $j < sizeof($row); $j++) {
        $columnName = $cols[$j]->name;
        $columnValue = $row[$j];
        
        // echo "\$actor[$index]['$columnName'] = $columnValue<br>";
        $actor[$index][$columnName] = $columnValue;
    }
    
    $index++;  // Increment the loop counter
}

$list = json_encode($actor, true);
// var_dump($actor);

if ($no > 0) {

?>
    <div class="card-header bg-orange d-flex justify-content-around align-items-center">
        <div class="col-8">
            <h3 class="" style="font-weight: 600;">Users</h3>
        </div>
        <div class="col-4 d-flex justify-content-end">
            <a class="btn btn-success modality" href="#" data-targeted="add_user">Add user</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
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
                        <td><?php echo ucfirst($res['uname']); ?></td>
                        <td><?php echo $res['email']; ?></td>
                        <td><?php echo ucfirst($res['rolename']); ?></td>
                        <td>
                            <div class="col-12 d-flex flex-row align-items-center">
                                <div class="col-6 px-3">
                                    <a href="#user_edit/<?php echo $res['uid']; ?>" title="Edit" class="text-white edition" data-edit="edit_user" data-tagid="<?php echo $res['uid']; ?>">
                                 <i class="fas fa-edit fa-fw text-success"></i>
                                </a>
                                </div>
                                <div class="col-6 px-3">
                                    <form action="" class="w-100" method="post" onsubmit="return confirm('Are you sure wanna delete this')" id="delete-object-<?php echo $res['uid']; ?>">
                                        <input type="text" name="del_id" value="<?php echo $res['uid']; ?>" id="hiddenInput" hidden>
                                        <button type="submit" title="Delete" class="btn text-white bg-transparent" data-oid="<?php echo $res['uid']; ?>" id="delete-btn-<?php echo $res['uid']; ?>" name="delete_user">
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

        <table id="datatable"></table>
    </div>

<?php
}


?>
<script> 
    let wote = '<?php echo $list; ?>';
    console.log(wote)
    var data = JSON.parse(wote);

    // Set the number of rows to display per page
    var rowsPerPage = 8;

    // Create the datatable with pagination and specify the number of rows per page
    $(document).ready(function () {
        $('#datatable').DataTable({
        data: data,
        columns: [
            // Specify the column configuration based on your data structure
            { data: 'uid' },
            { data: 'uname' },
            { data: 'email' },
            { data: 'rolename' },
            // Add more columns as needed
        ],
        paging: true,
        pageLength: rowsPerPage
    });
    });
    
</script>
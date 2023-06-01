<?php
session_start();
include_once '../libs/config.php';
include_once '../libs/library.php';

$sql = "SELECT *,`users`.`id` AS `key`, `roles`.`id` AS `pinner`, `roles`.`name` AS `rolename`, `users`.`name` AS `uname` FROM `users`, `roles` WHERE `users`.`id`='" . $_SESSION['key'] . "'AND `users`.`role_id` = `roles`.`id`;";
$query = mysqli_query($conn, $sql);
$no = mysqli_num_rows($query);

$sequl = "SELECT `photo` FROM `users` WHERE `id`='".$_SESSION['key']."';";
$runnable = mysqli_query($conn, $sequl);
$kete = mysqli_fetch_assoc($runnable);

if (isset($_FILES['photoloader'])) {
    $targetDir = "images/";
    if (isset($_FILES["phicha"]) && $_FILES["picha"]["error"] == 0) {
        // Get the file details
        $fileName = basename($_FILES["picha"]["name"]);
        $filePath = $targetDir . $fileName;
    
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($_FILES["picha"]["tmp_name"], $filePath)) {
            // File upload success, store the file details in the database
            $sqlo = "UPDATE `users` SET `photo`='".$filePath."'";
            if ($conn->query($sqlo) === TRUE) {
                echo "File uploaded and stored in the database successfully.";
            } else {
                echo "Error: " . $sqlo . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if ($no > 0) {

?>
    <div class="card-header bg-orange d-flex justify-content-around align-items-center">
        <div class="col-12">
            <h3 class="" style="font-weight: 600;"><?php echo ucfirst($_SESSION['username']); ?></h3>
        </div>
    </div>
    <div class="card-body d-flex flex-lg-row flex-md-column align-items-center">
        <div class="col-lg-4">
            <div class="bg-light m-3 rounded-3 p-2 border-bt-orange-2 d-flex flex-column position-relative">
                <div class="col-12 pt-2 d-flex">
                    <img class="rounded-circle outline-orange m-auto" height="130px" src="<?php echo ($_SESSION['img'] !== NULL) ? $kete['photo'] : 'images/dummy_user.png'; ?>" alt="">
                    <form action="" method="" class="profile-photo-form position-absolute" enctype="multipart/form-data">
                        <input type="file" name="picha" id="photo" hidden>
                        <button type="button" class="position-relative border-0" id="phototrigger" name="upload">
                            <i class="fas fa-camera fa-2x fa-fw text-info position-absolute"></i>
                        </button>
                        <button type="submit">Submit</button>
                    </form>
                </div>

                <div class="col-12 p-3 ps-4 text-dark d-flex justify-content-center flex-column">
                    <hr class="my-2">
                    <h5 class="w-100 d-flex justify-content-center">Name: <?php echo ucfirst($_SESSION['username']); ?></h5>
                    <hr class="my-2">
                    <h5 class="w-100 d-flex justify-content-center">Role: <?php echo ucfirst($_SESSION['role']); ?></h5>
                </div>

            </div>
        </div>
        <div class="col-lg-8">
            <div class="col-12 m-auto bg-light rounded-3">
                <div id="activity col-12" class="tab activity">
                    <div class="tab-head col-12">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link" href="#desktop" data-bs-toggle="desktop">
                                    <i class="fa fa-desktop" aria-hidden="true"></i>
                                    Desktop
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#mia" data-bs-toggle="mia">
                                    <i class="fas fa-dochub fa-lg fa-fw"></i>
                                    Updates
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-body">
                        <div class="tab-content">
                            <div id="desktop" class="tab-pane"></div>
                            <div id="mia" class="tab-pane"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#phototrigger').click(function() {
                $('#photo').click(); // Programmatically trigger the file input click event
            });

            $('#photo').change(function() {
                var selectedFileName = $(this).val().split('\\').pop(); // Get the selected file name
                // Display the selected file name
                $.ajax({
                    type: "POST",
                    url: "profile.php",
                    data: "photoloader",
                    success: function (response) {
                        console.log(response);
                    }
                });
                console.log('Selected file: ' + selectedFileName);
            });

        });
    </script>

<?php
}


?>
<?php
require 'libs/library.php';
require 'libs/config.php';
// var_dump($_SERVER);
session_start();

if(isset($_SESSION['key']) && $_SESSION['address'] != null){
 header('location:auth/index.php');
}

// auth_check();
if (isset($_POST['submit'])) {
    $name = $_POST['email'];
    $pass = md5($_POST['password']);

    $sql = "SELECT *,`users`.`id` AS `key`, `roles`.`id` AS `pinner`, `roles`.`name` AS `rolename`, `users`.`name` AS `uname` FROM `users`, `roles` WHERE `email`='" . $name . "' AND `password`='" . $pass . "' AND `users`.`role_id` = `roles`.`id`;";
    $query = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($query);
    if (is_array($res)) {

        

        $_SESSION['key'] = $res['key'];
        $_SESSION['username'] = $res['uname'];
        $_SESSION['address'] = $res['email'];
        $_SESSION['role'] = $res['rolename'];
        $_SESSION['img'] = $res['photo'];
        $_SESSION['id'] = session_id() . base64_encode(Date('Y-m-d H:i:s'));
        $_SESSION['permissions'] = [];
        $session = $_SESSION['id'];

        $str = "INSERT INTO `logs`(`session`, `user_id`, `login`) VALUES ('$session', '" . $_SESSION['key'] . "', CURRENT_TIMESTAMP);";
        $run = mysqli_query($conn, $str);

        $win = "SELECT `permissions`.`permission` AS `activity` FROM `roles`, `role_permission`, `permissions` WHERE `roles`.`id`='" . $res['pinner'] . "' AND `role_permission`.`role_id`=`roles`.`id` AND `permissions`.`id`=`role_permission`.`permission_id`;";

        $call = mysqli_query($conn, $win);
        $triger = mysqli_num_rows($call);
        if ($triger > 0) {
            while ($key = mysqli_fetch_assoc($call)) {
                $_SESSION['permissions'][$key['activity']] = true;
            }
        }

        if ($run && ($_SESSION['role'] !== null)) {
            header('location:auth/index.php');
        } else if ($run && ($_SESSION['rolename'] == 'user' || $_SESSION['rolename'] == 'users')) {
            header('location:users/index.php');
        } else {
            header('location:' . $_SESSION['rolename'] . '/index.php');
        }
    }
}

?>

<?php require_once('includes/header.php'); ?>
<section class="container row m-auto pt-5">

    <div class="col-lg-10 col-md-10 col-sm-12 d-flex flex-column shadow m-auto mt-lg-5 mt-md-3 bg-white rounded-3 p-1 pb-4 align-items-center">
        <div id="shifter" class="col-12 d-flex flex-lg-row flex-md-column flex-sm-column m-auto p-1 pb-4 align-items-center" style="border-bottom: 2px solid red;">

            <div class="col-lg-6 col-sm-12 d-flex col-md-12 justify-content-center flex-column">
                <div class="w-100 overflow-hidden position-relative p-2 d-flex justify-content-center">
                    <img src="images/chap.png" alt="" class="" style="width: 60%; margin:auto">
                </div>
                <span class="d-flex justify-content-center">
                    <h3>
                        <i class="text-muted">A fine way to manage your Tenda.</i>
                    </h3>
                </span>
            </div>


            <div class="col-lg-6 col-sm-12 col-md-12 border-left" id="admition">
                <form class="form-group col-11 m-auto text-muted show" action="" method="post" enctype="multipart/form-data" id="login-form">
                    <div class="p-2 w-100">
                        <h4 class=" text-muted" style="text-align: center;">Log In</h4>
                    </div>
                    <div class="form-group my-1 p-2 row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required />
                        </div>
                    </div>
                    <div class="form-group p-2  row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required />
                        </div>
                    </div>

                    <div class="form-group p-2 row">
                        <div class="col-sm-2">Checkbox</div>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Remember Me.
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 m-auto d-flex justify-content-evenly ">
                            <button type="reset" class="btn btn-warning btn-group-lg">Reset</button>
                            <button type="submit" name="submit" class="btn btn-primary btn-group-lg">Sign in</button>
                        </div>
                    </div>
                </form>
                <form class="form-group col-11 m-auto text-muted hide" action="" method="post" enctype="multipart/form-data" id="register-form">
                    <div class="p-2 w-100">
                        <h4 class=" text-muted" style="text-align: center;">Register</h4>
                    </div>
                    <div class="form-group my-1 p-2 row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="inputName" placeholder="Your Name" required />
                        </div>
                    </div>
                    <div class="form-group my-1 p-2 row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required />
                        </div>
                    </div>
                    <div class="form-group p-2  row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required />
                        </div>
                    </div>
                    <div class="form-group p-2  row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Conf Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="conf_password" class="form-control" id="inputPassword" placeholder="Password" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 m-auto d-flex justify-content-evenly ">
                            <button type="reset" class="btn btn-warning btn-group-lg">Reset</button>
                            <button type="submit" name="register" class="btn btn-primary btn-group btn-block">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="w-100 d-flex flex-row justify-content-center pt-3">

            <a rel="noopener noreferrer" id="formChanger" class="text-decoration-none btn bg-light btn-group-lg" style="border: 1px solid red;">Register</a>
        </div>
    </div>



</section>
<script>
    $(document).on('click', '#formChanger', function() {
        const k = $(this);
        let timerInterval
       

        Swal.fire({
            position: 'center',
            icon: 'info',
            title: ' Wait..!',
            html: 'Perfoming some mesomarizing calc()',
            timer: 2300,
            timerProgressBar: true,
            customClass: 'bg-light shadow',
            didOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                    const content = Swal.getHtmlContainer()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                            b.textContent = Swal.getTimerLeft()
                        }
                    }
                }, 2300)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                ($(window).width() >= 992) ? $('#shifter').toggleClass('flex-lg-row flex-lg-row-reverse'): '';
                $('[id$="-form"').toggleClass('show hide');
                (k.html() == 'Register') ? k.html('&nbsp;Login&nbsp;'): k.html('Register');
                
                $('#admition').toggleClass('border-left border-right');
            }
        });
    });
</script>
<?php require_once('includes/footer.php'); ?>
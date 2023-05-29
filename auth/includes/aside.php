<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-chap-b-1 sidebar collapse">
    <!-- <div class="w-100 pt-3 pb-2 ps-2 shadow">
        <img src="<//?php// echo $_SESSION['img']; ?>" class=" rounded-circle me-2" alt="" height="48" />
        </?php echo ($_SESSION['address']); ?>
    </div> -->
    <div class="position-sticky pt-3">

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">

                    Dashboard
                </a>
            </li>
            <?php foreach ($column as $key) { ?>
                <?php
                foreach ($_SESSION['permissions'] as $permission => $true) {
                    $opera = explode('_', $permission);
                    if ($opera[0] == 'read') {
                        $resource = $opera[1];
                        if ($key->name == $resource) {
                ?>
                            <li class="nav-item">
                                <a class="nav-link menu" href="#">
                                    <span data-bs-feather="<?php echo $resource; ?>"></span>
                                    <?php echo ucfirst(str_replace('_', ' ', $resource)); ?>
                                </a>
                            </li>

                <?php }
                    }
                } ?>
            <?php } ?>
            <?php if (can('read_logs', $_SESSION['permissions'])) { ?>
                <li class="nav-item">
                    <a class="nav-link menu" aria-current="page" href="#">
                        <span data-bs-feather="logs"></span>
                        <i class="fas fa-notes-medical fa-fw"></i>
                        Logs
                    </a>
                </li>
            <?php } ?>

        </ul>
        <?php if($_SESSION['role'] == 'user'){ ?>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>User part</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-bs-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link menu" href="#">
                    <span data-bs-feather="feedback"></span>
                    <i class="fa fa-cogs me-2 text-info" aria-hidden="true"></i>
                    Feedbacks
                </a>
            </li>
        </ul>
        <?php }?>
        <?php if($_SESSION['role'] == 'worker'){ ?>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Ongoing Tendas</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-bs-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link menu" href="#">
                    <span data-bs-feather="schedules"></span>
                    <i class="fa fa-paper-plane me-2 text-info" aria-hidden="true"></i>
                    Tenda Schedules
                </a>
            </li>
        </ul>
        <?php }?>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-bs-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link menu" href="#">
                    <span data-bs-feather="file-text"></span>
                    <i class="fa fa-user-md me-2 text-info" aria-hidden="true"></i>
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="#">
                    <span data-bs-feather="file-text"></span>
                    <i class="fa fa-cogs me-2 text-info" aria-hidden="true"></i>
                    Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="#">
                    <span data-bs-feather="file-text"></span>
                    <i class="fas fa-sign-out-alt fa-fw me-2 text-info"></i>
                    Logout
                </a>
            </li>

        </ul>
        <div class="w-100 p-2 mt-5 ps-2">
            <small class="text-warning mt-2">
                <i>Developed By </i>
                <a href="https://github.com/tairocruiz" class=" text-decoration-none text-alice">
                    Tairo<sup>&copy;</sup>
                </a>
            </small>
        </div>
    </div>
</nav>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-chap-b-1 sidebar collapse">
    <!-- <div class="w-100 pt-3 pb-2 ps-2 shadow">
        <img src="<//?php// echo $_SESSION['img']; ?>" class=" rounded-circle me-2" alt="" height="48" />
        </?php echo ($_SESSION['address']); ?>
    </div> -->
    <div class="position-sticky pt-3">

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link menu active" aria-current="page" href="index.php">
                    <span data-bs-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <?php foreach ($column as $key) { ?>
                <li class="nav-item">
                    <a class="nav-link menu" href="#">
                        <span data-bs-feather="<?php echo $key->name; ?>"></span>
                        <?php echo ucfirst(str_replace('_', ' ', $key->name)); ?>
                    </a>
                </li>
            <?php } ?>

        </ul>

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
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="#">
                    <span data-bs-feather="file-text"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="#">
                    <span data-bs-feather="file-text"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="#">
                    <span data-bs-feather="file-text"></span>
                    Year-end sale
                </a>
            </li>
        </ul>
    </div>
</nav>
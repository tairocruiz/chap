<nav class="navbar navbar-dark sticky-top bg-chap-b-1 flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3 d-flex flex-row" href="index.php">
    <div class="rounded-circle bg-white p-2" style="height: 40px; width:inherit" >
      <img src="../images/chap.png" alt="" width="100%" height="auto">
    </div>
    <h3 class="ps-2" style="color: orange; font-weight:600">Chap Co.</h3>
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-2">
    <li class="nav-item text-nowrap dropdown-center position-relative">
      <a class="nav-link pe-1 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo ($_SESSION['img'] == null) ? '<i class="fas fa-user-alt fa-sm fa-fw"></i>' : '<img src="' . $_SESSION['img'] . '" class="rounded-circle me-2" alt="" height="42" />' ?>
        <?php echo ($_SESSION['address']); ?>
      </a>

      <ul class="dropdown-menu position-absolute mt-2" aria-labelledby="dropdownMenuLink">
        <li>
          <a class="dropdown-item" href="#">
            <i class="fa fa-cog text-muted" aria-hidden="true"></i>
            Settings
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="#">
            <i class="fa fa-user-secret text-muted" aria-hidden="true"></i>
            Profile
          </a>
        </li>
        <li>
          <a class="dropdown-item logout" href="#">
            <i class="fas fa-sign-out-alt fa-sm fa-fw text-muted"></i>
            Sign Out
          </a>
        </li>
      </ul>
    </li>

  </ul>
</nav>
<?php
session_start();

?>

<?php require 'libs/library.php'; ?>
<?php require_once('includes/header.php'); ?>


<section class="container-fluid m-0">
    <div class="m-5 row p-4">
        <span class="m-3 bg-info p-2 py-4 mx-auto">
            <h3>403 Error!</h3>
            Access Forbidden.
            <p>
                It's look like you don't have permission to this resource!
            </p>
            <?php
            if ($_SESSION['key']) { ?>
                <a href="<?php echo $_SESSION['role'] . '/'; ?>">
                    <i class="fa fa-backward" aria-hidden="true"></i>
                    Back
                </a>
            <?php } ?>
        </span>
    </div>

</section>

<?php require_once('includes/footer.php'); ?>
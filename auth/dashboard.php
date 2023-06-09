<?php include_once '../libs/library.php'; ?>
<?php session_start(); ?>
<?php auth_check(); ?>
<?php require_once('../includes/header.php'); ?>
<?php include('wrapper.php');

$ql = "SELECT * FROM `counter`;";
$qry = mysqli_query($conn, $ql);
$counter = mysqli_fetch_assoc($qry);
$column = mysqli_fetch_fields($qry);
// echo $column[2]->name;
?>



<?php include('includes/top.php'); ?>
<?php
// $message = "Hello.! Aman";
if ($message != '') {
?>
  <script>
    console.log('<?php echo $message; ?>');
    let timerInterval
    Swal.fire({
      title: 'Message',
      html: '<?php echo $message; ?>',
      timer: 6300,
      timerProgressBar: true,
      showCancelButton: true,
      cancelButtonText: 'Cancel',
      cancelButtonAriaLabel: 'decline',
      didOpen: () => {
        Swal.showLoading()
        timerInterval = setInterval(() => {
          const content = Swal.getHtmlContainer()
          if (content) {
            const b = content.querySelector('b')
            if (b) {
              b.textContent = Swal.getTimerRight()
            }
          }
        }, 500)
      },
      willClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      /* Read more about handling dismissals below */
      if (result.dismiss === Swal.DismissReason.timer) {
        console.log('I was closed by the timer')
      }
    })
  </script>
<?php
}

?>

<div class="container-fluid">
  <div class="row">

    <!--  aside navigation -->
    <?php include('includes/aside.php'); ?>
    <!--  aside navigation ends -->

    <!-- main page/dash -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="card col-12 mt-lg-4 mt-sm-2 border-0 bg-dark text-alice shadow" id="wrapper">
        <div class="card-header bg-dark d-flex justify-content-around align-items-center">
          <div class="col-12">
            <h3 class="" style="font-weight: 600;">Dashboard</h3>
          </div>
          
        </div>
        <div class="card-body d-flex flex-row row">
          <!-- <?php //var_dump($_SESSION); 
                ?> -->
          <?php
          foreach ($column as $field) {
          ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card m-lg-2 m-sm-1 my-1 w-100 border-be-orange-2">
                <div class="card-body">
                  <h5 class="card-title chap-text-o"><?php echo ucfirst(str_replace('_', ' ', $field->name)); ?></h5>
                  <h4 class="text-black"><?php echo $counter[$field->name]; ?></h4>
                  <a class="nav-link menu text-black" href="#">
                    <span data-bs-feather="<?php echo $field->name; ?>"></span>
                    <?php echo ucfirst(str_replace('_', ' ', $field->name)); ?>
                  </a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>

        </div>
      </div>
    </main>
    <!-- main page/dash ends -->

  </div>
</div>

<script>
  $(document).ready(function() {
    $(document).on('click', 'a.logout', function() {
      window.location.href = "logout.php";
    });

    $(document).on('click', 'a.nav-link.menu', function() {
      const sq = $(this).find('span').data('bs-feather')
      $.ajax({
        type: "GET",
        url: sq + ".php",
        data: 'all_users',
        success: function(response) {
          // console.log(this);
          $('#wrapper').html(response);
        }
      });
    });

    // dulin
    $(document).on('click', 'a.modality', function() {
      const ado = $(this).data('targeted');
      $.ajax({
        type: "GET",
        url: ado + ".php",
        data: ado,
        success: function(response) {
          console.log(this)
          $('#wrapper').html(response);
        }
      });
    });

    $(document).on('input', 'input#permissionInput', function() {
      $(permi).each(function(index, element) {
        if ($('#permissionInput').val() == element) {
          Swal.fire({
            title: 'Warning',
            text: 'This permission is alredy exist. use another word',
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
          }).then((result) => {
            $('#permissionInput').val('');
          })
        }
      });
    });

    $(document).on('click', 'a.edition', function() {
      const fl = $(this).data('edit');
      const ident = $(this).data('tagid');

      $.ajax({
        type: "GET",
        url: fl + ".php",
        data: "data=" + ident,
        success: function(response) {
          console.log(this)
          $('#wrapper').html(response);
        }
      });
    });

    // rolepermission input 
    $(document).on('click', 'input[id^="permissInput-"]', function() {
      if (!$(this).attr('chacked')) {

      }
    });

    $(document).on('click', 'button[id^="delete-btn-"]', function(e) {
      e.preventDefault();
      let y = $(this).data('oid');
      Swal.fire({
        title: 'Warning',
        text: 'This process id irrevessible. Are you sure you want to delete selected item',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
      }).then((result) => {
        if (result.isConfirmed) {
          // $(`#delete-object-${y}`).trigger('submit');
          $.ajax({
            type: 'POST',
            url: 'dashboard.php',
            data: {
              del_id: y
            },
            success: function(response) {
              console.log(this);
            },
            error: function(xhr, status, error) {
              console.error(error);
            }

          });

        } else {
          return false;
        }
      })
    });


   
  });
</script>
<?php require_once('../includes/footer.php'); ?>
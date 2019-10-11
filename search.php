<?php
include("includes/config.php");
session_start();
if (isset($_SESSION["userLogged"])) {
  $userLogged = $_SESSION['userLogged'];
} else {
  header('LOCATION: login.php');
}
if (isset($_GET['search'])) {
  $search = $_GET['search'];
} else {
  header('LOCATION: index.php');
}
$Page_title = "Search Users";
include("includes/header.php");
?>
<!-- main content -->
<div class="row m-0">
  <!-- sideNav -->
  <?php include("includes/sideNav.php") ?>
  <!-- main content -->
  <div class="col-12 col-md-11 p-0">
    <!-- topNav -->
    <?php include('includes/topNav.php'); ?>
    <!-- main content -->
    <main class="p-4 wow fadeIn" data-wow-duration="2s" data-wow-delay="0s">
      <div class="container">
        <div class="row">
          <div class="col-md-9 p-3 mb-5">
            <!-- users -->
            <div class="card mx-4 songs-may-like">
              <div class="card-header font-weight-bold pb-0">Users</div>
              <div class="card-body pt-2">
                <div class="albums d-flex flex-wrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = mysqli_query($con, "SELECT * FROM users WHERE userName LIKE '%$search%'");
                      if (mysqli_fetch_row($query) == 0) {
                        echo 'No Users Found';
                      }
                      $i = 0;
                      while ($row = mysqli_fetch_array($query)) {
                        $i++;
                        echo '<tr><th scope="row">' . $i . '</th><th scope="row">' . $i . '</th></tr>';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<?php
include("includes/footer.php"); ?>
<script>
  new WOW().init();
</script>
</body>

</html>
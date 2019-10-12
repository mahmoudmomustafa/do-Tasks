<?php
include("includes/config.php");
if (isset($_SESSION["userLogged"])) {
  $userLogged = $_SESSION['userLogged'];
} else {
  header('LOCATION: login.php');
}
if (isset($_GET['userName'])) {
  $userName = $_GET['userName'];
  $query = mysqli_query($con, "SELECT * FROM users WHERE userName='$userName'");
  if (mysqli_num_rows($query) == 1) {
    $row = $query->fetch_assoc();
  }
} else {
  header('Location: index.php');
}
$Page_title = $row["fullName"];
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
    <main class="p-4 row m-0 wow fadeIn" data-wow-duration="2s" data-wow-delay="0s">
      <div class="col-12 col-md-8">
        <!-- task table -->
        <div class="card mx-4">
          <div class="card-header font-weight-bold text-xl">Tasks</div>
          <div class="card-body pt-2">
            <div class="d-flex flex-wrap">
              <table class="table table-borderless table-responsive table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">State</th>
                    <th scope="col">Added at</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $id = $row["id"];
                  $query = mysqli_query($con, "SELECT * FROM tasks WHERE userID='$id'");
                  if (mysqli_fetch_row($query) == 0) {
                    echo 'No Tasks yet';
                  }
                  $i = 0;
                  while ($rows = mysqli_fetch_array($query)) {
                    $i++;
                    echo '<tr><th scope="row">' . $i . '</th><th scope="row">' . $rows["title"] . '</th></th><th scope="row">' . $rows["description"] . '</th></th><th scope="row">' . $rows["state"] . '</th></th><th scope="row">' . $rows["added_at"] . '</th></tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- profile -->
      <div class="col-12 col-md-4 sm:mt-3 bg-gray-800">
        <div class="max-w-sm rounded overflow-hidden shadow-lg py-3">
          <div class="px-6 pt-6 pb-3 text-center">
            <i class="lni-user text-6xl text-white mt-8"></i>
          </div>
          <div class="px-6 py-4">
            <div class="font-bold text-2xl mb-2 text-center text-gray-400"><?php echo ucwords($row["fullName"]) ?></div>
            <p class="text-gray-500 text-center text-xl font-bold"><?php echo '@' . $row["userName"] ?></p>
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
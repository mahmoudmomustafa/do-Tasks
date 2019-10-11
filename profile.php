<?php
include("includes/config.php");
session_start();
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
    <?php include('includes/topNav.php');?>
    <!-- main content -->
    <main class="p-4 row m-0 wow fadeIn" data-wow-duration="2s" data-wow-delay="0s">
      <div class="col-8">tasks table</div>
      <div class="col-4">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
          <div class="px-6 py-4">
            <div class="font-bold text-2xl mb-2 text-center text-gray-400"><?php echo ucwords($row["fullName"]) ?></div>
            <p class="text-gray-500 text-center text-xl font-bold"><?php echo '@' . $row["userName"] ?></p>
          </div>
          <div class="px-6 py-4">
            <span class="inline-block text-center bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#photography</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#travel</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#winter</span>
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
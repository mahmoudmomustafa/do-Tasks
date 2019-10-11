<?php
session_start();
if (isset($_SESSION["userLogged"])) {
  $userLogged = $_SESSION['userLogged'];
} else {
  header('LOCATION: login.php');
}
$Page_title = "Dashboard";
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
        <div class="max-w-sm w-full lg:max-w-full lg:flex">
          <div class="h-48 lg:h-auto lg:w-1/2 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('assets/imgs/home.png');background-position:center;" title="Welcome">
          </div>
          <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
              <div class="text-gray-900 font-bold text-2xl mb-2">Welcome !</div>
              <div class="text-gray-900 font-bold text-3xl mb-3 pl-4"><?php echo ucwords($userLogged["fullName"]); ?></div>
              <p class="text-gray-800 font-bold text-xl px-4 mb-3 text-base">You Can Create Your tasks as much as you Want.</p>
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded mx-4 mt-4">
                Create Your tasks Now <i class="lni-plus pl-2"></i>
              </button>
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
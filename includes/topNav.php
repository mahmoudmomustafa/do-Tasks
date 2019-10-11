<nav class="navbar navbar-expand-lg bg-transparent wow fadeInDown" data-wow-duration="2s" data-wow-delay="0s">
  <div class="div overflow-auto w-100 container">
    <!-- search -->
    <form class="form-inline float-left position-relative" action="search.php" method="get">
      <input class="form-control pl-5 border-0 placeholder-gray-500 text-white rounded-full" name="search" type="search" placeholder="Search" aria-label="Search" style="width:300px;background:#ffffff30">
      <i class="lni-search position-absolute pl-3 text-gray-300"></i>
    </form>
    <!-- userName -->
    <div class="float-right">
      <span class="text-xl text-white font-medium"><?php echo ucwords($userLogged["fullName"]); ?></span>
    </div>
  </div>
</nav>
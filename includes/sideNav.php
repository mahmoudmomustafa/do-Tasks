<div class="col-1 p-0" style="min-width:min-content;">
  <div class="sideNav wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0s">
    <div class="container">
      <!-- brand -->
      <div class="brand py-3">
        <a href="index.php" class="text-white hover:text-gray-500 hover:no-underline wow fadeInDown" data-wow-duration="2s" data-wow-delay="1s" data-toggle="tooltip" data-placement="right" title="Apple">
          <i class="lni-apple"></i>
        </a>
      </div>
      <!-- navs -->
      <div class="navs my-4">
        <ul class="text-center text-2xl">
          <!-- dashboard -->
          <li class="nav-list shadow text-white rounded mb-3 wow fadeIn" data-wow-duration="2s" data-wow-delay="2s" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a href="index.php" class="hover:no-underline">
              <i class="lni-pulse"></i>
            </a>
          </li>
          <!-- profile -->
          <li class="nav-list shadow text-white rounded mb-3 wow fadeIn" data-wow-duration="2s" data-wow-delay="2s" data-toggle="tooltip" data-placement="right" title="Profile">
            <a href="profile.php?userName=<?php echo $userLogged["userName"];  ?>" class="hover:no-underline">
              <i class="lni-user"></i>
            </a>
          </li>
          <!-- state -->
          <li class="nav-list shadow text-white rounded mb-3 wow fadeIn" data-wow-duration="2s" data-wow-delay="2s" data-toggle="tooltip" data-placement="right" title="State">
            <a href="#" class="hover:no-underline">
              <i class="lni-bar-chart"></i>
            </a>
          </li>
          <!-- logout -->
          <li class="nav-list shadow text-red-600 rounded mb-3 content-end wow fadeIn" data-wow-duration="2s" data-wow-delay="2s" data-toggle="tooltip" data-placement="right" title="Sign Out">
            <a href="login.php" class="hover:no-underline">
              <i class="lni-exit text-red"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
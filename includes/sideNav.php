<div class="col-1 p-0" style="min-width:min-content;">
  <div class="sideNav wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0s">
    <div class="container">
      <!-- brand -->
      <div class="brand py-3">
        <a href="index.php" class="hover:no-underline wow fadeInDown" data-wow-duration="2s" data-wow-delay="1s" data-toggle="tooltip" data-placement="right" title="Hash">
          <i class="lni-slack text-gray-400 hover:text-blue-400"></i>
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
          <!-- logout -->
          <li class="nav-list shadow text-red-600 rounded mb-3 content-end wow fadeIn" data-wow-duration="2s" data-wow-delay="2s" data-toggle="tooltip" data-placement="right" title="Sign Out">
            <a href="login.php?out=logout" class="hover:no-underline">
              <i class="lni-power-switch text-red hover:text-red-800"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_SESSION['userLogged'])) {
  header('location:index.php');
}
$Page_title = "Register Page";
$nav = array("Have an account ?", "login.php", "Login");
include("includes/header.php");
include("includes/nav.php");
?>
<!-- content -->
<div class="main position-relative" id="main">
  <div class="container">
    <!-- error -->
    <div class="position-absolute d-flex flex-coulmn" style="top:5%;right:10px;">
      <div class="toast" v-for="(val , key) in errors">
        <div class="toast-body position-relative" v-text="val"></div>
      </div>
    </div>
    <div class="d-flex justify-content-center align-center">
      <div class="col-0 col-md-5 col-lg-6">
        <div class="d-flex justify-content-center align-items-center h-100 wow slideInLeft" data-wow-duration="2s" data-wow-delay="0s">
          <img src="assets/imgs/up.svg" style="width:35vw" alt="Welcome">
        </div>
      </div>
      <div class="col-12 col-md-7 col-lg-6">
        <div class="p-4 my-3 content rounded">
          <div class="container">
            <div class="main-content">
              <!-- header -->
              <div class="header pt-2">
                <h1 class="font-weight-bold text-white text-3xl wow fadeInDown" data-wow-duration="2s" data-wow-delay="0s">Create your account.</h1>
              </div>
              <!-- form -->
              <div class="mt-4 wow fadeIn" data-wow-duration="2s" data-wow-delay="0s">
                <form class="w-full max-w-lg">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <!-- Full name -->
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                      <label class="block text-gray-100 text-sm font-bold mb-2" for="grid-full-name">
                        Full Name :
                      </label>
                      <input class="shadow-lg bg-blue-900 appearance-none border-0 rounded w-full p-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline" id="grid-full-name" type="text" placeholder="Full Name" v-model="fullName">
                    </div>
                    <!-- userName -->
                    <div class="w-full md:w-1/2 px-3">
                      <label class="block text-gray-100 text-sm font-bold mb-2" for="grid-user-name">
                        UserName :
                      </label>
                      <input class="shadow-lg bg-blue-900 appearance-none border-0 rounded w-full p-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline" id="grid-user-name" type="text" placeholder="UserName" v-model="userName">
                    </div>
                  </div>
                  <!-- email -->
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block text-gray-100 text-sm font-bold mb-2" for="grid-email">
                        Email :
                      </label>
                      <input class="shadow-lg bg-blue-900 appearance-none border-0 rounded w-full p-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline" id="grid-email" type="email" placeholder="Email Address" v-model="email">
                    </div>
                    <!-- error -->
                    <p class="text-red-500 text-xs italic"></p>
                  </div>
                  <!-- passwords -->
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <!-- password -->
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                      <label class="block text-gray-100 text-sm font-bold mb-2" for="grid-repassword">
                        Password :
                      </label>
                      <input class="shadow-lg bg-blue-900 appearance-none border-0 rounded w-full p-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline" id="grid-password" type="password" placeholder="Password" autocomplete="none" v-model="password">
                      <!-- error -->
                      <p class="text-red-500 text-xs italic"></p>
                    </div>
                    <!-- confirm name -->
                    <div class="w-full md:w-1/2 px-3">
                      <label class="block text-gray-100 text-sm font-bold mb-2" for="grid-repassword">
                        Confirm Password :
                      </label>
                      <input class="shadow-lg bg-blue-900 appearance-none border-0 rounded w-full p-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline" id="grid-repassword" type="password" placeholder="Confirm Password" autocomplete="none" v-model="rePassword">
                    </div>
                  </div>
                  <!-- submit -->
                  <div class="flex items-center justify-between">
                    <button class="bg-blue-500 shadow hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click.prevent="register()">
                      Sign Up
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- footer -->
<?php include("includes/footer.php") ?>
<script>
  new WOW().init();
  var app = new Vue({
    el: "main",
    data: {
      fullName: "",
      userName: "",
      email: "",
      password: "",
      rePassword: "",
      errors: []
    },
    methods: {
      register() {
        axios.post('api/userReg.php', this.$data)
          //handle success
          .then(function(response) {
            app.errors = []
            if (response.data == "") {
              window.location.href = "index.php"
            }
            app.errors = response.data;
            app.error();
          })
          //handle error
          .catch(function(error) {
            console.log(error)
          });
      },
      error() {
        setTimeout(() => {
          app.errors = [];
        }, 15000);
      }
    }
  })
</script>
</body>

</html>
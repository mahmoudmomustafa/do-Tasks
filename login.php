<?php 
session_start();
if(isset($_SESSION['userLogged'])){
  header('location:index.php');
}
if (isset($_REQUEST['out'])) {
  session_destroy();
}
$Page_title = "Login Page";
$nav = array("Need an account ?", "register.php", "Register");
include("includes/header.php");
include("includes/nav.php");
?>
<!-- content -->
<div class="main position-relative" id="main">
  <div class="container">
    <!-- error -->
    <div class="toast position-absolute" style="top:5%;right:10px;" v-for="err in errors" :key="err.Error">
      <div class="toast-body position-relative" v-text="err.Error"></div>
    </div>
    <div class="d-flex justify-content-center align-center">
      <div class="col-0 col-md-5 col-lg-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0s">
        <img src="assets/imgs/welcome.svg" class="m-auto" style="width:25vw" alt="Welcome">
      </div>
      <div class="col-12 col-md-7 col-lg-6">
        <div class="p-4 my-3 content rounded">
          <div class="container">
            <div class="main-content">
              <!-- header -->
              <div class="header pt-2 wow fadeInDown" data-wow-duration="2s" data-wow-delay="0s">
                <h1 class="font-weight-bold text-white text-3xl">Welcome back !</h1>
                <h4 class="font-weight-bold text-gray-400 my-2 pl-2 text-xl">Login to your account.</h4>
              </div>
              <!-- form -->
              <div class="w-full max-w">
                <form class="px-8 pt-6 pb-8 mb-4 wow fadeIn" data-wow-duration="2s" data-wow-delay="0s">
                  <!-- email -->
                  <div class="mb-4">
                    <label class="block text-gray-100 text-sm font-bold mb-2" for="mail">
                      Email Address :
                    </label>
                    <input class="shadow-lg bg-blue-900 appearance-none border-0 rounded w-full p-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline" id="mail" type="email" placeholder="Email Address" v-model="email">
                  </div>
                  <!-- password -->
                  <div class="mb-6">
                    <label class="block text-gray-100 text-sm font-bold mb-2" for="password">
                      Password :
                    </label>
                    <input class="shadow-lg bg-blue-900 appearance-none rounded w-full p-3 text-gray-400 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Password" autocomplete="none" v-model="password">
                    <!-- error -->
                    <p class="text-red-500 pl-3 text-base font-bold italic" v-text="this.errors['Error']"></p>
                  </div>
                  <!-- submit -->
                  <div class="flex items-center justify-between">
                    <button class="bg-blue-500 shadow hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click.prevent='onSubmit()'>
                      Sign In
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-white" href="#">
                      Forgot Password?
                    </a>
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
    el: "#main",
    data: {
      email: "",
      password: "",
      errors: []
    },
    methods: {
      onSubmit() {
        axios.post('api/userLog.php', this.$data)
          //handle success
          .then(function(response) {
            app.errors = [];
            if(response.data == ""){
              window.location.href = "index.php"
            }
            console.log(response)
            app.errors.push(response.data);
            app.error();
          })
          //handle error
          .catch(error => {
            console.log(error)
          })
      },
      error() {
        setTimeout(() => {
          // app.errors = [];
        }, 15000);
      }
    }
  })
</script>
</body>

</html>
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
    <main id="task" class="p-4 wow fadeIn" data-wow-duration="2s" data-wow-delay="0s">
      <div class="container">
        <!-- wel div -->
        <div class="max-w-sm w-full lg:max-w-full lg:flex">
          <div class="h-48 lg:h-auto lg:w-1/2 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('assets/imgs/home.png');background-position:center;" title="Welcome">
          </div>
          <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
            <div class="wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">
              <div class="text-gray-900 font-bold text-2xl mb-2">Welcome !</div>
              <div class="text-gray-900 font-bold text-3xl mb-3 pl-4"><?php echo ucwords($userLogged["fullName"]); ?></div>
              <p class="text-gray-800 font-bold text-xl px-4 mb-3 text-base">You Can Create Your tasks as much as you Want.</p>
              <button class="bg-blue-500 hover:bg-blue-700 text-white self-center font-bold py-2 px-4 border border-blue-700 rounded-full mx-4 mt-4" data-toggle="modal" data-target="#create">
                Create Your tasks Now <i class="lni-plus pl-2"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- form -->
        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-2xl font-bold text-gray-700" id="createTitle">Create Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="text-red-600">&times;</span>
                </button>
              </div>
              <div class="modal-body pb-0">
                <form class="w-full max-w-lg">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Task title" v-model="title">
                      <!-- error -->
                      <p class="text-red-500 text-xs italic" v-if="errors['title'] != 0" v-text="errors['title']"></p>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                      <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" v-model="state">
                          <option selected disabled>State</option>
                          <option value="incomplete">InComplete</option>
                          <option value="completed">Completed</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                      <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" placeholder="Task Description" rows="5" v-model="description"></textarea>
                      <!-- error -->
                      <p class="text-gray-600 text-xs italic" v-if="errors['description'] != 0" v-text="errors['description']"></p>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer border-0">
                <button type="button" class="btn bg-red-600 text-white hover:text-red-500 border-red-600 hover:border-red-300 hover:bg-red-300" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-teal-400 text-white hover:text-blue-700 border-teal-400 hover:border-teal-600 hover:bg-teal-600" @click.prevent="create()">Create</button>
              </div>
            </div>
          </div>
        </div>
        <!-- state -->
        <div class="max-w-sm w-full lg:max-w-full lg:flex justify-content-center mt-5">
          <!-- done -->
          <div class="mx-auto mb-5 border-0 lg:border-gray-400 bg-transparent rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal md:m-8 w-64 justify-content-center align-content-center position-relative h-64">
            <div class="position-absolute rounded-full border-8 border-blue-500 shadow w-100 h-100" style="left:0;background:#56aff95e;z-index:-1">
            </div>
            <div class="wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">
              <div class="text-gray-100 text-center font-bold text-2xl mb-2">Done</div>
              <div class="text-gray-400 text-center font-bold text-xl mb-2">0%</div>
            </div>
          </div>
          <!-- undone -->
          <div class="mx-auto mb-5 border-0 lg:border-gray-400 bg-transparent rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal md:m-8 w-64 justify-content-center align-content-center position-relative h-64">
            <div class="position-absolute rounded-full border-8 border-red-500 shadow w-100 h-100" style="left:0;background:#f565658f;z-index:-1">
            </div>
            <div class="wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">
              <div class="text-gray-100 text-center font-bold text-2xl mb-2">Undone</div>
              <div class="text-gray-400 text-center font-bold text-xl mb-2">0%</div>
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
  var app = new Vue({
    el: "#task",
    data: {
      title: "",
      description: "",
      state: "",
      errors: []
    },
    methods: {
      create() {
        axios.post('api/task.php', this.$data)
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
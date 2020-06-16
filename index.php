
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php include('includes/meta.php');?>

    <title>Welcome to Tabuler &mdash; Tabuler</title>
    <?php include('includes/link.php');?>
    
  </head>

  <body class="animsition h-100vh">

    <!-- Preloader -->
    <?php include('includes/preloader.php');?>

    <!-- Topbar -->
    <header class="topbar topbar-secondary topbar-expand-lg topbar-brown h-70px">
      <?php include('includes/header.php');?>
    </header>
    <!-- END Topbar -->

    <!-- Main container header-inverse bg-img style="background-image: url(assets/img/gallery/1.jpg)"  data-overlay="7"-->
    <main class="main-container bg-white">
      <header class="header h-75vh mb-0 hero-section b-1 border-brown m-2">
        <div class="container">
          <div class="row w-100">
            <!--  -->
            <div class="col-md-6 order-2 order-md-1">
              <div class="center-v d-none d-md-block">
                <h1 class="header-title display-2 font-weight-500" data-aos="fade-right">
                  <small class="subtitle text-white d-block">Welcome</small>
                  <span class="text-brown font-weight-bold">&CenterDot; Tabuler &CenterDot;</span> 
                </h1>
                <p class="lead text-dark fs-20">Timetable scheduling system for schools using genetic algorithm for optimise time sharing and allocation.</p>
                <a href="login" class="btn btn-outline btn-brown btn-lg d-inline w-150px mt-4 rounded-lg">Continue</a>
              </div>
              <div class="center-v d-md-none d-block text-center">
                <h1 class="header-title font-weight-500 aos-init aos-animate h1" data-aos="fade-right">
                  <span class="text-brown font-weight-bold">· Tabuler ·</span> 
                </h1>
                <p class="text-dark">Timetable scheduling system for schools using genetic algorithm for optimise time sharing and allocation.</p>
                <a href="login" class="btn btn-outline btn-brown btn-lg d-inline w-150px rounded-lg">Continue</a>
              </div>
            </div>
            <!--  -->
            <div class="col-md-6 order-1 order-md-2">
              <!-- <img class="img-fluid" src="assets/img/tabuler/hero-img.svg" alt=""> -->
              <div class="center-v text-center img-hov-fadeout" data-aos="fade-left">
                <div class="spinner-brown spinner-ball"></div>
                <img class="img-fluid w-100" src="assets/img/tabuler/dashboard-collection.svg" alt="">
                <!-- <i class="w-400px text-brown" data-i8-icon="overtime"></i> -->
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- <div class="main-content">
        <section class="bg-new-hover">
          <div class="container">
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-8">
                <form class="card">
                  <div class="card-header">
                    <div class="media align-items-center">
                      <span class="avatar avatar-sm bg-primary"><i class="fa fa-folder"></i></span>
                      <div class="media-body">
                        <p><strong>Photos</strong></p>
                        <time datetime="2018-07-14 20:00">Aug 17, 2016</time>
                      </div>
                      <div>
                        <a class="hover-info" href="#" data-provide="tooltip" title="More info"><i class="fa fa-info"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label class="text-uppercase text-fader fw-500 fs-11">Your Name</label>
                      <input class="form-control" type="text" value="" placeholder="">
                    </div>
                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label class="text-uppercase text-fader fw-500 fs-11">Your Email</label>
                        <input class="form-control" type="text" value="hos@thethemes.io">
                      </div>

                      <div class="form-group col-lg-6">
                        <label class="text-uppercase text-fader fw-500 fs-11">Your Phone</label>
                        <input class="form-control" type="text" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="text-uppercase text-fader fw-500 fs-11">Your Message</label>
                      <textarea class="form-control" rows="5"></textarea>
                    </div>

                    <div class="flexbox">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" checked>
                        <label class="custom-control-label">Send me a copy</label>
                      </div>

                      <button class="btn btn-bold rounded-lg btn-w-xl btn-primary">Send Message</button>
                    </div>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>




      </div> --><!--/.main-content -->

      <!-- Footer -->
      <footer class="site-footer">
        <?php include('includes/footer.php') ?>
      </footer>
      <!-- END Footer -->

    </main>
    <!-- END Main container -->

    <?php include('includes/script.php');?>

  </body>
</html>

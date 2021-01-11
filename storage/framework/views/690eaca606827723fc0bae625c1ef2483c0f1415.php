 <nav class="navbar absolute transparent navbar-expand-lg nav-uppercase">
  <div class="container flex-row justify-content-center">
    <div class="navbar-brand"><a href="index.html"><img src="#" srcset="<?php echo e(asset('')); ?>public/web_assets/style/images/logo.png 1x, <?php echo e(asset('')); ?>public/web_assets/style/images/logo@2x.png 2x" alt="" /></a></div>
    <div class="navbar-other ml-auto order-lg-3">
      <ul class="navbar-nav flex-row align-items-center" data-sm-skip="true">
        <li class="nav-item">
          <div class="navbar-hamburger d-lg-none d-xl-none ml-auto"><button class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button></div>
        </li>
        <li class="nav-item d-none d-lg-block pl-0"><a href="<?php echo e(route('signup')); ?>" class="btn btn-default m-0">Register</a></li>
      </ul>
      <!-- /.navbar-nav -->
    </div>
    <!-- /.navbar-other -->
    <div  class="navbar-collapse offcanvas-nav">
      <div class="offcanvas-header d-lg-none d-xl-none">
        <a href="index.html"><img src="#" srcset="<?php echo e(asset('')); ?>public/web_assets/style/images/logo-light.png 1x, <?php echo e(asset('')); ?>public/web_assets/style/images/logo-light@2x.png 2x" alt="" /></a>
        <button class="plain offcanvas-close offcanvas-nav-close"><i class="jam jam-close"></i></button>
      </div>
      <ul  class="navbar-nav mx-auto">
        <li class="nav-item"><a  class="nav-link" href="<?php echo e(route('home')); ?>">হোম</a>
          
          <!--/.dropdown-menu -->
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#!">আমাদের সম্পর্কে
        </a>
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#!">লিডার বোর্ড
        </a>
      
        </li>
        <li class="nav-item"><a class="nav-link" href="#!">সকল কুইজ</a>
          
          
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#!">বন্ধুদের সাথে শেয়ার করুন</a>
      
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#!">অন্যান্য
        </a>
          <ul class="dropdown-menu">
            
            <li><a class="dropdown-item" href="blog2.html">আপনাদের জিজ্ঞাসা
            </a></li>
            <li><a class="dropdown-item" href="blog3.html">সাহায্য
            </a></li>
            <li><a class="dropdown-item" href="blog4.html">যোগাযোগ করুন</a></li>
           
            
          </ul>
        </li>
      </ul>
      <!-- /.navbar-nav -->
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>
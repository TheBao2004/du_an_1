  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <h2 class="text-center brand-text font-weight-light">SMARTFL</h2>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="http://localhost/-project_1/public/client/assets/image/avatar.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Fullname</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="<?php echo _WEB_HOST_ROOT_ADMIN; ?>" class="nav-link <?php echo empty($_GET['module'])?'active':''; ?>">
              <i class="fa fa-home mx-2"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview <?php echo getActive(['blog_type', 'blog'])?'menu-open':''; ?>">
            <a href="" class="nav-link <?php echo getActive(['blog_type', 'blog'])?'active':''; ?>">
              <i class="fa fa-blog mx-2"></i>
              <p>
                Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?module=blog" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lists</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?module=blog_type" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Type</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview <?php echo getActive(['course_type', 'course'])?'menu-open':''; ?>">
            <a href="" class="nav-link <?php echo getActive(['course_type', 'course'])?'active':''; ?>">
              <i class="fa fa-video mx-2"></i>
              <p>
                Course
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?module=course" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lists</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?module=course_type" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Type</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php echo getActive(['exam', 'exam_type'])?'menu-open':''; ?>">
            <a href="" class="nav-link <?php echo getActive(['exam', 'exam_type'])?'active':''; ?>">
              <i class="fab fa-earlybirds mx-2"></i>
              <p>
                Exam
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?module=exam" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lists</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?module=exam_type" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Type</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php echo getActive(['exam', 'exam_type'])?'menu-open':''; ?>">
            <a href="" class="nav-link <?php echo getActive(['exam', 'exam_type'])?'active':''; ?>">
            <i class="fa fa-book mx-2"></i>
              <p>
                Sách
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?module=book" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?module=book_type" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Test
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
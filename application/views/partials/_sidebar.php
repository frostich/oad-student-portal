<div class="sidebar" data-color="green" data-background-color="white" data-image="<?php echo base_url('assets/img/logo.png'); ?>">
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      OFFICE OF ADMISSIONS
    </a>
  </div>
  <!-- Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
  Tip 2: you can also add an image using data-image tag -->
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item <?php if ($page == 1) echo 'active'; else '' ?>">
        <a class="nav-link" href="gr-grade">
          <i class="material-icons">format_list_numbered_rtl</i>
          <p>Grades</p>
        </a>
      </li>
      <?php 
        if($_SESSION['account_type'] == 1){
            echo '<li class="nav-item '; if ($page == 2) echo 'active'; else ''; echo '">
                    <a class="nav-link" href="gr-student">
                    <i class="material-icons">groups</i>
                    <p>Students</p>
                    </a>
                </li>';
        }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="gr-logout">
          <i class="material-icons">input</i>
          <p>Logout</p>
        </a>
      </li><!-- 
      <li class="nav-item <?php if ($page == 2) echo 'active'; else '' ?>">
        <a class="nav-link" href="gr-profile">
          <i class="material-icons">person</i>
          <p>User Profile</p>
        </a>
      </li> -->
    </ul>
  </div>
</div>
 <?php require '../connection/dbconnect.php'; ?>
 <?php include '../api/sessions.php'; ?>
 <?php header('Content-Type: text/html; charset=ISO-8859-1');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include '../api/functions.php';
  ?>
 <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="../images/icon/Etrashok-logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>                        
                        </li>    
                          <?php if($_SESSION['login_role'] == 1){ ?>     
                        <li>
                            <a  class="js-arrow" href="#">
                            <i class="fa fa-user"></i> User <i class="fas fa-angle-down"></i></a>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                     <a href="approved-user.php">Approved</a>
                                </li>
                                <li>
                                     <a href="unapproved-user.php">Unapproved</a>
                                </li> 
                                <li>
                                     <a href="user.php">All Users</a>
                                </li>                                   
                            </ul>
                        </li>                         
                      	<?php } ?>                                      
                        <li class="has-sub">
                            <a class="js-arrow" href="../admin-pages/sitio.php">
                                <i class="fas fa-map-marker-alt"></i> Sitio</a>                        
                        </li>   
                        <li>
                            <a  class="js-arrow" href="#">
                            <i class="fa fa-balance-scale"></i> Laws & Policies 
                            <span class="arrow admin nav-arrow">
                                    <i class="fas fa-angle-left"></i>        
                            </span>
                            </a>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                     <a href="../admin-pages/policies-prohibited-fines-penalties.php">Prohibited Acts Fines & Penalties</a>
                                </li>
                                <li>
                                     <a href="../admin-pages/violation-list.php">List of violation</a>
                                </li>                                                                  
                            </ul>
                        </li>  
                        <li class="has-sub">
                            <a class="js-arrow" href="../admin-pages/waste-category.php">
                               <i class="fa fa-recycle"></i> Waste Category</a>                        
                        </li>  
                        <li class="has-sub">
                            <a class="js-arrow" href="../admin-pages/waste-classifcation.php">
                               <i class="fas fa-seedling"></i> Waste Classification</a>                        
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="../images/icon/Etrashok-logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>                      
                        </li>
                         <?php if($_SESSION['login_role'] == 1){ ?>     
                        <li>
                            <a  class="js-arrow" href="#">
                                <i class="fa fa-user"></i> User 
                                <span class="arrow admin nav-arrow">
                                    <i class="fas fa-angle-left"></i>        
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                     <a href="approved-user.php">Approved</a>
                                </li>
                                <li>
                                     <a href="unapproved-user.php">Unapproved</a>
                                </li> 
                                <li>
                                     <a href="user.php">All Users</a>
                                </li>                                   
                            </ul>
                        </li>
                      	<?php } ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="../admin-pages/sitio.php">
                                <i class="fas fa-map-marker-alt"></i> Sitio</a>                        
                        </li>
                        <li>
                            <a  class="js-arrow" href="#">
                            <i class="fa fa-balance-scale"></i> Laws & Policies 
                            <span class="arrow admin nav-arrow">
                                    <i class="fas fa-angle-left"></i>        
                            </span>
                            </a>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                     <a href="../admin-pages/policies-prohibited-fines-penalties.php">Prohibited Acts Fines & Penalties</a>
                                </li>
                                <li>
                                     <a href="../admin-pages/violation-list.php">List of violation</a>
                                </li>                                                                  
                            </ul>
                        </li>  
                         <li class="has-sub">
                            <a class="js-arrow" href="../admin-pages/waste-category.php">
                               <i class="fa fa-recycle"></i> Waste Category</a>                        
                        </li> 
                        <li class="has-sub">
                            <a class="js-arrow" href="../admin-pages/waste-classifcation.php">
                               <i class="fas fa-tasks"></i> Waste Classification</a>                        
                        </li> 

                        <li class="has-sub">
                            <a class="js-arrow" href="../admin-pages/roles.php">
                               <i class="fas fa-users"></i> Roles</a>                        
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="../admin-pages/violation-list-admin.php">
                               <i class="fas fa-ban"></i> Violation</a>                        
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="../admin-pages/clearanceList.php">
                               <i class="fas fa-certificate"></i> Clearance Request</a>                        
                        </li>
                      
                       
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            
                                             <img src="../images/<?php echo $_SESSION['avatar']; ?>" alt="" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="../admin-pages/profile.php"><?php echo $_SESSION['login_user']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="../admin-pages/profile.php">
                                                        <img src="../images/<?php echo $_SESSION['avatar']; ?>" alt="" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="../admin-pages/profile.php"><?php echo $_SESSION['login_user']; ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $_SESSION['login_email']; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="../admin-pages/profile.php">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="../admin-pages/profile.php">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../api/logout-api.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
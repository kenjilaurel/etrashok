  <?php require '../connection/dbconnect.php'; ?>
 <?php include '../api/sessions.php'; ?>
 <?php header('Content-Type: text/html; charset=ISO-8859-1');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include '../api/functions.php';
?>
 <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="../images/icon/Etrashok-logo.png" alt="CoolAdmin" />
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li class="has-sub">
                                <a href="../user-pages/dashboard.php">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                    <span class="bot-line"></span>
                                </a>                              
                            </li>  

                            <?php if($_SESSION['login_role'] == 3 || $_SESSION['login_role'] > 4){ ?> 
                            <li class="has-sub">
                                <a href="#">
                                     <i class="fa fa-recycle"></i>
                                    <span class="bot-line"></span>Waste Management</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="../user-pages/r-segregation.php">Segregation</a>
                                    </li>
                                    <li>
                                       <a href="#">History</a>
                                    </li>
                                 
                                </ul>
                            </li>
                            <?php } ?>

                            <?php if($_SESSION['login_role'] == 2){ ?> 
                            <li class="has-sub">
                                <a href="#">
                                     <i class="fas fa-warehouse"></i>
                                    <span class="bot-line"></span>Waste Collection</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="../user-pages/c-uncollected-waste.php">Uncollected Waste</a>
                                    </li>
                                    <li>
                                       <a href="../user-pages/c-collected-waste.php">Collected Waste</a>
                                    </li>
                                 
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-file-alt"></i>
                                    <span class="bot-line"></span>Report</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <!-- <li>
                                        <a href="../user-pages/report-waste-collection.php">Waste Collection</a>
                                    </li> -->
                                    <li>
                                       <a href="../user-pages/report-violation.php">Violation</a>
                                    </li>
                                 
                                </ul>
                            </li>
                            <?php } ?>

                            <?php if($_SESSION['login_role'] == 3){ ?> 
                                <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-certificate"></i>
                                    <span class="bot-line"></span>Certificates</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="../user-pages/barangayClearance.php">Barangay Clearance</a>
                                    </li>
                                  
                                 
                                </ul>
                            </li>
                            <?php } ?>
                            

                            <?php if($_SESSION['login_role'] == 4 ){ ?> 
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fa fa-recycle"></i>
                                    <span class="bot-line"></span>Waste Management</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="../user-pages/f-classify-waste.php">Classify collected waste</a>
                                    </li>
                                    <li>
                                       <a href="../user-pages/sell-waste.php">Sell Classified Waste</a>
                                    </li>
                                 
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-file-alt"></i>
                                    <span class="bot-line"></span>Report</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="#">Income Report</a>
                                    </li>
                                     <li>
                                       <a href="../user-pages/report-violation2.php">Violation</a>
                                    </li>
                                   
                                </ul>
                            </li>

                            <?php } ?>

                            <li class="has-sub">
                                <a href="#">
                                     <i class="fa fa-balance-scale"></i>
                                    <span class="bot-line"></span>Laws & Policies</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                         <a href="../user-pages/policies-prohibited-fines-penalties.php">Prohibited Acts Fines & Penalties</a>
                                    </li>
                                    <li>
                                       <a href="../user-pages/violation-list.php">List of violation</a>
                                    </li>
                                 
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="header__tool">
                        <div class="header-button-item has-noti js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
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
                        <div class="header-button-item js-item-menu">
                            <i class="zmdi zmdi-settings"></i>
                            <div class="setting-dropdown js-dropdown">
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-money-box"></i>Billing</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-globe"></i>Language</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-pin"></i>Location</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-email"></i>Email</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="../images/<?php echo $_SESSION['avatar']; ?>" alt="" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="../user-pages/profile.php"><?php echo $_SESSION['login_user']; ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="../user-pages/profile.php">
                                                <img src="../images/<?php echo $_SESSION['avatar']; ?>" alt="" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="../user-pages/profile.php"><?php echo $_SESSION['login_user']; ?></a>
                                            </h5>
                                            <span class="email"><?php echo $_SESSION['login_email']; ?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="../user-pages/profile.php">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>  

                                        <?php if($_SESSION['login_role'] == 2){ ?>                            
                                        <div class="account-dropdown__item">
                                            <a href="../user-pages/resident-list.php">                                            
                                                <i class="fas fa-users"></i> List of Resident</a>
                                        </div>
                                        <?php } ?>

                                        <?php if($_SESSION['login_role'] == 3){ ?>                            
                                        <div class="account-dropdown__item">
                                            <a href="my-violation-penalty.php">                                            
                                                <i class="fas fa-thumbs-down"></i> Violation & Penalty</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">                                            
                                                <i class="fas fa-history"></i> Archived History</a>
                                        </div>
                                        <?php } ?>

                                        <?php if($_SESSION['login_role'] == 4){ ?>                            
                                        <div class="account-dropdown__item">
                                            <a href="../user-pages/resident-list.php">                                            
                                                <i class="fas fa-users"></i> List of Resident</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="../user-pages/collector-list.php">                                            
                                                <i class="fa fa-truck"></i> List of Collector</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="../user-pages/junkpriceList.php">                              
                                                <i class="fas fa-warehouse"></i> Junk Shop Price List</a>
                                        </div>
                                        <?php } ?>

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
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
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
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">
                <div class="header-button-item has-noti js-item-menu">
                    <i class="zmdi zmdi-notifications"></i>
                    <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
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
                <div class="header-button-item js-item-menu">
                    <i class="zmdi zmdi-settings"></i>
                    <div class="setting-dropdown js-dropdown">
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-account"></i>Account</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-money-box"></i>Billing</a>
                            </div>
                        </div>
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-globe"></i>Language</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-pin"></i>Location</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-email"></i>Email</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-notifications"></i>Notifications</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                           <img src="../images/<?php echo $_SESSION['avatar']; ?>" alt="" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['login_user']; ?></a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="../images/<?php echo $_SESSION['avatar']; ?>" alt="" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#"><?php echo $_SESSION['login_user']; ?></a>
                                    </h5>
                                    <span class="email"><?php echo $_SESSION['login_email']; ?></span>
                                </div>
                            </div>
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-account"></i>Account</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="#">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END HEADER MOBILE -->
<?php include '../template/header.php'; ?>

<!-- Title Page-->
<title>Login</title>
</head>	
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="login-content-bg">
                <div class="inner">
                    <div class="container">
                        <div class="login-wrap">
                            <?php include '../api/login-api.php' ?>
                            <div class="login-content">
                                <div class="login-logo">
                                    <a href="#">
                                        <img src="../images/login-logo2.png" alt="Etrashok">
                                    </a>
                                </div>
                                <div class="login-form">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="login-checkbox">
                                            <br/>
                                        
                                        </div>
                                        <button class="au-btn au-btn--block au-btn--green m-b-20" name="login" type="submit">sign in</button>
                                        <div class="social-login-content">
                                            
                                        </div>
                                    </form>
                                    <div class="register-link">
                                        <p>
                                            Don't you have account?
                                            <a href="register.php">Sign Up Here</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        </div>

    </div>

  <?php include '../template/footer.php' ?>

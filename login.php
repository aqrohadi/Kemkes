<?php include("koneksi.php");?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sign In</title>
        <link rel="icon" href="assets/logo/logo2.png">
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="assets/css/style_login.css" /> 
    </head>
    <style>
        body {
        font-family: 'Helvetica Neue Light', 'Open Sans', Helvetica;
        font-size: 12px;
        font-weight: 300;
        }
    </style>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <center><a class="navbar-brand" href="index.php"><img class="logo" src="assets/logo/logo2.svg" width="90px" height="20px" alt="DHG"></a></center>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
           
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                         
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Company:</div>
                        PT. Daehan Global
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                       
                        &nbsp;
                        <div class="container">
                            <section id="content">
                                <form action="proseslogin.php" method="post">
                                    <h1>Admin </h1>
                                    <div>
                                        <input type="text" name="username" id="username" placeholder="Username" required="" id="username" />
                                    </div>
                                    <div>
                                        <input type="password" name="password" id="password" placeholder="Password" required="" id="password" />
                                    </div>
                                    <div>
                                        <!-- <a href="index.php"><input type="button" value="Log in" /></a> -->
                                        <div class="text-right">
                                            <div class="col-sm-11">
                                                <button type="submit" name="submit" value="Submit" class="btn btn-outline-primary btn-sm">Log in</button> &nbsp;
                                                <button type="reset" class="btn btn-outline-danger btn-sm" value="Reset">Reset</button>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- <a href="index.php"> Back</a> -->
                                    </div>    
                                </form><!-- form -->
                                <!-- <p style="margin-bottom:5px;">copyright &copy; <a href="https://www.hakkoblogs.com">www.---</a></p> -->
                            </section><!-- content -->
                        </div>
                        <!-- </div> -->
                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
       
    </body>
</html>
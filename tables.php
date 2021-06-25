<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables</title>
        <link rel="icon" href="../assets/logo/logo2.png">
        <link href="../assets/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <style>
        body {
            font-family: 'Helvetica Neue Light', 'Open Sans', Helvetica;
            font-size: 12px;
            font-weight: 300;
        }
        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.25rem 1.5rem;
            clear: both;
            font-weight: 400;
            font-size: 0.8rem;
            color: #212529;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }
    </style>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <center><a class="navbar-brand" href="index.php"><img class="logo" src="../assets/logo/logo2.svg" width="90px" height="20px" alt="DHG"></a></center>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
           <!-- Navbar Search-->
           <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"> </i><?php echo $_SESSION['fullname']; ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            
                            
                            <div class="sb-sidenav-menu-heading">Item Menu</div>
                            <a class="nav-link" href="input_data.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                                Add Data Events
                            </a>
                           
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables Events
                            </a>
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
                        <!-- <h4 class="mt-4">Tables</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Calendar</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol> -->
                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
                        &nbsp;
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5><i class="fas fa-table mr-1"></i>Data</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="th-sm" style="text-align:center">No</th>
                                                <th class="th-sm" style="text-align:left">ID Number</th>
                                                <th class="th-sm" style="text-align:left">Nama</th>
                                                <!-- <th class="th-sm" style="text-align:left">Tempat Lahir</th>
                                                <th class="th-sm" style="text-align:left">Tanggal Lahir</th> -->
<!--                                                 <th class="th-sm" style="text-align:left">Alamat</th>
 -->                                                <th class="th-sm" style="text-align:left">Jabatan</th>
                                                <th class="th-sm" style="text-align:left">Status</th>
                                                <th class="th-sm" style="text-align:center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                //include file database untuk dapat menggunakan fungsi-fungsi di dalamnya
                                                include "../koneksi.php";
                                                //membuat variabell index penomoran
                                                $no = 1;
                                                //melakukan perualangan data dengan while
                                                while($row= mysqli_fetch_array($select)) {
                                            ?>
                                            <tr>
                                                <td style="text-align:center"><?php echo $no++; ?></td>
                                                <td style="text-align:left"><?php echo $row["style_number"]; ?></td>
                                                <td style="text-align:left"><?php echo $row["nama"]; ?></td>
                                               <!--  <td style="text-align:left"><?php echo $row["tmp_lahir"]; ?></td>
                                                <td style="text-align:left"><?php echo $row["tgl_lahir"]; ?></td>
                                                <td style="text-align:left"><?php echo $row["alamat"]; ?></td> -->
                                                <td style="text-align:left"><?php echo $row["jabatan"]; ?></td>
                                                <td style="text-align:center"><?php if($row['status'] == 'Aktif'){
                                                    echo '<span class="badge badge-pill badge-success"> Aktif</span>';
                                                        }
                                                        else if ($row['status'] == 'Tidak Aktif' ){
                                                    echo '<span class="badge badge-pill badge-danger"> Tidak Aktif</span>';
                                                        }
                                                        else if ($row['status'] == 'Cuti' ){
                                                    echo '<span class="badge badge-pill badge-warning"> Cuti</span>';
                                                        }
                                                    ; ?>
                                                </td>                          
                                                <td style="text-align:center"><a href="edit_events.php?id=<?php echo $row["id"]; ?>" class="link" Title="Edit Data"><i class="fa fa-edit" aria-hidden="true"></i></a> &nbsp; <a href="delete_events.php?id=<?php echo $row["id"]; ?>"  class="link" onClick = "return confirm('Apakah Anda ingin mengapus Pegawai <?php echo $row['nama']; ?>?')" Title="Delete Data"><font color="#FF0000"><i class="fa fa-trash" aria-hidden="true"></i></font></a></td>
                                            </tr>
                                            <?php 
                                                } 
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="th-sm" style="text-align:center">No</th>
                                                <th class="th-sm" style="text-align:left">ID Number</th>
                                                <th class="th-sm" style="text-align:left">Nama</th>
                                                <!-- <th class="th-sm" style="text-align:left">Tempat Lahir</th>
                                                <th class="th-sm" style="text-align:left">Tanggal Lahir</th> -->
<!--                                            <th class="th-sm" style="text-align:left">Alamat</th>
 -->                                            <th class="th-sm" style="text-align:left">Jabatan</th>
                                                <th class="th-sm" style="text-align:left">Status</th>
                                                <th class="th-sm" style="text-align:center">Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <a href="https://www.dhgsourcing.com/"> Daehan Global</a> 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../assets/js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
        <script>
            var hrm_attachment = $('#dataTable').DataTable({      
            aLengthMenu: [
            [50, 100, 200, -1],
            [50, 100, 200, "All"]
            ],
            iDisplayLength: 50
            });
        </script>
    </body>
</html>
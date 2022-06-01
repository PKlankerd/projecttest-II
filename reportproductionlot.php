<?php session_start(); 
include_once("./connect/connectionproduction.php");

     
       ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleadmin.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- fontgoogle -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="DataTables/DataTables-1.10.25/css/dataTables.bootstrap5.min.css">
    <!-- Excel PDF  -->
    <link rel="stylesheet" href="DataTables/Buttons-1.7.1/css/buttons.bootstrap5.min.css">
    <!-- vue cdn -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Report Production Lot</title>
</head>

<body style="background-color:#ffff; overflow:auto; ">

    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bxs-hand'></i>
            <span class="logo_name">Ansell Thailand</span>
        </div>
        <ul class="nav-links">
        <li>
                <a href="homeqc.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="link_name">Home</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="homeqc.php">HOME</a></li>
                </ul>
                
            </li>

            <li>
                <div class="iocn-link">
                    <a href="batchnumber.php">
                        <i class='bx bxs-report'></i>
                        <span class="link_name">BATCH</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down arrow'></i> -->
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="batchnumber.php">BATCH</a></li>
                    
                </ul>
            </li>

            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bxs-report'></i>
                        <span class="link_name">Report</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">***Report***</a></li>
                    <li><a href="reportproductionlot.php">Production Lot</a></li>
                    
                </ul>
            </li>

            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <!-- <img src="pic/users.png" alt="profileImg"> -->
                    </div>
                    <div class="name-job">
                        <!-- <div class="profile_name"> <span><?php echo $_SESSION['firstname'];?>
                                <?php echo $_SESSION['lastname'];?></span></div>
                        <div class="job"> <span><?php echo $_SESSION['department'];?></span></div> -->
                    </div>
                    <a href="../logout.php">
                        <!-- <i class='bx bx-log-out' id="log_out"></i> -->
                    </a>
                </div>
            </li>
        </ul>
    </div>

    <!-- sidebar -->

    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text"><span>Welcome To </span><span><?php echo $_SESSION['firstname'];?></span>
            </span>
        </div>

    <!-- datatable ProductionLot -->
    
    <div class="container-fluid " id="crudApp">
        <div class=" home_content ">
            <div class="col-12 " align="center">



                <div class="col-md-4">

                    <h1 class="mt-3" Style="border: 1px solid #000; border-radius: 30px; background-color:#DDDDDD;">
                        Report Production-Lot</h1>

                </div>

                <div class="card " style="background-color: #fff;">
                    <div class="card-body col-md-12 mx-auto ">

                        <button onclick="myFunction()" class="btn btn-primary btn-sm" style="float: right;">*วิธีการ
                            Search*</button>

                        <table id="table" class="table table-striped table-sm " style="width:100%">
                            <thead>
                                <tr>

                                    <th>Bin No.</th>
                                    <th>ProductCode</th>
                                    <th>ProductionLot</th>
                                    <th>Size Hand</th>
                                    <th>color</th>
                                    <th>MachineRun No.</th>
                                    <th>total</th>
                                    
                                    <th>Operator</th>

                                </tr>
                            </thead>

                            <!-- table -->
                            <tfoot style="display: table-header-group;  ">
                                <tr>
                                    <th style="font-family: Kanit , sans-serif;">Bin No.</th>
                                    <th style="font-family: Kanit , sans-serif;">Product Code</th>
                                    <th style="font-family: Kanit , sans-serif;">ProductionLot</th> 
                                    <th style="font-family: Kanit , sans-serif;">Size Hand</th>
                                    <th style="font-family: Kanit , sans-serif;">Color</th>
                                    <th style="font-family: Kanit , sans-serif;">MachineRun</th>
                                    <th style="font-family: Kanit , sans-serif;">Total</th>
                               
                                    <th style="font-family: Kanit , sans-serif;">Operator</th>
                                    
                                </tr>
                            </tfoot>
                            <!-- table -->

                            <tbody>
                                <?php foreach($dipping_lot as $row):?>
                                <tr>
                                    <td><?php echo $row ['Binno']?></td>
                                    <td><?php echo $row ['Productcode']?></td>
                                    <td><?php echo $row ['Productionlot']?></td>
                                    <td><?php echo $row ['SizeHand']?></td>
                                    <td><?php echo $row ['Glovecolor']?></td>
                                    <td><?php echo $row ['MachineRunNo']?></td>
                                    <td><?php echo $row ['TotalGlove']?></td>
                                   
                                    <td><?php echo $row ['Operator']?></td>


                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>


    <!-- script javascript -->
    <script src="./js/dropdown.js"></script>
    <script src="./js/addgendiplot.js"></script>


    <!-- Datatables -->
    <script src="./js/jquery.min.js"></script>
    <script src="DataTables/DataTables-1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="DataTables/DataTables-1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="DataTables/Buttons-1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="DataTables/Buttons-1.7.1/js/buttons.bootstrap5.min.js"></script>
    <script src="DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="DataTables/Buttons-1.7.1/js/buttons.html5.min.js"></script>
    <script src="DataTables/Buttons-1.7.1/js/buttons.print.min.js"></script>
    <script src="DataTables/Buttons-1.7.1/js/buttons.colVis.min.js"></script>

    <!-- bootstrap5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

     <!-- javascript table -->
     <script src="./js/table.js"></script>


<script>
    function myFunction() {
        alert("พิมพ์เลข Julian Date หรือ วัน-เดือน-ปี ที่จะค้นหา หรือ ข้อมูลส่วนไหนก็ได้ ");
    }
    </script>




</body>

</html>
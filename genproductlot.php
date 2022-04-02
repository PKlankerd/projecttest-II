<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "ansell";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}

$diplot = '';

if(isset($_POST['genpro']))
{   
    $diplot = $_POST['machine_pro'];
    $diplot .= $_POST['date_pro'];
    $diplot .= $_POST['year_pro'];
    $diplot .= $_POST['runno_pro'];
    // $date = $_POST['date'];
    // $diplot .= $_POST['runno_pro'];
    // $diplot .= $_POST['runno_pro'];
    // $diplot .= $_POST['runno_pro'];
    // $diplot .= $_POST['runno_pro'];
    // $diplot .= $_POST['runno_pro'];
    $sql= "INSERT INTO dipping_lot (ProductionLot) VALUES ('$diplot')";
    if (mysqli_query($conn, $sql))
   {
       $message = "Data Inserted!!";
       echo "<script type='text/javascript'>alert('$message');</script>"; 
   } 
    else 
   {                     
     echo "<script>";
     echo "alert(' เกิดข้อผิดพลาดในการเพิ่มข้อมูล! ');";
     echo "</script>";

   }  
}
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
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>gen ProductionLot</title>
</head>

<body style="background-color:#c9e0f1; overflow:auto; ">

    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bxs-hand'></i>
            <span class="logo_name">Ansell Thailand</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="homeqc.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="link_name">HOME</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="homeqc.php">HOME</a></li>
                </ul>
            </li>

            <li>
                <div class="profile-details">
                    <div class="profile-content">
                      
                    </div>
                    <div class="name-job">
                      
                    </div>
                    
                </div>
            </li>
        </ul>
    </div>

    <!-- sidebar -->

    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <!-- <span class="text"><span>Welcome To </span><span><?php echo $_SESSION['firstname'];?></span> -->
            <!-- </span> -->
        </div>
        <div class="col-8 mx-auto" id="crudApp">
            <form method="post">
                <div class=" home_content ">
                <div class="col-12 " align="center">
                    <div class="col-md-8   p-3    " style="float: center;">
                        <div class="col-12">
                            <h3 class="fw-normal text-secondary fs-4 text-uppercase p-3 ">Production Lot </h3>
                        </div>
                        
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="Machine">Machine</label><br>
                                    <select name="machine_pro" id="machine" class="form-select form-select-md"
                                        style="border-radius: 30px;" required readonly>
                                        <option value="S1">S1</option>
                                        
                                    </select>
                                    <!-- <input type="text" name="machine_pro" id="machine" class="form-select form-select-md"
                                        style="border-radius: 30px;" required readonly> -->
                                </div>
                                <div class="col-md-6">
                                    <label for="julian">julianDate</label><br>
                                    <input type="text" name="date_pro" id="name" class="form-control form-control-md"
                                        style="border-radius: 30px;" :value="getJulianDate()" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="year">Year</label><br>
                                    <input type="text" name="year_pro" id="year" class="form-control form-control-md"
                                        style="border-radius: 30px;" :value="getYears()" placeholder="year เช่น 21-22-23" maxlength="2"
                                        autocomplete="off" required readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="productlot">Production Lot</label><br>
                                    <input type="text" name="runno_pro" id="runno" class="form-control form-control-md"
                                        style="border-radius: 30px;" placeholder="เลข product lot  001-010 เป็นต้น"
                                        maxlength="3" autocomplete="off" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="binno">Bin No.</label><br>
                                    <input type="text" name="bin_pro" class="form-control form-control-md"
                                        style="border-radius: 30px;"  placeholder="Bin No." autocomplete="off"
                                        maxlength="2">
                                </div>
                                <div class="col-md-4">
                                    <label for="size">Size</label><br>
                                    <select name="size_hand" class="form-select form-select-md"
                                        style="border-radius: 30px;">
                                        <option value="">Choose Size</option>
                                        <option v-for="sizes in size"  :key="sizes.size" :value="sizes.size">
                                            {{sizes.size}}</option>

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="product">Product</label><br>
                                    <select name="product_code" class="form-select form-select-md"
                                        style="border-radius: 30px;">
                                        <option value="">Choose Product</option>
                                        <option v-for="pro in prodata"  :key="pro.productcode" :value="pro.productcode">
                                            {{pro.productcode}}</option>

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="color">color</label><br>
                                    <select name="glove_color" class="form-select form-select-md"
                                        style="border-radius: 30px;">
                                        <option value="">Glove color</option>
                                        <option v-for="colors in glovecolor" :key="colors.color" :value="colors.color">
                                            {{colors.color}}</option>

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="runno">Run No.</label><br>
                                    <input type="text" name="run_pro" class="form-control form-control-md"
                                        style="border-radius: 30px;"  placeholder="Run No." autocomplete="off"
                                        maxlength="15">
                                </div>
                                <!-- <div class="col-sm-4">
                                    <label for="date">Date</label><br>
                                    <input type="text" class="form-control form-control-md " id='ct6'
                                         name="date" style="border-radius: 30px;" readonly>

                                </div> -->
                                <div class="col-md-12">
                                    <label for="total">TotalGlove</label><br>
                                    <input type="text" name="total_pro" class="form-control form-control-md"
                                        style="border-radius: 30px;"  :value="v" placeholder="Total Glove." autocomplete="off"
                                        maxlength="5">
                                </div>
                                <div class="col-md-12">
                                    <label for="operator">Operator</label><br>
                                    <input type="text" name="operator_pro" class="form-control form-control-md"
                                        style="border-radius: 30px;"  placeholder="Operator" autocomplete="off"
                                        maxlength="10">
                                </div>
                            </div>
                        </div>  
                        <div class="col-lg-7 " >

                            <button type="submit" name="genpro" @click="insertDipL()" class="btn btn-primary  btn-sm" style="float: center;">Generator Production Lot</button>
                                
                        </div>
                    
                </form>       
                    
            </div>
            <div class="table-responsive-lg">
                    <h1 align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;L</h1>
                    <table class="table table-bordered table-striped table-sm">
                        <tr>            
                            <th>Dipping Lot</th>
                            <!-- <th>Batch1</th>
                            <th>Amt1</th>
                            <th>Batch2</th>
                            <th>Amt2</th>
                            <th>Batch3</th>
                            <th>Amt3</th>
                            <th>Batch4</th>
                            <th>Amt4</th>
                            <th>Batch5</th>
                            <th>Amt5</th>
                            <th>Batch6</th>
                            <th>Amt6</th>
                            <th>TotalGlove</th> -->
                            
                           
                        </tr>
                        <!-- {{d}} -->
                        <tr v-for="(row,index) in a" :key="row.DippingLot_L">
                            <!-- <tr v-for="row in allData "> -->
                            <!-- <td>{{index+1}}</td> -->
                         
                            <td>{{row}}</td>
            
                        </tr>
                    </table>

                       

                     <a href="batchnumber.html">
                        <div class="col-lg-7 " >
                            <button type="submit" name="" class="btn btn-danger  btn-sm" style="float: left;">Back</button>
                                
                        </div>
                     </a>
                       


                    <br>

                </div>
            </div>
        </div>
    </div>


    </section>
    <script src="js/addgendiplot.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    function display_ct6() {
        var x = new Date()
        var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
        hours = x.getHours() % 12;
        hours = hours ? hours : 12;
        var x1 = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
        x1 = x1 + " - " + hours + ":" + x.getMinutes() + ":" + x.getSeconds() + ":" + ampm;
        document.getElementById('ct6').value = x1;
        display_c6();
    }

    function display_c6() {
        // var refresh = 1; // Refresh rate in milli seconds
        mytime = setTimeout('display_ct6()')
    }
    display_c6()
    </script>
    
</body>

</html>
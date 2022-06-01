<!DOCTYPE html>
<html lang="en">

<head>
    <title> Barcode Generator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- fontgoogle -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>




</head>

<body style="background-color:#dddddd; font-family: Kanit, sans-serif; ">

    <div id="pagegen" class="container">
        <svg id="barcode"></svg>
        <div style="margin: 10%;">
            <h2 class="text-center " style="font-weight:bold"> Print Barcode Ansell </h2>
            <form class="form-horizontal" method="post" action="barcode.php" target="_blank">



                <div class="form-group" style="text-align:center">
                    <label class="col-md-2 m-3" for="product_id" style="font-weight:bold; font-size:20px;">Product
                        ID:</label>

                    <div class="col-md-8 mx-auto">
                        <input :value="valuePG.Productionlot" autocomplete="OFF" type="text"
                            class="form-control form-control-md" id="product_id" name="product_id"
                            style="border-radius: 30px; text-align:center; font-size:20px;" maxlength="15" readonly>
                    </div>

                </div>
                <br>

                <div class="form-group" style="text-align:center">


                    <div class="col-md-8 mx-auto">
                        <input autocomplete="OFF" type="text" :value="valuePG.Binno"
                            class="form-control form-control-md" id="bin" name="bin"
                            style="border-radius: 30px; text-align:center; font-size:20px;" maxlength="15" readonly>
                    </div>

                </div>
                <br>

                <div class="form-group" style="text-align:center">


                    <div class="col-md-8 mx-auto">
                        <input autocomplete="OFF" type="text" :value="valuePG.Productcode"
                            class="form-control form-control-md" id="product" name="product"
                            style="border-radius: 30px; text-align:center; font-size:20px;" maxlength="15" readonly>
                    </div>

                </div>
                <br>

                <div class="form-group" style="text-align:center">


                    <div class="col-md-8 mx-auto">
                        <input autocomplete="OFF" type="text" :value="valuePG.SizeHand"
                            class="form-control form-control-md" id="size" name="size"
                            style="border-radius: 30px; text-align:center; font-size:20px;" maxlength="15" readonly>
                    </div>

                </div>
                <br>

                <div class="form-group" style="text-align:center">


                    <div class="col-md-8 mx-auto">
                        <input autocomplete="OFF" type="text" :value="valuePG.MachineRunNo"
                            class="form-control form-control-md" id="run" name="run"
                            style="border-radius: 30px; text-align:center; font-size:20px;" maxlength="15" readonly>
                    </div>

                </div>
                <br>

                <div class="form-group" style="text-align:center">


                    <div class="col-md-8 mx-auto">
                        <input autocomplete="OFF" type="text" :value="valuePG.TotalGlove"
                            class="form-control form-control-md" id="total" name="total"
                            style="border-radius: 30px; text-align:center; font-size:20px;" maxlength="15" readonly>
                    </div>

                </div>





              


                <div class="form-group">
                    <div class="col-12 m-2 " style="text-align:center">
                        <button type="submit" class="btn btn-outline-primary btn-md m-2 "
                            style="border-radius: 30px; font-weight:bold; color: #000;">Print</button>
                    </div>

                </div>

                <a href="batchnumber.php" class="btn btn-outline-danger btn-md"
                    style="border-radius: 30px; font-weight:bold; color:#000; flont:left;" >BATCH NUMBER</a>

              


            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/barcodes/JsBarcode.code128.min.js"></script>
    <script src="js/pagegen.js"></script>



</body>

</html>
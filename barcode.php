<html>

<head>

    <style type="text/css" media="print">
    @page {
        size: auto;

        margin: 0mm;


    }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>

<body onload="window.print();">
    <div style="margin-left: 5% ">

        <svg id="barcode"></svg>

        <div class="box">
            &nbsp;<span>Bin No:</span>
            &nbsp;<span id="Binno"></span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>Product code:</span>
            <span id="Productcode"></span>
            <br>
            <br>
            &nbsp;<span>SizeHand:</span>
            <span id="SizeHand"></span>
            &nbsp;&nbsp;<span>RunNo:</span>
            <span id="MachineRunNo"></span>
            <br>
            <br>
            &nbsp;<span>TotalGlove:</span>
            <span id="TotalGlove"></span>
        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/barcodes/JsBarcode.code128.min.js"></script>
    <script src="js/pagegen.js"></script>

    <script>
    let Productionlot = localStorage.getItem('productlot')
    let Binno = localStorage.getItem('binno')
    let Productcode = localStorage.getItem('productcode')
    let SizeHand = localStorage.getItem('sizeHand')
    let MachineRunNo = localStorage.getItem('machineRunNo')
    let TotalGlove = localStorage.getItem('totalGlove')

    JsBarcode("#barcode", Productionlot);

    document.getElementById("Binno").innerHTML = Binno;
    document.getElementById("Productcode").innerHTML = Productcode;
    document.getElementById("SizeHand").innerHTML = SizeHand;
    document.getElementById("MachineRunNo").innerHTML = MachineRunNo;
    document.getElementById("TotalGlove").innerHTML = TotalGlove;
    </script>
</body>

</html>
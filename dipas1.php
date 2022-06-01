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
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dip As-1</title>
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

        <div class="container" id="app">
            
     
                <div class=" home_content ">
                    
   
                    <div class="col-12 " align="center">
                        <div class="col-md-8  p-3  m-5  " style="float: center;  ">
                            <div class="col-12">
                                <h3 class="fw-normal text-secondary fs-4 text-uppercase p-3 ">Dipping Lot No.</h3>
                            </div>

                                <div class="row g-5">

                                    <div class="col-md-6">
                                        <input type="text" name="date_dip" id="dates_dip" class="form-control form-control-md"
                                            style="border-radius: 30px;"  readonly v-model="JDate">
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" name="year_dip" id="pee" class="form-control form-control-md"
                                            style="border-radius: 30px;"  placeholder="year เช่น 21-22-23" maxlength="2"
                                            autocomplete="off" required readonly v-model="Year">
                                    </div>

                                    <div class="col-md-6">
                                    <select name="times_dip" id="zone" v-model="Time" class="form-select form-select-md"
                                        style="border-radius: 30px;" required>
                                        <option value="1">AM</option>
                                        <option value="2">PM</option>
                                        <option value="3">NS</option>
                                    </select>
                                    </div>

                                    <div class="col-md-6">
                                        
                                        <select name="machine_dip" id="mac" v-model="ID" class="form-select form-select-md"
                                            style="border-radius: 30px;" required disabled >
                                            <option value="1">AS-1</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <input type="text" name="runno_dip" id="run" v-model="RUNNER" class="form-control form-control-md"
                                            style="border-radius: 30px;" placeholder="เลข Dipping Lot " maxlength="3"
                                            autocomplete="off" >
                                    </div>
                                    <div class="col-lg-6">

                                        <button class="btn btn-primary btn-lg " type="submit" name="diplot" id="gen"  @click="generate" style="float: right;">Gen</button>
                                
                                    </div>
                                </div>
                  
                                
                        </div>
                    </div>
                        <div class="table-responsive-lg">
                            <table class="table table-bordered table-striped table-sm">
                            <thead>
                        <tr>
                            <th>Diplot</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(row, index) in raw">
                            <td>{{row}}</td>
                            <td>
                                <input type="button" class="btn btn-danger" value="Delete" @click="onDelete(index)">
                            </td>
                        </tr>
                    </tbody>
                            </table>
                                <div class="col-lg-6">
                                    <button class="btn btn-primary btn-lg " type="button" @click="sendata()" name="saveas1" style="float: right;">Save</button>
                                </div>
                            <a href="#"></a>
                        </div>
                </div>
     
        </div>
    </section>
    
   
    <script src="../js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="vue.global.js"></script>
    <script>
        
const app = Vue.createApp({
    data(){
        return{
        allData: [],
        prodata: [],
        glovecolor: [],
        size: [],
        machine: [],
        machinedip: [],
        time: [],
        diplot: [],
        JDate: this.getJulianDate(),
        Year: this.getYears(),
        Time: '1',
        ID: '1',
        RUNNER: '',
        raw: [],
        check: [],
        getTwodigitYear: ''
        }
    },
    methods: {
        
        sendata()
        {
            axios.post('control/actiongendiplot.php',{
            actions: 'dataas1',
            send:this.raw
        }).then(res => {
                this.raw = [];
                localStorage.removeItem('run');
                // alert(res.data.message);
                window.location.href = 'batchnumber.php';
            })

        },
        generate(){
            if(this.RUNNER){
                this.raw = [];
                let r = parseInt(this.RUNNER);
                const z = this.JDate + this.Year + this.Time + this.ID;
                for (let i = 1; i <= r; i++) {
                    this.raw.push(z + i.toString().padStart(3, '0'));
                }
                localStorage.setItem('run', this.raw);
            }
        },
        onDelete(index){
            this.raw.splice(index, 1);
            localStorage.setItem('run', this.raw);
        },
        fetchAllData() {
            axios.post('control/actiongendiplot.php', {
                actions: 'fetchall'
                
            }).then(res => {
                app.allData = res.data;
            })
        },
        callmachinedip(){
       
            axios.post('control/actiongendiplot.php', 
            {
                actions: 'callmachinedip'
                
            }).then(res => {
                app.machinedip = res.data;
            })
        
            },
        calltime(){
       
            axios.post('control/actiongendiplot.php', 
            {
                actions: 'calltime'
                    
            }).then(res => {
                app.time = res.data;
            })
            },
            callproductdata(){
       
                axios.post('control/actiongendiplot.php', 
                {
                    actions: 'callproductdata'
                    
                }).then(res => {
                    app.prodata = res.data;
                })
            
           },
           callglovecolor(){
            axios.post('control/actiongendiplot.php', 
            {
                actions: 'callglovecolor'
                
            }).then(res => {
                app.glovecolor = res.data;
            })
        
            },
            callmachine(){
           
                axios.post('control/actiongendiplot.php', 
                {
                    actions: 'callmachine'
                    
                }).then(res => {
                    app.machine = res.data;
                })
            
                },
            callsize(){
           
                axios.post('control/actiongendiplot.php', 
                {
                    actions: 'callsize'
                        
                }).then(res => {
                    app.size = res.data;
                })
                },
            calldipplot(){
           
                    axios.post('control/actiongendiplot.php', 
                    {
                        actions: 'calldiplot'
                            
                    }).then(res => {
                        app.diplot = res.data;
                    })
                    },

        getJulianDate(){
            var now = new Date();
            var start = new Date(now.getFullYear(), 0, 0);
            var diff = (now - start) + ((start.getTimezoneOffset() - now.getTimezoneOffset()) * 60 * 1000);
            var oneDay = 1000 * 60 * 60 * 24;
            var day = Math.floor(diff / oneDay);
            this.julian = day.toString().padStart(3, '0');
            return this.julian;
        },

        getYears()
        {
            var date = new Date(); // date object
            var getYear =  date.getFullYear(); // get current year
            this.getTwodigitYear = getYear.toString().substring(2); // get last two digits from year
            return this.getTwodigitYear; 
        }
  
    },
    created() {
        
        this.fetchAllData();
        this.callmachinedip();
        this.calltime();
        this.callproductdata();
        this.callglovecolor();
        this.callmachine();
        this.callsize();
        this.calldipplot();
        if(localStorage.getItem('run'))
        this.raw = localStorage.getItem('run').toString().split(',')
    },

    computed: {
      
        filteredRows()
        {
        return this.allDataR.filter(row => 
            {
            const productLot = row.ProductionLot.toLowerCase();
            const dippingLotR = row.DippingLot_R.toLowerCase();
           

            const searchTerm = this.getJulianDate();

        return (
            productLot.includes(searchTerm)      ||
            dippingLotR.includes(searchTerm)      
           
               );
            
            });
        },
        filteredRowsL()
        {
        return this.allData.filter(row => 
            {
            const productLot = row.ProductionLot.toLowerCase();
            const dippingLotL = row.DippingLot_L.toLowerCase();
           

            const searchTerm = this.getJulianDate();


        return (
            productLot.includes(searchTerm)     || 
            dippingLotL.includes(searchTerm)  
  
            
               );
            
            });
        },
        filteredRowsLR()
        {
        return this.allData.filter(row => 
            {
            const productLot = row.ProductionLot.toLowerCase();
            const dippingLotL = row.DippingLot_L.toLowerCase();
         
            const searchTerm = this.filtering.toLowerCase();

        return (
         
            productLot.includes(searchTerm)    ||  
            dippingLotL.includes(searchTerm)      
            
               );
            
            });
        },

        filteredRowsRL()
        {
        return this.allDataR.filter(row => 
            {
                const productLot = row.ProductionLot.toLowerCase();
                const dippingLotR = row.DippingLot_R.toLowerCase();
                const searchTerm = this.filtering.toLowerCase();

        return (
         
            productLot.includes(searchTerm)    ||  
            dippingLotR.includes(searchTerm)      
            
               );
            
            });
        }

      
    }
    
})
app.mount('#app')
</script>

</body>

</html>

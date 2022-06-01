
        let app = new Vue({
            el: '#pagegen',
            data() {
                return {
                    valuePG: {}
                }
            },
            methods: {
                fetchPagegen() {
                    let id = localStorage.getItem('productlot')
                   
                    axios.post('./control/actioneditdiplot.php', {
                    actions: 'fetchDippingLot',
                    id: id
                    }).then(res => {
                        this.valuePG = res.data;
                        localStorage.setItem('productlot', this.valuePG.Productionlot);
                        localStorage.setItem('binno', this.valuePG.Binno);
                        localStorage.setItem('productcode', this.valuePG.Productcode);
                        localStorage.setItem('sizeHand', this.valuePG.SizeHand);
                        localStorage.setItem('machineRunNo', this.valuePG.MachineRunNo);
                        localStorage.setItem('totalGlove', this.valuePG.TotalGlove);
                        
                    })
                }
            },
            created() {
                this.fetchPagegen();
            },
        })

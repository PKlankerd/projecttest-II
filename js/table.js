
    $(document).ready(function() {
        $("#table tfoot th").each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder=" ' + title +
                '"  style="border-radius: 5px;  width: 125px;  border: 3px solid #000" />');
        });

        var table = $("#table").DataTable({
            //อ้างอิงถึง ดาต้า table methord datatable
            buttons: ["copy", "excel", "csv", "print", "colvis"],

            initComplete: function() {
                // Apply the search
                this.api()
                    .columns()
                    .every(function() {
                        var that = this;

                        $("input", this.footer()).on("keyup change clear", function() {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
            },
        });

        table.buttons().container().appendTo("#table_wrapper .col-md-6:eq(1)");
    });

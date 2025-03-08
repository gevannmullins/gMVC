<style>

h1 {
    font-size: 30px;
    font-weight: 400;
        font-weight: 400;
}

label {
    font-weight: 500;
    margin-left: 8px;
    margin-right: 8px;
}

.dt-column-title {
    font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
}

table.dataTable thead th, table.dataTable thead td, table.dataTable tfoot th, table.dataTable tfoot td {
    text-align: center;
}

table.dataTable.display > tbody > tr > * {
    border-top: 1px solid rgba(0, 0, 0, 0.05);
}

.text-center {
    text-align: left;
}




.dt-info {
    margin-top: 20px;
}



.btn-primary {
    color: #2b2e3b;
    background-color: #a4aec6;
    border-color: #a4aec6;
}

.btn-primary:hover {
    color: #a4aec6; 
    background-color: #1f212b; 
    border-color: #1f212b; 
}



</style>





<div class="container" style="margin-top: 20px; margin-bottom:20px;">
    <div class="row">
        <div class="col-md-6">
            <h1 style="margin-top:0px;margin-bottom:0px;">Domain Management</h1>
        </div>
        <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" id="loadFormButton">
                Add Domain
            </button>

            <a href="#" class="btn bulkImportModal" id="theLoadModalButton">
                <h2 style="margin-top:0;margin-bottom:0;">
                    <img src="/assets/images/bulk_import.png" width="30"
                        style="" />
                </h2>
            </a>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">

            <table id="domains" class="display" width="100%"
                style="display:block;overflow-x:auto;white-space:nowrap;margin:0 auto;"></table>

        </div>
    </div>
</div>

<script type="text/javascript" language="javascript">
        $(document).ready(function () {

            $(".bulkImportModal").on('click', function(e){

                e.preventDefault();

                // $("#bulkImportModal").modal('show');
                $.ajax({
                    url: '/domainManage/uploadform',
                    type: 'POST',
                    data: {},
                    success: function (result) {
                        $(".adminGlobalBodyContent").html(result);
                        $("#adminGlobalModalLabel").text("Bulk Import Item");
                        $("#adminGlobalModal").modal({ backdrop: 'static', keyboard: false }, 'show');
                    },
                    done: function (result) {

                    },
                    error: function () {
                        console.log('error');
                    }
                });


            });

        });
    </script>


<script>
    $(document).ready(function () {

        let dataSet = <?php echo json_encode($data); ?>

        let table = new DataTable('#domains', {
            columns: [
                { data: 'id', title: 'ID' },
                { data: 'domain', title: 'DOMAIN' },
                { data: 'location', title: 'Location' },
                { data: 'owned_by', title: 'OWNED' },
                { data: 'hosted_by', title: 'HOSTED' },
                { data: 'domain_ext', title: 'Domain Ext' },
                { data: 'domain_cost', title: 'Domain Cost' },
                { data: 'domain_r', title: 'Domain R' },
                { data: 'host_pkg_gb', title: 'HOST PKG (GB)' },
                { data: 'hosting_r', title: 'Hosting R' },
                { data: 'domain_notes', title: 'Domain Notes' },
                { data: 'last_edited_by', title: 'Last Edited By' }
            ],
            data: dataSet
        });


        table.on('click', 'tbody tr', function () {
            let itemData = table.row(this).data();
            $.ajax({
                url: '/domainManage/loadForm',
                type: 'POST',
                data: itemData,
                success: function (result) {
                    $(".adminGlobalBodyContent").html(result);
                    $("#adminGlobalModalLabel").text("Edit Domain");
                    $("#adminGlobalModal").modal({ backdrop: 'static', keyboard: false }, 'show');
                },
                done: function (result) {

                },
                error: function () {
                    console.log('error');
                }
            });

        });
    });
</script>


<script>
        $(document).ready(function () {

            $("#loadFormButton").on('click', function () {
                $.ajax({
                    url: '/domainManage/loadForm',
                    type: 'POST',
                    data: {},
                    success: function (result) {
                        $(".adminGlobalBodyContent").html(result);
                        $("#adminGlobalModalLabel").text("Add Domain");
                        $("#adminGlobalModal").modal({ backdrop: 'static', keyboard: false }, 'show');
                    },
                    done: function (result) {

                    },
                    error: function () {
                        console.log('error');
                    }
                });
            })

        });
</script>
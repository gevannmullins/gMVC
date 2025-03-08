<style>
    /* General Styles */
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f4f5f7;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h1 {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
    }

    /* Card Styling */
    .card {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        padding: 20px;
        margin-bottom: 20px;
    }

    .card h2 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .card p {
        font-size: 14px;
        color: #666;
    }

    /* Button Styling */
    .btn-primary {
        color: #fff;
        background-color: #6c63ff;
        border-color: #6c63ff;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #5848e8;
        border-color: #5848e8;
    }

    /* Input and Table Styles */
    .form-control,
    .dataTable {
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 10px;
    }

    .dataTable th,
    .dataTable td {
        vertical-align: middle;
        text-align: left;
        font-size: 14px;
        padding: 12px;
        color: #333;
    }

    .dataTable th {
        background-color: #f9fafb;
        text-transform: uppercase;
        font-size: 12px;
        color: #888;
        border-bottom: 1px solid #e3e6ea;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        h1 {
            font-size: 20px;
        }

        .btn {
            width: 100%;
            margin-bottom: 10px;
        }

        .card {
            padding: 15px;
        }

        .card h2 {
            font-size: 18px;
        }
    }

    /* Utility Classes */
    .text-muted {
        color: #888;
    }

    .text-right {
        text-align: right;
    }

    .margin_top_40px {
        margin-top: 40px;
    }

    .padding_top_10px {
        padding-top: 10px;
    }
    .padding_top_20px {
        padding-top: 20px;
    }


    th,
    td {
        white-space: nowrap;
    }

    div.dataTables_wrapper {
        margin: 0 auto;
    }

    div.container {
        width: 80%;
    }

    .dataTables_filter {
        display: none;
    }

    .dt-search {
        display: none;
    }

    .dt-length {
        display: none;
    }

    .dataTables_length {
        display: none;
    }

    label {
        font-weight: 500;
        margin-left: 8px;
        margin-top: 10px;
        margin-bottom: 10px;
        /* margin-right: 8px; */
    }

    #search {
        /* text-align: right; */
        /* width: 50%; */
        float: right;
        /* display: inline; */
    }

    .table-responsive::-webkit-scrollbar {
        display: none;
    }

</style>





<div class="container margin_top_40px">

    <div class="row">
        <div class="col-12 col-md-6">
            <h1>Clients Management</h1>
        </div>
        <div class="col-12 col-md-6 text-md-right text-right padding_top_10px">
            <button type="button" class="btn btn-primary mb-2" id="loadFormButton">Add Client</button>
            <button type="button" class="btn btn-primary mb-2 bulkImportModal" id="theLoadModalButton">Bulk Import</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 text-right">
            <label for="search"><input class="form-control" type="text" id="search" placeholder="Search"></label>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive">
                    <!--
                    <table id="clients" class="table table-hover dataTable" width="100%"
                    style="display:block;overflow-x:auto;white-space:nowrap;margin:0 auto;margin-top:30px;">
                    -->
                    <table id="clients" class="table table-hover dataTable">
                        <!-- Placeholder for DataTables content -->
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript" language="javascript">
    $(document).ready(function () {

        $(".bulkImportModal").on('click', function (e) {

            e.preventDefault();

            // $("#bulkImportModal").modal('show');
            $.ajax({
                url: '/clientManage/uploadform',
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


        let table = new DataTable('#clients', {
            columns: [
                { data: 'id', title: 'ID' },
                { data: 'domain', title: 'DOMAIN' },
                { data: 'company', title: 'COMPANY' },
                { data: 'client_name', title: 'CLIENTS' },
                { data: 'gender', title: 'GENDER' },
                { data: 'birthday', title: 'BIRTHDAY' },
                { data: 'mobile', title: 'MOBILE' },
                { data: 'work_email', title: 'WORK EMAIL' },
                { data: 'domain_email', title: 'DOMAIN EMAIL' },
                { data: 'last_edited_by', title: 'LAST EDITED BY' }
            ],
            data: dataSet
        });

        $('#search').keyup(function () {
            table.search($(this).val()).draw();
        });

        table.on('click', 'tbody tr', function () {
            let itemData = table.row(this).data();
            $.ajax({
                url: '/clientManage/loadForm',
                type: 'POST',
                data: itemData,
                success: function (result) {
                    $(".adminGlobalBodyContent").html(result);
                    $("#adminGlobalModalLabel").text("Edit Client");
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
                url: '/clientManage/loadForm',
                type: 'POST',
                data: {},
                success: function (result) {
                    $(".adminGlobalBodyContent").html(result);
                    $("#adminGlobalModalLabel").text("Add Client");
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
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
            <h1>Domain Management</h1>
        </div>
        <div class="col-12 col-md-6 text-md-right text-right padding_top_10px">
            <button type="button" class="btn btn-primary mb-2" id="loadFormButton">Add Domain</button>
            <button type="button" class="btn btn-primary mb-2" id="bulkImportButton">Bulk Import</button>
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
                    <table id="domainManagement" class="table table-hover dataTable">
                        <!-- Placeholder for DataTables content -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        let dataSet = <?php echo json_encode($data); ?>;

        // Initialize DataTable
        let table = new DataTable('#domainManagement', {
            fixedColumns: true,
            paging: true,
            searching: true,
            // scrollCollapse: true,
            scrollX: true,
            // scrollY: 300,
            autoWidth: false,
            columns: [
                { data: 'id', title: 'ID' },
                { data: 'domain', title: 'DOMAIN Name' },
                { 
                    data: 'company', 
                    title: 'Company'
                },
                { data: 'location', title: 'Location' },
                { data: 'owned_by', title: 'OWNED' },
                { data: 'hosted_by', title: 'HOSTED' },
                // { data: 'client_reg_date', title: 'Client Reg Date' },
                // { data: 'emerge_reg_date', title: 'Emerge Reg Date' },
                // { data: 'renewal_date', title: 'Ren Date' },
                // { data: 'cancel_date', title: 'Cancel Date' },
                // { data: 'trans_date', title: 'Trans Date' },
                { data: 'domain_ext', title: 'Domain Ext' },
                { data: 'domain_cost', title: 'Domain Cost' },
                { data: 'domain_r', title: 'Domain R' },
                { data: 'host_pkg_gb', title: 'HOST PKG (GB)' },
                { data: 'hosting_r', title: 'Hosting R' },
                // { data: 'brand', title: 'Brand' },
                // { data: 'website', title: 'Website' },
                // { data: 'doms', title: 'Domain' },
                // { data: 'hosting', title: 'Hosting' },
                { data: 'domain_notes', title: 'Notes' },
                // { data: 'created_by', title: 'Last Edited By' },
                { data: 'created_at', title: 'Created Date' },
                { data: 'modified_at', title: 'Modified Date' }
            ],
            data: dataSet

        });

        $('#search').keyup(function () {
            table.search($(this).val()).draw();
        });

        // Handle row click event
        $('#domainManagement tbody').on('click', 'tr', function () {
            let itemData = table.row(this).data();
            $.ajax({
                url: '/domainManagement/loadForm',
                type: 'POST',
                data: itemData,
                success: function (result) {
                    $(".adminGlobalBodyContent").html(result);
                    $("#adminGlobalModalLabel").text("Edit Domain");
                    $("#adminGlobalModal").modal({ backdrop: 'static', keyboard: false }, 'show');
                },
                error: function () {
                    console.error('Error loading form.');
                }
            });
        });

        // Handle Add Domain button
        $("#loadFormButton").on('click', function () {
            $.ajax({
                url: '/domainManagement/loadForm',
                type: 'POST',
                success: function (result) {
                    $(".adminGlobalBodyContent").html(result);
                    $("#adminGlobalModalLabel").text("Add Domain");
                    $("#adminGlobalModal").modal({ backdrop: 'static', keyboard: false }, 'show');
                },
                error: function () {
                    console.error('Error loading form.');
                }
            });
        });

        // Handle Bulk Import button
        $("#bulkImportButton").on('click', function (e) {
            e.preventDefault();
            $.ajax({
                url: '/domainManagement/uploadform',
                type: 'POST',
                success: function (result) {
                    $(".adminGlobalBodyContent").html(result);
                    $("#adminGlobalModalLabel").text("Bulk Import");
                    $("#adminGlobalModal").modal({ backdrop: 'static', keyboard: false }, 'show');
                },
                error: function () {
                    console.error('Error loading bulk import form.');
                }
            });
        });
    });
</script>
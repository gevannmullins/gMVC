<style>
    /* Custom Styles */
    body {
        background-color: #e7e7e7;
    }

    .client-list {
        background-color: #e7e7e7;
        padding: 15px;
        height: 100vh;
        overflow-y: auto;
    }

    .client-item {
        display: flex;
        align-items: center;
        padding: 10px;
        background-color: #e7e7e7;
        margin-bottom: 5px;
        border-radius: 4px;
        cursor: pointer;
    }

    .client-item.active {
        background-color: #333;
        color: white;
    }

    .client-item:hover {
        background-color: #d1d1d1;
    }

    .client-item .folder-icon {
        margin-right: 10px;
        font-size: 20px;
    }

    .profile-details {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        margin-top: 10px;
    }

    .profile-details .profile-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .profile-details h2 {
        font-size: 1.5rem;
        margin: 0;
    }

    .profile-details .company {
        font-size: 1rem;
        color: #666;
        margin-bottom: 15px;
    }

    .profile-details .btn-primary {
        background-color: #333;
        border-color: #333;
    }

    .client_manage_buttons {
        padding-top: 8px;
        padding-bottom: 8px;
        background-color: #ffffff;
    }

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

<div class="container-fluid margin_top_40px">

    <div class="row">
        <div class="col-12 col-md-6">
            <h1>Client Profiles</h1>
        </div>
        <div class="col-md-6 text-right">
            <label for="search"><input class="form-control" type="text" id="search" placeholder="Search"></label>
        </div>
    </div>

    <div class="row">
        <!-- Client List Sidebar -->
        <div class="col-md-3 client-list">
            <div class="d-flex justify-content-between mb-3">
                <div class="text-center client_manage_buttons">
                    <button class="btn btn-sm btn-primary"> < </button>
                    <button class="btn btn-sm btn-default">Rename</button>
                    <button class="btn btn-sm btn-default">Delete</button>
                    <button class="btn btn-sm btn-primary">+</button>
                </div>
            </div>
            <?php
            foreach ($data as $client) {
                ?>
                <div class="client-item" clientId="<?php echo $client['id']; ?>">
                    <i class="folder-icon glyphicon glyphicon-folder-open"></i>
                    <?php echo $client['client_name']; ?>
                </div>
                <?php
            }
            ?>
        </div>

        <!-- Profile Details -->
        <div class="col-md-9">
            <div class="profile-details">


            </div>
        </div>
    </div>
</div>

<!-- Include FontAwesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>
    $(document).ready(function(){


        $(".client-item").on("click", function(e){

            e.preventDefault();

            let clientId = $(this).attr('clientId');
            // let selectedClientData = $(this).attr('selectedClientData');

            $.ajax({
                url: '/clientManage/viewProfile',
                type: 'POST',
                data: {
                    'clientId':clientId
                },
                success: function (result) {
                    $(".profile-details").html(result);
                },
                done: function (result) {

                },
                error: function () {
                    console.log('error');
                }
            });

            $(".client-item").removeClass("active");
            $(this).addClass("active");

        });


    });
</script>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Dashboard'; ?></title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/dataTables.dataTables.css" />
    <!-- Include Bootstrap JS and dependencies -->
    <script src="/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/datatables.js"></script>
    <script src="/assets/js/Chart.js"></script>
    <script src="/assets/js/cropper.min.js"></script>
    <link href="/assets/css/cropper.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #e3e5e8;
        }
        .navbar .navbar-nav>li>a {
            line-height: 45px;
        }

        .navbar-header {
            margin-top: 24px;
        }

        .full-height { display: flex; flex-direction: column; height: 100%; }
        .fill-height { flex-grow: 1; width: 100%; }
        .doborder { border: 1px solid; border-color: #ddd; border-radius: 4px; }
        .controlsdiv { display: table; width: 100%; }

        table {
            background-color: #ffffff;
            /* margin-top:30px; */
        }

        #domains_wrapper > div:nth-child(1) > div.col-sm-6.text-right > div {
            /* margin-bottom:30px; */
        }
        .dt-search {
            margin-bottom: 30px;
        }
        div.dt-container .dt-paging .dt-paging-button {
            padding: 0px;
        }

        .modal-title {
            display: inline;
            font-size: 28px;
            font-weight: 600;
        }

        #adminGlobalModalLabel {
            font-size: 22px;
            font-weight: 800;
            display: inline;
            border-radius:50%;
        }

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            width: 100%;
            height: 100%;
            display: none;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 5px;
        }

        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px #ddd solid;
            border-top: 4px #2e93e6 solid;
            border-radius: 50%;
            animation: sp-anime 0.8s infinite linear;
        }

        @keyframes sp-anime {
            100% {
                transform: rotate(360deg);
            }
        }

        .is-hide {
            display: none;
        }


    </style>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top taller" role="navigation"
        style="box-shadow: grey 0px -4px 10px 3px;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-3">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand navbar-image" href="/admin/dashboard">
                    <img src="../../assets/images/rise_ims_logo.png" class="img-responsive" width="160"
                        style="margin-top:-20px;" />
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/admin/dashboard">Dashboard</a></li>
                    <li><a href="/projects/list">Projects</a></li>
                    <li><a href="/user/profile">My Profile</a></li>
                    <li><a href="/admin/logout">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="padding-top:74px;">
        <?php echo $content; ?>
    </main>    


        <!-- Admin Global Modal -->
        <div class="modal modal-wide fade" id="adminGlobalModal" tabindex="-1" role="dialog"
        aria-labelledby="adminGlobalModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" id="adminGlobalModalLabel">
                        <!-- Modal Title Prepopulated -- See javascript -->
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top:-70px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body adminGlobalBodyContent">
                    <!-- Modal Body Prepopulated -- See javascript -->
                </div>
                <div id="overlay">
                    <div class="cv-spinner">
                        <span class="spinner"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php
    if (RISE_DEBUG === 1){
        ?>
    <div style="position:absolute;right:10px;bottom:10px;height:400px;width:600px;color:#000000;background-color:rgba(250,250,250,.6)">
    <pre><code><?php echo json_encode($data); ?></code></pre>
    <pre><code><?php echo json_encode($_SESSION); ?></code></pre>
    <pre><code><?php echo json_encode($_POST); ?></code></pre>
    </div>
        <?php
    }
    ?>

    <script>
        $(document).ready(function(){
            var meta = document.createElement('meta');
            meta.httpEquiv = "Content-Security-Policy";
            meta.content = "upgrade-insecure-requests";
            document.getElementsByTagName('head')[0].appendChild(meta);
        });
    </script>


</body>

</html>
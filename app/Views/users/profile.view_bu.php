<style>
/* SEAN PLAYING AROUND WITH STYLING */

.profile-details {
    background-color: white;
    padding: 50px!important;
    border-radius: 5px;
    margin-top: 10px;
}

.d-flex.justify-content-between.mb-3 {
    margin-bottom: 30px!important;
}



</style>





<style>
        /* Custom Styles */
        body {
            background-color: #f5f5f5;
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
    </style>
    <div class="container-fluid">
        <div class="row">
            <!-- Client List Sidebar -->
            <div class="col-md-3 client-list">
                <div class="d-flex justify-content-between mb-3">
                    <h2>Clients</h2>
                    <div>
                        <button class="btn btn-sm btn-default">Rename</button>
                        <button class="btn btn-sm btn-default">Delete</button>
                        <button class="btn btn-sm btn-primary">+</button>
                    </div>
                </div>
                <div class="client-item active">
                    <i class="folder-icon glyphicon glyphicon-folder-open"></i>
                    Sean Bossenger
                </div>
                <div class="client-item">
                    <i class="folder-icon glyphicon glyphicon-folder-close"></i>
                    Slim Shady
                </div>
                <div class="client-item">
                    <i class="folder-icon glyphicon glyphicon-folder-close"></i>
                    Aimee Hewitt
                </div>
                <div class="client-item">
                    <i class="folder-icon glyphicon glyphicon-folder-close"></i>
                    Brian Mhlangu
                </div>
                <div class="client-item">
                    <i class="folder-icon glyphicon glyphicon-folder-close"></i>
                    Brent Manning
                </div>
                <div class="client-item">
                    <i class="folder-icon glyphicon glyphicon-folder-close"></i>
                    Candice Fullard
                </div>
                <div class="client-item">
                    <i class="folder-icon glyphicon glyphicon-folder-close"></i>
                    Morgain Moulton
                </div>
                <div class="client-item">
                    <i class="folder-icon glyphicon glyphicon-folder-close"></i>
                    Steve Monk
                </div>
                <div class="client-item">
                    <i class="folder-icon glyphicon glyphicon-folder-close"></i>
                    Veronica Hlophe
                </div>
            </div>

            <!-- Profile Details -->
            <div class="col-md-9">
                <div class="profile-details">
                    <div class="text-center">
                        <img src="https://via.placeholder.com/100" alt="Profile Image" class="profile-img">
                        <h2>Sean Bossenger</h2>
                        <div class="company">EMERGE STUDIO</div>
                        <p>Birthday<br>11 July 1986</p>
                        <p>Age<br>38</p>
                        <p>Date Added<br>2 February 2024</p>
                        <button class="btn btn-sm btn-default mt-2">Send Profile</button>
                    </div>
                    <h3 class="mt-4">Profile Details</h3>
                    <form>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="middle_name">Middle Name</label>
                                    <input type="text" class="form-control" id="middle_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="surname">Surname</label>
                                    <input type="text" class="form-control" id="surname">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" class="form-control" id="job_title">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <input type="text" class="form-control" id="gender">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="country">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" class="form-control" id="mobile">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="general_notes">General Notes</label>
                            <textarea class="form-control" id="general_notes"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="company_notes">Company Notes</label>
                            <textarea class="form-control" id="company_notes"></textarea>
                        </div>

                        <h3 class="mt-4">Company Information</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="company_name">Name</label>
                                    <input type="text" class="form-control" id="company_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="company_type">Type</label>
                                    <input type="text" class="form-control" id="company_type">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="company_reg">Reg</label>
                                    <input type="text" class="form-control" id="company_reg">
                                </div>
                            </div>
                        </div>

                        <h3 class="mt-4">Account Information</h3>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-default">View Projects</button>
                            <button class="btn btn-default">View Billing</button>
                            <button class="btn btn-primary">View Reports</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="text-center">
                <img src="https://via.placeholder.com/100" alt="Profile Image" class="profile-img">
                <h2><?php echo $clientData['client_name']; ?></h2>
                <div class="company"><?php echo $clientData['company']; ?></div>
                <p>Birthday<br>11 July 1986</p>
                <p>Age<br>38</p>
                <p>Date Added<br>2 February 2024</p>
                <button class="btn btn-sm btn-default mt-2">Send Profile</button>
            </div>

        </div>
        <div class="col-md-8">

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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php //echo json_encode($clientData); ?>
        </div>
    </div>
</div>
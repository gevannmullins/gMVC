<div class="container" style="margin-top: 20px;margin-bottom:20px;">
    <div class="row">
        <div class="col-md-6">
            <h1 style="margin-top:0px;margin-bottom:0px;">User Management</h1>
        </div>

        <div class="col-md-6 text-right">
            <!-- Add User Button -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                Add User
            </button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">

            <table id="users" class="display" width="100%"
                style="display:block;overflow-x:auto;white-space:nowrap;margin:0 auto;"></table>

        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- User Entry Form -->
                <form id="userForm" action="/users/add" method="POST">
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="branch">Branch</label>
                        <input type="text" class="form-control" id="branch" name="branch" required>
                    </div>
                    <div class="form-group">
                        <label for="access_role">Access Role</label>
                        <input type="text" class="form-control" id="access_role" name="access_role" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {

        let dataSet = <?php echo json_encode($data); ?>


        let table = new DataTable('#users', {
            columns: [
                { data: 'id', title: 'ID' },
                { data: 'name', title: 'FIRST NAME' },
                { data: 'surname', title: 'LAST NAME' },
                { data: 'email', title: 'EMAIL' },
                { data: 'mobile', title: 'MOBILE' },
                { data: 'title', title: 'TITLE' },
                { data: 'branch', title: 'BRANCH' },
                { data: 'access_role', title: 'ACCESS ROLE' },
                { data: 'created_at', title: 'CREATED DATE' },
                { data: 'updated_at', title: 'MODIFY DATE' },
            ],
            data: dataSet
        });



    });
</script>
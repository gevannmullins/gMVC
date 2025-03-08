<div class="container" style="margin-top: 20px;margin-bottom:20px;">
    <div class="row">
        <div class="col-md-6">
            <h1 style="margin-top:0px;margin-bottom:0px;">Project Management</h1>
        </div>

        <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProjectModal">
                Add Project
            </button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">

            <table id="projects" class="display" width="100%"
                style="display:block;overflow-x:auto;white-space:nowrap;margin:0 auto;"></table>

        </div>
    </div>
</div>


<!-- Add Project Modal -->
<div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="addProjectModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProjectModalLabel">Add New Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Project Entry Form -->
                <form id="projectForm" action="/projects/add" method="POST">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" required>
                    </div>
                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" required>
                    </div>
                    <div class="form-group">
                        <label for="project_id">Project ID</label>
                        <input type="text" class="form-control" id="project_id" name="project_id" required>
                    </div>
                    <div class="form-group">
                        <label for="project_start_date">Project Start Date</label>
                        <input type="date" class="form-control" id="project_start_date" name="project_start_date"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="assigned_to">Assigned To</label>
                        <input type="text" class="form-control" id="assigned_to" name="assigned_to" required>
                    </div>
                    <div class="form-group">
                        <label for="project_type">Project Type</label>
                        <input type="text" class="form-control" id="project_type" name="project_type" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="project_notes">Project Notes</label>
                        <textarea class="form-control" id="project_notes" name="project_notes" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="days_active">Days Active</label>
                        <input type="number" class="form-control" id="days_active" name="days_active" required>
                    </div>
                    <div class="form-group">
                        <label for="revision">Revision</label>
                        <input type="number" class="form-control" id="revision" name="revision" required>
                    </div>
                    <div class="form-group">
                        <label for="deadline_date">Deadline Date</label>
                        <input type="date" class="form-control" id="deadline_date" name="deadline_date" required>
                    </div>
                    <div class="form-group">
                        <label for="client_feedback">Client Feedback</label>
                        <textarea class="form-control" id="client_feedback" name="client_feedback" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="last_edited_by">Last Edited By</label>
                        <input type="text" class="form-control" id="last_edited_by" name="last_edited_by" required>
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


        let table = new DataTable('#projects', {
            columns: [
                { data: 'id', title: 'ID' },
                { data: 'status', title: 'STATUS' },
                { data: 'company_name', title: 'COMPANY NAME' },
                { data: 'project_id', title: 'PROJECT ID' },
                { data: 'project_start_date', title: 'PROJECT START DATE' },
                { data: 'assigned_to', title: 'ASSIGNED TO' },
                { data: 'project_type', title: 'PROJECT TYPE' },
                { data: 'description', title: 'DESCRIPTION' },
                { data: 'project_notes', title: 'PROJECT NOTES' },
                { data: 'days_active', title: 'DAYS ACTIVE' },
                { data: 'revision', title: 'REVISIONS' },
                { data: 'deadline_date', title: 'DEADLINE DATE' },
                { data: 'client_feedback', title: 'CLIENT FEEDBACK' },
                { data: 'last_edited_by', title: 'LAST EDITED BY' }
            ],
            data: dataSet
        });

        // Handle row click event
        $('#projects tbody').on('click', 'tr', function () {
            let itemData = table.row(this).data();
            $.ajax({
                url: '/projects/loadForm',
                type: 'POST',
                data: itemData,
                success: function (result) {
                    $(".adminGlobalBodyContent").html(result);
                    $("#adminGlobalModalLabel").text("Edit Project");
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
                url: '/projects/loadForm',
                type: 'POST',
                success: function (result) {
                    $(".adminGlobalBodyContent").html(result);
                    $("#adminGlobalModalLabel").text("Add Project");
                    $("#adminGlobalModal").modal({ backdrop: 'static', keyboard: false }, 'show');
                },
                error: function () {
                    console.error('Error loading form.');
                }
            });
        });




    });
</script>
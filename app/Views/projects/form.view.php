<!-- Project Entry Form -->
<form id="projectForm" action="/projects/add" method="POST">
    <?php if(isset($rowData["id"])) { ?>
        <input type="hidden" name="id" value="<?php echo $rowData['id']; ?>" />
    <?php } ?>
    <div class="form-group">
        <label for="project_name">Project Name</label>
        <input type="text" class="form-control" id="project_name" name="project_name" value="<?php if(isset($rowData['project_name'])){ echo $rowData['project_name']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" class="form-control" id="status" name="status" value="<?php if(isset($rowData['status'])){ echo $rowData['status']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="company_name">Company Name</label>
        <input type="text" class="form-control" id="company_name" name="company_name" value="<?php if(isset($rowData['company_name'])){ echo $rowData['company_name']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="project_id">Project ID</label>
        <input type="text" class="form-control" id="project_id" name="project_id" value="<?php if(isset($rowData['project_id'])){ echo $rowData['project_id']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="project_start_date">Project Start Date</label>
        <input type="date" class="form-control" id="project_start_date" name="project_start_date" value="<?php if(isset($rowData['project_start_date'])){ echo $rowData['project_start_date']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="assigned_to">Assigned To</label>
        <input type="text" class="form-control" id="assigned_to" name="assigned_to" value="<?php if(isset($rowData['assigned_to'])){ echo $rowData['assigned_to']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="project_type">Project Type</label>
        <input type="text" class="form-control" id="project_type" name="project_type" value="<?php if(isset($rowData['project_type'])){ echo $rowData['project_type']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required><?php if(isset($rowData['description'])){ echo $rowData['description']; } ?></textarea>
    </div>
    <div class="form-group">
        <label for="project_notes">Project Notes</label>
        <textarea class="form-control" id="project_notes" name="project_notes" rows="3"><?php if(isset($rowData['project_notes'])){ echo $rowData['project_notes']; } ?></textarea>
    </div>
    <div class="form-group">
        <label for="days_active">Days Active</label>
        <input type="number" class="form-control" id="days_active" name="days_active" value="<?php if(isset($rowData['days_active'])){ echo $rowData['days_active']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="revision">Revision</label>
        <input type="number" class="form-control" id="revision" name="revision" value="<?php if(isset($rowData['revision'])){ echo $rowData['revision']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="deadline_date">Deadline Date</label>
        <input type="date" class="form-control" id="deadline_date" name="deadline_date" value="<?php if(isset($rowData['deadline_date'])){ echo $rowData['deadline_date']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="client_feedback">Client Feedback</label>
        <textarea class="form-control" id="client_feedback" name="client_feedback" rows="3"><?php if(isset($rowData['client_feedback'])){ echo $rowData['client_feedback']; } ?></textarea>
    </div>
    <input type="hidden" name="last_edited_by" value="<?php echo $_SESSION["user_id"]; ?>" />

    <button type="submit" class="btn btn-primary">Submit</button>
    <?php if(isset($rowData["id"])) { ?>
        <button class="btn btn-danger" id="deleteProjectBtn" projectId="<?php echo $rowData['id']; ?>" style="float:right;">Delete</button>
    <?php } ?>
</form>

<script>
    $(document).ready(function(){

        $("#deleteProjectBtn").on("click", function(e){
            e.preventDefault();

            let projectId = $(this).attr("projectId");

            $.ajax({
                type: 'POST',
                url: '/projects/delete',
                data: {"projectId":projectId},
                beforeSend: function () {
                    $("#overlay").fadeIn(300);
                },
                success: function (returnData) {
                    setTimeout(function () {
                        $("#overlay").fadeOut(300);
                        location.reload();
                    }, 500);
                }
            }).done(function () {
                setTimeout(function () {
                    $("#overlay").fadeOut(300);
                }, 500);
            });

        });


    });
</script>

<script>
    $(document).ready(function(){

        let postPath = "/projects/add";
        <?php
        if(isset($rowData['id'])){
            ?>
            postPath = "/projects/update";
            <?php
        }
        ?>

        $('#projectForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: postPath,
                data: $(this).serialize(),
                beforeSend: function () {
                    $("#overlay").fadeIn(300);
                },
                success: function (returnData) {
                    setTimeout(function () {
                        $("#overlay").fadeOut(300);
                        location.reload();
                    }, 500);
                }
            }).done(function () {
                setTimeout(function () {
                    $("#overlay").fadeOut(300);
                }, 500);
            });

        });

    });
</script>
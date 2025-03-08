<!-- Client Entry Form -->
<form id="clientForm" action="/clientManage/add" method="POST">
    <!--  -->
    <?php if(isset($rowData["id"])) { ?>
    <input type="hidden" name="id" value="<?php echo $rowData['id']; ?>" />
    <?php } ?>
    <div class="form-group">
        <label for="domain">Domain</label>
        <input type="text" class="form-control" id="domain" name="domain" value="<?php if(isset($rowData['domain'])){ echo $rowData['domain']; } else { echo ''; } ?>" required>
    </div>
    <div class="form-group">
        <label for="company">Company</label>
        <input type="text" class="form-control" id="company" name="company" value="<?php if(isset($rowData['company'])){ echo $rowData['company']; } else { echo ''; } ?>" required>
    </div>
    <div class="form-group">
        <label for="client_name">Client</label>
        <input type="text" class="form-control" id="client_name" name="client_name" value="<?php if(isset($rowData['client_name'])){ echo $rowData['client_name']; } else { echo ''; } ?>" required>
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <input type="text" class="form-control" id="gender" name="gender" value="<?php if(isset($rowData['gender'])){ echo $rowData['gender']; } else { echo ''; } ?>" required>
    </div>
    <div class="form-group">
        <label for="birthday">Birthday</label>
        <input type="date" class="form-control" id="birthday" name="birthday" value="<?php if(isset($rowData['birthday'])){ echo $rowData['birthday']; } else { echo ''; } ?>" required>
    </div>
    <div class="form-group">
        <label for="mobile">Mobile</label>
        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php if(isset($rowData['mobile'])){ echo $rowData['mobile']; } else { echo ''; } ?>" required>
    </div>
    <div class="form-group">
        <label for="work_email">Work Email</label>
        <input type="text" class="form-control" id="work_email" name="work_email" value="<?php if(isset($rowData['work_email'])){ echo $rowData['work_email']; } else { echo ''; } ?>" required>
    </div>
    <div class="form-group">
        <label for="domain_email">Domain Email</label>
        <input type="text" class="form-control" id="domain_email" name="domain_email" value="<?php if(isset($rowData['domain_email'])){ echo $rowData['domain_email']; } else { echo ''; } ?>" required>
    </div>


    <input type="hidden" class="form-control" id="last_edited_by" name="last_edited_by" value="<?php echo $_SESSION['user_id']; ?>">

    <button type="submit" class="btn btn-primary">Submit</button>
    <?php if(isset($rowData["id"])) { ?>
        <button class="btn btn-danger" id="deleteClientBtn" clientId="<?php echo $rowData['id']; ?>" style="float:right;">Delete</button>
    <?php } ?>

</form>

<script>
    $(document).ready(function(){

        $("#deleteClientBtn").on("click", function(e){
            e.preventDefault();

            let clientId = $(this).attr("clientId");

            $.ajax({
                type: 'POST',
                url: '/clientManage/delete',
                data: {"clientId":clientId},
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

        $('#clientForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '/clientManage/add',
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
<form id="domainManageForm" action="/domainManage/add" method="POST">
    <?php if(isset($rowData["id"])) { ?>
        <input type="hidden" name="id" value="<?php echo $rowData['id']; ?>" />
    <?php } ?>

    <div class="form-group">
        <label for="domain">Domain</label>
        <input type="text" class="form-control" id="domain" name="domain" value="<?php if(isset($rowData['domain'])){ echo $rowData['domain']; } else { echo ''; } ?>" required>
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" id="location" name="location" value="<?php if(isset($rowData['location'])){ echo $rowData['location']; } else { echo ''; } ?>" required>
    </div>
    <div class="form-group">
        <label for="owned_by">Owned</label>
        <input type="text" class="form-control" id="owned_by" name="owned_by" value="<?php if(isset($rowData['owned_by'])){ echo $rowData['owned_by']; } else { echo ''; } ?>" required>
    </div>
    <div class="form-group">
        <label for="hosted_by">Hosted</label>
        <input type="text" class="form-control" id="hosted_by" name="hosted_by" value="<?php if(isset($rowData['hosted_by'])){ echo $rowData['hosted_by']; } else { echo ''; } ?>" required>
    </div>
    <div class="form-group">
        <label for="domain_ext">Domain Ext</label>
        <input type="text" class="form-control" id="domain_ext" name="domain_ext" value="<?php if(isset($rowData['domain_ext'])){ echo $rowData['domain_ext']; } else { echo ''; } ?>" required>
    </div>
    <div class="form-group">
        <label for="domain_cost">Domain Cost</label>
        <input type="text" class="form-control" id="domain_cost" name="domain_cost" value="<?php if(isset($rowData['domain_cost'])){ echo $rowData['domain_cost']; } else { echo ''; } ?>">
    </div>
    <div class="form-group">
        <label for="domain_r">Domain R</label>
        <input type="text" class="form-control" id="domain_r" name="domain_r" value="<?php if(isset($rowData['domain_r'])){ echo $rowData['domain_r']; } else { echo ''; } ?>">
    </div>
    <div class="form-group">
        <label for="host_pkg_gb">HOST PKG (GB)</label>
        <input type="text" class="form-control" id="host_pkg_gb" name="host_pkg_gb" value="<?php if(isset($rowData['host_pkg_gb'])){ echo $rowData['host_pkg_gb']; } else { echo ''; } ?>">
    </div>
    <div class="form-group">
        <label for="hosting_r">Hosting R</label>
        <input type="text" class="form-control" id="hosting_r" name="hosting_r" value="<?php if(isset($rowData['hosting_r'])){ echo $rowData['hosting_r']; } else { echo ''; } ?>">
    </div>
    <div class="form-group">
        <label for="domain_notes">Domain Notes</label>
        <input type="text" class="form-control" id="domain_notes" name="domain_notes" value="<?php if(isset($rowData['domain_notes'])){ echo $rowData['domain_notes']; } else { echo ''; } ?>" required>
    </div>

    <input type="hidden" name="last_edited_by" value="<?php echo $_SESSION["user_id"]; ?>" />

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    $(document).ready(function(){

        let postPath = "/domainManage/add";
        <?php
        if(isset($rowData['id'])){
            ?>
            postPath = "/domainManage/update";
            <?php
        }
        ?>

        $('#domainManageForm').on('submit', function (e) {
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
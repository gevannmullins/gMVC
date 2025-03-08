<form id="domainInfoForm" action="/domainInfo/add" method="POST">
    
    <?php if(isset($rowData["id"])) { ?>
        <input type="hidden" name="id" value="<?php echo $rowData['id']; ?>" />
    <?php } ?>

    <!-- domain  -->
    <div class="form-group">
        <label for="domain">Domain</label>
        <input type="text" class="form-control" id="domain" name="domain" value="<?php if(isset($rowData['domain'])){ echo $rowData['domain']; } ?>" disabled />
    </div>

    <div class="form-group">
        <label for="company">Company</label>
        <input type="text" class="form-control" id="company" name="company" value="<?php if(isset($_POST['company'])){ echo $_POST['company']; } ?>" disabled />
    </div>

    <div class="form-group">
        <label for="reg_date">Reg Date</label>
        <input type="date" class="form-control" id="reg_date" name="reg_date" value="<?php if(isset($_POST['reg_date'])){ echo $_POST['reg_date']; } ?>" />
    </div>
    <div class="form-group">
        <label for="ren_date">Ren Date</label>
        <input type="date" class="form-control" id="ren_date" name="ren_date" value="<?php if(isset($_POST['ren_date'])){ echo $_POST['ren_date']; } ?>" />
    </div>
    <div class="form-group">
        <label for="can_date">Can Date</label>
        <input type="date" class="form-control" id="can_date" name="can_date" value="<?php if(isset($_POST['can_date'])){ echo $_POST['can_date']; } ?>" />
    </div>
    <div class="form-group">
        <label for="trans_date">Trans Date</label>
        <input type="date" class="form-control" id="trans_date" name="trans_date" value="<?php if(isset($_POST['trans_date'])){ echo $_POST['trans_date']; } ?>" />
    </div>
    <div class="form-group">
        <label for="domain_ext">Domain Ext</label>
        <input type="text" class="form-control" id="domain_ext" name="domain_ext" value="<?php if(isset($_POST['domain_ext'])){ echo $_POST['domain_ext']; } ?>" />
    </div>
    <div class="form-group">
        <label for="host_pkg_gb">HOST PKG (GB)</label>
        <input type="text" class="form-control" id="host_pkg_gb" name="host_pkg_gb" value="<?php if(isset($_POST['host_pkg_gb'])){ echo $_POST['host_pkg_gb']; } ?>" />
    </div>
    <div class="form-group">
        <label for="disk_usg_gb">Disk Usg GB</label>
        <input type="text" class="form-control" id="disk_usg_gb" name="disk_usg_gb" value="<?php if(isset($_POST['disk_usg_gb'])){ echo $_POST['disk_usg_gb']; } ?>" />
    </div>
    <div class="form-group">
        <label for="email_usg_mb">Email Usage MB</label>
        <input type="text" class="form-control" id="email_usg_mb" name="email_usg_mb" value="<?php if(isset($_POST['email_usg_mb'])){ echo $_POST['email_usg_mb']; } ?>" />
    </div>
    <div class="form-group">
        <label for="website_usg_mb">Website Usg MB</label>
        <input type="text" class="form-control" id="website_usg_mb" name="website_usg_mb" value="<?php if(isset($_POST['website_usg_mb'])){ echo $_POST['website_usg_mb']; } ?>" />
    </div>
    <input type="hidden" name="last_edited_by" value="<?php echo $_SESSION["user_id"]; ?>" />

    <button type="submit" class="btn btn-primary">Submit</button>
    <?php if(isset($rowData["id"])) { ?>
        <button class="btn btn-danger" id="deleteDomainInfoBtn" domainInfoId="<?php echo $rowData['id']; ?>" style="float:right;">Delete</button>
    <?php } ?>

</form>

<script>
    $(document).ready(function(){

        $("#deleteDomainInfoBtn").on("click", function(e){
            e.preventDefault();

            let domainInfoId = $(this).attr("domainInfoId");

            $.ajax({
                type: 'POST',
                crossDomain: true,
                url: '/domainInfo/delete',
                data: {"domainInfoId":domainInfoId},
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

        let postPath = "/domainInfo/add";
        <?php
        if(isset($rowData['id'])){
            ?>
            postPath = "/domainInfo/update";
            <?php
        }
        ?>


        $('#domainInfoForm').on('submit', function (e) {
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
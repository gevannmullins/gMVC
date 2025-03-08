
<div class="row">
    <div class="col-md-12">
        <h3>Email Packages</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-3">

        <form role="form" id="email_packages_form">
            <div class="form-group float-label-control">
                <label for="">Add Entry Here</label>
                <input type="text" class="form-control" id="email_package_val" placeholder="Add Entry Here">
                <a href="#" id="submit_email_package">Submit</a>
            </div>
        </form>

    </div>

    <div class="col-md-9">

        <?php foreach ($emailPackages as $emailPackage) { ?>

            <label>
                <?php echo $emailPackage['email_packages']; ?>
                <a href="#" class="remove_email_package" id="<?php echo $emailPackage['id']; ?>">x</a>
            </label>
            <br />

        <?php } ?>

    </div>
</div>

<script>
$(document).ready(function(){

    $('#submit_email_package').on('click', function(e){
        e.preventDefault();
        let email_package_val = $('#email_package_val').val();        
        $.ajax({
            url: '/system_configs/email_packages/add',
            type: 'POST',
            data: {"email_packages":email_package_val},
            success: function (result) {
                // $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

        $.ajax({
            url: '/system_configs/email_packages',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_email_packages").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

    });

    $(".remove_email_package").on('click', function(e){
        e.preventDefault();
        let email_package_id = this.id;
        // alert(domain_location_id);
        $.ajax({
            url: '/system_configs/email_packages/delete',
            type: 'POST',
            data: {"id":email_package_id},
            success: function (result) {
                // $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });
        $.ajax({
            url: '/system_configs/email_packages',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_email_packages").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

    });

});
</script>
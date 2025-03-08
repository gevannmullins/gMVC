
<div class="row">
    <div class="col-md-12">
        <h3>Hosting Packages</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-3">

        <form role="form" id="hosting_packages_form">
            <div class="form-group float-label-control">
                <label for="">Add Entry Here</label>
                <input type="text" class="form-control" id="hosting_package_val" placeholder="Add Entry Here">
                <a href="#" id="submit_hosting_package">Submit</a>
            </div>
        </form>

    </div>

    <div class="col-md-9">

        <?php foreach ($hostingPackages as $hostingPackage) { ?>

            <label>
                <?php echo $hostingPackage['hosting_packages']; ?>
                <a href="#" class="remove_hosting_package" id="<?php echo $hostingPackage['id']; ?>">x</a>
            </label>
            <br />

        <?php } ?>

    </div>
</div>


<script>
$(document).ready(function(){

    $('#submit_hosting_package').on('click', function(e){
        e.preventDefault();
        let hosting_package_val = $('#hosting_package_val').val();        
        $.ajax({
            url: '/system_configs/hosting_packages/add',
            type: 'POST',
            data: {"hosting_packages":hosting_package_val},
            success: function (result) {
                // $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

        $.ajax({
            url: '/system_configs/hosting_packages',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_hosting_packages").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

    });

    $(".remove_hosting_package").on('click', function(e){
        e.preventDefault();
        let hosting_package_id = this.id;
        // alert(domain_location_id);
        $.ajax({
            url: '/system_configs/hosting_packages/delete',
            type: 'POST',
            data: {"id":hosting_package_id},
            success: function (result) {
                // $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });
        $.ajax({
            url: '/system_configs/hosting_packages',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_hosting_packages").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

    });

});
</script>
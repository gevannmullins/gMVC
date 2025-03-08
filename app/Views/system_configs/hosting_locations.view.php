
<div class="row">
    <div class="col-md-12">
        <h3>Hosting Locations</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-3">

        <form role="form" id="hosting_locations_form">
            <div class="form-group float-label-control">
                <label for="">Add Entry Here</label>
                <input type="text" class="form-control" id="hosting_location_val" placeholder="Add Entry Here">
                <a href="#" id="submit_hosting_location">Submit</a>
            </div>
        </form>

    </div>

    <div class="col-md-9">

        <?php foreach ($hostingLocations as $hostingLocation) { ?>

            <label>
                <?php echo $hostingLocation['hosting_locations']; ?>
                <a href="#" class="remove_hosting_location" id="<?php echo $hostingLocation['id']; ?>">x</a>
            </label>
            <br />

        <?php } ?>

    </div>
</div>


<script>
$(document).ready(function(){

    $('#submit_hosting_location').on('click', function(e){
        e.preventDefault();
        let hosting_location_val = $('#hosting_location_val').val();        
        $.ajax({
            url: '/system_configs/hosting_locations/add',
            type: 'POST',
            data: {"hosting_locations":hosting_location_val},
            success: function (result) {
                // $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

        $.ajax({
            url: '/system_configs/hosting_locations',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_hosting_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

    });

    $(".remove_hosting_location").on('click', function(e){
        e.preventDefault();
        let hosting_location_id = this.id;
        // alert(domain_location_id);
        $.ajax({
            url: '/system_configs/hosting_locations/delete',
            type: 'POST',
            data: {"id":hosting_location_id},
            success: function (result) {
                // $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });
        $.ajax({
            url: '/system_configs/hosting_locations',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_hosting_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

    });

});
</script>
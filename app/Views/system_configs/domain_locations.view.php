
<div class="row">
    <div class="col-md-12">
        <h3>Domain Locations</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-3">

        <form role="form" id="domain_locations_form">
            <div class="form-group float-label-control">
                <label for="">Add Entry Here</label>
                <input type="text" class="form-control" id="domain_location_value" placeholder="Add Entry Here">
                <a href="#" id="submit_domain_location">Submit</a>
            </div>
        </form>

    </div>

    <div class="col-md-9">

        <?php foreach ($domainLocations as $domainLocation) { ?>

            <label>
                <?php echo $domainLocation['domain_locations']; ?>
                <a href="#" class="remove_domain_location" id="<?php echo $domainLocation['id']; ?>">x</a>
            </label>
            <br />

        <?php } ?>

    </div>
</div>


<script>
$(document).ready(function(){

    $('#submit_domain_location').on('click', function(e){
        e.preventDefault();
        let domain_location_val = $('#domain_location_value').val();        
        $.ajax({
            url: '/system_configs/domain_locations/add',
            type: 'POST',
            data: {"domain_locations":domain_location_val},
            success: function (result) {
                // $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

        $.ajax({
            url: '/system_configs/domain_locations',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

    });

    $(".remove_domain_location").on('click', function(e){
        e.preventDefault();
        let domain_location_id = this.id;
        // alert(domain_location_id);
        $.ajax({
            url: '/system_configs/domain_locations/delete',
            type: 'POST',
            data: {"id":domain_location_id},
            success: function (result) {
                // $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });
        $.ajax({
            url: '/system_configs/domain_locations',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

    });

});
</script>
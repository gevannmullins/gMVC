
<div class="row">
    <div class="col-md-12">
        <h3>Ownerships</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-3">

        <form role="form" id="ownerships_form">
            <div class="form-group float-label-control">
                <label for="">Add Entry Here</label>
                <input type="text" class="form-control" id="ownership_val" placeholder="Add Entry Here">
                <a href="#" id="submit_ownership">Submit</a>
            </div>
        </form>

    </div>

    <div class="col-md-9">

        <?php foreach ($ownerships as $ownership) { ?>

            <label>
                <?php echo $ownership['ownerships']; ?>
                <a href="#" class="remove_ownership" id="<?php echo $ownership['id']; ?>">x</a>
            </label>
            <br />

        <?php } ?>

    </div>
</div>

<script>
$(document).ready(function(){

    $('#submit_ownership').on('click', function(e){
        e.preventDefault();
        let ownership_val = $('#ownership_val').val();        
        $.ajax({
            url: '/system_configs/ownerships/add',
            type: 'POST',
            data: {"ownerships":ownership_val},
            success: function (result) {
                // $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

        $.ajax({
            url: '/system_configs/ownerships',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_ownerships").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

    });

    $(".remove_ownership").on('click', function(e){
        e.preventDefault();
        let ownership_id = this.id;
        // alert(domain_location_id);
        $.ajax({
            url: '/system_configs/ownerships/delete',
            type: 'POST',
            data: {"id":ownership_id},
            success: function (result) {
                // $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });
        $.ajax({
            url: '/system_configs/ownerships',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_ownerships").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

    });

});
</script>
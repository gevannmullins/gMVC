
<div class="row">
    <div class="col-md-12">
        <h3>Domain Extensions</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-3">

        <form role="form" id="domain_extensions_form">
            <div class="form-group float-label-control">
                <label for="">Add Entry Here</label>
                <input type="text" class="form-control" id="domain_extension_val" placeholder="Add Entry Here">
                <a href="#" id="submit_domain_extension">Submit</a>
            </div>
        </form>

    </div>

    <div class="col-md-9">

        <?php foreach ($domainExtensions as $domainExtension) { ?>

            <label>
                <?php echo $domainExtension['domain_extensions']; ?>
                <a href="#" class="remove_domain_extension" id="<?php echo $domainExtension['id']; ?>">x</a>
            </label>
            <br />

        <?php } ?>

    </div>
</div>

<script>
$(document).ready(function(){

    $('#submit_domain_extension').on('click', function(e){
        e.preventDefault();
        let domain_extension_val = $('#domain_extension_val').val();        
        $.ajax({
            url: '/system_configs/domain_extensions/add',
            type: 'POST',
            data: {"domain_extensions":domain_extension_val},
            success: function (result) {
                // $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

        $.ajax({
            url: '/system_configs/domain_extensions',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_domain_extensions").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

    });

    $(".remove_domain_extension").on('click', function(e){
        e.preventDefault();
        let domain_extension_id = this.id;
        // alert(domain_location_id);
        $.ajax({
            url: '/system_configs/domain_extensions/delete',
            type: 'POST',
            data: {"id":domain_extension_id},
            success: function (result) {
                // $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });
        $.ajax({
            url: '/system_configs/domain_extensions',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_domain_extensions").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

    });

});
</script>
<style>
    .mar_to_bo_30 {
        margin-top: 30px;
        margin-bottom: 30px;
    }
</style>

<div class="container-fluid mar_to_bo_30">
    <div class="row">

        <div class="col-md-3">
            <ul>
                <?php foreach($clients as $client){ ?>

                    <li><?php echo $client[0]; ?></li>

                <?php } ?>
            </ul>
        </div>
    

        <div class="col-md-9">
            Client Profiles
        </div>
    
    
    </div>
</div>
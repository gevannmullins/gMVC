
<form id="domainManageForm" action="/domainsManagement/add" method="POST">

    <?php if(isset($rowData["id"])) { ?>
        <input type="hidden" name="id" value="<?php echo $rowData['id']; ?>" />
    <?php } ?>

    <!-- Company -->
    <div class="form-group">
        <label for="company">Company</label>
        <select name="company" id="company" class="form-control">
            <?php foreach($clients as $client){ ?>
                <?php 
                    $selectedC = ""; 
                    if($rowData['company'] == $client['company']){ $selectedC="selected"; }
                ?>
                <option value="<?php echo $client['company']; ?>" <?php echo $selectedC;?>>
                    <?php echo $client['company']; ?>
                </option>
            <?php } ?>
        </select>
    </div>


    <!-- Domain Name -->
    <div class="form-group">
        <label for="domain">Domain</label>
        <input type="text" class="form-control" id="domain" name="domain" value="<?php if(isset($rowData['domain'])){ echo $rowData['domain']; } else { echo ''; } ?>" required>
    </div>

    <!-- Domain Locations -->
    <div class="form-group">
        <label for="location">Location</label>
        <select name="location" id="location" class="form-control">
            <option value=""></option>
            <?php foreach($domainLocations as $domainLocation){ ?>
                <?php 
                    $selectedDL = ""; 
                    if($rowData['location'] == $domainLocation['domain_locations']){ $selectedDL="selected"; }
                ?>
                <option value="<?php echo $domainLocation['domain_locations']; ?>" <?php echo $selectedDL;?>>
                    <?php echo $domainLocation['domain_locations']; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <!-- Ownerships -->
    <div class="form-group">
        <label for="owned">Owned</label>
        <select name="owned" id="owned" class="form-control">
            <option value=""></option>
            <?php foreach($ownerships as $ownership){ ?>
                <?php 
                    $selectedO = ""; 
                    if($rowData['owned_by'] == $ownership['ownerships']){ $selectedO="selected"; }
                ?>
                <option value="<?php echo $ownership['ownerships']; ?>" <?php echo $selectedO;?>>
                    <?php echo $ownership['ownerships']; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <!-- Hosting Locations -->
    <div class="form-group">
        <label for="hosted">Hosted</label>
        <select name="hosted" id="hosted" class="form-control">
            <option value=""></option>
            <?php foreach($hostingLocations as $hostingLocation){ ?>
                <?php 
                    $selectedHL = ""; 
                    if($rowData['hosted_by'] == $hostingLocation['hosting_locations']){ $selectedHL="selected"; }
                ?>
                <option value="<?php echo $hostingLocation['hosting_locations']; ?>" <?php echo $selectedHL;?>>
                    <?php echo $hostingLocation['hosting_locations']; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <!-- Client Reg Date -->
    <div class="form-group">
        <label for="client_reg_date">Client Reg Date</label>
        <input type="date" class="form-control" id="client_reg_date" name="client_reg_date" value="<?php if(isset($rowData['client_reg_date'])){ echo $rowData['client_reg_date']; } else { echo ''; } ?>">
    </div>

    <!-- Emerge Reg Date -->
    <div class="form-group">
        <label for="emerge_reg_date">Emerge Reg Date</label>
        <input type="date" class="form-control" id="emerge_reg_date" name="emerge_reg_date" value="<?php if(isset($rowData['emerge_reg_date'])){ echo $rowData['emerge_reg_date']; } else { echo ''; } ?>">
    </div>

    <!-- Renewal Date -->
    <div class="form-group">
        <label for="renewal_date">Renewal Date</label>
        <input type="date" class="form-control" id="renewal_date" name="renewal_date" value="<?php if(isset($rowData['renewal_date'])){ echo $rowData['renewal_date']; } else { echo ''; } ?>">
    </div>

    <!-- Cancel Date -->
    <div class="form-group">
        <label for="emerge_reg_date">Cancel Date</label>
        <input type="date" class="form-control" id="cancel_date" name="cancel_date" value="<?php if(isset($rowData['cancel_date'])){ echo $rowData['cancel_date']; } else { echo ''; } ?>">
    </div>

    <!-- Trans Date -->
    <div class="form-group">
        <label for="trans_date">Client Reg Date</label>
        <input type="date" class="form-control" id="trans_date" name="trans_date" value="<?php if(isset($rowData['trans_date'])){ echo $rowData['trans_date']; } else { echo ''; } ?>">
    </div>


    <!-- Domain Extension -->
    <div class="form-group">
        <label for="domain_extension">Domain Ext</label>
        <select name="domain_extension" id="domain_extension" class="form-control">
            <option value=""></option>
            <?php foreach($domainExtensions as $domainExtension){ ?>
                <?php 
                    $selectedDE = ""; 
                    if($rowData['domain_extension'] == $domainExtension['domain_extensions']){ $selectedDE="selected"; }
                ?>
                <option value="<?php echo $domainExtension['domain_extensions']; ?>" <?php echo $selectedDE;?>>
                    <?php echo $domainExtension['domain_extensions']; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <!-- Domain Cost -->
    <div class="form-group">
        <label for="domain_cost">Domain Cost</label>
        <input type="text" class="form-control" id="domain_cost" name="domain_cost" value="<?php if(isset($rowData['domain_cost'])){ echo $rowData['domain_cost']; } else { echo ''; } ?>">
    </div>

    <!-- Domain R -->
    <div class="form-group">
        <label for="domain_r">Domain R</label>
        <input type="text" class="form-control" id="domain_r" name="domain_r" value="<?php if(isset($rowData['domain_r'])){ echo $rowData['domain_r']; } else { echo ''; } ?>">
    </div>

    <!-- Host Package GB -->
    <div class="form-group">
        <label for="host_package_gb">HOST PKG (GB)</label>
        <input type="text" class="form-control" id="host_package_gb" name="host_package_gb" value="<?php if(isset($rowData['host_package_gb'])){ echo $rowData['host_package_gb']; } else { echo ''; } ?>">
    </div>

    <!-- Hosting R -->
    <div class="form-group">
        <label for="hosting_r">Hosting R</label>
        <input type="text" class="form-control" id="hosting_r" name="hosting_r" value="<?php if(isset($rowData['hosting_r'])){ echo $rowData['hosting_r']; } else { echo ''; } ?>">
    </div>

    <!-- Brand -->
    <div class="form-group">
        <label for="brand">Brand</label>
        <select name="brand" id="brand" class="form-control">
            <option value="Emerge" <?php if($rowData['brand'] == 'Emerge'){ echo "selected"; } ?>>Emerge</option>
            <option value="Open" <?php if($rowData['brand'] == 'Open'){ echo "selected"; } ?>>Open</option>
            <option value="Client" <?php if($rowData['brand'] == 'Client'){ echo "selected"; } ?>>Client</option>
        </select>
    </div>

    <!-- Website -->
    <div class="form-group">
        <label for="website">Website</label>
        <select name="website" id="website" class="form-control">
            <option value="Emerge" <?php if($rowData['website'] == 'Emerge'){ echo "selected"; } ?>>Emerge</option>
            <option value="Open" <?php if($rowData['website'] == 'Open'){ echo "selected"; } ?>>Open</option>
            <option value="Client" <?php if($rowData['website'] == 'Client'){ echo "selected"; } ?>>Client</option>
        </select>
    </div>

    <!-- Doms -->
    <div class="form-group">
        <label for="doms">Domain</label>
        <select name="doms" id="doms" class="form-control">
            <option value="Emerge" <?php if($rowData['doms'] == 'Emerge'){ echo "selected"; } ?>>Emerge</option>
            <option value="Open" <?php if($rowData['doms'] == 'Open'){ echo "selected"; } ?>>Open</option>
            <option value="Client" <?php if($rowData['doms'] == 'Client'){ echo "selected"; } ?>>Client</option>
        </select>
    </div>

    <!-- Hosting -->
    <div class="form-group">
        <label for="hosting">Hosting</label>
        <select name="hosting" id="hosting" class="form-control">
            <option value="Emerge" <?php if($rowData['hosting'] == 'Emerge'){ echo "selected"; } ?>>Emerge</option>
            <option value="Open" <?php if($rowData['hosting'] == 'Open'){ echo "selected"; } ?>>Open</option>
            <option value="Client" <?php if($rowData['hosting'] == 'Client'){ echo "selected"; } ?>>Client</option>
        </select>
    </div>

    <!-- Notes -->
    <div class="form-group">
        <label for="notes">Domain Notes</label>
        <input type="text" class="form-control" id="notes" name="notes" value="<?php if(isset($rowData['notes'])){ echo $rowData['notes']; } else { echo ''; } ?>">
    </div>

    <input type="hidden" name="created_by" value="<?php echo $_SESSION["user_id"]; ?>" />

    <button type="submit" class="btn btn-primary">Submit</button>
    <?php if(isset($rowData["id"])) { ?>
        <button class="btn btn-danger" id="deleteDomainBtn" domainId="<?php echo $rowData['id']; ?>" style="float:right;">Delete</button>
    <?php } ?>

</form>

<script>
    $(document).ready(function(){

        $("#deleteDomainBtn").on("click", function(e){
            e.preventDefault();

            let domainId = $(this).attr("domainId");

            $.ajax({
                type: 'POST',
                url: '/domainManagement/delete',
                data: {"domainId":domainId},
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

        let postPath = "/domainManagement/add";
        <?php
        if(isset($rowData['id'])){
            ?>
            postPath = "/domainManagement/update";
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
                    // console.log(returnData);
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
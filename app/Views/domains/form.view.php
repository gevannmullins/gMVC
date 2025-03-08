
<form name="domainManageForm" id="domainManageForm" action="/domains/add" method="POST">

    <?php if(isset($rowData["id"])) { ?>
        <input type="hidden" name="id" value="<?php echo $rowData['id']; ?>" />
    <?php } ?>

    <?php if(isset($rowData["id"])) { ?>
        <input type="hidden" name="originalDomain" value="<?php echo $rowData['domain']; ?>" />
    <?php } ?>

    <!-- Domain Name -->
    <div class="form-group">
        <label for="domain">Domain</label>
        <input type="text" class="form-control" id="domain" name="domain" value="<?php if(isset($rowData['domain'])){ echo $rowData['domain']; } else { echo ''; } ?>" required>
    </div>

    <!-- Company -->
    <div class="form-group">
        <label for="company">Company</label>
        <select name="company" id="company" class="form-control">
            <option value=""></option>
            <?php foreach($clients as $client){ ?>
                <?php 
                    $selectedDE = ""; 
                    if($rowData['company'] == $client['company']){ $selectedDE="selected"; }
                ?>
                <option value="<?php echo $client['company']; ?>" <?php echo $selectedDE;?>>
                    <?php echo $client['company']; ?>
                </option>
            <?php } ?>
        </select>
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
        <label for="owned_by">Owned</label>
        <select name="owned_by" id="owned_by" class="form-control">
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
        <label for="hosted_by">Hosted</label>
        <select name="hosted_by" id="hosted_by" class="form-control">
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

    <!--
    <div class="form-group">
        <label for="domain_ext">Domain Ext</label>
        <select name="domain_ext" id="domain_ext" class="form-control">
            <option value=""></option>
            <?php //foreach($domainExtensions as $domainExtension){ ?>
                <?php 
                    //$selectedDE = ""; 
                    //if($rowData['domain_ext'] == $domainExtension['domain_extensions']){ $selectedDE="selected"; }
                ?>
                <option value="<?php //echo $domainExtension['domain_extensions']; ?>" <?php //echo $selectedDE;?>>
                    <?php //echo $domainExtension['domain_extensions']; ?>
                </option>
            <?php //} ?>
        </select>
    </div>
    -->
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
        <input type="text" class="form-control" id="domain_notes" name="domain_notes" value="<?php if(isset($rowData['domain_notes'])){ echo $rowData['domain_notes']; } else { echo ''; } ?>">
    </div>

    <input type="hidden" name="last_edited_by" value="<?php echo $_SESSION["user_id"]; ?>" />

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
                url: '/domains/delete',
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

        let postPath = "/domains/add";
        <?php if(isset($rowData['id'])){ ?>
            postPath = "/domains/update";
        <?php } ?>

        console.log("Here is the POSTPATH: "+postPath);

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
                    console.log(returnData);
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
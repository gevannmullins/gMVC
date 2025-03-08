<!-- Project Entry Form -->
<form id="packagesForm" action="/packages/add" method="POST">
    <?php if(isset($rowData["id"])) { ?>
        <input type="hidden" name="id" value="<?php echo $rowData['id']; ?>" />
    <?php } ?>
    <div class="form-group">
        <label for="domain">Domain</label>
        <input type="text" class="form-control" id="domain" name="domain" value="<?php if(isset($rowData)){ echo $rowData['domain']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="hosted">Hosted</label>
        <input type="text" class="form-control" id="hosted" name="hosted" value="<?php if(isset($rowData)){ echo $rowData['hosted']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="package_size">Package Size</label>
        <input type="text" class="form-control" id="package_size" name="package_size" value="<?php if(isset($rowData)){ echo $rowData['package_size']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="text" class="form-control" id="quantity" name="quantity" value="<?php if(isset($rowData)){ echo $rowData['quantity']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="cost">Cost</label>
        <input type="text" class="form-control" id="cost" name="cost" value="<?php if(isset($rowData)){ echo $rowData['cost']; } ?>" required>
    </div>
    <input type="hidden" name="last_edited_by" value="<?php echo $_SESSION["user_id"]; ?>" />

    <button type="submit" class="btn btn-primary">Submit</button>
    <?php if(isset($rowData["id"])) { ?>
        <button class="btn btn-danger" id="deletePackageBtn" packageId="<?php echo $rowData['id']; ?>" style="float:right;">Delete</button>
    <?php } ?>
</form>

<script>
    $(document).ready(function(){

        $("#deletePackageBtn").on("click", function(e){
            e.preventDefault();

            let packageId = $(this).attr("packageId");

            $.ajax({
                type: 'POST',
                url: '/packages/delete',
                data: {"packageId":packageId},
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

        let postPath = "/packages/add";
        <?php
        if(isset($rowData['id'])){
            ?>
            postPath = "/packages/update";
            <?php
        }
        ?>

        $('#packagesForm').on('submit', function (e) {
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
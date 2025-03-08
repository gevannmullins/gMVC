<style>
    #editImage {
        width:600px;
        height:600px;
    }
</style>

<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-12"> -->


        <!-- <span class="close">&times;</span> -->
        <img id="editImage" src="<?php echo $data["selectedImagePath"]; ?>" alt="Image to edit" style="width:500px;height:500px;">
        <button id="saveEdit">Save</button>



        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->

<script>
    $(document).ready(function(){

        let cropper;
        let selectedImagePath;



        const image = document.getElementById('editImage');
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 1,
            data:{
                    width: 600,
                    height:  606,
                },
        });


    });
</script>

<script>
    $(document).ready(function(){

        $(".cropper-container .cropper-bg").ready(function(){
            $(this).css({
                width: "500px",
                height: "500px",
            });
        });

        $(".cropper-container .cropper-bg").css({
            width: "500px",
            height: "500px",
        });

        $(".cropper-container .cropper-bg").css('width', '500px');
        $(".cropper-container .cropper-bg").css('height', '500px');

        $(".cropper-container .cropper-bg").attr("style", "width:500px;height:500px");

    });
</script>
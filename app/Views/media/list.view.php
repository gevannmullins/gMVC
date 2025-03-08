<div class="container" style="margin-top: 20px;margin-bottom:20px;">
    <div class="row">
        <div class="col-md-6">
            <h1 style="margin-top:0px;margin-bottom:0px;">Media Management</h1>
        </div>

        <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" id="uploadMediaButton">
                Upload Media
            </button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">

            <table id="media" class="display" width="100%"
                style="display:block;overflow-x:auto;white-space:nowrap;margin:0 auto;"></table>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php foreach($data as $media_item){ ?>

            <div class="col-md-2 text-center">

                <img src="<?php echo $media_item['file_path']; ?>" class="img-responsive editable-image" data-file="<?php echo $media_item['file_path']; ?>" />

            </div>

        <?php } ?>
    </div>
</div>


<script type="text/javascript" language="javascript">
    $(document).ready(function () {

        $("#uploadMediaButton").on('click', function () {
            $.ajax({
                url: '/media/form',
                type: 'POST',
                data: {},
                success: function (result) {
                    $(".adminGlobalBodyContent").html(result);
                    $("#adminGlobalModalLabel").text("Upload Media");
                    $("#adminGlobalModal").modal({ backdrop: 'static', keyboard: false }, 'show');
                },
                done: function (result) {

                },
                error: function () {
                    console.log('error');
                }
            });
        })

    });
</script>

<script>
    $(document).ready(function () {

        let dataSet = <?php echo json_encode($data); ?>


        let table = new DataTable('#media', {
            columns: [
                { data: 'id', title: 'ID' },
                { data: 'label', title: 'Name' },
                { data: 'type', title: 'File Type' },
                { data: 'category', title: 'Category' },
                { data: 'description', title: 'Description' },
                { data: 'file_path', title: 'File Path' },
                { data: 'user_id', title: 'USER ID' },
                { data: 'created_at', title: 'Date Created' }
            ],
            data: dataSet
        });



    });
</script>

<script>
        $(document).ready(function() {
            // let cropper;
            // let selectedImagePath;

            // // // When clicking on an image
            // $('.editable-image').click(function() {
            //     selectedImagePath = $(this).data('file');
            //     $('#editImage').attr('src', selectedImagePath);
            //     $('#editModal').css('display', 'block');

            //     // Initialize cropper on the image
            //     const image = document.getElementById('editImage');
            //     cropper = new Cropper(image, {
            //         aspectRatio: 16 / 9,
            //         viewMode: 1,
            //         autoCropArea: 1,
            //         scalable: true,
            //         zoomable: true,
            //         rotatable: true,
            //     });
            // });

            // $('.editable-image').on('click', function () {
            //     currentImageId = $(this).data('id');
            //     let src = $(this).attr('src');

            //     $('#editImage').attr('src', src);
            //     $('#imageModal').modal('show');

            //     cropper = new Cropper(document.getElementById('editImage'), {
            //         aspectRatio: 16 / 9,
            //         viewMode: 1,
            //         autoCropArea: 1,
            //         scalable: true,
            //         zoomable: true,
            //         rotatable: true,
            //     });
            // });

            $(".editable-image").on("click", function(e){
                // e.preventDefault();
                selectedImagePath = $(this).data('file');

                $.ajax({
                    url: '/media/mediaEditorForm',
                    type: 'POST',
                    data: {"selectedImagePath": selectedImagePath},
                    success: function (result) {
                        $(".adminGlobalBodyContent").html(result);
                        $("#adminGlobalModalLabel").text("Edit Image");
                        $("#adminGlobalModal").modal({ backdrop: 'static', keyboard: false }, 'show');
                    },
                    done: function (result) {

                    },
                    error: function () {
                        console.log('error');
                    }
                });


            });


            // Close modal
            $('.close').click(function() {
                $('#editModal').css('display', 'none');
                cropper.destroy();
            });

            // Save edited image
            $('#saveEdit').click(function() {
                const canvas = cropper.getCroppedCanvas();
                canvas.toBlob(function(blob) {
                    const formData = new FormData();
                    formData.append('image', blob);
                    formData.append('filePath', selectedImagePath);

                    // Send the edited image to the server
                    $.ajax('save.php', {
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success() {
                            alert('Image saved successfully.');
                            location.reload();
                        },
                        error() {
                            alert('Failed to save image.');
                        }
                    });
                });
            });
        });
    </script>


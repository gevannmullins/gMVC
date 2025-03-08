<style>
    .profile-container {
        margin-top: 30px;
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-sidebar {
        text-align: center;
    }

    .profile-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin-bottom: 15px;
        cursor: pointer;
    }

    .profile-info h3 {
        margin-top: 0;
        margin-bottom: 10px;
        color: #666;
    }

    .form-section-title {
        font-size: 14px;
        color: #666;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .btn-custom {
        border-radius: 20px;
    }

    .btn-custom-dark {
        background-color: #333;
        color: #fff;
        border-radius: 20px;
    }

    .image-thumbnail {
        width: 100px;
        height: 100px;
        margin: 10px;
        cursor: pointer;
    }
</style>

<div class="container profile-container">
    <div class="row">
        <!-- Profile Sidebar -->
        <div class="col-md-3 profile-sidebar">
        <img src="<?php echo $userProfile['profile_image_path']; ?>" alt="Profile Image" class="profile-img" id="profileImage">
            <h3><?php echo $userProfile['first_name'] . " " . $userProfile['last_name']; ?></h3>
            <p><?php echo $userProfile['company_name']; ?></p>
            <p><strong>Birthday:</strong><?php echo $userProfile['dob']; ?></p>
            <p><strong>Age:</strong> <?php echo $userProfile['age']; ?></p>
            <p><strong>Date Added:</strong><?php echo $userProfile['created_at']; ?></p>
            <button class="btn btn-default btn-custom">Send Profile</button>
        </div>
        <form id="userProfileForm">
        <!-- Profile Details -->
        <div class="col-md-9">
            <h4>Profile Details</h4>
            <!-- Contact Information -->
            <div class="form-section">
                <div class="form-section-title">Contact Information</div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" value="<?php if(isset($userProfile['first_name'])){ echo $userProfile['first_name']; } ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Middle Name" name="middle_name" value="<?php if(isset($userProfile['middle_name'])){ echo $userProfile['middle_name']; } ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Surname" name="last_name" value="<?php if(isset($userProfile['last_name'])){ echo $userProfile['last_name']; } ?>">
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Job Title" name="job_title" value="<?php if(isset($userProfile['job_title'])){ echo $userProfile['job_title']; } ?>">
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control datepicker" data-date-format="mm/dd/yyyy" placeholder="Date of Birth" name="dob" value="<?php if(isset($userProfile['dob'])){ echo $userProfile['dob']; } ?>">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" name="gender">
                            <option>Gender</option>
                            <option value="Male" <?php if($userProfile['gender'] == 'Male'){ echo 'selected=selected'; } ?>>Male</option>
                            <option value="Female" <?php if($userProfile['gender'] == 'Female'){ echo 'selected=selected'; } ?>>Female</option>
                            <option value="Other" <?php if($userProfile['gender'] == 'Other'){ echo 'selected=selected'; } ?>>Other</option>
                        </select>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Country" name="country" value="<?php if(isset($userProfile['country'])){ echo $userProfile['country']; } ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Mobile" name="mobile" value="<?php if(isset($userProfile['mobile'])){ echo $userProfile['mobile']; } ?>">
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php if(isset($userProfile['email'])){ echo $userProfile['email']; } ?>">
                    </div>
                    <div class="col-md-6">
                        <textarea class="form-control" placeholder="General Notes" name="general_notes" rows="2">
                        <?php if(isset($userProfile['general_notes'])){ echo $userProfile['general_notes']; } ?>
                        </textarea>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-12">
                        <textarea class="form-control" placeholder="Company Notes" name="company_notes" rows="2">
                        <?php if(isset($userProfile['company_notes'])){ echo $userProfile['company_notes']; } ?>
                        </textarea>
                    </div>
                </div>
            </div>

            <!-- Company Information -->
            <div class="form-section" style="margin-top: 20px;">
                <div class="form-section-title">Company Information</div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Name" name="company_name" value="<?php if(isset($userProfile['company_name'])){ echo $userProfile['company_name']; } ?>">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder="Type" name="company_type" value="<?php if(isset($userProfile['company_type'])){ echo $userProfile['company_type']; } ?>">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder="Reg" name="company_reg" value="<?php if(isset($userProfile['company_reg'])){ echo $userProfile['company_reg']; } ?>">
                    </div>
                </div>
            </div>

            <!-- Account Information -->
            <div class="form-section" style="margin-top: 20px;">
                <div class="form-section-title">Account Information</div>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default btn-block btn-custom">View Projects</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-default btn-block btn-custom">View Billing</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-custom-dark btn-block">View Reports</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-default">Update Profile</button>
        </form>
    </div>
</div>
<!-- Include FontAwesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>


<!-- Modal for Image Selection -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Select Profile Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" id="imageGallery">
                    <!-- Thumbnails will be loaded here dynamically -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        // $('.datepicker').datepicker({
            // format: 'mm/dd/yyyy',
            // startDate: '-3d'
        // });

        let mediaImages = <?php echo json_encode($media); ?>;
        console.log(mediaImages);

        function loadImages() {
            $('#imageGallery').empty();
            mediaImages.forEach(function (src, index) {
                $('#imageGallery').append(
                    '<div class="col-md-4">' +
                    '<img src="' + src.file_path + '" class="img-thumbnail image-thumbnail" data-index="' + index + '">' +
                    '</div>'
                );
            });
        }

        // Open modal when profile image is clicked
        $('#profileImage').on('click', function () {
            loadImages();
            $('#imageModal').modal('show');
        });

        // Handle image selection
        $(document).on('click', '.image-thumbnail', function () {
            var selectedImageSrc = $(this).attr('src');
            $('#profileImage').attr('src', selectedImageSrc);
            $('#imageModal').modal('hide');

            // Perform AJAX request to save the selected image as profile image
            $.ajax({
                type: 'POST',
                url: '/user/updateProfileImage', // Endpoint to handle profile image update
                data: { 'imageUrl': selectedImageSrc },
                success: function (response) {
                    console.log('Profile image updated successfully.');
                },
                error: function () {
                    console.log('Error updating profile image.');
                }
            });
        });



        $("#userProfileForm").on("submit", function(e){

            $.ajax({
                type: 'POST',
                crossDomain: true,
                url: '/user/updateProfile',
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
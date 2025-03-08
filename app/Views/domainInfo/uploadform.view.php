<style>
    #overlay{	
  position: fixed;
  top: 0;
  left: 0;
  z-index: 99999999999999999;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
  border-radius: 20px;
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
</style>
<h2>Upload Excel File to Import Data</h2>
<form id="import_form" action="" method="post" enctype="multipart/form-data">
    <label for="excelFile">Select Excel File:</label>
    <input type="file" name="excelFile" id="excelFile" accept=".xlsx, .xls" required>
    <br><br>
    <input type="submit" value="Upload and Import"><label id="loaderLabel"></label>
    <!-- <a id="submitUpload">Upload and Import to Inventory<label id="loaderLabel"></label></a> -->

</form>

<div id="fileResult">
    <!-- <img src="/assets/images/gator_anim.gif" /> -->
</div>


<script>
    $(document).ready(function () {

        $('#import_form').on('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission
            // Prepare the form data
            var formData = new FormData(this);
            // Send the AJAX request
            $.ajax({
                url: '/domainInfo/saveBulkUpload', // URL to the external PHP script
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $("#overlay").fadeIn(300);
                },
                success: function (response) {
                    console.log(response);
                    $('#fileResult').html(response); // Display the response from the server
                    $("#loaderLabel").empty();
                    // $("#bulkImportModal").modal('hide');
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('#result').html('Error: ' + textStatus + ' - ' + errorThrown);
                }
            }).done(function () {
                setTimeout(function () {
                    $("#overlay").fadeOut(300);
                }, 500);
            });
        });




    });
</script>
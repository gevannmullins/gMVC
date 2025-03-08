<h2>Upload a Media File</h2>
<form action="/media/upload" method="post" enctype="multipart/form-data">
    <label for="file">Choose a file:</label>
    <input type="file" name="file" id="file" required>
    <input type="text" name="label" id="label_name" />
    <input type="text" name="type" id="file_type" />
    <input type="text" name="category" id="category" />
    <input type="text" name="description" id="description" />

    <input type="submit" name="submit" value="Upload">
</form>

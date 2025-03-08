<!DOCTYPE html>
<html>
<head>
    <title>Edit Company</title>
</head>
<body>
    <h1>Edit Company</h1>
    <form method="POST" action="/companies/edit/<?php echo $company['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $company['name']; ?>" required>
        <br>
        <label for="address">Address:</label>
        <textarea id="address" name="address"><?php echo $company['address']; ?></textarea>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $company['email']; ?>">
        <br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $company['phone']; ?>">
        <br>
        <input type="submit" value="Update Company">
    </form>
</body>
</html>

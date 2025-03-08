<!DOCTYPE html>
<html>
<head>
    <title>Add New Company</title>
</head>
<body>
    <h1>Add New Company</h1>
    <form method="POST" action="/companies/create">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="address">Address:</label>
        <textarea id="address" name="address"></textarea>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone">
        <br>
        <input type="submit" value="Add Company">
    </form>
</body>
</html>

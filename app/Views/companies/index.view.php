<!DOCTYPE html>
<html>
<head>
    <title>Companies</title>
</head>
<body>
    <h1>Companies</h1>
    <a href="/companies/create">Add New Company</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($companies as $company): ?>
                <tr>
                    <td><?php echo $company['id']; ?></td>
                    <td><?php echo $company['name']; ?></td>
                    <td><?php echo $company['address']; ?></td>
                    <td><?php echo $company['email']; ?></td>
                    <td><?php echo $company['phone']; ?></td>
                    <td>
                        <a href="/companies/edit/<?php echo $company['id']; ?>">Edit</a>
                        <a href="/companies/delete/<?php echo $company['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

<?php include 'config/db.php'; ?>
<?php include 'partials/header.php'; ?>

<h2>User List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM users");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>
                    <a href='update.php?id={$row['id']}'>Edit</a> | 
                    <a href='delete.php?id={$row['id']}'>Delete</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No users found.</td></tr>";
    }
    ?>
</table>

<?php include 'partials/footer.php'; ?>
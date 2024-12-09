<?php include 'config/db.php'; ?>
<?php include 'partials/header.php'; ?>

<h2>Add New User</h2>
<form action="" method="POST">
    <label>Name:</label>
    <input type="text" name="name" required><br>
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <button type="submit" name="submit">Add User</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute()) {
        echo "User added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<?php include 'partials/footer.php'; ?>
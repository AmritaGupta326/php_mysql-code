<?php include 'config/db.php'; ?>
<?php include 'partials/header.php'; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $email, $id);

    if ($stmt->execute()) {
        echo "User updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Edit User</h2>
<form action="" method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br>
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
    <button type="submit" name="submit">Update User</button>
</form>

<?php include 'partials/footer.php'; ?>
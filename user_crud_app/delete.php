<?php include 'config/db.php'; ?>

<?php
$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM users WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "User deleted successfully!";
} else {
    echo "Error: " . $conn->error;
}
header("Location: index.php");
exit;
?>
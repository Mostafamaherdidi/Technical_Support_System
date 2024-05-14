<?php
include_once 'config.php';

// Check if ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

// Delete related records from the payments table
$id = $_GET['id'];
$sql_delete_payments = "DELETE FROM payments WHERE knowledge_base_category_id=?";
$stmt_delete_payments = $conn->prepare($sql_delete_payments);
$stmt_delete_payments->bind_param("i", $id);
$stmt_delete_payments->execute();
$stmt_delete_payments->close();

// Now delete the record from the knowledge_base table
$sql_delete_kb = "DELETE FROM knowledge_base WHERE id=?";
$stmt_delete_kb = $conn->prepare($sql_delete_kb);
$stmt_delete_kb->bind_param("i", $id);
if ($stmt_delete_kb->execute()) {
    header("Location:dashboard.php?success=1");
    exit();
} else {
    echo 'Failed to delete entry.';
}
$stmt_delete_kb->close();
?>

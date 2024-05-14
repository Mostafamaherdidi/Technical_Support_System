<?php
include_once 'config.php';

// Check if ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: create_service.php");
    exit();
}

// Start a transaction
$conn->begin_transaction();

try {
    // Delete related rows from the payments table
    $id = $_GET['id'];
    $sql = "DELETE FROM payments WHERE knowledge_base_category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Delete knowledge base entry from the database
    $sql = "DELETE FROM knowledge_base WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $conn->commit();
        // Redirect to create_service.php with success message
        header("Location: create_service.php?success=1");
        exit();
    } else {
        $conn->rollback();
        echo 'Failed to delete knowledge base entry.';
    }
    $stmt->close();
} catch (mysqli_sql_exception $e) {
    $conn->rollback();
    echo 'Error: ' . $e->getMessage();
}
?>
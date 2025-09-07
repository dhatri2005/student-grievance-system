<?php
session_start();
include("../inc/conn.php");

// Enable error reporting for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Debug: show parameters (remove in production)
print_r($_GET);
print_r($_POST);

// Check and sanitize parameters
if (isset($_GET['status']) && isset($_GET['comp_id'])) {
    $status = intval($_GET['status']);
    $comp_id = intval($_GET['comp_id']);

    // Allow only status 0 or 1
    if ($status === 0 || $status === 1) {
        $stmt = $conn->prepare("UPDATE complaints SET comp_status = ? WHERE comp_id = ?");
        $stmt->bind_param("ii", $status, $comp_id);

        if ($stmt->execute()) {
            echo "✅ Complaint status updated successfully.";
            // Optional: redirect to view page
            // header("Location: viewcomplaint.php?success=1");
        } else {
            echo "❌ Error updating complaint: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "❌ Invalid status value (only 0 or 1 allowed).";
    }
} else {
    echo "⚠️ Incomplete parameters. Required: comp_id and status.";
}
?>

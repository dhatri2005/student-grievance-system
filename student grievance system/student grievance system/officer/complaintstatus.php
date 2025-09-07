<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("db.php"); // DB connection file

// Example: filter by officer_id if session is set
$officer_id = $_SESSION['officer_id'] ?? null;

// Update complaint status
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $comp_id = $_POST['comp_id'];
    $new_status = $_POST['status'];

    $sql = "UPDATE complaints SET comp_status=? WHERE comp_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $new_status, $comp_id);

    if ($stmt->execute()) {
        $msg = "Status updated successfully.";
    } else {
        $msg = "Error updating status.";
    }
}

// Fetch complaints (filter by officer if needed)
$sql = "SELECT * FROM complaints";
if ($officer_id) {
    $sql .= " WHERE officer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $officer_id);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Complaint Status</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f9f9f9;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            background: white;
            width: 100%;
            box-shadow: 0 0 10px #aaa;
        }
        th, td {
            padding: 10px 14px;
            border: 1px solid #ccc;
            text-align: left;
        }
        select, input[type=submit] {
            padding: 4px 8px;
        }
        .msg {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h2>Complaint Status Dashboard</h2>

<?php if (isset($msg)) echo "<p class='msg'>$msg</p>"; ?>

<table>
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Location</th>
        <th>Description</th>
        <th>Date</th>
        <th>Status</th>
        <th>Update</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['comp_id']; ?></td>
        <td><?= htmlspecialchars($row['comp_cat']); ?></td>
        <td><?= htmlspecialchars($row['comp_loct']); ?></td>
        <td><?= htmlspecialchars($row['comp_desc']); ?></td>
        <td><?= $row['comp_date']; ?></td>
        <td>
            <?php
            switch ($row['comp_status']) {
                case 1: echo "Under Review"; break;
                case 2: echo "Resolved"; break;
                default: echo "Pending";
            }
            ?>
        </td>
        <td>
            <form method="POST">
                <input type="hidden" name="comp_id" value="<?= $row['comp_id']; ?>">
                <select name="status">
                    <option value="0" <?= $row['comp_status'] == 0 ? "selected" : "" ?>>Pending</option>
                    <option value="1" <?= $row['comp_status'] == 1 ? "selected" : "" ?>>Under Review</option>
                    <option value="2" <?= $row['comp_status'] == 2 ? "selected" : "" ?>>Resolved</option>
                </select>
                <input type="submit" name="update_status" value="Update">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>

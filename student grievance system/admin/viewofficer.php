<?php
session_start();
include("../inc/conn.php");
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Officer List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <h1 class="py-3 text-center">Officer List!</h1>
    
    

    <div class="container px-5 my-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">ID Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $viewofficer = "SELECT cr.email, o.off_name, o.offno FROM officers AS o JOIN credentials AS cr ON cr.cred_id = o.cred_id";
                $run = mysqli_query($conn, $viewofficer);

                if (!is_bool($run)) {
                    $officers = mysqli_fetch_all($run);
                    if (sizeof($officers) > 0) {
                        for ($i = 0; $i < sizeof($officers); $i++) {
                            echo "<tr>";
                            echo "<th scope='row'>" . ($i + 1) . "</th>";
                            foreach ($officers[$i] as $catview) {
                                echo "<td>$catview</td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td style='text-align:center;' colspan='4'>No Officers Found!</td></tr>";
                    }
                } else {
                    echo "<tr><td style='text-align:center;' colspan='4'>Error Occurred</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

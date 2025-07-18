<?php
include "../../connection.php";

$query = "
    SELECT 
    acc_code,
    acc_created,
    acc_username,
    acc_fname,
    acc_lname,
    acc_email,
    acc_contact
    FROM account
";
$result = mysqli_query($connections, $query);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Accounts Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @media print {
            body {
                margin: 0.5in;
                font-size: 11px;
            }
            .no-print {
                display: none;
            }
            table {
                width: 100%;
                border-collapse: collapse !important;
                font-size: 11px;
            }
            th, td {
                border: none !important;
                padding: 6px 8px;
                text-align: left;
            }
        }

        /* Normal view (optional borders if viewing in browser) */
        table {
            width: 100%;
            font-size: 11px;
        }
        th, td {
            border: none !important;
            padding: 6px 8px;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        #logo {
            width: 100px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="pt-4 d-flex justify-content-between align-items-start">
        <div style="width: 75%">
            <h2 class="fw-bold mb-0">Accounts Report</h2>
            <p class="mb-0">R De Leon Poultry Supplies</p>
            <p class="mb-0">Bagbaguin Sta. Maria Bulacan</p>
            <p class="mb-0">rdeleon@gmail.com | 09876543211</p>
            <p class="mb-0" id="date-today">Date today</p>
        </div>
        <div>
            <img src="assets/img/print_logo.png" id="logo" alt="Company Logo">
        </div>
    </div>

    <hr>

    <table class="mt-3">
        <thead>
            <tr>
                <th>Account Code</th>
                <th>Created Date</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['acc_code']; ?></td>
                    <td><?= $row['acc_created']; ?></td>
                    <td><?= $row['acc_username']; ?></td>
                    <td><?= $row['acc_fname']; ?></td>
                    <td><?= $row['acc_lname']; ?></td>
                    <td><?= $row['acc_email']; ?></td>
                    <td><?= $row['acc_contact']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="mt-5">
        <p class="m-0">________________________</p>
        <p class="m-0">Printed By</p>
    </div>
</div>

<!-- JS for Date -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        const today = new Date();
        const formatted = today.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        $('#date-today').text(formatted);
    });
</script>

</body>
</html>

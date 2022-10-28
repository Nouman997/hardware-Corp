<?php include_once("header.php"); ?>
<?php $result = mysqli_query($mysqli, "SELECT * FROM tbl_corps ORDER BY corps_id ASC"); ?>

<head>
    <title>Home</title>
</head>

<body>
    <div class="container-fluid">
        <h3>View Customers List</h3>
        <table class="table table-striped mt-4">
            <tr bgcolor='#CCCCCC'>
                <th>#</th>
                <th>Customer Name</th>
                <th>Action</th>
            </tr>
            <?php
            $iterator = 0;
            while($res = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".++$iterator."</td>";
                echo "<td>".$res['corps_name']."</td>";
                echo "<td><a href=\"view.php?id=$res[corps_id]\">View Customer Details</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
<?php include_once("footer.php"); ?>
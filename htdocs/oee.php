<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con); //collect user data
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>OEE Calculation and Preventive Maintenance Scheduler</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>
<body>

<main id="main" class="container py-5">
    <?php
    $conn = mysqli_connect("localhost", "root", "roxas1996", "giraffe", "3306");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM oee";
    $result = mysqli_query($conn, $sql);

    // Prepare data for chart
    $labels = [];
    $qualityData = [];
    $performanceData = [];
    $oeeData = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $labels[] = $row['week'];
        $qualityData[] = $row['quality'];
        $performanceData[] = $row['performance_calculation'];
        $oeeData[] = $row['oee_value'];
    }

    ?>
    
    <table class="table">
        <thead>
        <tr>
            <th>Week</th>
            <th>Quality</th>
            <th>Performance Calculation</th>
            <th>OEE Value</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $conn = mysqli_connect("localhost", "root", "roxas1996", "giraffe", "3306");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM oee";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['week']; ?></td>
                <td><?php echo $row['quality']; ?></td>
                <td><?php echo $row['performance_calculation']; ?></td>
                <td><?php echo $row['oee_value']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div id="lineChart"></div>
    <script>
        var qualityTrace = {
            x: <?php echo json_encode($labels); ?>,
            y: <?php echo json_encode($qualityData); ?>,
            mode: 'lines',
            name: 'Quality',
            line: {
                color: 'red'
            }
        };

        var performanceTrace = {
            x: <?php echo json_encode($labels); ?>,
            y: <?php echo json_encode($performanceData); ?>,
            mode: 'lines',
            name: 'Performance Calculation',
            line: {
                color: 'green'
            }
        };

        var oeeTrace = {
            x: <?php echo json_encode($labels); ?>,
            y: <?php echo json_encode($oeeData); ?>,
            mode: 'lines',
            name: 'OEE Value',
            line: {
                color: 'blue'
            }
        };

        var data = [qualityTrace, performanceTrace, oeeTrace];

        var layout = {
            title: 'OEE Line Chart',
            xaxis: {
                title: 'Week'
            },
            yaxis: {
                title: 'Value'
            }
        };

        Plotly.newPlot('lineChart', data, layout);
    </script>
</main>
<footer>
    <a href="logout.php">Click Here to Logout</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Login'; ?></title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

</head>

<body>

    <?php echo $content; ?>


    <?php
    if (RISE_DEBUG === 1) {
        ?>
        <div
            style="position:absolute;right:10px;bottom:10px;height:400px;width:600px;color:#000000;background-color:rgba(250,250,250,.6)">
            <pre><code><?php echo json_encode($data); ?></code></pre>
            <pre><code><?php echo json_encode($_SESSION); ?></code></pre>
            <pre><code><?php echo json_encode($_POST); ?></code></pre>
        </div>
        <?php
    }
    ?>


    <!-- Include Bootstrap JS and dependencies -->
    <script src="../../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>


</body>

</html>
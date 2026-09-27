<?php
// Automatically redirect to the public catalog page
header("Refresh: 0; URL=public/index.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Snack Shop Loading...</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #fafafa;
            margin: 0;
            padding: 40px;
            text-align: center;
            color: #333;
        }

        .box {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            display: inline-block;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h2 {
            margin: 0 0 10px 0;
            color: #444;
        }

        p {
            color: #666;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Loading Snack Shop...</h2>
    <p>Please wait while we redirect you to the catalog.</p>
</div>

</body>
</html>

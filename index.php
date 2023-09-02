<?php
include('./includes/functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Playfair+Display:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/17b5d12a1c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/styles.css">

    <title>Monthlies</title>
</head>

<body>
    <div class="container mx-auto">

        <h1>
            <i class="fa-solid fa-star"></i>
            <br>Monthlies
        </h1>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group mb-3">

                <input type="number" class="form-control" name="amount" step="0.01" required>
                <input type="submit" class="btn btn-outline-secondary btn-lg" name="submit-button" value="submit" type="button">
            </div>
        </form>

        <?php
        $submitted_amount = htmlspecialchars($_POST["amount"]);
        $today = date("Y-m-d");
        $d = strtotime($today);
        $month = date("Y-m", $d);
        $month_h2 = date('F Y');

        if (isset($_POST["submit-button"])) {
            echo $submitted_amount . "<br>";
            echo $today;
            submit_to_db($submitted_amount, $today);
        }

        ?>
        <div class="d-grid mx-auto">
            <h2><?php echo $month_h2; ?></h2>
            <?php $monthly = get_totals($month); ?>
            <span class="total"><?php echo $monthly; ?></span>
        </div>


            <hr>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="d-grid gap-2 col-6 mx-auto">
            <input type="submit" class="btn btn-outline-secondary btn-lg rounded-pill" name="getTotalsBtn" value="get totals" type="button">
            </form>
            <?php

            if (isset($_POST["getTotalsBtn"])) {
                get_all($month);
            }

            // complete totals:
            // $total = get_totals('%');
            // echo $total;
            ?>

        </div>

    </div>

</body>

</html>
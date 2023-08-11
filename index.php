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

    <link rel="stylesheet" href="assets/styles.css">

    <title>Monthlies</title>
</head>


<body>

    <div class="container">
        <h1>Monthlies</h1>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="number" class="form-control" name="amount" step="0.01" required>
            <input type="submit" class="btn btn-dark btn-lg" name="submit-button" value="submit" type="button">
        </form>

        <?php
        $submitted_amount = htmlspecialchars($_POST["amount"]);
        $today = date("Y-m-d");
        $d = strtotime($today);
        $month = date("Y-m", $d);
        $month_h2 = date('F Y');


        if (isset($_POST["submit-button"])) {
            // echo $submitted_amount . "<br>";
            // echo $today;
            submit_to_db($submitted_amount, $today);
        }
        ?>
        <h2><?php echo $month_h2; ?></h2>

        <?php $monthly = get_totals($month);?>

        <span class="total"><?php echo $monthly; ?></span>


<?php
        // $total = get_totals('%');
        // echo $total;
        ?>

    </div>

</body>

</html>
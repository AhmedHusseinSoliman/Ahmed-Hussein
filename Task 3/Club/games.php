<?php
session_start();

if (empty($_SESSION['members-num'])) {
    header('location:subscribe.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    for ($i = 1; $i <= $_SESSION['members-num']; $i++) {
        if (empty($_POST['name-' . $i])) {
            $errors['name-' . $i] = '<div class="text-danger font-weight-bold mb-3">Name is required</div>';
        }
    }
    if (empty($errors)) {
        $footbal_total = 0;
        $swim_total = 0;
        $volley_total = 0;
        $other_total = 0;
        $sporttotal = 0;
        for ($i = 1; $i <= $_SESSION['members-num']; $i++) {
            $subtotal = 0;
            $_SESSION['member-' . $i] = [$_POST['name-' . $i]];
            if (!empty($_POST['football-' . $i])) {
                array_push($_SESSION['member-' . $i], 'Football');
                $subtotal += 300;
                $footbal_total += 300;
            }
            if (!empty($_POST['swimming-' . $i])) {
                array_push($_SESSION['member-' . $i], 'Swimming');
                $subtotal += 250;
                $swim_total += 250;
            }
            if (!empty($_POST['volleyball-' . $i])) {
                array_push($_SESSION['member-' . $i], 'Volleyball');
                $subtotal += 150;
                $volley_total += 150;
            }
            if (!empty($_POST['other-' . $i])) {
                array_push($_SESSION['member-' . $i], 'Other');
                $subtotal += 100;
                $other_total += 100;
            }
            $_SESSION['member-' . $i][5] = $subtotal;
            $sporttotal += $subtotal;
        }
        $_SESSION['footbal_total'] = $footbal_total;
        $_SESSION['swim_total'] = $swim_total;
        $_SESSION['volley_total'] = $volley_total;
        $_SESSION['other_total'] = $other_total;
        $_SESSION['sporttotal'] = $sporttotal;
        $_SESSION['subscription'] = 10000 + (2500 * $_SESSION['members-num']);
        $_SESSION['total'] = $_SESSION['subscription'] + $sporttotal;
        header("location:result.php");
        // print_r($_SESSION);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Games</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-2 offset-3 text-center text-warning mt-5 mb-5 font-weight-bolder">
                <h1 class="font-weight-bold" style='font-size:7em;'>CLUB</h1>
            </div>
            <div class="col-2 offset-2 text-center text-warning mt-5 mb-5 font-weight-bolder">
                <h5 class="mt-5">Family Subscribtion</h5>
            </div>
            <div class="col-4 offset-4">
                <form method="post">
                    <?php for ($i = 1; $i <= $_SESSION['members-num']; $i++) { ?>
                        <div class="form-group">
                            <label for="name-<?= $i ?>" class="text-info font-weight-bold">Member No. <?= $i ?></label>
                            <input type="text" name="name-<?= $i ?>" id="name-<?= $i ?>" class="form-control mb-3" placeholder="" aria-describedby="helpId" value="<?= $_POST['name-' . $i] ?? '' ?>">
                            <?= $errors['name-' . $i] ?? '' ?>
                            <input type="checkbox" id="football" name="football-<?= $i ?>" value="1" <?= empty($_POST['football-' . $i]) ? '' : 'checked' ?>>
                            <label for="football"> Football - 300 LE</label><br>
                            <input type="checkbox" id="swimming" name="swimming-<?= $i ?>" value="1" <?= empty($_POST['swimming-' . $i]) ? '' : 'checked' ?>>
                            <label for="swimming"> Swimming - 250 LE</label><br>
                            <input type="checkbox" id="volleyball" name="volleyball-<?= $i ?>" value="1" <?= empty($_POST['volleyball-' . $i]) ? '' : 'checked' ?>>
                            <label for="volleyball"> Volleyball - 150 LE</label><br>
                            <input type="checkbox" id="other" name="other-<?= $i ?>" value="1" <?= empty($_POST['other-' . $i]) ? '' : 'checked' ?>>
                            <label for="other"> Other - 100 LE</label><br>
                        </div>
                    <?php } ?>
                    <button class="btn btn-sm btn-info w-100 mb-5">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
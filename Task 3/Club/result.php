<?php
session_start();

if (empty($_SESSION['member-1'])) {
    header('location:subscribe.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Result</title>
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
                <h5 class="mt-5">Prices Review</h5>
            </div>
            <div class="col-10 offset-1 mt-5">
                <table class="table">
                    <thead>
                        <tr class="bg-success text-light">
                            <th>Subscriber</th>
                            <th colspan="5"><?= $_SESSION['name'] ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i <= $_SESSION['members-num']; $i++) { ?>
                            <tr>
                                <?php for ($m = 0; $m < 6; $m++) { ?>
                                    <td><?= $_SESSION['member-' . $i][$m] ?? '' ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <thead>
                        <tr class="bg-success text-light">
                            <th colspan="5">Total</th>
                            <th><?= $_SESSION['sporttotal'] ?> EGP</th>
                        </tr>
                    </thead>
                    <tr>
                        <td colspan="6" class="text-center font-weight-bold" style="font-size:3em">SPORTS</td>
                    </tr>
                    <thead>
                        <tr class="bg-success text-light">
                            <th colspan="5">Football Club</th>
                            <th><?= $_SESSION['footbal_total'] ?> EGP</th>
                        </tr>
                        <tr class="bg-success text-light">
                            <th colspan="5">Swimming Club</th>
                            <th><?= $_SESSION['swim_total'] ?> EGP</th>
                        </tr>
                        <tr class="bg-success text-light">
                            <th colspan="5">Volleyball Club</th>
                            <th><?= $_SESSION['volley_total'] ?> EGP</th>
                        </tr>
                        <tr class="bg-success text-light">
                            <th colspan="5">Other Clubs</th>
                            <th><?= $_SESSION['other_total'] ?> EGP</th>
                        </tr>
                        <tr class="bg-success text-light">
                            <th colspan="5">Club Subscription</th>
                            <th><?= $_SESSION['subscription'] ?> EGP</th>
                        </tr>
                        <tr class="bg-success text-light">
                            <th colspan="5">total Price</th>
                            <th><?= $_SESSION['total'] ?> EGP</th>
                        </tr>
                    </thead>
                </table>
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
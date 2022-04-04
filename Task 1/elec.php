<?php

if ($_POST) {
    if ($_POST['number']) {

        define('surcharge',0.2);

        if ($_POST['number'] <= 50) {
            $unit_price = 0.5;
        } elseif ($_POST['number'] <= 150) {
            $unit_price = 0.75;
        } elseif ($_POST['number'] <= 250) {
            $unit_price = 1.2;
        } else {
            $unit_price = 1.5;
        }
        $consumption_cost=$unit_price*$_POST['number'];
        $surcharge_cost=surcharge*$consumption_cost;
        $total=$surcharge_cost + $consumption_cost;

        $message=
        "<div class='alert alert-success'>
            <ul>
                <li><strong>Unit Price:</strong> $unit_price EGP</li>
                <li><strong>Consumption Cost:</strong> $consumption_cost EGP</li>
                <li><strong>Surcharge:</strong> $surcharge_cost EGP</li>
                <li><strong>Total:</strong> $total EGP</li>
            </ul>
        </div>";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Electricity Bill</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-info mt-5 mb-3">
                <h3>Electricity Bill</h3>
            </div>
            <div class="col-4 offset-4">
                <form method="post">
                    <div class="form-group">
                        <input type="number" name="number" placeholder="Enter electricity consumption" class="form-control" aria-describedby="helpId">
                        <Button class="btn btn-outline-dark rounded btn-sm btn-info text-white mt-3">Show Invoice</Button>
                    </div>
                </form>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
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
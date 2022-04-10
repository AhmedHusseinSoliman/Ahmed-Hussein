<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    if (empty($_POST['name'])) {
        $errors['name-required'] = "<div class='text-danger font-weight-bold'>User name required</div>";
    }
    if (empty($_POST['city'])) {
        $errors['city-required'] = "<div class='text-danger font-weight-bold'>City required</div>";
    } elseif ($_POST['city'] != 'Cairo' && $_POST['city'] != 'Giza' && $_POST['city'] != 'Alexandria' && $_POST['city'] != 'Other') {
        $errors['city-required'] = "<div class='text-danger font-weight-bold'>City not valid</div>";
    }
    if (empty($_POST['items_num'])) {
        $errors['num-required'] = "<div class='text-danger font-weight-bold'>Number of variants required</div>";
    } elseif ($_POST['items_num'] < 0) {
        $errors['num-required'] = "<div class='text-danger font-weight-bold'>Number of variants not valid</div>";
    }

    if (!empty($_POST['btn_2'])) {
        $errors_2 = [];
        for ($i = 1; $i <= $_POST['items_num']; $i++) {
            if (empty($_POST['product_' . $i])) {
                $errors_2['product-required'] = "<div class='text-danger font-weight-bold'>Product names required</div>";
            }
            if (empty($_POST['price_' . $i])) {
                $errors_2['price-required'] = "<div class='text-danger font-weight-bold'>Prices required</div>";
            } elseif ($_POST['price_' . $i] < 0) {
                $errors_2['price-required'] = "<div class='text-danger font-weight-bold'>Prices not valid</div>";
            }
            if (empty($_POST['quantity_' . $i])) {
                $errors_2['quantity-required'] = "<div class='text-danger font-weight-bold'>Quantities required</div>";
            } elseif ($_POST['quantity_' . $i] < 0) {
                $errors_2['quantity-required'] = "<div class='text-danger font-weight-bold'>Quantities not valid</div>";
            }
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Supermarket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h1>Supermarket</h1>
            </div>
            <div class="col-4">
                <img src="images/supermarket.jpg" alt="supermarket" style="width:100%">
            </div>
            <div class="col-6 offset-1">
                <form action="" method="post" class="mt-3 mb-3">
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $_POST['name'] ?? '' ?>">
                        <?= $errors['name-required'] ?? '' ?>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <select class="custom-select" name="city">
                            <option value="Cairo" <?php if (isset($_POST['city'])) {echo $_POST['city'] == 'Cairo'?'selected':'';} ?>>Cairo</option>
                            <option value="Giza" <?php if (isset($_POST['city'])) {echo $_POST['city'] == 'Giza'?'selected':'';} ?>>Giza</option>
                            <option value="Alexandria" <?php if (isset($_POST['city'])) {echo $_POST['city'] == 'Alexandria'?'selected':'';} ?>>Alexandria</option>
                            <option value="Other" <?php if (isset($_POST['city'])) {echo $_POST['city'] == 'Other'?'selected':'';} ?>>Other</option>
                        </select>
                        <?= $errors['city-required'] ?? '' ?>
                    </div>
                    <div class="form-group">
                        <label for="items_num">Number of variants</label>
                        <input type="numeber" name="items_num" id="items_num" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $_POST['items_num'] ?? '' ?>">
                        <?= $errors['num-required'] ?? '' ?>
                    </div>
                    <button class="btn btn-sm btn-outline-dark rounded mt-3 mb-5" name="btn_1" value="btn_1">Enter Products</button>
                    <?php if ((!empty($_POST['btn_1']) && empty($errors) && empty($_POST['btn_2']))||(!empty($errors_2)&&!empty($_POST['btn_2']))) { ?>
                        <table class="table table-bordered">
                            <form method="post">
                                <caption><button class="btn btn-sm btn-outline-dark rounded mt-3" name="btn_2" value="btn_2">Receipt</button></caption>
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 1; $i <= $_POST['items_num']; $i++) { ?>
                                        <tr>
                                            <td> <input type="text" name="product_<?= $i ?>" value="<?= $_POST['product_' . $i] ?? '' ?>"></input> </td>
                                            <td> <input type="number" name="price_<?= $i ?>" value="<?= $_POST['price_' . $i] ?? '' ?>"></input> </td>
                                            <td> <input type="number" name="quantity_<?= $i ?>" value="<?= $_POST['quantity_' . $i] ?? '' ?>"></input> </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if(!empty($_POST['btn_2'])){?>
                                        <tr>
                                            <td><?= $errors_2['product-required'] ?? '' ?></td>
                                            <td><?= $errors_2['price-required'] ?? '' ?></td>
                                            <td><?= $errors_2['quantity-required'] ?? '' ?></input> </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                        </table>
                    <?php } ?>
                </form>
                <?php if (empty($errors_2) && !empty($_POST['btn_2'])) { ?>
                    <table class="table table-bordered">
                        <form method="post">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantities</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0;
                                for ($i = 1; $i <= $_POST['items_num']; $i++) {
                                    $subtotal = $_POST['price_' . $i] * $_POST['quantity_' . $i];
                                    $total += $subtotal; ?>
                                    <tr>
                                        <td><?= $_POST['product_' . $i] ?></td>
                                        <td><?= $_POST['price_' . $i] ?></td>
                                        <td><?= $_POST['quantity_' . $i] ?></td>
                                        <td><?= $subtotal ?></td>
                                    </tr>
                                <?php }
                                if ($total < 1000) {
                                    $discount = 0;
                                } elseif ($total < 3000) {
                                    $discount = 0.1;
                                } elseif ($total < 4500) {
                                    $discount = 0.15;
                                } else {
                                    $discount = 0.2;
                                }
                                switch ($_POST['city']) {
                                    case "Cairo":
                                        $delivery = 0;
                                        break;
                                    case "Giza":
                                        $delivery = 30;
                                        break;
                                    case "Alexandria":
                                        $delivery = 50;
                                        break;
                                    case "Other":
                                        $delivery = 100;
                                        break;
                                } ?>
                                <tr>
                                    <td colspan="2">Client Name</td>
                                    <td colspan="2"><?= $_POST['name'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">City</td>
                                    <td colspan="2"><?= $_POST['city'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td colspan="2"><?= $total ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Discount</td>
                                    <td colspan="2"><?= $discount * 100 . " %" ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Total after discount</td>
                                    <td colspan="2"><?= $total * (1 - $discount) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Delivery</td>
                                    <td colspan="2"><?= $delivery ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Net total</td>
                                    <td colspan="2"><?= $total * (1 - $discount) + $delivery ?></td>
                                </tr>
                            </tbody>
                    </table>
                <?php } ?>
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
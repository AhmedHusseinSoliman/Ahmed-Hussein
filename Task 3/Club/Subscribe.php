<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    if (empty($_POST['name'])) {
        $errors['name-required'] = '<div class="text-danger font-weight-bold">Name is required</div>';
    }
    if (empty($_POST['members-num'])) {
        $errors['number-required'] = '<div class="text-danger font-weight-bold">Number of members is required</div>';
    } elseif ($_POST['members-num'] < 0) {
        $errors['number-required'] = '<div class="text-danger font-weight-bold">Number of members is not valid</div>';
    }
    if (empty($errors)) {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['members-num'] = $_POST['members-num'];
        header('location:games.php');
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Subscribe</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-warning mt-5 mb-5 font-weight-bolder">
                <h1 class="font-weight-bold" style='font-size:7em;'>CLUB</h1>
            </div>
            <div class="col-4 offset-4">
                <form method="post">
                    <div class="form-group">
                        <label for="name" class="text-info font-weight-bold">Member Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $_POST['name'] ?? '' ?>">
                        <small id="helpId" class="text-muted">Club subscribtion starts with 10,000 LE</small>
                        <?= $errors['name-required'] ?? '' ?>
                    </div>
                    <div class="form-group">
                        <label for="members-num" class="text-info font-weight-bold">Count of Family Members</label>
                        <input type="number" name="members-num" id="members-num" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $_POST['members-num'] ?? '' ?>">
                        <small id="helpId" class="text-muted">Cost of each member is 2,500 LE</small>
                        <?= $errors['number-required'] ?? '' ?>
                    </div>
                    <button class="btn btn-sm btn-info">Subscribe</button>
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
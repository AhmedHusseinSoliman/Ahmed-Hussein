<?php
session_start();

if (empty($_SESSION['question-1'])) {
    header('location:number.php');
    die;
}

$results = [$_SESSION['question-1'], $_SESSION['question-2'], $_SESSION['question-3'], $_SESSION['question-4'], $_SESSION['question-5']];
$total = 0;
foreach ($results as $result) {
    if ($result == 'Good') {
        $total += 3;
    } elseif ($result == 'Very Good') {
        $total += 5;
    } elseif ($result == 'Excellent') {
        $total += 10;
    }
    if ($total < 15) {
        $review = 'Bad';
    } elseif ($total < 25) {
        $review = 'Good';
    } elseif ($total < 50) {
        $review = 'Very Good';
    } else {
        $review = 'Excellent';
    }

    if ($total < 25) {
        $message = 'We will call you later on this phone: ' . $_SESSION["number"];
    } else {
        $message = 'Thank you';
    }
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
            <div class="col-10 offset-1 mt-5">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Question</th>
                            <th class="text-center">Review</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>How satisfied are you with the level of cleanliness?</th>
                            <td class="text-center"><?= $_SESSION['question-1'] ?></td>
                        </tr>
                        <tr>
                            <th>How satisfied are you with the service prices?</th>
                            <td class="text-center"><?= $_SESSION['question-2'] ?></td>
                        </tr>
                        <tr>
                            <th>How satisfied are you with the nursing staff?</th>
                            <td class="text-center"><?= $_SESSION['question-3'] ?></td>
                        </tr>
                        <tr>
                            <th>How satisfied are you with the doctors?</th>
                            <td class="text-center"><?= $_SESSION['question-4'] ?></td>
                        </tr>
                        <tr>
                            <th>How satisfied are you with the calmness of the hospital?</th>
                            <td class="text-center"><?= $_SESSION['question-5'] ?></td>
                        </tr>
                        <tr class="thead-dark">
                            <th>Overall Review</th>
                            <th class="text-center"><?= $review ?></button></th>
                        </tr>
                        <tr class="text-light bg-<?= $total < 25 ? 'danger' : 'success' ?>">
                            <th colspan="2" class="text-center"><?= $message ?></th>
                        </tr>
                    </tbody>
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
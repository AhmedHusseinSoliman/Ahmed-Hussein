<?php

if ($_POST) {
    if ($_POST['Physics']>=0 && $_POST['Chemistry']>=0 && $_POST['Biology']>=0 && $_POST['Mathematics']>=0 && $_POST['Computer']>=0 && $_POST['Physics']<=50 && $_POST['Chemistry']<=50 && $_POST['Biology']<=50 && $_POST['Mathematics']<=50 && $_POST['Computer']<=50) {

        $total_mark=$_POST['Physics']+$_POST['Chemistry']+$_POST['Biology']+$_POST['Mathematics']+$_POST['Computer'];
        $percentage=($total_mark/250)*100;

        if ($percentage< 40) {
            $grade = 'F';
        } elseif ($percentage< 60) {
            $grade = 'E';
        } elseif ($percentage< 70) {
            $grade = 'D';
        }elseif ($percentage< 80) {
            $grade = 'C';
        }elseif ($percentage< 90) {
            $grade = 'B';
        }else{
            $grade = 'A';
        }

        $message='Percentage: '. $percentage.'% - Grade: '.$grade;
    } else{
        $message='Please enter valid marks';
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Grades</title>
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
                <h3>Grade Calculator</h3>
            </div>
            <div class="col-4 offset-4">
                <form method="post">
                    <div class="form-group">
                        <label>Physics</label>
                        <input type="number" name="Physics" placeholder="Enter Physics Mark" class="form-control" aria-describedby="helpId">
                        <label>Chemistry</label>
                        <input type="number" name="Chemistry" placeholder="Enter Chemistry Mark" class="form-control" aria-describedby="helpId">
                        <label>Biology</label>
                        <input type="number" name="Biology" placeholder="Enter Biology Mark" class="form-control" aria-describedby="helpId">
                        <label>Mathematics</label>
                        <input type="number" name="Mathematics" placeholder="Enter Mathematics Mark" class="form-control" aria-describedby="helpId">
                        <label>Computer</label>
                        <input type="number" name="Computer" placeholder="Enter Computer Mark" class="form-control" aria-describedby="helpId">
                        <Button class="btn btn-outline-dark rounded btn-sm btn-info text-white mt-3">Calculate Grade</Button>
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



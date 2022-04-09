<?php
session_start();
if (empty($_SESSION['number'])){
    header('location:number.php');die;
}
if ($_SERVER['REQUEST_METHOD']=='POST'){

    for ($i=1; $i<=5; $i++){
        if ((empty($_POST['question-'. $i]))||($_POST['question-'. $i]!='Bad'&&$_POST['question-'. $i]!='Good'&&$_POST['question-'. $i]!='Very Good'&&$_POST['question-'. $i]!='Excellent')){
            $error='<div class="text-danger font-weight-bold">Please answer all questions</div>';break;
        }
    }
    
    if (empty($error)){
        $_SESSION['question-1']=$_POST['question-1'];
        $_SESSION['question-2']=$_POST['question-2'];
        $_SESSION['question-3']=$_POST['question-3'];
        $_SESSION['question-4']=$_POST['question-4'];
        $_SESSION['question-5']=$_POST['question-5'];
        header('location:result.php');
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Review</title>
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
            <form method="post">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Question?</th>
                                <th class="text-center">Bad</th>
                                <th class="text-center">Good</th>
                                <th class="text-center">Very Good</th>
                                <th class="text-center">Excellent</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>How satisfied are you with the level of cleanliness?</th>
                                <td class="text-center"><input type="radio" name="question-1" value="Bad" <?= isset($_POST['question-1'])? ($_POST['question-1']=='Bad'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-1" value="Good" <?= isset($_POST['question-1'])? ($_POST['question-1']=='Good'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-1" value="Very Good" <?= isset($_POST['question-1'])? ($_POST['question-1']=='Very Good'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-1" value="Excellent" <?= isset($_POST['question-1'])? ($_POST['question-1']=='Excellent'? 'checked' : ''):'' ?>></td>
                            </tr>
                            <tr>
                                <th>How satisfied are you with the service prices?</th>
                                <td class="text-center"><input type="radio" name="question-2" value="Bad" <?= isset($_POST['question-2'])? ($_POST['question-2']=='Bad'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-2" value="Good" <?= isset($_POST['question-2'])? ($_POST['question-2']=='Good'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-2" value="Very Good" <?= isset($_POST['question-2'])? ($_POST['question-2']=='Very Good'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-2" value="Excellent" <?= isset($_POST['question-2'])? ($_POST['question-2']=='Excellent'? 'checked' : ''):'' ?>></td>
                            </tr>
                            <tr>
                                <th>How satisfied are you with the nursing staff?</th>
                                <td class="text-center"><input type="radio" name="question-3" value="Bad" <?= isset($_POST['question-3'])? ($_POST['question-3']=='Bad'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-3" value="Good" <?= isset($_POST['question-3'])? ($_POST['question-3']=='Good'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-3" value="Very Good" <?= isset($_POST['question-3'])? ($_POST['question-3']=='Very Good'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-3" value="Excellent" <?= isset($_POST['question-3'])? ($_POST['question-3']=='Excellent'? 'checked' : ''):'' ?>></td>
                            </tr>
                            <tr>
                                <th>How satisfied are you with the doctors?</th>
                                <td class="text-center"><input type="radio" name="question-4" value="Bad" <?= isset($_POST['question-4'])? ($_POST['question-4']=='Bad'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-4" value="Good" <?= isset($_POST['question-4'])? ($_POST['question-4']=='Good'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-4" value="Very Good" <?= isset($_POST['question-4'])? ($_POST['question-4']=='Very Good'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-4" value="Excellent" <?= isset($_POST['question-4'])? ($_POST['question-4']=='Excellent'? 'checked' : ''):'' ?>></td>
                            </tr>
                            <tr>
                                <th>How satisfied are you with the calmness of the hospital?</th>
                                <td class="text-center"><input type="radio" name="question-5" value="Bad" <?= isset($_POST['question-5'])? ($_POST['question-5']=='Bad'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-5" value="Good" <?= isset($_POST['question-5'])? ($_POST['question-5']=='Good'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-5" value="Very Good" <?= isset($_POST['question-5'])? ($_POST['question-5']=='Very Good'? 'checked' : ''):'' ?>></td>
                                <td class="text-center"><input type="radio" name="question-5" value="Excellent" <?= isset($_POST['question-5'])? ($_POST['question-5']=='Excellent'? 'checked' : ''):'' ?>></td>
                            </tr>
                            <tr>
                                <td colspan="5"><button class="btn btn-lg btn-secondary w-100">Submit Review</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <?= $error?? ''?>
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
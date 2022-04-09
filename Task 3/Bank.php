<?php
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $errors=[];
        if (empty($_POST['name'])){
            $errors['name_required']='<div class="text-danger font-weight-bold">User name required</div>';
        }if (empty($_POST['amount'])){
            $errors['amount_required']='<div class="text-danger font-weight-bold">Loan amount required</div>';
        }elseif ($_POST['amount']<0){
            $errors['amount_required']='<div class="text-danger font-weight-bold">Loan amount not valid</div>';
        }
        if (empty($_POST['years'])){
            $errors['years_required']='<div class="text-danger font-weight-bold">Loan years required</div>';
        } elseif ($_POST['years']<0){
            $errors['years_required']='<div class="text-danger font-weight-bold">Number of years not valid</div>';
        } 
        if (empty($errors)){
            if ($_POST['years'] <= 3){
                $interest = 0.1;
            }else{
                $interest = 0.15;
            }
            $loan_total=$_POST['amount']*(1+($_POST['years']*$interest));
            $monthly=$loan_total/($_POST['years']*12);
        }   
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Loan Calculator</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-12 text-center m-5">
                  <h1>Bank Loan Calculator</h1>
              </div>
              <div class="col-4">
                  <img src="images/bank.png" alt="bank">
              </div>
              <div class="col-6 offset-1">
                  <form method="POST" class="mb-4">
                      <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="User name" aria-describedby="helpId" value="<?= $_POST['name']?? '' ?>">
                        <?= $errors['name_required']??'' ?>
                      </div>
                      <div class="form-group">
                        <label for="amount">Loan Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" placeholder="Required loan amount" aria-describedby="helpId" value="<?= $_POST['amount']?? ''?>">
                        <?= $errors['amount_required']??'' ?>
                      </div>
                      <div class="form-group">
                        <label for="years">Loan Years</label>
                        <input type="number" name="years" id="years" class="form-control" placeholder="Number of years" aria-describedby="helpId" value="<?= $_POST['years']?? '' ?>">
                        <?= $errors['years_required']??'' ?>
                      </div>
                      <button class="btn btn-sm btn-outline-dark rounded">Calculate</button>
                  </form>
                  <?php if (isset ($interest)){?>
                      <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">User Name</th>
                          <th scope="col">Interest Rate</th>
                          <th scope="col">Loan After Interest</th>
                          <th scope="col">Monthly Payment</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row"><?= $_POST['name'] ?></th>
                          <td><?= $interest*100 .' %'?></td>
                          <td><?= $loan_total ?></td>
                          <td><?= $monthly?></td>
                        </tr>
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
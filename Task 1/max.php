<?php
  if($_POST){
    if ($_POST['num_1']&&$_POST['num_2']&&$_POST['num_3']){
      if($_POST['num_1']>=$_POST['num_2'] && $_POST['num_1']>=$_POST['num_3']){
        $max=$_POST['num_1'];
        if($_POST['num_2']>=$_POST['num_3']){
          $min=$_POST['num_3'];
        }else{
          $min=$_POST['num_2'];
        }
      } elseif($_POST['num_2']>=$_POST['num_1'] && $_POST['num_2']>=$_POST['num_3']){
        $max=$_POST['num_2'];
        if($_POST['num_1']>=$_POST['num_3']){
          $min=$_POST['num_3'];
        }else{
          $min=$_POST['num_1'];
        }
      } else{
        $max=$_POST['num_3'];;
        if($_POST['num_1']>=$_POST['num_2']){
          $min=$_POST['num_2'];
        }else{
          $min=$_POST['num_1'];
        }
      }
    }
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Max & Min</title>
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
                <h3>Maximum & Minmum Number</h3>
            </div>
            <div class="col-4 offset-4">
                <form method="post">
                    <div class="form-group">
                      <input type="number" name="num_1" placeholder="Enter first number" class="form-control mb-3" aria-describedby="helpId">
                      <input type="number" name="num_2" placeholder="Enter second number" class="form-control mb-3" aria-describedby="helpId">
                      <input type="number" name="num_3" placeholder="Enter third number" class="form-control mb-3" aria-describedby="helpId">
                      <Button class="btn btn-outline-dark rounded btn-sm btn-info text-white mt-3">Get Max & Min</Button>
                    </div>
                </form>
                <?php
                    if (isset($max)){
                        echo "Max number is: $max <br>";
                        echo "Min number is: $min";
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
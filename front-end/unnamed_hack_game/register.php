<?php
  require_once 'C:\xampp\unnamed_hack_game\check_auth.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Welcome to unnamed-hack game!</title>
  </head>
  <body>

  	<?php include_once 'C:\xampp\unnamed_hack_game\html-content\navbar.php' ?>

    <div class="text-center container login-container mt-5 align-items-center">
            <div class="row text-center justify-content-center align-items-center">
                <div class="col-md-6 login-form-1">

                    <?php if (!is_null($session->getSessionValue('flash'))) { ?>
                        <?php if($session->getSessionValue('flash')['type'] == 'error') { ?>
                               <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Ops!</h4>
                                <p><?= $session->getSessionValue('flash')['message'] ?></p>
                              </div>
                        <?php } else if ($session->getSessionValue('flash')['type'] == 'success') { ?>
                              <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Success!</h4>
                                <p><?= $session->getSessionValue('flash')['message'] ?></p>
                              </div>
                        <?php } ?>
                      <?php $session->unsetValue('flash'); ?>
                    <?php } ?>

                    <h3 class="mb-4">Register</h3>

                          <form id="register-form" action="actions/register.php" method="post" onsubmit="return checkFields(this)">
                            <div class="form-group">
                                <input name="username" type="text" class="form-control" placeholder="Username" value="" />
                            </div>
                            <div class="form-group">
                                <input name="email" type="text" class="form-control" placeholder="E-mail" value="" />
                            </div>
                            <div class="form-group">
                                <input name="password" type="password" class="form-control" placeholder="Password" value="" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Register" />
                            </div>
                          </form>

                        <div class="form-group">
                            <a href="/unnamed_hack_game/login.php">Already have an account?</a>
                        </div>
                    
                </div>
        </div>

    <script>
      function checkFields(form) {
        let inputs = form.getElementsByTagName('input');

        for (input of inputs) {
          if (!input.value.length) {
            alert('Bad values!');
            return false;
          }
        }

        return true;
      }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
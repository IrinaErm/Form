<?php 
    session_start(); 

    if ((isset($_SESSION['auth'])) && ($_SESSION['auth'] = true)) {
        header("Location: /info.php");
    }
?>

<!DOCTYPE html>

<html lang="ru">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <title>
            Вход
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>

    <body>
        <div class="w-25 mt-4 container-fluidd-flex justify-content-center align-items-center container text-center" style="min-width: 300px;">
            <h2 class="text-center"> Вход </h2>

            <form action="php/auth.php" method="POST" id="login-form" class="needs-validation" novalidate>
                <div class="mb-4 form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Почта" required>
                    <div class="invalid-feedback">
                        Пожалуйста, укажите вашу почту.
                    </div>
                </div>
                <div class="mb-4 form-group">
                    <input type="password" pattern="[\S\s]*\S[\S\s]*" class="form-control" id="password" name="password" placeholder="Пароль" required>
                    <div class="invalid-feedback">
                        Пожалуйста, введите пароль.
                    </div>
                </div>

                <?php
                if(isset($_GET['auth']) && $_GET['auth'] == 'false') {
                    echo "<div id=\"bad_alert\" class=\"alert alert-danger\" role=\"alert\"> Неправильно указан логин или пароль. </div> <br>";
                }                   
                ?>
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn btn-outline-primary my-1" value="Войти">                       
                </div>
                <div>
                    <p><a href="regist.php">Зарегистрироваться</a></p>
                    <p><a href="index.html">Вернуться к форме</a></p>
                </div>
            </form>
        </div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script>
        (function () {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    
                    form.classList.add('was-validated');
                }, false)
                })
        })()           
    </script>

</html>
<?php
 
    require_once("php/getInfo.php"); 
    session_start(); 

    if ((!isset($_SESSION['auth'])) && ($_SESSION['auth'] != true)) {
        header("Location: /index.html");
    }
?>

<!DOCTYPE html>

<html lang="ru">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <title>
            Информация
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
            li { cursor: pointer; }
        </style>
    </head>

    <body>
        <div class="container-fluidd-flex justify-content-center align-items-center container ">
            <div class="p-4 justify-content-center table-responsive-xl" id="show"> </div> 
        </div>
        
        <ul class="mt-2 pagination justify-content-center" id="pagination">
            <?php
                $count =  countUsers();
                $offset = 0;
                $i = 0;

                while($offset < $count) {
                    echo "<li class=\"page-item\"><a class=\"page-link\" onclick=\"getInfo('$offset')\">".++$i."</a></li>";
                    $offset += 5;
                }
            ?> 
        </ul>
        <div class="justify-content-center text-center">
            <p><a href="php/logout.php">Выйти</a></p>
        </div>
    </body>

    <script>
        function getInfo(offs) {
            $.ajax({
                type: 'POST',                                                      
                url: 'php/getInfo.php',
                dataType: 'html',
                data: {
                    'offset': offs,
                    'limit': 5,
                },
                success: function(data){
                    document.getElementById('show').innerHTML = data;
                }
            });  
        }

        window.onload = function() {
            getInfo(0);
        };
    </script>

</html>
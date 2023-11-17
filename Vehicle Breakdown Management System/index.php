<?php
    $connection=mysqli_connect("localhost","root","","vehicle management");
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Demon's Workshop</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
        <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

        <link rel="stylesheet" type="text/css" href="./slick/slick.css">
        <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="animate.css">
        <link rel="stylesheet" href="style.css">


    </head>

    <style>

        .parallax {

        background-image: url("towtruck.jpg");

        height: 100%;
        min-height: 700px;

        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

        } 

        .navbar-fixed-top.scrolled {
            background-color: ghostwhite;
            transition: background-color 200ms linear;
        }

    </style>

    <body data-spy="scroll" data-target=".navbar" data-offset="50" onload="myFunction()">

        <div class="parallax foo">

            <?php include 'navbar.php';?>

            <div class="strokeme" style="font-size:70px; text-align: center; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%); color: #fd1f44;">

            <h1 class="animated bounce">Demon's Workshop</h1>

            </div>
            
           

        </div>
        <br/><br/><br/><br/>
        <div>
            <?php include 'aboutus.php';?>
        </div>
        <br/><br/><br/><br/>
        <div><?php include 'request.php';?></div>
        <br/><br/><br/><br/>

        <script>

            $(function () {
                $(document).scroll(function () {
                var $nav = $(".navbar-fixed-top");
                $a= $(".parallax");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $a.height());
                });
            });

        </script>


        <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

        <script>
            window.sr = ScrollReveal();
            sr.reveal('.foo', { duration: 800 });
            sr.reveal('.foo1', { duration: 800,origin: 'top'});
        </script>

    </body>
</html>

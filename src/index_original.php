<!DOCTYPE html>
<?php 
//require '../vendor/autoload.php';
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Simple PHP App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <style>body {margin-top: 40px; background-color: #333;}</style>
        <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    </head>

    <body>
        <div class="container">
            <div class="hero-unit">
            <h1>AWS ECS Load Balanced Autoscaling CICD
                <h3>AWS > ECS > Load Balanced with phpsdk installed .</h3>
                 <p>Reading Data from RDS:</p>
                 <p>SELECT * FROM readreplica1.profiles;</p>
                 <?php 
                    /*
                    CONNECT TO DB: 
                    https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/create_deploy_PHP.rds.html
                    $link = mysqli_connect($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
                    HOST: rm1s0tfcnbbs40p.cisgn95exije.us-east-1.rds.amazonaws.com
                    DBName: readreplica1
                    USER: readreplica1
                    PASS: readreplica1
                    */
                    include_once('Model.php'); 
                    $model = new Model();
                    $con = $model->connect();
                    $sql = "SELECT * FROM 'readreplica1.profiles' ;";
                    $data = $model->exe_sql($con,$sql ,"json");
                    echo($data);
                    ?>
  
                              
                <p>Thanks to.. </p>
                <a href="https://github.com/awslabs/ecs-refarch-continuous-deployment">https://github.com/awslabs/ecs-refarch-continuous-deployment</a>
                
                <p>container PHP version <?php echo phpversion(); ?>.</p>
                <?php
                        $myfile = fopen("/var/www/my-vol/date", "r") or die("");
                        echo fread($myfile,filesize("/var/www/my-vol/date"));
                        fclose($myfile);
                ?>
                
                 <a href="/info.php">phpinfo</a>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>

</html>

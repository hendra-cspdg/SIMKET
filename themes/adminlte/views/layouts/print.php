<!DOCTYPE html>
<html>
    <head>
    <?php
	  $baseUrl = Yii::app()->theme->baseUrl; 
	  $cs = Yii::app()->getClientScript();
	  Yii::app()->clientScript->registerCoreScript('jquery');
	?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/dist/css/farifam.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <!-- <body onload="window.print();"> -->
    <body>
        <div class="wrapper">
            <section class="invoice">
                
                <div class="row row-print invoice-info">
                    <div class="col-sm-2 invoice-col">
                        <img class="header-logo" src="<?php echo $baseUrl;?>/dist/img/logo_bps.png" style="width:100px;height:100px;">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-10 invoice-col">
                        <div>
                            <div class="header-bps">BADAN PUSAT STATISTIK</div>
                            <div class="header-unit">KOTA PALEMBANG</div>
                        </div> 
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                </div>
                <?php echo $content; ?>
            </section>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wordpress</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/style.css">
</head>

<body>
    <header class="c-header">
        <div class="l-container">
            <h1 class="c-logo"><a href="<?php echo home_url('/')?>"><img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" alt="Allgrow Labo"></a></h1>
            <nav class="c-gnav">
                <ul>
                    <li><a href="<?php echo home_url('/service')?>">サービス</a></li>
                    <li><a href="publish.html">出版物</a></li>
                    <li><a href="<?php echo home_url('/contact')?>">お問い合わせ</a></li>
                </ul>
            </nav>
        </div>
    </header><!-- /header -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if (is_404()) {
        $title = "404 | ";
        $description =  "404 | Hikari Zeirishi";
    } else if (is_home()) {
        $title = "";
        $description =  "Hikari Zeirishi";
    } else if (is_page()) {
        $title = get_the_title() . " | ";
        $description = get_the_title() . " | Hikari Zeirishi";
    } else if (is_category()) {
        $title = single_cat_title('', false) . " | ";
        $description =  single_cat_title('', false) . " | Hikari Zeirishi";
    } else if (is_tax()) {
        $title = single_cat_title('', false) . " | ";
        $description =  single_cat_title('', false) . " | Hikari Zeirishi";
    } else if (get_post_type() == 'publish') {
        $title = "出版物 | ";
        $description =  "出版物 | Hikari Zeirishi";
    } else if (get_post_type() == 'post') {
        $title = "ニュース・お知らせ | ";
        $description =  "ニュース・お知らせ | Hikari Zeirishi";
    } else if (get_post_type() == 'service_post') {
        $title = "ご提供サービス | ";
        $description =  "ご提供サービス | Hikari Zeirishi";
    } else if (is_date()) {
        $title = "日付 | ";
        $description =  "日付 | Hikari Zeirishi";
    } else if (is_search()) {
        $title = "検索 | ";
        $description =  "検索 | Hikari Zeirishi";
    } else {
        $title = "";
        $description =  "Hikari Zeirishi";
    }
    ?>
    <meta name="description" content="<?php echo $description; ?>" >
    <title>Wordpress
    <?php
        if (get_post_type() == 'service_post' || $pagename == 'service') {
            echo ' | Service';
        } elseif (get_post_type() == 'publish' || $pagename == 'publish') {
            echo ' | Publication';
        } elseif (get_post_type() == 'post' || $pagename == 'news') {
            echo ' | News';
        } elseif ($pagename == 'contact' || $pagename == 'complete' || $pagename == 'confirm') {
            echo ' | Contact';
        } else {
            '';
        }
        ?>
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/style.css">
    <?php wp_head(); ?>
</head>

<body>
    <header class="c-header">
        <div class="l-container">
            <h1 class="c-logo"><a href="<?php echo home_url('/')?>"><img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" alt="Allgrow Labo"></a></h1>
            <nav class="c-gnav">
                <ul>
                    <li class="<?php if (is_post_type_archive('service_post')){ echo 'active';};?>"><a href="<?php echo get_post_type_archive_link('service_post')?>">サービス</a></li>
                    <li class="<?php if (is_post_type_archive('publish')){ echo 'active';};?>"><a   href="<?php echo get_post_type_archive_link('publish')?>">出版物</a></li>
                    <li><a href="<?php echo home_url('/contact')?>">お問い合わせ</a></li>
                </ul>
            </nav>
        </div>
    </header><!-- /header -->
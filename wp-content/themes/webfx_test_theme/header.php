<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Animal Clinic</title>
    <?php wp_head(); ?>
</head>
<body>
<div class="covid-message">
    <div class="container">
        <div class="covid-text">Covid-19 message: University Animal Clinic is always looking out for the safety of our clients and staff. Please visit our COVID-19 Updates page for more information on our curbside check-in process.</div>
        <div class="covid-link">
            <a class="learn-more" href="#">learn more <span class="icon-arrow-right"></span></a>
        </div>
        <a href="javascript:void(0);" class="icon-close removeit"></a>
    </div>
</div>
<header class="header">
    <div class="container">
        <div class="header-wrap">
            <div class="header-logo">
                <a href="<?= home_url(); ?>">
                    <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        echo '<img class="header_logo" src="' . $image[0] . '" alt="logo">';
                    ?>
                </a>
            </div>
            <div class="header-right">
                <div class="header-content">
                    <div class="call-us"><span>call us today</span> <a href="tel:9413557707">941-355-7707</a></div>
                    <div class="online-request">
                        <a href="#" class="btn btn-secondary">Online Pharmacy</a>
                        <a href="#" class="btn btn-primary">Request an Appointment</a>
                    </div>
                </div>
                <div class="header-bottom">
                    <?php
                        wp_nav_menu([
                            'theme_location' => 'menu-1',
                            'container' => 'nav',
                            'container_class' => 'navbar navbar-expand-lg navbar-light',
                            'menu_class' => 'navbar-nav',
                        ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>

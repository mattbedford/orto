<?php

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge; chrome=1"> <!-- Render Chrome if available or using latest version of Internet Explorer (Recommended). -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<title>Dagorà Reports Shop</title>
		<base href="<?php echo site_url(); ?> ">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&family=Roboto:ital,wght@0,300;0,500;1,300&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/custom-styles.css'; ?>">
      	<!--OG Graph Data-->
      	<meta property="og:title" content="Dagorà Reports Shop">
        <meta property="og:description" content="Dagorà brings you the latest data, trends and quantitative & qualitative reports across a range of lifestyle industries and verticals.">
        <meta property="og:image" content="https://reports.dagora.ch/wp-content/uploads/dagora-reports-eshop.jpg">
        <meta property="og:url" content="<?php echo get_permalink(); ?>">
        <meta property="og:site_name" content="Dagorà Reports Shop">
        <meta prefix="og: http://ogp.me/ns#" property="og:title" content="Dagorà Reports Shop" />
        <meta prefix="og: http://ogp.me/ns#" property="og:image" content="https://reports.dagora.ch/wp-content/uploads/dagora-reports-eshop.jpg">
        <meta prefix="og: http://ogp.me/ns#" property="og:url" content="<?php echo get_permalink(); ?>" />
        <meta name="author" content="Dagorà SA">
        <meta property="og:type" content="website" />
        <meta name="google" content="notranslate">
      
        <?php wp_head(); ?>
    </head>
    <body>
		
	<div id="app"></div>
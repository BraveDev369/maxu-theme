 <?php
  $site_icon = get_site_icon_url();
  ?>

 <!DOCTYPE HTML>
 <html lang="fa">

 <head>
   <meta charset="UTF-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title><?= get_bloginfo('name'); ?></title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/png" href="<?= esc_url(get_site_icon_url(32)); ?>">
   <?php wp_head(); ?>
 </head>

 <body>
   <?php
    $hide_pages = get_field('hide_top_header', 'option');

    $current_id = get_queried_object_id();
    if (!$hide_pages || !in_array($current_id, wp_list_pluck($hide_pages, 'ID'))) {
      get_template_part('templates/top-header');
    }

    $website_logo = get_field('website_logo', 'option')
    ?>
   <div class="maxu-main-menu  hidden-xs hidden-sm">
     <div class="trp_nav_area">
       <div class="container">
         <div class="row">
           <!-- LOGO -->
           <div class="col-md-3 col-sm-3 col-xs-4 hidden-xs">
             <div class="menu_logo">
               <?php if ($website_logo): ?>
                 <a href="<?= esc_url(home_url('/')); ?>" title="<?= esc_attr($website_logo['alt']) ?>" class="logo_sticky_1">
                   <img src="<?= esc_url($website_logo['url']) ?>" alt="<?= esc_attr($website_logo['alt']) ?>">
                 </a>
                 <a href="<?= esc_url(home_url('/')); ?>" title="<?= esc_attr($website_logo['alt']) ?>" class="logo_sticky_2">
                   <img src="<?= esc_url($website_logo['url']) ?>" alt="<?= esc_attr($website_logo['alt']) ?>">
                 </a>
               <?php endif; ?>
             </div>
           </div>
           <!-- END LOGO -->

           <!-- MAIN MENU -->
           <div class="col-md-9 col-sm-9 col-xs-8 hidden-xs">
             <nav class="maxu_menu">
               <?php
                wp_nav_menu([
                  'theme_location' => 'primary',
                  'container'      => false,
                  'menu_class'     => 'sub-menu maxu_menu_ulfirst nav_scroll',
                  'fallback_cb'    => false,
                ]);
                ?>
               <div class="em-quearys-top msin-menu-search">
                 <div class="em-top-quearys-area">
                   <ul class="em-header-quearys">
                     <li class="em-quearys-menu">
                       <i class="fa fa-search t-quearys"></i>
                     </li>
                   </ul>
                   <!--SEARCH FORM-->
                   <div class="em-quearys-inner">
                     <div class="em-quearys-form">
                       <form class="top-form-control" action="<?= esc_url(home_url('/')); ?>" method="get">
                         <input type="text" placeholder="جستجو ..." name="s" value="">
                         <input type="hidden" name="post_type" value="post" />

                         <button class="top-quearys-style" type="submit">
                           <i class="fa fa-long-arrow-left"></i>
                         </button>
                       </form>
                       <ul class="em-header-quearys">
                         <li class="em-quearys-menu">
                           <i class="fa fa-close  t-close em-s-hidden "></i>
                         </li>
                       </ul>
                     </div>
                   </div>
                 </div>
               </div>
               <?php get_template_part('templates/user-top-header') ?>
             </nav>
           </div>
         </div>
       </div>
     </div>
   </div>
   <!-- END MENU AREA  -->

   <!-- MOBILE MENU -->
   <div class="mobile_logo_area hidden-md hidden-lg">
     <div class="container">
       <div class="row">
         <div class="col-sm-12">
           <div class="mobile_menu_logo text-center">
             <a href="index.html" title="maxu">
               <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo.png" alt="maxu">
             </a>
           </div>
         </div>
       </div>
     </div>
   </div>
   <!-- END MOBILE MENU -->

   <!-- MOBILE MENU AREA -->
   <div class="mbm hidden-md hidden-lg header_area main-menu-area">
     <div class="row">
       <div class="menu_area mobile-menu">
         <nav>
           <?php
            wp_nav_menu([
              'theme_location' => 'mobile',
              'container'      => false,
              'menu_class'     => 'main-menu clearfix',
              'fallback_cb'    => false,
            ]);
            ?>
         </nav>
       </div>
     </div>
   </div>
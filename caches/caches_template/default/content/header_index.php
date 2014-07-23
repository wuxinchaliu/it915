<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="<?php echo $SEO['keyword'];?>">
    <meta name="description" content="<?php echo $SEO['description'];?>">

    <link rel="shortcut icon" href="<?php echo IMG_PATH;?>front/favicon.ico"/>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>front/style.css" media="screen"/>
    <link href="<?php echo JS_PATH;?>ckeditor/contents.css" rel="stylesheet" type="text/css" />

    <!--[if lt IE 9]>
    <script src="<?php echo JS_PATH;?>html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
</head>
<body>
<div id="container">
    <!-- main container starts-->
    <div id="wrapp">
        <!-- main wrapp starts-->
        <header id="header">
            <!--header starts -->
            <div id="header-links">
                <div id="container">
                    <div class="three-fourth">
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
                        <ul class="contact-links">
                            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                            <li><a href="<?php echo $r['url'];?>" class="button color small round"><?php echo $r['catname'];?></a></li>
                            <?php $n++;}unset($n); ?>
                        </ul>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                        <?php echo runhook('glogal_menu')?>
                    </div>
                    <nav class="top-search" style="margin-right: 20px;">
                        <!-- search starts-->
                        <form action="<?php echo APP_PATH;?>index.php" method="get" target="_blank">
                            <button class="search-btn"></button>
                            <input type="hidden" name="m" value="search"/>
                            <input type="hidden" name="c" value="index"/>
                            <input type="hidden" name="a" value="init"/>
                            <input type="hidden" name="typeid" value="<?php echo $typeid;?>" id="typeid"/>
                            <input type="hidden" name="siteid" value="<?php echo $siteid;?>" id="siteid"/>
                            <input type="text" class="search-field" name="q" id="q" onblur="if(this.value=='')this.value='Search';" onfocus="if(this.value=='Search')this.value='';" value="Search"/>
                        </form>
                    </nav>
                </div>
            </div>
            <div class="container">
                <div class="head-wrapp">
                    <a href="index.html" id="logo">
                        <img src="<?php echo IMG_PATH;?>front/logo.png" alt="it915"/>
                    </a>
                    <div class="one-half">
                        <ul class="contact-links margin-top">
                            <?php if($top_parentid) { ?>
                            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=894824ec88c3701696ad9d879ede6b1d&action=category&catid=%24top_parentid&num=15&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$top_parentid,'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'15',));}?>
                            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                            <li>
                                <a href="<?php echo $r['url'];?>" class="menu_a"><?php echo $r['catname'];?></a>
                            </li>
                            <?php $n++;}unset($n); ?>
                            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                            <?php } ?>
                        </ul>
                    </div>
                    <!--your logo-->

                    <!--search ends -->
                </div>
            </div>
            <div id="main-navigation">
                <!--main navigation wrapper starts -->
                <div class="container">
                    <ul class="main-menu">
                        <li>
                            <a href="index.html" id="current">首页</a>
                        </li>

                        <li><a href="#" >编程语言</a>
                            <!-- Mega Menu / Start -->
                            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
                            <ul class="two-columns">
                                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                                <li class="one-fourth">
                                    <a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a></li>
                                <?php $n++;}unset($n); ?>
                            </ul>
                            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                            <?php echo runhook('glogal_menu')?>
                            <!-- Mega Menu / End -->
                        </li>
                        <li>
                            <a href="#"> 常用软件</a>
                        </li>
                        <li>
                            <a href="#">学习资料</a>
                        </li>

                        <li>
                            <a href="#">学习视频</a>
                        </li>
                        <li>
                            <a href="#">实用手册</a>
                        </li>
                        <li>
                            <a href="http://hao.it915.com">网址导航</a>
                        </li>
                    </ul>

                </div>
            </div>
            <!--main navigation wrapper ends -->
        </header>
        <!-- header ends-->
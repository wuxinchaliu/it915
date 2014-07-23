<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header_category"); ?>

<div class="container">
    <div class="position">
        <ul class="contact-links" style="margin-left:0px;">
            <li><a href="<?php echo siteurl($siteid);?>">首页></a></li>
            <li><?php echo catpos($catid);?><?php echo $title;?></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="column-block">
        <section class="article-left left">
                <article>
                    <h2><?php echo $title;?></h2>
                    <h5>
                        <span>日期：<?php echo $inputtime;?>&nbsp;&nbsp;&nbsp;发布者：风继续吹&nbsp;&nbsp;&nbsp;来源：<?php echo $copyfrom;?>&nbsp;&nbsp;&nbsp;点击：</span>
                        <span id="hits"></span><script language="JavaScript" src="<?php echo APP_PATH;?>api.php?op=count&id=<?php echo $id;?>&modelid=<?php echo $modelid;?>"></script>


                        <div class="bdsharebuttonbox" style="float:right;"><a href="#" class="bds_more" data-cmd="more"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a></div>
                        <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                    </h5>
                    <section class="content">
                        <?php if($allow_visitor==1) { ?>
                        <?php echo $content;?>
                        <!--内容关联投票-->
                        <?php if($voteid) { ?><script language="javascript" src="<?php echo APP_PATH;?>index.php?m=vote&c=index&a=show&action=js&subjectid=<?php echo $voteid;?>&type=2"></script><?php } ?>

                        <?php } else { ?>
                        <CENTER><a href="<?php echo APP_PATH;?>index.php?m=content&c=readpoint&allow_visitor=<?php echo $allow_visitor;?>"><font color="red">阅读此信息需要您支付 <B><I><?php echo $readpoint;?> <?php if($paytype) { ?>元<?php } else { ?>点<?php } ?></I></B>，点击这里支付</font></a></CENTER>
                        <?php } ?>
                    </section>
                    <nav class="pagination">
                        <ul>
                            <?php echo $pages;?>
                        </ul>
                    </nav>
                </article>

                <?php if($titles) { ?>
                <fieldset>
                    <legend class="f14">本文导航</legend><ul class="list blue row-2">
                    <?php $n=1;if(is_array($titles)) foreach($titles AS $r) { ?>
                    <li><?php echo $n;?>、<a href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a></li>
                    <?php $n++;}unset($n); ?>
                </ul>
                </fieldset>
                <?php } ?>

                <p style="margin-bottom:10px">
                    <span style="float: left;">
                        <strong>标签：</strong>
                        <?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?>
                        <a href="<?php echo APP_PATH;?>index.php?m=content&c=tag&a=lists&tag=<?php echo urlencode($keyword);?>" class="blue"><?php echo $keyword;?></a>
                        <?php $n++;}unset($n); ?>
                    </span>
            <span class="bdsharebuttonbox" style="float:right;"><a href="#" class="bds_more" data-cmd="more"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a></span>
            <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                </p>
                <div class="clear"></div>
                <p class="f14">
                    <strong>上一篇：</strong><a href="<?php echo $previous_page['url'];?>"><?php echo $previous_page['title'];?></a><br />
                    <strong>下一篇：</strong><a href="<?php echo $next_page['url'];?>"><?php echo $next_page['title'];?></a>
                </p>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=59d3146c936b0bbb61d83c4d89437c20&action=relation&relation=%24relation&id=%24id&catid=%24catid&num=5&keywords=%24rs%5Bkeywords%5D\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'relation')) {$data = $content_tag->relation(array('relation'=>$relation,'id'=>$id,'catid'=>$catid,'keywords'=>$rs[keywords],'limit'=>'5',));}?>
                <?php if($data) { ?>
                <div class="related">
                    <h5 class="blue">延伸阅读：</h5>
                    <ul class="list blue lh24 f14">
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li>·<a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a><span>(<?php echo date('Y-m-d',$r[inputtime]);?>)</span></li>
                        <?php $n++;}unset($n); ?>
                    </ul>
                </div>
                <?php } ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            <!--高速版，加载速度快，使用前需测试页面的兼容性-->
            <div id="SOHUCS"></div>
            <script>
                (function(){
                    var appid = 'cyrhpueHO',
                            conf = 'prod_18d519f79841a7629faa656ab8262791';
                    var doc = document,
                            s = doc.createElement('script'),
                            h = doc.getElementsByTagName('head')[0] || doc.head || doc.documentElement;
                    s.type = 'text/javascript';
                    s.charset = 'utf-8';
                    s.src =  'http://assets.changyan.sohu.com/upload/changyan.js?conf='+ conf +'&appid=' + appid;
                    h.insertBefore(s,h.firstChild);
                    window.SCS_NO_IFRAME = true;
                })()
            </script>
        </section>

        <aside class="article-right right">
            <section class="aside-right">
                <div class="box">
                   <h3 class="bg_grap"><span>频道总排行</span></h3>
                    <ul class="top-list">
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=58900d29a2d86f6669bfff23ba8fcaf2&action=hits&catid=%24catid&num=10&order=views+DESC&cache=3600\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$tag_cache_name = md5(implode('&',array('catid'=>$catid,'order'=>'views DESC',)).'58900d29a2d86f6669bfff23ba8fcaf2');if(!$data = tpl_cache($tag_cache_name,3600)){$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'hits')) {$data = $content_tag->hits(array('catid'=>$catid,'order'=>'views DESC','limit'=>'10',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li><a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>"><?php echo str_cut($r[title], 48, '');?></a></li>
                        <?php $n++;}unset($n); ?>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </ul>
                </div>
                <div class="box">
                    <h3 class="bg_grap"><span>频道本月排行</span></h3>
                    <ul class="top-list">
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=d09a3bdd996817c252fccd081b70bebc&action=hits&catid=%24catid&num=10&order=monthviews+DESC&cache=3600\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$tag_cache_name = md5(implode('&',array('catid'=>$catid,'order'=>'monthviews DESC',)).'d09a3bdd996817c252fccd081b70bebc');if(!$data = tpl_cache($tag_cache_name,3600)){$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'hits')) {$data = $content_tag->hits(array('catid'=>$catid,'order'=>'monthviews DESC','limit'=>'10',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li><a href="<?php echo $r['url'];?>"<?php echo title_style($r[style]);?> class="title" title="<?php echo $r['title'];?>"><?php echo str_cut($r[title],56,'...');?></a></li>
                        <?php $n++;}unset($n); ?>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </ul>
                </div>
            </section>

        </aside>
    </div>
</div>

<?php include template("content","footer"); ?>
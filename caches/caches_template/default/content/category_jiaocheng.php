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
                <?php $j=1;?>
                <?php $n=1;if(is_array(subcat($catid))) foreach(subcat($catid) AS $v) { ?>
                <?php if($v['type']!=0) continue;?>
                <div class="box cat-area" <?php if($j%2==1) { ?>style="margin-right:10px"<?php } ?>>
                <h5 class="title-1"><?php echo $v['catname'];?><a href="<?php echo $v['url'];?>" class="more">更多>></a></h5>
                <div class="content">

                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b4f9f2b3c9f4f021c945647df37556d4&action=lists&catid=%24v%5Bcatid%5D&thumb=1&num=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$v[catid],'thumb'=>'1','order'=>'id DESC','limit'=>'1',));}?>
                    <p>
                        <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                        <a href="<?php echo $v['url'];?>" target="_blank"><img src="<?php echo thumb($v[thumb],70,60);?>" width="70" height="60"/></a>
                        <strong><a href="<?php echo $v['url'];?>" target="_blank" title="<?php echo $v['title'];?>"<?php echo title_style($v[style]);?>><?php echo str_cut($v[title], 30);?></a></strong><br /><?php echo str_cut($v[description],116,'..');?>
                        <?php $n++;}unset($n); ?>
                    </p>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

                    <div class="bk15 hr"></div>
                    <ul class="list  lh24 f14">
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5d107604b68e61f01796643989da0a78&action=lists&catid=%24v%5Bcatid%5D&num=5&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$v[catid],'order'=>'id DESC','limit'=>'5',));}?>
                        <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                        <li><a href="<?php echo $v['url'];?>" target="_blank"<?php echo title_style($v[style]);?>><?php echo $v['title'];?></a></li>
                        <?php $n++;}unset($n); ?>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </ul>
                </div>
    </div>
    <?php if($j%2==0) { ?><div class="bk10"></div><?php } ?>
    <?php $j++; ?>
    <?php $n++;}unset($n); ?>
            </article>
        </section>

        <aside class="article-right right">
            <section class="aside-right">
                <div class="box">
                    <h5 class="top-title">频道总排行</h5>
                    <ul class="top-list">
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=58900d29a2d86f6669bfff23ba8fcaf2&action=hits&catid=%24catid&num=10&order=views+DESC&cache=3600\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$tag_cache_name = md5(implode('&',array('catid'=>$catid,'order'=>'views DESC',)).'58900d29a2d86f6669bfff23ba8fcaf2');if(!$data = tpl_cache($tag_cache_name,3600)){$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'hits')) {$data = $content_tag->hits(array('catid'=>$catid,'order'=>'views DESC','limit'=>'10',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li><a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>"><?php echo str_cut($r[title], 48, '');?></a></li>
                        <?php $n++;}unset($n); ?>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </ul>
                </div>
                <div class="box">
                    <h5 class="title-2">频道本月排行</h5>
                    <ul class="content rank">
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
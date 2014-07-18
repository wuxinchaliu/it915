<?php
/**
 * 分页函数
 * 
 * @param $num 信息总数
 * @param $curr_page 当前分页
 * @param $pageurls 链接地址
 * @return 分页
 */
function content_pages($num, $curr_page,$pageurls) {
	$multipage = '';
	$page = 11;
	$offset = 4;
	$pages = $num;
	$from = $curr_page - $offset;
	$to = $curr_page + $offset;
	$more = 0;
	if($page >= $pages) {
		$from = 2;
		$to = $pages-1;
	} else {
		if($from <= 1) {
			$to = $page-1;
			$from = 2;
		} elseif($to >= $pages) {
			$from = $pages-($page-2);
			$to = $pages-1;
		}
		$more = 1;
	}
	if($curr_page>0) {
		$perpage = $curr_page == 1 ? 1 : $curr_page-1;
        $multipage .= '<li><a class="a1" href="'.$pageurls[1][0].'">首页</a></li>';
		$multipage .= '<li><a class="a1" href="'.$pageurls[$perpage][0].'">«</a></li>';
		if($curr_page==1) {
			$multipage .= '<li><span>1</span></li>';
		} elseif($curr_page>6 && $more) {
			$multipage .= '<li><a class="a1" href="'.$pageurls[1][0].'">1</a></li>';
		} else {
			$multipage .= '<li><a class="a1" href="'.$pageurls[1][0].'">1</a></li>';
		}
	}
	for($i = $from; $i <= $to; $i++) {
		if($i != $curr_page) {
			$multipage .= '<li><a class="a1" href="'.$pageurls[$i][0].'">'.$i.'</a></li>';
		} else {
			$multipage .= '<li><span>'.$i.'</span></li>';
		}
	}
	if($curr_page<$pages) {
		if($curr_page<$pages-5 && $more) {
			$multipage .= '<li><a class="a1" href="'.$pageurls[$pages][0].'">'.$pages.'</a></li><li><a class="a1" href="'.$pageurls[$curr_page+1][0].'">»</a></li>';
		} else {
			$multipage .= '<li><a class="a1" href="'.$pageurls[$pages][0].'">'.$pages.'</a> </li><li><a class="a1" href="'.$pageurls[$curr_page+1][0].'">»</a></li>';
		}
	} elseif($curr_page==$pages) {
		$multipage .= '<li><span>'.$pages.'</span></li><li><a class="a1" href="'.$pageurls[$curr_page][0].'">»</a></li>';
	}
    $multipage .= '<li><a class="page_last" href="'.$pageurls[$num][0].'">末页</a></li>';
	return $multipage;
}

?>
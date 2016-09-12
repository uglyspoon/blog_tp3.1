<?php if (!defined('THINK_PATH')) exit();?><h3>
      <p>最新<span>文章</span></p>
</h3>
 <ul class="rank">
 	<?php if(is_array($news)): foreach($news as $key=>$v): ?><li><a href="<?php echo U('article/'.$v['id']);?>" title="#" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
 </ul>
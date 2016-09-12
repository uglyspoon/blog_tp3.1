<?php if (!defined('THINK_PATH')) exit();?><h3 class="ph">
      <p>热门<span>排行</span></p>
</h3>
<ul class="paih">
	<?php if(is_array($news)): foreach($news as $key=>$v): ?><li><a href="<?php echo U('article/'.$v['id']);?>" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
</ul>
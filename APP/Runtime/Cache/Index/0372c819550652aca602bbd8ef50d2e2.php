<?php if (!defined('THINK_PATH')) exit();?><div class="rnav">
  <ul>
    <?php if(is_array($sub)): foreach($sub as $key=>$v): ?><li class="rnav<?php echo ($v['id']%4+1); ?>"><a href="<?php echo U('Index/News/Sub',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>
  </ul>      
</div>
 <div class="rnavs">
  <ul> 
    <?php if(is_array($sub)): foreach($sub as $key=>$v): ?><li class="rnav1"><a href="#" target="_blank"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>      
  </ul>      
</div>
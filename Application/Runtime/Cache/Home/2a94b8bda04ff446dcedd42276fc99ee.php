<?php if (!defined('THINK_PATH')) exit();?><ul>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
            <a href="<?php echo U($vo['path'],true,false,true);?>"><?php echo U($vo['path'],true,false,true);?></a><?php echo ($vo['allow']?'(true)':''); ?>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
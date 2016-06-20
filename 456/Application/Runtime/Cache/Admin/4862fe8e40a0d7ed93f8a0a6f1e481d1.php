<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=">
<title>后台管理系统</title>
<link rel="stylesheet" href="/Public/Admin/css/css.css">
<script src="/Public/Admin/js/jquery-1.9.1.js"></script>
<script src="/Public/Common/Layer/layer.js"></script>
<script>
function check(){
	var group_id = $('#group_id').val();
	if(group_id == ''){
		layer.tips('请选择所属用户组', '#group_id');
		return false;
	}
	return true;
}
</script>
</head>
<body>
<form name="myform" action="/Admin/Admin/admin_edit?id=6" method="post" onsubmit="return check();">
<div class="list">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="details">
        <tbody>
	      <tr>
	      	<td width="32%"><label class="label">
	      	  <div align="right">账号：</div>
	      	</label></td>
	      	<td width="68%"><?php echo ($vo["account"]); ?></td>
	      </tr>
          <tr>
            <td><div align="right">用户组：</div></td>
            <td><select name="group_id" id="group_id" class="select">
            <option value="<?php echo ($vo["group_id"]); ?>"><?php echo ($vo["title"]); ?></option>
            <?php if($_SESSION['aid'] == 1): ?><option value="">---- 请选择所属组 ----</option>
            <?php if(is_array($group)): foreach($group as $key=>$vo2): ?><option value="<?php echo ($vo2["id"]); ?>"><?php echo ($vo2["title"]); ?></option><?php endforeach; endif; endif; ?>
            </select></td>
          </tr>  
          <tr>
            <td><div align="right">账号状态：</div></td>
            <td>
            <?php if($_SESSION['aid'] == 1): ?><input name="status" type="radio" id="qiyong" value="1" style="position:relative;top:8px;"  <?php if($vo["status"] == 1): ?>checked<?php endif; ?> />
            <label for="qiyong">允许登录</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="status" type="radio" id="jinyong" value="0" style="position:relative;top:8px;"  <?php if($vo["status"] == 0): ?>checked<?php endif; ?> />
            <label for="jinyong">禁用登录</label>
            <?php else: ?>
            正常<input name="status" type="hidden" value="1" /><?php endif; ?>
            </td>
          </tr>
          
        </tbody>
  </table>
</div>

<div class="footer">
	<div class="save_button">
    	<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
        <button type="submit" class="button" style="width:180px;">保 存</button>
    </div>
</div>
</form>

</body>
</html>
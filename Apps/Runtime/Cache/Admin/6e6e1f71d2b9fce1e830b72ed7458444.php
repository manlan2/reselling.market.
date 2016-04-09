<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo ($CONF['shopTitle']['fieldValue']); ?>后台管理中心</title>
      <link href="/reselling.market/Public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="/reselling.market/Apps/Admin/View/css/AdminLTE.css" rel="stylesheet" type="text/css" />
      <link href="/reselling.market/Apps/Admin/View/css/upload.css" rel="stylesheet" type="text/css" />
      
      <!--[if lt IE 9]>
      <script src="/reselling.market/Public/js/html5shiv.min.js"></script>
      <script src="/reselling.market/Public/js/respond.min.js"></script>
      <![endif]-->
      <script src="/reselling.market/Public/js/jquery.min.js"></script>
      <script src="/reselling.market/Public/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="/reselling.market/Public/js/common.js"></script>
      <script src="/reselling.market/Public/plugins/plugins/plugins.js"></script>
      
      <script src="/reselling.market/Public/plugins/formValidator/formValidator-4.1.3.js"></script>
      <script type="text/javascript" src="/reselling.market/Apps/Admin/View/js/upload.js"></script>
      
   </head>
   <script>
   var ThinkPHP = window.Think = {
	        "ROOT"   : "/reselling.market"
	}
   $(function () {
	   $.formValidator.initConfig({
		   theme:'Default',mode:'AutoTip',formID:"myform",debug:true,submitOnce:true,onSuccess:function(){
				   edit();
			       return false;
			}});
	   $("#loginName").formValidator({onShow:"",onFocus:"会员账号应该为5-16字母、数字或下划线",onCorrect:"输入正确"}).inputValidator({min:5,max:16,onError:"会员账号应该为5-16字母、数字或下划线"}).regexValidator({
		       regExp:"username",dataType:"enum",onError:"会员账号格式错误"
			}).ajaxValidator({
				dataType : "json",
				async : true,
				url : "<?php echo U('Admin/Users/checkLoginKey');?>",
				success : function(data){
					var json = WST.toJson(data);
		            if( json.status == "1" ) {
		                return true;
					} else {
		                return false;
					}
					return "该账号已被使用";
				},
				buttons: $("#dosubmit"),
				onError : "该账号已存在。",
				onWait : "请稍候..."
			}).defaultPassed();
		$("#loginPwd").formValidator({
			onShow:"",onFocus:"登录密码长度应该为5-20位之间"
			}).inputValidator({
				min:5,max:50,onError:"登录密码长度应该为5-20位之间"
			});
		$("#userPhone").inputValidator({min:0,max:25,onError:"你输入的手机号码非法,请确认"}).regexValidator({
			regExp:"mobile",dataType:"enum",onError:"手机号码格式错误"
		}).ajaxValidator({
			dataType : "json",
			async : true,
			url : "<?php echo U('Admin/Users/checkLoginKey');?>",
			success : function(data){
				var json = WST.toJson(data);
	            if( json.status == "1" ) {
	                return true;
				} else {
	                return false;
				}
				return "该手机号码已被使用";
			},
			buttons: $("#dosubmit"),
			onError : "该手机号码已存在。",
			onWait : "请稍候..."
		}).defaultPassed().unFormValidator(true);
		$("#userEmail").inputValidator({min:0,max:25,onError:"你输入的邮箱长度非法,请确认"}).regexValidator({
		       regExp:"email",dataType:"enum",onError:"邮箱格式错误"
			}).ajaxValidator({
				dataType : "json",
				async : true,
				url : "<?php echo U('Admin/Users/checkLoginKey');?>",
				success : function(data){
					var json = WST.toJson(data);
		            if( json.status == "1" ) {
		                return true;
					} else {
		                return false;
					}
					return "该电子邮箱已被使用";
				},
				buttons: $("#dosubmit"),
				onError : "该账号已存在。",
				onWait : "请稍候..."
			}).defaultPassed().unFormValidator(true);

		$("#userQQ").formValidator({
			empty:true,onShow:"",onFocus:"QQ号码只能是数字"
			}).regexValidator({
				regExp:"num1",dataType:"enum",onError:"QQ号码格式错误"
			});
		
		$("#userPhone").blur(function(){
			  if($("#userPhone").val()==''){
				  $("#userPhone").unFormValidator(true);
			  }else{
				  $("#userPhone").unFormValidator(false);
			  }
		});
		$("#userEmail").blur(function(){
			  if($("#userEmail").val()==''){
				  $("#userEmail").unFormValidator(true);
			  }else{
				  $("#userEmail").unFormValidator(false);
			  }
		});
		$("#userScore").formValidator({
			empty:true,onShow:"",onFocus:"当前积分只能是正整数"
			}).functionValidator({
				fun:function(val,elem){
					if(parseInt(val,10)<=parseInt($("#userTotalScore").val(),10)){
					    return true;
				    }else{
					    return "会员积分不能大于历史积分";
				    }
				}
		});
		$("#userTotalScore").formValidator({
			empty:true,onShow:"",onFocus:"当前积分只能是正整数"
			}).functionValidator({
				fun:function(val,elem){
					if(parseInt(val,10)>=parseInt($("#userScore").val(),10)){
					    return true;
				    }else{
					    return "历史积分不能小于用户积分";
				    }
				}
			});
		
   });
   function edit(){
	   var params = {};
	   params.loginName = $.trim($('#loginName').val());
	   params.loginPwd = $.trim($('#loginPwd').val());
	   params.userName = $.trim($('#userName').val());
	   params.userQQ = $.trim($('#userQQ').val());
	   params.userScore = $.trim($('#userScore').val());
	   params.userTotalScore = $.trim($('#userTotalScore').val());
	   params.userPhone = $.trim($('#userPhone').val());
	   params.userPhoto = $.trim($('#userPhoto').val());
	   params.userStatus = $('input[name="userStatus"]:checked').val();
	   params.userSex = $('input[name="userSex"]:checked').val();
	   params.userEmail = $.trim($('#userEmail').val());  
	   params.id = $('#id').val();
	   Plugins.waitTips({title:'信息提示',content:'正在提交数据，请稍后...'});
		$.post("<?php echo U('Admin/Users/edit');?>",params,function(data,textStatus){
			var json = WST.toJson(data);
			if(json.status=='1'){
				Plugins.setWaitTipsMsg({ content:'操作成功',timeout:1000,callback:function(){
				   location.href='<?php echo U("Admin/Users/index");?>';
				}});
			}else if(json.status=='-2'){
				Plugins.setWaitTipsMsg({content:'用户手机号码或邮箱已存在!',timeout:1000});
			}else{
				Plugins.closeWindow();
				Plugins.Tips({title:'信息提示',icon:'error',content:'操作失败!',timeout:1000});
			}
		});
   }
   var filetypes = ["gif","jpg","png","jpeg"];
   </script>
   <body class="wst-page">
   			<iframe name="upload" style="display:none"></iframe>
			<form id="uploadform_Filedata" autocomplete="off" style="position:absolute;top:305px;left:120px;z-index:10;" enctype="multipart/form-data" method="POST" target="upload" action="<?php echo U('Home/Shops/uploadPic');?>" >
				<div style="position:relative;">
				<input id="userPhoto" name="userPhoto" class="form-control wst-ipt" type="text" value="<?php echo ($object["userPhoto"]); ?>" readonly style="margin-right:4px;float:left;margin-left:8px;width:250px;"/>
				<div class="div1">
					<div class="div2">浏览</div>
					<input type="file" class="inputstyle" id="Filedata" name="Filedata" onchange="updfile('Filedata');" >
				</div>
				<div style="clear:both;"></div>
				<div >&nbsp;图片大小:150 x 120 (px)(格式为 gif, jpg, jpeg, png)</div>
				<input type="hidden" name="dir" value="users">
				<input type="hidden" name="width" value="150">
				<input type="hidden" name="folder" value="Filedata">
				<input type="hidden" name="sfilename" value="Filedata">
				<input type="hidden" name="fname" value="userPhoto">
				<input type="hidden" id="s_Filedata" name="s_Filedata" value="">
				
				</div>
		</form>
       <form name="myform" method="post" id="myform" autocomplete="off">   
        <input type='hidden' id='id' value='<?php echo ($object["userId"]); ?>'/>
       
        <table class="table table-hover table-striped table-bordered wst-form">
           <tr>
             <th width='120' align='right'>账号<font color='red'>*</font>：</th>
             <td><input type='text' id='loginName' name='loginName' class="form-control wst-ipt" value='<?php echo ($object["loginName"]); ?>' maxLength='20'/></td>
             <td rowspan='6'>
             	<div id="preview_Filedata">
                 <img id='userPhotoPreview' src='<?php if($object['userPhoto'] =='' ): ?>/reselling.market/Apps/Admin/View/img/staff.png<?php else: ?>/reselling.market/<?php echo ($object['userPhoto']); endif; ?>' height='152'/><br/>
	             </div>
             </td>
           </tr>
           <tr>
             <th width='120' align='right'>密码<font color='red'>*</font>：</th>
             <td>
             <input type='password' id='loginPwd' class="form-control wst-ipt" value='<?php echo ($object["loginPwd"]); ?>' maxLength='20'/>
             <?php if($object['userId'] !=0 ): ?>(为空则说明不修改密码)<?php endif; ?></td>
           </tr>
           <tr>
             <th align='right'>用户名：</th>
             <td>
             <input type='text' id='userName' class="form-control wst-ipt" value='<?php echo ($object["userName"]); ?>' maxLength='20'/>
             </td>
           </tr>
           <tr>
             <th align='right'>性别：</th>
             <td>
             <label>
             <input type='radio' id='userSex1' name='userSex' value='1'/>男
             </label>
             <label>
             <input type='radio' id='userSex2' name='userSex' value='2'/>女
             </label>
             <label>
             <input type='radio' id='userSex0' name='userSex' value='0'/>保密
             </label>
             </td>
           </tr>
           <tr>
             <th align='right'>手机号码：</th>
             <td>
             <input type='text' id='userPhone' name='userPhone' class="form-control wst-ipt" value='<?php echo ($object["userPhone"]); ?>' maxLength='11'/>
             </td>
           </tr>
           <tr>
             <th align='right'>电子邮箱：</th>
             <td>
             <input type='text' id='userEmail' name='userEmail' class="form-control wst-ipt"  value='<?php echo ($object["userEmail"]); ?>' maxLength='25'/>
             </td>
           </tr>
           <tr>
             <th align='right'>会员积分<font color='red'>*</font>：</th>
             <td>
             <input type='text' id='userScore' class="form-control wst-ipt-10"  value='<?php echo ($object["userScore"]); ?>' onkeypress="return WST.isNumberKey(event)" onkeyup="javascript:WST.isChinese(this,1)" maxLength='8'/>
             </td>
           </tr>
           <tr>
             <th align='right'>会员历史积分<font color='red'>*</font>：</th>
             <td colspan='2'>
             <input type='text' id='userTotalScore' class="form-control wst-ipt-10"  value='<?php echo ($object["userTotalScore"]); ?>' onkeypress="return WST.isNumberKey(event)" onkeyup="javascript:WST.isChinese(this,1)" maxLength='8'/>
             </td>
           </tr>
           <tr>
             <th align='right'>QQ：</th>
             <td colspan='2'>
             <input type='text' id='userQQ' class="form-control wst-ipt"  value='<?php echo ($object["userQQ"]); ?>' onkeypress="return WST.isNumberKey(event)" onkeyup="javascript:WST.isChinese(this,1)" maxLength='15'/>
             </td>
           </tr>
            <tr style="height:80px;">
	             <th align='right'>用户头像：</th>
	             <td>
		          
		             
	             </td>
	           </tr>
            <tr>
             <th align='right'>会员状态<font color='red'>*</font>：</th>
             <td colspan='2'>
             <label>
             <input type='radio' id='userStatus1' value='1' name='userStatus' checked/>启用
             </label>
             <label>
             <input type='radio' id='userStatus0' value='0' name='userStatus'/>停用
             </label>
             </td>
           </tr>
           <tr>
             <td colspan='3' style='padding-left:250px;'>
                 <button type="submit" class="btn btn-success">保&nbsp;存</button>
                 <button type="button" class="btn btn-primary" onclick='javascript:location.href="<?php echo U('Admin/Users/index');?>"'>返&nbsp;回</button>
             </td>
           </tr>
        </table>
       </form>
   </body>
</html>
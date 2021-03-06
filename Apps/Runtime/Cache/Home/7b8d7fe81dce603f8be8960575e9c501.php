<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
         <title>买家中心 - <?php echo ($CONF['mallTitle']); ?></title>
         <meta name="keywords" content="<?php echo ($CONF['mallKeywords']); ?>" />
      	 <meta name="description" content="<?php echo ($CONF['mallDesc']); ?>,买家中心" />
         <meta http-equiv="Expires" content="0">
		 <meta http-equiv="Pragma" content="no-cache">
		 <meta http-equiv="Cache-control" content="no-cache">
		 <meta http-equiv="Cache" content="no-cache">
         <link rel="stylesheet" href="/reselling.market/Apps/Home/View/default/css/common.css" />
         <link rel="stylesheet" href="/reselling.market/Apps/Home/View/default/css/user.css">
    </head>
	<?php echo WSTLoginTarget(0);?>
    <body>
        <div class="wst-wrap">
          <div class='wst-header'>
          <script src="/reselling.market/Public/js/jquery.min.js"></script>
<script src="/reselling.market/Public/plugins/lazyload/jquery.lazyload.min.js?v=1.9.1"></script>
<script type="text/javascript">
var WST = ThinkPHP = window.Think = {
        "ROOT"   : "/reselling.market",
        "APP"    : "/reselling.market/index.php",
        "PUBLIC" : "/reselling.market/Public",
        "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>",
        "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
        "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"],
        "DOMAIN" : "<?php echo WSTDomain();?>",
        "CITYID" : "<?php echo ($currArea['areaId']); ?>",
        "DEFAULT_IMG": "<?php echo WSTDomain();?>/<?php echo ($CONF['goodsImg']); ?>",
        "MALL_TITLE" : "<?php echo ($CONF['mallName']); ?>",
        "SMS_VERFY"  : "<?php echo ($CONF['smsVerfy']); ?>",
        "PHONE_VERFY"  : "<?php echo ($CONF['phoneVerfy']); ?>"
}
    var domainURL = "<?php echo WSTDomain();?>";
    var publicurl = "/reselling.market/Public";
    var currCityId = "<?php echo ($currArea['areaId']); ?>";
    var currCityName = "<?php echo ($currArea['areaName']); ?>";
    var currDefaultImg = "<?php echo WSTDomain();?>/<?php echo ($CONF['goodsImg']); ?>";
    var wstMallName = "<?php echo ($CONF['mallName']); ?>";
    $(function() {
    	$('.lazyImg').lazyload({ effect: "fadeIn",failurelimit : 10,threshold: 200,placeholder:WST.DEFAULT_IMG});
    });
</script>
<script src="/reselling.market/Public/js/think.js"></script>
<div id="wst-shortcut">
	<div class="w">
		<ul class="fl lh">
			<li class="fore1" ><b></b><a style="font-weight: bold;" href='<?php echo WSTDomain();?>'><?php echo ($CONF['mallName']); ?></a></li><s></s>
			<!--
			<li class="fore3 ld menu" id="app-jd" data-widget="dropdown">
				<span class="outline"></span> <span class="blank"></span> 
				<a href="#" target="_blank"><img src="/reselling.market/Apps/Home/View/default/images/icon_top_02.png"/>&nbsp;<?php echo ($CONF['mallName']); ?> 手机版</a>
			</li>
			-->
			<li class="fore4" id="biz-service" data-widget="dropdown" style='padding:0;'>&nbsp;<s></s>&nbsp;&nbsp;&nbsp;
				所在学校
				【<span class='wst-city'>&nbsp;<?php echo ($currArea["areaName"]); ?>&nbsp;</span>】
				<img src="/reselling.market/Apps/Home/View/default/images/icon_top_03.png"/>	
				&nbsp;&nbsp;<a href="javascript:;" onclick="toChangeCity();">切换学校</a><i class="triangle"></i>
			</li>
		</ul>
	
		<ul class="fr lh" style='float:right;'>
			<li class="fore1" id="loginbar"><a href="<?php echo U('Home/Orders/queryByPage');?>"><span style='color:blue'><?php echo ($WST_USER['loginName']); ?></span></a> 欢迎您来到 <a style="font-weight: bold;" href='<?php echo WSTDomain();?>'><?php echo ($CONF['mallName']); ?></a>！<s></s>&nbsp;
			<span>
				<?php if(!$WST_USER['userId']): ?><a href="<?php echo U('Home/Users/login');?>">[登录]</a>
				<a href="<?php echo U('Home/Users/regist');?>"	class="link-regist">[注册]</a><?php endif; ?>
				<?php if($WST_USER['userId'] > 0): ?><a href="javascript:logout();">[退出]</a><?php endif; ?>
			</span>
			</li>
			<li class="fore2 ld"><s></s>
			<?php if(session('WST_USER.userId')>0){ ?>
				<?php if(session('WST_USER.userType')==0){ ?>
					<!--
				    <a href="<?php echo U('Home/Shops/toOpenShopByUser');?>" rel="nofollow">成为服务商</a>
				-->
				    <a href="<?php echo U('Articles/index',array('articleId'=>7));?>" rel="nofollow">成为服务商</a>
				<?php }else{ ?>
				    <?php if(session('WST_USER.loginTarget')==0){ ?>
				        <a href="<?php echo U('Home/Shops/index');?>" rel="nofollow">卖家中心</a>
				    <?php }else{ ?>
				        <a href="<?php echo U('Home/Users/index');?>" rel="nofollow">买家中心</a>
				    <?php } ?>
				<?php } ?>
			<?php }else{ ?>
				<!--
			    <a href="<?php echo U('Home/Shops/toOpenShop');?>" rel="nofollow">成为服务商</a>
				-->

			    <a href="<?php echo U('Articles/index',array('articleId'=>7));?>" rel="nofollow">成为服务商</a>
			<?php } ?>
			</li>
		</ul>
		<span class="clr"></span>
	</div>
</div>

          <div class='wst-user-top'>
			<div class="wst-user-top-main">
					<div class='wst-user-top-logo'>
						<a href="<?php echo WSTDomain();?>"  title='商城首页'>
						<img src="<?php echo WSTDomain();?>/<?php echo ($CONF['mallLogo']); ?>" height="132" width='240'/>	
						</a>
					</div>
					<div class='wst-user-top-search'>
						<div class="search-box">
							<input id="wst-search-type" type="hidden" value="1"/>
							<input id="keyword" class="wst-search-ipt" me="q" tabindex="9" placeholder="搜索 商品" autocomplete="off" >
							<div id="btnsch" class="wst-search-btn">搜&nbsp;索</div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="wst-shop-nav">
				<div class="wst-nav-box">
					<li class="liselect"><a href="<?php echo U('Home/Orders/queryByPage');?>">买家首页</a></li>
					<div class="wst-clear"></div>
				</div>
			</div>
          </div>
          <div class='wst-nav'></div>
          <div class='wst-main' >
            <div class='wst-menu'>
            <span class='wst-menu-title' style='border-top:0px;display:none;'><span></span>交易信息</span>
            
               <a style="display:none;" href="<?php echo U('Home/Orders/queryPayByPage/');?>"><li id="li_queryPayByPage" <?php if($umark == "queryPayByPage"): ?>class='selected'<?php endif; ?>>待付款订单<span style="display:none;" class="wst-msg-tips-box"></span></li></a>
               <a style="display:none;" href="<?php echo U('Home/Orders/queryDeliveryByPage/');?>"><li id="li_queryDeliveryByPage" <?php if($umark == "queryDeliveryByPage"): ?>class='selected'<?php endif; ?>>待发货订单<span style="display:none;" class="wst-msg-tips-box"></span></li></a>
               <a style="display:none;" href="<?php echo U('Home/Orders/queryReceiveByPage/');?>"><li id="li_queryReceiveByPage" <?php if($umark == "queryReceiveByPage"): ?>class='selected'<?php endif; ?>>待确认收货<span style="display:none;" class="wst-msg-tips-box"></span></li></a>
               <a style="display:none;" href="<?php echo U('Home/Orders/queryAppraiseByPage/');?>"><li id="li_queryAppraiseByPage" <?php if($umark == "queryAppraiseByPage"): ?>class='selected'<?php endif; ?>>待评价交易<span style="display:none;" class="wst-msg-tips-box"></span></li></a>
               <a style="display:none;" href="<?php echo U('Home/Orders/queryCancelOrders/');?>"><li id="li_queryCancelOrders" <?php if($umark == "queryCancelOrders"): ?>class='selected'<?php endif; ?>>已取消订单</li></a>
           
               <a style="display:none;"  href="<?php echo U('Home/Orders/queryRefundByPage/');?>"><li <?php if($umark == "queryRefundByPage"): ?>class='selected'<?php endif; ?>>拒收/退款</li></a>
               <a style="display:none;" href="<?php echo U('Home/UserAddress/queryByPage/');?>"><li <?php if($umark == "addressQueryByPage"): ?>class='selected'<?php endif; ?>>收货地址</li></a>


              
              
              <span class='wst-menu-title' style='border-top:0px;'><span></span>商品管理</span>
              <a style="" href="<?php echo U('Home/GoodsAppraises/getAppraisesList/',array('speechType'=>'receive'));?>"><li <?php if($umark == "getAppraisesList"): ?>class='selected'<?php endif; ?>>留言管理</li></a>
              <a href="<?php echo U('Home/Goods/queryOnSaleByPage/');?>"><li <?php if($umark == "queryOnSaleByPage"): ?>class='liselect'<?php endif; ?>>出售中的宝贝</li></a>
              <a href="<?php echo U('Home/Goods/toEdit/',array('umark'=>'toEditGoods'));?>"><li <?php if($umark == "toEditGoods"): ?>class='liselect'<?php endif; ?>>发布宝贝</li></a>
              
              <?php if(($userType == 1)): ?><span class='wst-menu-title'><span></span>网店设置</span>
                  <a href="<?php echo U('Home/Shops/toEdit/');?>"><li <?php if($umark == "toEdit"): ?>class='liselect'<?php endif; ?>>店铺资料</li></a>
                  <a href="<?php echo U('Home/Shops/toShopCfg/');?>"><li <?php if($umark == "setShop"): ?>class='liselect'<?php endif; ?>>店铺设置</li></a><?php endif; ?>
              <span class='wst-menu-title'><span></span>个人中心</span>
               <a  href="<?php echo U('Home/Favorites/queryByPage/');?>"><li <?php if($umark == "queryFavoritesByPage"): ?>class='selected'<?php endif; ?>>我的关注</li></a>
               <a href="<?php echo U('Home/Messages/queryByPage/');?>"><li id='li_queryMessageByPage' <?php if($umark == "queryMessageByPage"): ?>class='liselect'<?php endif; ?>>商城消息<span style="display:none;" class="wst-msg-tips-box"></span></li></a>
               <a href="<?php echo U('Home/Users/toEdit/');?>"><li <?php if($umark == "toEditUser"): ?>class='selected'<?php endif; ?>>个人资料</li></a>
               <a href="<?php echo U('Home/Users/toEditPass/');?>"><li <?php if($umark == "toEditPass"): ?>class='selected'<?php endif; ?>>修改密码</li></a>
             <?php if($WST_USER["userType"] == 0): ?><div class="wst-appsaler">

          <!--
				<div>您目前不是卖家，您可以</div>
				<div><a href="<?php echo U('Home/Shops/toOpenShopByUser/');?>"><img src="/reselling.market/Apps/Home/View/default/images/btn_setshop.png" height="38" width="134" /></a></div>
      -->
			 </div><?php endif; ?>
            </div>
            <div class='wst-content'>
            
<style>
input[type="text"]{width:160px;}
.shortcut { border-left: 1px solid #fff; padding: 0px;}
</style>
<script>
$(function () {
	   $.formValidator.initConfig({
		   theme:'Default',mode:'AutoTip',formID:"myform",debug:true,submitOnce:true,onSuccess:function(){
				   editUser();
			       return false;
			},onError:function(msg){
		}});
	   $("#userName").formValidator({onShow:"",onFocus:"",onCorrect:"输入正确"}).inputValidator({min:4,max:20,onError:"昵称长度为4到20位"});
	   $("#userPhone").inputValidator({min:0,max:25,onError:"你输入的手机号码非法,请确认"}).regexValidator({
			regExp:"mobile",dataType:"enum",onError:"手机号码格式错误"
		}).ajaxValidator({
			dataType : "json",
			async : true,
			url : Think.U('Home/Users/checkLoginKey'),
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
				url : Think.U('Home/Users/checkLoginKey'),
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
				onError : "该邮箱已存在。",
				onWait : "请稍候..."
			}).defaultPassed().unFormValidator(true);
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
	   
});

var filetypes = ["gif","jpg","png","jpeg"];


</script>
<script>
	function getCitys(){
    	var provinceId = $("#provinceId").val();
    	jQuery.post("<?php echo U('Home/Areas/getCityListByProvince/');?>",{provinceId:provinceId},function(rsp) {
    		var json = WST.toJson(rsp);
    		var citys = new Array();
    		
    		for(var i=0;i<json.length;i++){
    			var city = json[i];
    			if(city.areaId=='<?php echo ($areaId2); ?>'){
    				citys.push("<option value='"+city.areaId+"' selected>"+city.areaName+"</option>");
    			}else{
    				citys.push("<option value='"+city.areaId+"'>"+city.areaName+"</option>");
    			}
    		}
    		if(!json.length){
    			citys.push("<option>选择学校</option>");
    		}
    		$("#cityId").html(citys.join(""));
    	});
    }
</script>
   	<div class="wst-body"> 
       <div class='wst-page-header'>买家中心 > 个人资料</div>
       <div class='wst-page-content' style="position:relative;">
       		<iframe name="upload" style="display:none"></iframe>
			<form id="uploadform_Filedata" autocomplete="off" style="position:absolute;left:400px;z-index:10;margin: 10px;" enctype="multipart/form-data" method="POST" target="upload" action="<?php echo U('Home/Shops/uploadPic');?>" >
				<div id="preview_Filedata" >
             	<img id='preview' src='<?php if($user['userPhoto'] =='' ): ?>/reselling.market/<?php echo ($CONF['goodsImg']); else: ?>/reselling.market/<?php echo ($user["userPhoto"]); endif; ?>' width="140" height='140' />
                </div>
				<div style="position:relative;left: -4px;">
				<input id="userPhoto" name="userPhoto" type="text" value="<?php echo ($user["userPhoto"]); ?>" readonly style="float:left;width:140px;"/>
				<div class="div1">
					<div class="div2">浏览</div>
					<input type="file" class="inputstyle" id="Filedata" name="Filedata" onchange="updfile('Filedata');" >
				</div>
				<div style="clear:both;"></div>
				<div >&nbsp;图片大小:140 x 140 (px)(格式为 gif, jpg, jpeg, png)</div>
				<input type="hidden" name="dir" value="users">
				<input type="hidden" name="width" value="140">
				<input type="hidden" name="folder" value="Filedata">
				<input type="hidden" name="sfilename" value="Filedata">
				<input type="hidden" name="fname" value="userPhoto">
				<input type="hidden" id="s_Filedata" name="s_Filedata" value="">
				
				</div>
			</form>
       <form name="myform" method="post" id="myform" autocomplete="off">
        <table class="table table-hover table-striped table-bordered wst-form" style='margin-top:10px;'>
           <tr>
             <th align='right' width="80">昵称 <font color='red'>*</font>：</th>
             <td>
             <input type='text' id='userName' name='userName' value="<?php echo ($user['userName']); ?>"/>
             </td>
           </tr>
           <tr>
             <th align='right'>性别 <font color='red'>*</font>：</th>
             <td>
             	<label><input type='radio' name='userSex' value="1" <?php if($user['userSex'] == 1): ?>checked<?php endif; ?>/>男</label>
             	<label><input type='radio' name='userSex' value="2" <?php if($user['userSex'] == 2): ?>checked<?php endif; ?>/>女</label>
             	<label><input type='radio' name='userSex' value="3" <?php if($user['userSex'] == 3): ?>checked<?php endif; ?>/>保密</label>
             </td>
           </tr>
            <tr style="display:none;">
             <th align='right'>用户QQ ：</th>
             <td>
             <input type='text' id='userQQ' name='userQQ' value="<?php echo ($user['userQQ']); ?>"/>
             </td>
           </tr>
           <tr style="">
             <th align='right'>学校<font color='red'>*</font>：</th>
             <td>
	            <div class="shortcut">
                    <div class="shortcut-select shortcut-select-p">
                        <select id="provinceId" onchange="getCitys(this);" width="70">
                        	<?php if(is_array($parentList)): $k = 0; $__LIST__ = $parentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$province): $mod = ($k % 2 );++$k;?><option <?php if($province['areaId'] == $parentId): ?>selected<?php endif; ?> value="<?php echo ($province['areaId']); ?>"><?php echo ($province["areaName"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="shortcut-select shortcut-select-city">
                        <select id="cityId" width="">
                        	<?php if(is_array($areasList)): $k = 0; $__LIST__ = $areasList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$province): $mod = ($k % 2 );++$k;?><option <?php if($province['areaId'] == $areasId): ?>selected<?php endif; ?> value="<?php echo ($province['areaId']); ?>"><?php echo ($province["areaName"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>    
                    <input style="display:none;" type="button" class="button" value="确 定" onclick="changeCity();">
                </div>  
             </td>
           </tr>
           <tr>
             <th align='right'>手机 <font color='red'>*</font>：</th>
             <td>
             <input type='text' id='userPhone' name='userPhone' value="<?php echo ($user['userPhone']); ?>" maxlength="11"/>
             </td>
           </tr>
           <tr>
             <th align='right'>邮箱<font color='red'>*</font>：</th>
             <td>
             <input type='text' id='userEmail' name='userEmail' value="<?php echo ($user['userEmail']); ?>" maxlength="25" />
             </td>
           </tr>
           <tr>
             <td colspan='2' style='padding-left:250px;height:100px;'>
                 <button class='wst-btn-query' type="submit">保&nbsp;存</button>
                 <button class='wst-btn-query' type="reset">重&nbsp;置</button>
             </td>
           </tr>
           
        </table>
       </form>
       </div>
   </div>

            </div>
          </div>
          <div style='clear:both;'></div>
          <br/>
           <div class='wst-footer'>
          	<div class="wst-footer-fl-box">
	<div class="wst-footer" >
		<div class="wst-footer-cld-box">
			<div class="wst-footer-fl">友情链接：</div>
			<div style="padding-left:30px;">
				<?php if(is_array($friendLikds)): $k = 0; $__LIST__ = $friendLikds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div style="float:left;"><a href="<?php echo ($vo["friendlinkUrl"]); ?>" target="_blank"><?php echo ($vo["friendlinkName"]); ?></a>&nbsp;&nbsp;</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="wst-clear"></div>
			</div>
		</div>
	</div>
</div>

<div class="wst-footer-hp-box">
	<div class="wst-footer">
		<div class="wst-footer-hp-ck1" >
			<?php if(is_array($helps)): $k1 = 0; $__LIST__ = $helps;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1;?><div class="wst-footer-wz-ca" style="display:none;">
				<div class="wst-footer-wz-pt">
				    <img src="/reselling.market/Apps/Home/View/default/images/a<?php echo ($k1); ?>.jpg" height="18" width="18"/>
					<span class="wst-footer-wz-pn"><?php echo ($vo1["catName"]); ?></span>
					<div style='margin-left:30px;'>
						<?php if(is_array($vo1['articlecats'])): $k2 = 0; $__LIST__ = $vo1['articlecats'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k2 % 2 );++$k2;?><a href="<?php echo U('Home/Articles/index/',array('articleId'=>$vo2['articleId']));?>"><?php echo ($vo2['articleTitle']); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
			
			<div class="wst-footer-wz-clt" style="display:none;">
				<div style="padding-top:5px;line-height:25px;">
				    <img src="/reselling.market/Apps/Home/View/default/images/a6.jpg" height="18" width="18"/>
					<span class="wst-footer-wz-kf">联系客服</span>
					<div style='margin-left:30px;'>
						<a href="#">联系电话</a><br/>
						<?php if($CONF['phoneNo'] != ''): ?><span class="wst-footer-pno"><?php echo ($CONF['phoneNo']); ?></span><br/><?php endif; ?>
						<?php if($CONF['qqNo'] != ''): ?><a style="display:none;" href="tencent://message/?uin=<?php echo ($CONF['qqNo']); ?>&Site=QQ交谈&Menu=yes">
						<img border="0" src="http://wpa.qq.com/pa?p=1:<?php echo ($CONF['qqNo']); ?>:7" alt="QQ交谈" width="71" height="24" />
						</a><br/><?php endif; ?>
						
					</div>
				</div>
			</div>
			<div class="wst-clear"></div>
		</div>
	    
		<div class="wst-footer-hp-ck2" style="display:none;">
			<img src="/reselling.market/Apps/Home/View/default/images/alipay.jpg" height="40" width="120"/>支付宝签约商家&nbsp;|&nbsp;
			<span class="wst-footer-frd">正品保障</span><span >100%原产地</span>&nbsp;|&nbsp;
			<span class="wst-footer-frd">7天退货保障</span>购物无忧&nbsp;|&nbsp;
			<span class="wst-footer-frd">免费配送</span>满98包邮&nbsp;|&nbsp;
			<span class="wst-footer-frd">货到付款</span>400城市送货上门
		</div>
	    <div class="wst-footer-hp-ck3">
	        <div class="links"> 
	            <?php $_result=WSTNavigation(1);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a rel="nofollow" <?php if($vo['isOpen'] == 1): ?>target="_blank"<?php endif; ?> href="<?php echo ($vo['navUrl']); ?>"><?php echo ($vo['navTitle']); ?></a>&nbsp;<?php if($vo['end'] == 0): ?>|&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
	        </div>
	        
	        <div class="copyright">
	         
	         <?php if($CONF['mallFooter']!=''){ echo htmlspecialchars_decode($CONF['mallFooter']); } ?>
	      	<?php if($CONF['visitStatistics']!=''){ echo htmlspecialchars_decode($CONF['visitStatistics'])."<br/>"; } ?>
	        <?php if($CONF['mallLicense'] ==''): ?><div>
				Copyright©2015 Powered By <a target="_blank" href="">AntFerry</a>
			</div>
			<?php else: ?>
				<div id="wst-mallLicense" data='1' style="display:none;">Copyright©2015 Powered By <a target="_blank" href="">AntFerry</a></div><?php endif; ?>
	        </div>
	    	
	        	 
	     
	    </div>
	</div>
</div>

          </div>
        </div>
    </body>
    <script src="/reselling.market/Public/plugins/formValidator/formValidator-4.1.3.js"></script>
   	<script src="/reselling.market/Public/js/common.js"></script>
   	<script src="/reselling.market/Apps/Home/View/default/js/usercom.js"></script>
   	<script src="/reselling.market/Apps/Home/View/default/js/head.js"></script>
   	<script src="/reselling.market/Public/plugins/layer/layer.min.js"></script>
  	<script src="/reselling.market/Apps/Home/View/default/js/common.js"></script>
     <script type="text/javascript">
		var publicurl = '/reselling.market/Public/';
		var shopId = '<?php echo ($orderInfo["order"]["shopId"]); ?>';
		checkLogin();
	</script>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta content="遵循Apache2开源协议,免费提供使用,微信功能插件化开发,多公众号管理,配置简单" name="keywords"/>
<meta content="weiphp 简洁强大开源的微信公众平台开发框架微信功能插件化开发,多公众号管理,配置简单" name="description"/>
<link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
<title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
<link href="/Public/static/font-awesome/css/font-awesome.min.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/base.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/module.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/weiphp.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/Public/static/bootstrap/js/html5shiv.js?v=<?php echo SITE_VERSION;?>"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!---蓝锂002适配修改 QQ:125682133--->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/dialog.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/admin_common.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/admin_image.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript">
var  STATIC = "/Public/static";
var  ROOT = "";
</script>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
	<!-- 头部 -->
	<!-- 提示 -->
<div id="top-alert" class="top-alert-tips alert-error" style="display: none;">
  <a class="close" href="javascript:;"><b class="fa fa-times-circle"></b></a>
  <div class="alert-content">这是内容</div>
</div>
<!-- 导航条
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
       <a class="brand" title="<?php echo C('WEB_SITE_TITLE');?>" href="<?php echo U('index/index');?>"><img height="45" src="<?php if(C('SYSTEM_LOGO')) { echo C('SYSTEM_LOGO'); }else{ ?>/Public/Home/images/top_logo.png?v=<?php echo SITE_VERSION;?> <?php } ?>" title="<?php echo C('WEB_SITE_TITLE');?>"/></a>
            
            
            <div class="top_nav">
                <?php if(is_login()): ?><ul class="nav" style="margin-right:0">
                    	<li class="dropdown">						     
                             <!-- 显示代码bug修改 -->
							 <?php if($mp_ids_list > 0): if(!empty($$member_public["public_name"])): ?><a href="<?php echo U('home/MemberPublic/lists');?>" class="dropdown-toggle login-nav" data-toggle="dropdown" title="公众号管理">公众号管理								
									  <b class="pl_5 fa fa-sort-down"></b></a><?php endif; ?>							
								  <?php if(empty($$member_public["public_name"])): ?><a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" title="<?php echo ($member_public["public_name"]); ?>"><?php echo (msubstr_local($member_public["public_name"],0,5,'utf-8')); ?><b class="pl_5 fa fa-sort-down"></b></a><?php endif; ?>		
							 <?php else: ?>
							     <a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" title="未设置公众号"><font color="red">未设置公众号</font>						
									  <b class="pl_5 fa fa-sort-down"></b></a><?php endif; ?>
                            <ul class="dropdown-menu" style="display:none">
							    <!-- 显示代码bug修改 	
								  <li><a href="<?php echo U('home/MemberPublic/lists');?>">公众号管理</a></li>	
								-->									
                                <?php if(is_array($member_public_list)): $i = 0; $__LIST__ = $member_public_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('home/MemberPublic/changPublic','id='.$vo['id']);?>" title="<?php echo ($vo["public_name"]); ?>"><?php echo (msubstr_local($vo["public_name"],0,5,'utf-8')); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </li>
                        <li class="dropdown admin_nav">
                            <a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" style=""><?php echo get_username();?> <b class="pl_5 fa fa-sort-down"></b></a>
                            <ul class="dropdown-menu" style="display:none">
                                <li><a href="<?php echo U('Admin/index/index');?>">后台管理</a></li>
                                <li><a href="<?php echo U('User/profile');?>">修改密码</a></li>
                                <li><a href="<?php echo U('User/logout');?>">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="nav" style="margin-right:0">
                    	<li style="padding-right:20px">你好!欢迎来到<?php echo C('WEB_SITE_TITLE');?></li>
                        <li>
                            <a href="<?php echo U('User/login');?>">登录</a>
                        </li>
                        <li>
                            <a href="<?php echo U('User/register');?>">注册</a>
                        </li>
                        <li>
                            <a href="<?php echo U('admin/index/index');?>" style="padding-right:0">后台入口</a>
                        </li>
                    </ul><?php endif; ?>
            </div>
        </div>
</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	
<?php if(!is_login()){ Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] ); redirect(U('home/user/login')); } if(isset($_GET['sidenav'])){ $navClass[$_GET['sidenav']] = 'active'; }else{ $m = strtolower(MODULE_NAME); $c = strtolower(CONTROLLER_NAME); $a = strtolower(ACTION_NAME); $navClass[$m] = $navClass[$m.'_'.$c] = $navClass[$m.'_'.$c.'_'.$a] = 'active'; $ad = ucfirst ( parse_name ( $_REQUEST['_addons'], 1 ) ); $cl = ucfirst ( parse_name ( $_REQUEST['_controller'], 1 ) ); $navClass[$ad] = $navClass[$ad.'_'.$cl] = 'active'; } $addonList = D ( 'Addons' )->getWeixinList (false, array(), true); $categorys = M ( 'addon_category' )->order ( 'sort asc, id desc' )->select (); foreach($categorys as &$cate){ foreach($addonList as $k=>$a){ if($cate['id']==intval($a['cate_id'])){ $cate['addons'][] = $a; unset($addonList[$k]); } } } ?>
<div id="main-container" class="container">
	<div class="sidebar">
    	<ul class="sidenav">
          <li>
              <a class="sidenav_parent" href="javascript:;"><b class="ficon fa fa-plus-square"></b>帐号管理</a>
              <ul class="sidenav_sub" style="display:none">
                  <li class="<?php echo ($navClass['home_memberpublic']); ?>"> <a href="<?php echo U('Home/MemberPublic/lists');?>">公众号管理 </a> <b class="active_arrow"></b></li>
                  <li class="<?php echo ($navClass['home_index_main']); ?>"> <a href="<?php echo U('Home/Index/main');?>">插件管理 </a> <b class="active_arrow"></b></li>
                  <li class="<?php echo ($navClass['home_creditconfig_lists']); ?>"> <a href="<?php echo U('Home/CreditConfig/lists');?>">积分配置 </a> <b class="active_arrow"></b></li>
                  <li class="<?php echo ($navClass['home_keyword']); ?>"> <a href="<?php echo U('Home/Keyword/lists');?>">关键词维护 </a> <b class="active_arrow"></b></li>
                  <li class="<?php echo ($navClass['home_cascade']); ?>"> <a href="<?php echo U('Home/Cascade/lists');?>">级联数据管理 </a> <b class="active_arrow"></b></li>
             </ul>
          </li>
          
          <?php if(is_array($categorys)): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?><li>
              <a class="sidenav_parent" href="javascript:;"><b class="ficon fa fa-plus-square"></b><?php echo ($ca["title"]); ?></a>
              <ul class="sidenav_sub" style="display:none">
                  <?php if(is_array($ca["addons"])): $i = 0; $__LIST__ = $ca["addons"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($navClass[$vo[name]]); ?>"> <a href="<?php echo ($vo[addons_url]); ?>" title="<?php echo ($vo["description"]); ?>"> 
                      <i class="icon-chevron-right"><?php if(!empty($vo['icon'])) { ?> <img src="<?php echo ($vo["icon"]); ?>" /> <?php } ?> </i>
                      <?php echo ($vo["title"]); ?> </a><b class="active_arrow"></b></li><?php endforeach; endif; else: echo "" ;endif; ?>
             </ul>
          </li><?php endforeach; endif; else: echo "" ;endif; ?>
          
          <li>
              <a class="sidenav_parent" href="javascript:;"><b class="ficon fa fa-plus-square "></b>其它功能</a>
              <ul class="sidenav_sub" style="display:none">
              <?php if(is_array($addonList)): $i = 0; $__LIST__ = $addonList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($navClass[$vo[name]]); ?>"> <a href="<?php echo ($vo[addons_url]); ?>" title="<?php echo ($vo["description"]); ?>"> 
              <i class="icon-chevron-right"><?php if(!empty($vo['icon'])) { ?> <img src="<?php echo ($vo["icon"]); ?>" /> <?php } ?> </i>
              <?php echo ($vo["title"]); ?> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
          </li>
        </ul>
  </div>
<div class="main_body">
	
  <div class="span9 page_message">
    <section id="contents"> 
      <ul class="tab-nav nav">
  <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>"><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?><span class="arrow fa fa-sort-up"></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<?php if(!empty($sub_nav)): ?><div class="sub-tab-nav">
       <ul class="sub_tab">
       <?php if(is_array($sub_nav)): $i = 0; $__LIST__ = $sub_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="<?php echo ($vo["class"]); ?>" href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?><span class="arrow fa fa-sort-up"></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
<!--          <li><a class="cur" href="<?php echo addons_url('WeiSite://footer/lists');?>">底部菜单配置</a></li>
          <li><a href="<?php echo addons_url('WeiSite://footer/template');?>">底部菜单模板</a></li>-->
      </ul>
</div><?php endif; ?>
<?php if(!empty($normal_tips)): ?><p class="normal_tips"><b class="fa fa-info-circle"></b> <?php echo ($normal_tips); ?></p><?php endif; ?> 
      <?php if($add_button || $del_button || $search_button || !empty($top_more_button)): ?><div class="table-bar">
        <div class="fl">
          <?php if(empty($model["extend"])): ?><div class="tools">
				<?php if($add_button): $add_url || $add_url = U('add?model='.$model['id'], $get_param); ?><a class="btn" href="<?php echo ($add_url); ?>">新 增</a><?php endif; ?>
				<?php if($del_button): $del_url || $del_url = U('del?model='.$model['id'], $get_param); ?><button class="btn ajax-post confirm" target-form="ids" url="<?php echo ($del_url); ?>">删 除</button><?php endif; ?>    
                <?php if(is_array($top_more_button)): $i = 0; $__LIST__ = $top_more_button;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo[is_buttion]): ?><button class="btn <?php echo ($vo["class"]); ?>" target-form="ids" url="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></button>
                <?php else: ?>
                <a class="btn" href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a><?php endif; ?>
                &nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>            
			</div><?php endif; ?>
        </div>
        <!-- 高级搜索 -->
        <?php if($search_button): ?><div class="search-form fr cf">
          <div class="sleft">
            <?php $get_param[model]=$model['name']; $search_url || $search_url = addons_url($_REQUEST ['_addons'].'://'.$_REQUEST ['_controller'].'/lists', $get_param); ?>
            <?php empty($search_key) && $search_key=$model['search_key'];empty($search_key) && $search_key='title'; ?>
            <input type="text" name="<?php echo ($search_key); ?>" class="search-input" value="<?php echo I($search_key);?>" placeholder="<?php echo ($placeholder); ?>">
            <a class="sch-btn" href="javascript:;" id="search" url="<?php echo ($search_url); ?>"><i class="btn-search"></i></a> </div>
        </div><?php endif; ?>
      </div><?php endif; ?>
      <!-- 数据列表 -->
      <div class="data-table">
        <div class="table-striped">
          <table cellspacing="1">
            <!-- 表头 -->
            <thead>
              <tr>
                <?php if($check_all): ?><th class="row-selected row-selected"> <input type="checkbox" id="checkAll" class="check-all regular-checkbox"><label for="checkAll"></label></th><?php endif; ?>
                <?php if(is_array($list_grids)): $i = 0; $__LIST__ = $list_grids;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;?><th <?php if(!empty($field["width"])): ?>width="<?php echo ($field["width"]); ?>%"<?php endif; ?> ><?php echo ($field["title"]); ?></th><?php endforeach; endif; else: echo "" ;endif; ?>
              </tr>
            </thead>
            
            <!-- 列表 -->
            <tbody>
              <?php if(is_array($list_data)): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                  <?php if($check_all): ?><td><input class="ids regular-checkbox" type="checkbox" value="<?php echo ($data['id']); ?>" name="ids[]" id="check_<?php echo ($data['id']); ?>"><label for="check_<?php echo ($data['id']); ?>"></label></td><?php endif; ?>
                  <?php if(is_array($list_grids)): $i = 0; $__LIST__ = $list_grids;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$grid): $mod = ($i % 2 );++$i;?><td><?php echo get_list_field($data,$grid,$model);?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="page"> <?php echo ((isset($_page) && ($_page !== ""))?($_page):''); ?> </div>
    </section>
  </div>

</div>
</div>
	<!-- /主体 -->

	<!-- 底部 -->
	
    <!-- 底部
    ================================================== -->
<footer class="footer">
      <div class="container">
          <p>
          	<a href="<?php echo U('Home/Index/about');?>" target="_blank">关于我们</a>  |  
            <a href="<?php echo U('home/index/help');?>" target="_blank">使用说明</a>   |   
            本系统由<a href="http://www.weiphp.cn" target="_blank">weiphp</a>强力驱动
            </p>
      </div>
</footer>

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "", //当前网站地址
		"APP"    : "/index.php?s=", //当前项目地址
		"PUBLIC" : "/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>
 
  <script type="text/javascript">
$(function(){
	//搜索功能
	$("#search").click(function(){
		var url = $(this).attr('url');
        var query  = $('.search-form').find('input').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
        query = query.replace(/^&/g,'');
        if( url.indexOf('?')>0 ){
            url += '&' + query;
        }else{
            url += '?' + query;
        }
		window.location.href = url;
	});

    //回车自动提交
    $('.search-form').find('input').keyup(function(event){
        if(event.keyCode===13){
            $("#search").click();
        }
    });

})
</script> 
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>
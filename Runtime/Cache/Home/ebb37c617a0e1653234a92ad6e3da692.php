<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE  html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8" />
		
			<title><?php echo ((isset($title) && ($title !== ""))?($title):get_system_config("SYSTEM_NAME")); ?></title>
		

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->
		<link rel="stylesheet" href="/Public/Static/bootstrap/css/bootstrap.min.css"  />
		<link rel="stylesheet" href="/Public/Static/awesome/css/font-awesome.min.css" />

		<!--[if IE 7]>
		<link rel="stylesheet" href="/Public/Static/awesome/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="/Public/Static/jquery/plugin/css/jquery.gritter.css" />
		
			<?php if(!empty($plugin["jquery-ui"])): ?><link rel="stylesheet" href="/Public/Static/jquery/ui/css/jquery-ui-1.10.3.full.min.css" /><?php endif; ?>
<?php if(!empty($plugin["date"])): ?><link rel="stylesheet" href="/Public/Static/css/datepicker.css" /><?php endif; ?>

		


		<!-- fonts -->
		<!-- ace styles -->

		<link rel="stylesheet" href="/Public/Static/ace/css/uncompressed/ace.css" />
		<link rel="stylesheet" href="/Public/Static/ace/css/uncompressed/ace-rtl.css" />
		<link rel="stylesheet" href="/Public/Static/ace/css/uncompressed/ace-skins.css" />

		<!--[if lte IE 8]>
		<link rel="stylesheet" href="/Public/Static/ace/css/uncompressed/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->
		<link rel="stylesheet" href="/Public/Home/css/style.css" />
		<!-- ace settings handler -->

		<script src="/Public/Static/ace/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/Public/Static/js/html5shiv.js"></script>
		<script src="/Public/Static/js/respond.min.js"></script>
		<![endif]-->

	</head>
	
		<script type="text/javascript">
	var upload_url = "<?php echo U('upload');?>";
	var del_url = "<?php echo U('del_file');?>";
	var app_path = "";
	var cookie_prefix="<?php echo C('COOKIE_PREFIX');?>";
	var _hmt = _hmt || [];
	(function() {
		var hm = document.createElement("script");
		hm.src = "//hm.baidu.com/hm.js?2a935166b0c9b73fef3c8bae58b95fe4";
		var s = document.getElementsByTagName("script")[0];
		s.parentNode.insertBefore(hm, s);
	})();
</script>
	
	
	<body class="<?php echo (CONTROLLER_NAME); ?>">
		<div class="shade"></div>
		
			<nav class="navbar navbar-default " role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-6">
			<span class="sr-only">Toggle navigation</span>
			<i class="fa fa-bars fa-lg"></i>
		</button>
		<div class="hidden-xs">
			&nbsp;
		</div>
		<a href="<?php echo U('index/index');?>" class="navbar-brand"><i class="fa fa-leaf"></i><?php echo get_system_config("SYSTEM_NAME");?></a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="navbar-collapse-6">
		<ul class="nav navbar-nav navbar-right">
			<?php if(is_array($top_menu)): foreach($top_menu as $key=>$top_menu_vo): ?><a class="btn btn-app app-nav btn-xs nav-app"  href="#" url="<?php echo U($top_menu_vo['url']);?>" node="<?php echo ($top_menu_vo["id"]); ?>" onclick="click_top_menu(this)" > <i class="<?php echo ($top_menu_vo["icon"]); ?> bigger-100"></i><?php echo ($top_menu_vo["name"]); ?>
				<?php if(!empty($badge_count[$top_menu_vo['id']])){ $html=''; $html='<span class="badge badge-pink">'.$badge_count[$top_menu_vo['id']].'</span>'; echo $html; } ?></a>&nbsp;&nbsp;<?php endforeach; endif; ?><a class="btn btn-app btn-xs btn-danger" style="margin-top:15px;margin-bottom:20px;margin-left:7px;margin-right:10px;" href="<?php echo U('public/logout');?>" ><i class="fa fa-sign-out bigger-100"></i>退出</a>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>
		

		<div class="main-container" id="main-container" >
			<div class="main-container-inner">
				<div class="sidebar" id="sidebar">	
					<div id="user_info" class="text-center hidden-xs"  >
						<span >当前用户：<?php echo (session('user_name')); ?></span>
					</div>
					<div id="nav_head" class="text-center" onclick="toggle_left_menu()">
						<span class="menu-text"><?php echo ($top_menu_name); ?></span>
						<b id="left_menu_icon" class="fa fa-angle-down pull-right"></b>
					</div>
					<?php echo W('Sidebar/left',array('tree'=>$left_menu,'badge_count'=>$badge_count));?>
				</div>			
				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="fa fa-home home-icon"></i>
								<a href="/">Home</a>
							</li>
							<li>
								<?php echo ($top_menu_name); ?>
							</li>
						</ul><!-- .breadcrumb -->
					</div>					
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
<?php echo W('PageHeader/adv_search',array('name'=>$folder_name,'search'=>'M'));?>
<form method="post" name="form_adv_search" id="form_adv_search">
	<div class="adv_search panel panel-default display-none" id="adv_search">
		<div class="panel-heading">
			<div class="row">
				<h4 class="col-xs-6">高级搜索</h4>
				<div class="col-xs-6 text-right">
					<a  class="btn btn-sm btn-info" onclick="submit_adv_search();">搜索</a>
					<a  class="btn btn-sm" onclick="close_adv_search();">关闭</a>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="form-group col-sm-6">
				<label class="col-sm-4 control-label" for="li_name">标题：</label>
				<div class="col-sm-8">
					<input  class="form-control" type="text" id="li_name" name="li_name" >
				</div>
			</div>

			<div class="form-group col-sm-6">
				<label class="col-sm-4 control-label" for="eq_type">流程类型：</label>
				<div class="col-sm-8">
					<select class="form-control" name="eq_type" id="eq_type">
						<option value="">全部</option>
						<?php echo fill_option($flow_type_list);?>
					</select>
				</div>
			</div>

			<div class="form-group col-sm-6">
				<label class="col-sm-4 control-label" for="eq_user_name">登录人：</label>
				<div class="col-sm-8">
					<input  class="form-control" type="text" id="eq_user_name" name="eq_user_name" >
				</div>
			</div>

			<div class="form-group col-sm-6">
				<label class="col-sm-4 control-label" for="be_create_time">登录时间：</label>
				<div class="col-sm-8">
					<div class="input-daterange input-group" >
					    <input type="text" class="input-sm form-control text-center" name="be_create_time" />
						<span class="input-group-addon">-</span>
						<input type="text" class="input-sm form-control text-center" name="en_create_time" />
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<div class="ul_table">
	<ul>
		<li class="thead" style="padding-left:10px">
			<div class="pull-left">
				<span class="col-16 ">编号</span>
				<span class="col-16 ">类型</span>				
			</div>
			<div class="pull-right">
				<span  class="col-9  ">登录时间</span>				
				<span  class="col-6  "> 登录人</span>
				<span class="col-6  ">状态</span>
			</div>
			<div class="autocut auto">
				标题
			</div>
		</li>
	</ul>
	<?php if(empty($list)): ?><ul>
			<li class="no-data">
				没找到数据
			</li>
		</ul>
		<?php else: ?>
		<form method="post" action="" name="form_data" id="form_data">
			<ul>
				<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li class="tbody">
						<div class="pull-left">
							<span class="col-16 "><?php echo ($vo["doc_no"]); ?></span>
							<span class="col-16  "> <?php echo ($vo["type_name"]); ?></span>
						</div>
						<div class="pull-right">
							<span class="col-9   "> <?php echo (to_date($vo["create_time"],'Y-m-d')); ?> </span>
							<span class="col-6   "><?php echo ($vo["user_name"]); ?></span>
							<span class="col-6   "><?php echo (show_step($vo["step"])); ?></span>
						</div>
						<div class="autocut auto">
							<?php if(in_array(($folder), explode(',',"darft"))): ?><a href="<?php echo U('edit','id='.$vo['id'].'&fid='.$folder);?>"><?php echo ($vo["name"]); ?>
								<?php else: ?>
								<a href="<?php echo U('read','id='.$vo['id'].'&fid='.$folder);?>"><?php echo ($vo["name"]); endif; ?>
							<?php if((strlen($vo["name"])) == "0"): ?>无标题<?php endif; ?></a> </div>
					</li><?php endforeach; endif; ?>
			</ul>
		</form>
		<div class="pagination">
			<?php echo ($page); ?>
		</div><?php endif; ?>
</div>


								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
			</div><!-- /#ace-settings-container -->
		</div><!-- /.main-container-inner -->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> <i class="fa fa-double-angle-up fa-only bigger-110"></i> </a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]>
		-->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='/Public/Static/jquery/js/jquery-2.1.0.min.js'>" + "<" + "/script>");
		</script>
		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		window.jQuery || document.write("<script src='/Public/Static/jquery/js/jquery-1.11.0.min.js'>"+"<"+"/script>");</script>
		<![endif]-->

		<script type="text/javascript">
			if ("ontouchend" in document)
				document.write("<script src='/Public/Static/jquery/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
		</script>

		<script src="/Public/Static/bootstrap/js/bootstrap.min.js"></script>
		<script src="/Public/Static/js/typeahead-bs2.min.js"></script>

		<script src="/Public/Static/js/jquery.gritter.min.js"></script>
		
			
<?php if(!empty($plugin["jquery-ui"])): ?><script src="/Public/Static/jquery/ui/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="/Public/Static/jquery/ui/js/jquery.ui.touch-punch.min.js"></script><?php endif; ?>

<?php if(!empty($plugin["date"])): ?><script src="/Public/Static/js/date-time/bootstrap-datepicker.js"></script>
	<script src="/Public/Static/js/date-time/locales/bootstrap-datepicker.zh-CN.js"></script><?php endif; ?>

<?php if(!empty($plugin["uploader"])): ?><script type="text/javascript" src="/Public/Static/plupload/plupload.full.min.js"></script>
	<script type="text/javascript" src="/Public/Static/plupload/plupload.setting.js"></script><?php endif; ?>

<?php if(!empty($plugin["editor"])): ?><script type="text/javascript" src="/Public/Static/editor/kindeditor.js"></script>
	<script type="text/javascript" src="/Public/Static/editor/lang/zh_CN.js"></script>
	<script type="text/javascript" src="/Public/Static/editor/kindeditor.setting.js"></script><?php endif; ?>
<script src="/Public/Static/js/jquery.gritter.min.js"></script>
<script src="/Public/Static/js/bootbox.min.js"></script>

<script type="text/javascript">
		$(document).ready(function() {
			<?php if(!empty($plugin["date"])): ?>$('.input-date').datepicker({
					format: "yyyy-mm-dd",
					language:"zh-CN",
					autoclose : true
				});
				$(".input-daterange").datepicker({
					 format: "yyyy-mm-dd",
					 language:"zh-CN",
					 keyboardNavigation: false,
					 forceParse: false,
					 autoclose: true,
				});<?php endif; ?>

			<?php if(!empty($plugin["editor"])): ?>editor_init();<?php endif; ?>
	});
</script>
		


		<!-- ace scripts -->
		<script src="/Public/Static/ace/js/uncompressed/ace-elements.js"></script>
		<script src="/Public/Static/ace/js/uncompressed/ace.js"></script>
		<script src="/Public/Home/js/common.js"></script>

		<!-- inline scripts related to this page -->
		
<script type="text/javascript">
	$(document).ready(function() {
		set_return_url();
	}); 
</script>


	</body>
</html>
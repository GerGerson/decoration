<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic | Login Options - Login Form 2</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_metro.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="/assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="/assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="/assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
<link href="/assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<img src="/assets/img/logo-big.png" alt=""/>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form id="login" class="login-form" action="#" method="post">
		<h3 class="form-title">帳號登入</h3>
		<div id="LoginFail"></div>
		<div id="NoInput" class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
				 輸入登入密碼
			</span>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">密碼</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="密碼" id="password" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input id="chk" type="checkbox" name="remember" value="1"/> 記住密碼 </label>
			<button type="submit" class="btn blue pull-right">
			登入 <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		<div class="forget-password">
			<h4>忘記登入密碼？</h4>
			<p>
				按 <a href="javascript:;" id="forget-password">這裡</a>
				取回登入密碼。
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form">
		<h3>忘記登入密碼？</h3>
		<h4>密碼就是你的手提電話號碼。</h4>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> 返回 </button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2013 &copy; Metronic - Admin Dashboard Template.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script> 
	<![endif]-->
<script src="/assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/scripts/app.js" type="text/javascript"></script>
<script src="/assets/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		  
		  $.backstretch("assets/img/bg/4.jpg");
		  
		  $("#login").submit(function(e){
			var strHtml;
			
			e.preventDefault();
			
			$.ajax({
				type: "POST",
				url: "/login/login_check",
				data: {UserName: $("#username").val(), Password: $("#password").val(), SaveMode: $("#chk").prop('checked')},
				success: function(data){
							if (data == "OK"){
								window.location = "/quotation"
							}else{
								if (parseInt(data) == 0 ){
									strHtml = "<div class='alert alert-danger'>";
									strHtml += "<button class='close' data-close='alert'></button>";
									strHtml += "<span>";
									strHtml += "登入密碼不正確";
									strHtml += "</span>";
									strHtml += "</div>";
									
									$("#LoginFail" ).append(strHtml);
								}
							}
				}
			});
			
			return false;
		  });
		});
		
	</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
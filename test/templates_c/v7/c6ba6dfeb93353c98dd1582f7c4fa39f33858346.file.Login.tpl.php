<?php /* Smarty version Smarty-3.1.7, created on 2024-03-06 08:06:51
         compiled from "/app/includes/runtime/../../layouts/v7/modules/Users/Login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158418887865e8241b4509d7-06390417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6ba6dfeb93353c98dd1582f7c4fa39f33858346' => 
    array (
      0 => '/app/includes/runtime/../../layouts/v7/modules/Users/Login.tpl',
      1 => 1709627505,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158418887865e8241b4509d7-06390417',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'COMPANY_LOGO' => 0,
    'ERROR' => 0,
    'MESSAGE' => 0,
    'MAIL_STATUS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_65e8241b45ab2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65e8241b45ab2')) {function content_65e8241b45ab2($_smarty_tpl) {?>


<style>body {background: url(layouts/v7/resources/Images/login-background.jpg);background-position: center;background-size: cover;width: 100%;height: 96%;background-repeat: no-repeat;}hr {margin-top: 15px;background-color: #7C7C7C;height: 2px;border-width: 0;}h3, h4 {margin-top: 0px;}hgroup {text-align:center;margin-top: 4em;}input {font-size: 16px;padding: 10px 0px 10px 10px;-webkit-appearance: none;display: block;color: #636363;width: 100%;border: none;direction: ltr;text-align: left;border-radius: 0;border-bottom: 1px solid #757575;}input:focus {outline: none;}label {font-size: 16px;font-weight: normal;position: absolute;pointer-events: none;right: 0px;top: 10px;transition: all 0.2s ease;}input:focus ~ label, input.used ~ label {top: -20px;transform: scale(.75);right: -12px;font-size: 18px;}input:focus ~ .bar:before, input:focus ~ .bar:after {width: 50%;}#page {padding-top: 6%;}.widgetHeight {height: 430px;margin-top: 20px !important;}.loginDiv {width: 380px;margin: 0 auto;border-radius: 4px;box-shadow: 0 0 10px gray;background-color: #FFFFFF;}.marketingDiv {color: #303030;}.separatorDiv {background-color: #7C7C7C;width: 2px;height: 460px;margin-left: 20px;}.user-logo {margin: 0 auto;padding-top: 40px;padding-bottom: 20px;}.blockLink {border: 1px solid #303030;padding: 3px 5px;}.group {position: relative;margin: 20px 20px 40px;}.failureMessage {color: red;display: block;text-align: center;padding: 0px 0px 10px;}.successMessage {color: green;display: block;text-align: center;padding: 0px 0px 10px;}.inActiveImgDiv {padding: 5px;text-align: center;margin: 30px 0px;}.app-footer p {margin-top: 0px;}.footer {background-color: #fbfbfb;height:26px;}.bar {position: relative;display: block;width: 100%;}.bar:before, .bar:after {content: '';width: 0;bottom: 1px;position: absolute;height: 1px;background: #35aa47;transition: all 0.2s ease;}.bar:before {left: 50%;}.bar:after {right: 50%;}.button {position: relative;display: inline-block;padding: 9px;margin: .3em 0 1em 0;width: 100%;vertical-align: middle;color: #fff;font-size: 16px;line-height: 20px;-webkit-font-smoothing: antialiased;text-align: center;letter-spacing: 1px;background: transparent;border: 0;cursor: pointer;transition: all 0.15s ease;}.button:focus {outline: 0;}.buttonBlue {background-image: linear-gradient(to bottom, #35aa47 0px, #35aa47 100%)}.ripples {position: absolute;top: 0;left: 0;width: 100%;height: 100%;overflow: hidden;background: transparent;}//Animations@keyframes inputHighlighter {from {background: #4a89dc;}to 	{width: 0;background: transparent;}}@keyframes ripples {0% {opacity: 0;}25% {opacity: 1;}100% {width: 200%;padding-bottom: 200%;opacity: 0;}}@media (max-width: 425px){.loginDiv {width: 100%;}}</style><span class="app-nav"></span><div class="col-lg-12"><div class="col-lg-12"><div class="loginDiv widgetHeight"><img class="img-responsive user-logo" src="<?php echo $_smarty_tpl->tpl_vars['COMPANY_LOGO']->value->get('imagepath');?>
" alt="<?php echo $_smarty_tpl->tpl_vars['COMPANY_LOGO']->value->get('alt');?>
"/><div><span class="<?php if (!$_smarty_tpl->tpl_vars['ERROR']->value){?>hide<?php }?> failureMessage" id="validationMessage"><?php echo $_smarty_tpl->tpl_vars['MESSAGE']->value;?>
</span><span class="<?php if (!$_smarty_tpl->tpl_vars['MAIL_STATUS']->value){?>hide<?php }?> successMessage"><?php echo $_smarty_tpl->tpl_vars['MESSAGE']->value;?>
</span></div><div id="loginFormDiv"><form class="form-horizontal" method="POST" action="index.php"><input type="hidden" name="module" value="Users"/><input type="hidden" name="action" value="Login"/><div class="group"><input id="username" type="text" name="username"><span class="bar"></span><label>نام کاربری</label></div><div class="group"><input id="password" type="password" name="password"><span class="bar"></span><label>رمزعبور</label></div><div class="group"><button type="submit" class="button buttonBlue">ورود</button><br><a class="forgotPasswordLink" style="color: #15c;">رمزعبور خود را فراموش کرده اید؟</a></div></form></div><div id="forgotPasswordDiv" class="hide"><form class="form-horizontal" action="forgotPassword.php" method="POST"><div class="group"><input id="fusername" type="text" name="username" ><span class="bar"></span><label>نام کاربری</label></div><div class="group"><input id="email" type="email" name="emailId" ><span class="bar"></span><label>ایمیل</label></div><div class="group"><button type="submit" class="button buttonBlue forgot-submit-btn">ارسال</button><br><span><a class="forgotPasswordLink pull-right" style="color: #15c;">بازگشت</a></span></div></form></div></div></div></div><script>jQuery(document).ready(function () {var validationMessage = jQuery('#validationMessage');var forgotPasswordDiv = jQuery('#forgotPasswordDiv');var loginFormDiv = jQuery('#loginFormDiv');loginFormDiv.find('#password').focus();loginFormDiv.find('a').click(function () {loginFormDiv.toggleClass('hide');forgotPasswordDiv.toggleClass('hide');validationMessage.addClass('hide');});forgotPasswordDiv.find('a').click(function () {loginFormDiv.toggleClass('hide');forgotPasswordDiv.toggleClass('hide');validationMessage.addClass('hide');});loginFormDiv.find('button').on('click', function () {var username = loginFormDiv.find('#username').val();var password = jQuery('#password').val();var result = true;var errorMessage = '';if (username === '') {errorMessage = 'لطفا نام کاربری خود را وارد نمایید';result = false;} else if (password === '') {errorMessage = 'لطفا رمزعبور خود را وارد نمایید';result = false;}if (errorMessage) {validationMessage.removeClass('hide').text(errorMessage);}return result;});forgotPasswordDiv.find('button').on('click', function () {var username = jQuery('#forgotPasswordDiv #fusername').val();var email = jQuery('#email').val();var email1 = email.replace(/^\s+/, '').replace(/\s+$/, '');var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/;var illegalChars = /[\(\)\<\>\,\;\:\\\"\[\]]/;var result = true;var errorMessage = '';if (username === '') {errorMessage = 'لطفا نام کاربری خود را وارد نمایید';result = false;} else if (!emailFilter.test(email1) || email == '') {errorMessage = 'لطفا ایمیل خود را به صورت صحیح وارد نمایید';result = false;} else if (email.match(illegalChars)) {errorMessage = 'ایمیل وارد شده صحیح نمی باشد.';result = false;}if (errorMessage) {validationMessage.removeClass('hide').text(errorMessage);}return result;});jQuery('input').blur(function (e) {var currentElement = jQuery(e.currentTarget);if (currentElement.val()) {currentElement.addClass('used');} else {currentElement.removeClass('used');}});var ripples = jQuery('.ripples');ripples.on('click.Ripples', function (e) {jQuery(e.currentTarget).addClass('is-active');});ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function (e) {jQuery(e.currentTarget).removeClass('is-active');});loginFormDiv.find('#username').focus();var slider = jQuery('.bxslider').bxSlider({auto: true,pause: 4000,nextText: "",prevText: "",autoHover: true});jQuery('.bx-prev, .bx-next, .bx-pager-item').live('click',function(){ slider.startAuto(); });jQuery('.bx-wrapper .bx-viewport').css('background-color', 'transparent');jQuery('.bx-wrapper .bxslider li').css('text-align', 'left');jQuery('.bx-wrapper .bx-pager').css('bottom', '-15px');var params = {theme		: 'dark-thick',setHeight	: '100%',advanced	:	{autoExpandHorizontalScroll:true,setTop: 0}};jQuery('.scrollContainer').mCustomScrollbar(params);});</script></div>
<?php }} ?>
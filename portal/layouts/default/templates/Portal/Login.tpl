{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.2
* ("License.txt"); You may not use this file except in compliance with the License
* The Original Code is: Vtiger CRM Open Source
* The Initial Developer of the Original Code is Vtiger.
* Portions created by Vtiger are Copyright (C) Vtiger.
* All Rights Reserved.
************************************************************************************}

<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">&nbsp;</div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 50px;">
                    <div class="login-form">
                        <form class="form-horizontal" novalidate="novalidate" ng-submit="makeAutoComplete();login(loginForm.$valid)" name="loginForm">
                            <h3 style="text-align:center;"translate="Customer Portal">پرتال مشتریان</h3>
                            <h4 style="text-align:center;"translate="Please provide your portal credentials">لطفا نام کاربری و رمزعبور خود را وارد نمایید</h4>
                            <hr>
                            <div class="form-group">
                                <label for="Email" translate="E-mail" class="col-sm-4 control-label">ایمیل</label>
                                <div class="col-sm-8">
                                    {literal}<input type="text" ng-model-options="{updateOn:'blur'}" ng-pattern='/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/' class="form-control"  ng-model="username" name="username" ng-required="true" autofill="autofill">
                                    <span class="text-danger" ng-if="loginForm.username.$error.pattern">لطفا یک ایمیل معتبر وارد نمایید.</span>{/literal}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Password" translate="Password" class="col-sm-4 control-label">رمزعبور</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control"  ng-model="password" name="password" ng-required="true">
                                </div>
                            </div>
                            <div class="form-group" ng-if="loginFailed && !loginForm.username.$error.pattern">
                                <label for="  " class="col-sm-4">
                                </label>
                                {literal}<div class="col-sm-8 text-danger">{{loginMessage}}</div>{/literal}
                            </div>
                              <div class="form-group" ng-if="noUserName">
                                <label ng-hide="loginForm.username.$dirty && loginForm.username.$viewValue!==''" for="  " class="col-sm-4">
                                </label>
                                <div class="col-sm-8 text-danger" ng-hide="loginForm.username.$dirty && loginForm.username.$viewValue!==''">ایمیل خود را وارد نمایید.</div>
                            </div>

                              <div class="form-group" ng-if="noPassword">
                                <label ng-hide="loginForm.username.$invalid && loginForm.username.$viewValue!==''" for="  " class="col-sm-4">
                                </label>
                                <div class="col-sm-8 text-danger" ng-hide="loginForm.username.$invalid && loginForm.username.$viewValue!==''">رمزعبور خود را وارد نمایید..</div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                  <input type="hidden" value="fa_ir" name="language" ng-model="language" ng-change="setLanguage(language)"  class="select form-control">


                                    <button type="submit" translate="Sign in" class="btn btn-success">ورود</button>
                                    <a href="#" class="text-info forgot-password" ng-click="forgotPassword()">
                                        {literal}{{'Forgot Password?' | translate}}{/literal}
                                    </a>
                                </div>
                            </div>
                            {*<div class="form-group">
                              <a href="{{$OLDURL}}" class="text-info col-sm-offset-9 col-sm-3">Login to Old Portal</a>
                            </div>*}
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">&nbsp;</div>
            </div>
        </div>
    </div>
</div>
{literal}
    <script type="text/ng-template" id="forgotPassword.template">
        <div class="modal-header">
        <button type="button" class="close" ng-click="cancel()" title="Close">×</button>
        <h3 class="modal-title">{{'Forgot Password'|translate}}</h3>
        </div>
        <form name="forgotPassword"  ng-submit="updatePassword()" class="form-horizontal" role="form">
        <div class="modal-body">
        <div class="form-group">
        <label class="col-sm-4 control-label">{{'E-mail'|translate}}</label>
        <div class="col-sm-5">
        <input ng-model="data.email" name="email" ng-pattern='/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/' type="email" class="form-control" required></input>
        <span class="text-danger"  ng-show="data.email===undefined">لطفا یک ایمیل معتبر وارد نمایید</span>
        </div>
        </div>
        </div>
        <div class="modal-footer">
          <button ng-if="data.email" class="btn btn-success" type="submit">{{'Submit'|translate}}</button>
        </div>
      </form>
    </script>
{/literal}

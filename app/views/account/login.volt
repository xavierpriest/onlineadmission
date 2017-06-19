{{ this.assets.outputCss('extras') }}

<div class="container">
    <ul id="breadcrumbs">
        <li><a href="index"><i class="icon-home"></i>Home</a></li>
        <li><span>Login</span></li>
    </ul>
</div>

<div id="login-wrapper" class="clearfix">
    {{ flash.output() }}
    <div class="main-col">
        <img src="/OnlineAdmission/img/logo_gau.png" alt="" class="logo_img" />
        <div class="panel">
            <p class="heading_main">Account Login</p>
            <form id="login-validate" action="{{ url('account/doLogin') }}" method="post">
                <label for="login_name">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email" />
                <label for="login_password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" />
                <label for="login_remember" class="checkbox"><input type="checkbox" id="login_remember" name="login_remember" /> Remember me</label>
                <div class="submit_sect">
                    <button type="submit" class="btn btn-beoro-3">Login</button>
                </div>
            </form>
        </div>
        <div class="panel" style="display:none">
            <p class="heading_main">Can't sign in?</p>
            <form id="forgot-validate" method="post" action="{{ url('account/doRemember') }}">
                <label for="forgot_email">Your email address</label>
                <input type="text" id="forgot_email" name="forgot_email" />
                <div class="submit_sect">
                    <button type="submit" class="btn btn-beoro-3">Request New Password</button>
                </div>
            </form>
        </div>
    </div>
    <div class="login_links">
        <a href="javascript:void(0)" id="pass_login"><span>Forgot password?</span><span style="display:none">Account login</span></a>
    </div>
</div>


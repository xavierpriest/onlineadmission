<div class="container">
    <div class="container">
        <ul id="breadcrumbs">
            <li><a href="index"><i class="icon-home"></i>Home</a></li>
            <li><span>Create Account</span></li>
        </ul>
    </div>
<h2 class="heading_main">Register Page</h2>

    <hr>
    <div class="row">
        <div class="span3 ">
            <h3 class="heading_a">Create account</h3>
            Fill in your details and click register.
            Please enter a valid email. You will receive an email.
            Follow the link in the email to verify your email address.
        </div>
        <div class="span9">
            <?php echo $this->flash->output(); ?>
            <form id="register" action="<?php echo $this->url->get('account/doRegister'); ?>" method="post">

                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="span5" placeholder="Enter your email" />
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="span5" placeholder="Enter password" />
                        <label for="password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="span5" placeholder="Confirm password" />

                        <div class="submit_sect">
                            <button type="submit" class="btn btn-beoro-3">Register</button>
                        </div>
            </form>




   </div>
 </div>
 </div>
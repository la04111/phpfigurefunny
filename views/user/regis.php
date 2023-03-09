<?php //Header page here --
include 'header.html';
?>
<main class="mainContent-theme ">
    <div class="layout-account">
<div class="container-fluid">
<div class="row">
<div class="col-md-6 col-xs-12 wrapbox-heading-account">
    <div class="header-page clearfix">
        <h1>Tạo tài khoản</h1>
    </div>
</div>
<div class="col-md-6 col-xs-12 wrapbox-content-account ">
    <div class="userbox">
        <form accept-charset="UTF-8" action="/account" id="create_customer" method="post" data-gtm-form-interact-id="0">
<input name="form_type" type="hidden" value="create_customer">
<input name="utf8" type="hidden" value="✓">

        
        <div id="form-last_name" class="clearfix large_form">
            <label for="last_name" class="label icon-field"><i class="icon-login icon-user "></i></label>
            <input required="" type="text" value="" name="customer[last_name]" placeholder="Họ" id="last_name" class="text" size="30">
        </div>
        <div id="form-first_name" class="clearfix large_form">
            <label for="first_name" class="label icon-field"><i class="icon-login icon-user "></i></label>
            <input required="" type="text" value="" name="customer[first_name]" placeholder="Tên" id="first_name" class="text" size="30">
        </div>
        <div id="form-gender" class="clearfix large_form">
            <input id="radio1" type="radio" value="0" name="customer[gender]" data-gtm-form-interact-field-id="1"> 
            <label for="radio1">Nữ</label>
            <input id="radio2" type="radio" value="1" name="customer[gender]" data-gtm-form-interact-field-id="0"> 
            <label for="radio2">Nam</label>
        </div>
        <div id="form-birthday" class="clearfix large_form">
            <label for="birthday" class="label icon-field"><i class="icon-login icon-envelope "></i></label>
            <input type="text" value="" placeholder="mm/dd/yyyy" name="customer[birthday]" id="birthday" class="text" size="30">
        </div>
        <div id="form-email" class="clearfix large_form">
            <label for="email" class="label icon-field"><i class="icon-login icon-envelope "></i></label>
            <input required="" type="email" value="" placeholder="Email" name="customer[email]" id="email" class="text" size="30">
        </div>
        <div id="form-password" class="clearfix large_form large_form-mr10">
            <label for="password" class="label icon-field"><i class="icon-login icon-shield "></i></label>
            <input required="" type="password" value="" placeholder="Mật khẩu" name="customer[password]" id="password" class="password text" size="30">
        </div>
        <div class="clearfix large_form sitebox-recaptcha">
            This site is protected by reCAPTCHA and the Google
            <a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a> 
            and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms of Service</a> apply.
        </div>	
        <div class="clearfix action_account_custommer">
            <div class="action_bottom button dark">
                <input class="btn" type="submit" value="Đăng ký">			
            </div>						
        </div>
        <div class="clearfix req_pass">
            <a class="come-back" href="https://ryorder.vn"><i class="fa fa-long-arrow-left"></i> Quay lại trang chủ</a>
        </div>
        
<input id="063f2cd72f014f5a8460ea7e2eb8b1da" name="g-recaptcha-response" type="hidden" value="03AFY_a8WuTzeN8daO2g1_W8gusCEpAJTUdn_VO03P0HKjiA0Rz0B6gnMH07dH3zPSteEdgC9yoaC7AtAFjEWdOclNrJxUSIY1ohD7FR7wzgMhVrzJAT6eq5pakhuEW2HDw01HLQImSZahYCv_sDKCPmeHoC-w5vXvLvUuCL9qbLujJKDn3jSy4TQkf8EY-dI2vxqW-L2MRhTK-Dqfir54LNthKlsxeyoKLYq7SHo09wcpkUBVxctdkABiTs-dwaRYc7Skv5W6aY_boaazZKTtth05l8fvFJKeX9IZoUfGtjLhf0Pk13cBsZdNTasPG4WX9VHhbpECWsG_6rZyfluOveUZuxsCj6PqNFRl2wXMv4OYCAPrGcNx8-x9Fa2_UrbZ8f4fHaH1i6PGElgqpgwdKADgviQ7jYIfaRooaHcCcam1y7qB0vVBpSf3lBkVj8MVdm_oEFZq9E5bOUD0RXg-vDj7tddPnoUFdnatvODeN5_Qw2AnwpWfxNU"><script src="https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-"></script><script>grecaptcha.ready(function() {grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function(token) {document.getElementById('063f2cd72f014f5a8460ea7e2eb8b1da').value = token;});});</script></form>
    </div>

</div><!-- #register -->
<!-- #customer-register -->
</div>
</div>
</div>
</main>
<?php //fotter page here --
            include 'footer.html';
            ?>
<?php //js page here --
            include 'sctript_indexjs.html';
            ?>
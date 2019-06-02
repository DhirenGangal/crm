<html style="font-family: sans-serif; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; color: #000 !important; text-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; font-size: 10px; -webkit-tap-highlight-color: rgba(0,0,0,0);">
<body style="color: #000 !important; text-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; font-size: 14px; line-height: 1.42857143; background-color: #fff; margin: 0;" bgcolor="#fff">
<div style="color: #000 !important; text-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; border-radius: 0px; font-size: 14px; width: 800px; overflow: hidden; background-color: #FFFFFF; margin: 20px auto; border: 1px solid #ddd;"><div style="color: #000 !important; text-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; float: left; width: 100%; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #ddd; margin-bottom: 10px;"><div style="color: #000 !important; text-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 33.33333333%;"><img src="http://'.$profileid[site_url].'/admin/images/profile-images/'.$profileid[user_image].'" style="color: #000 !important; text-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; page-break-inside: avoid; max-width: 100% !important; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; vertical-align: middle; padding-top: 30px; border: 0;"></div>
        <div style="color: #000 !important; text-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 55%; border-left-width: 1px; border-left-color: #ddd; border-left-style: solid;"><div style="color: #000 !important; text-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; text-align: left; margin-left: 50%; font-weight: bold; font-family: arial,sans-serif; padding: 5px 0 5px 40px;" align="left"><p style="color: #000 !important; text-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; orphans: 3; widows: 3; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; margin: 0 0 10px;">'.<?php echo !empty($settings['email']) ? $settings['email'] : ""; ?>.'Ph:'.<?php echo !empty($settings['phone_no']) ? $settings['phone_no'] : ""; ?>.'</p></div></div></div>
    <div style="color: #000 !important; text-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; width: 100%; padding-right:5px;padding-left:5px;">
        <p style="color:#000000"><b>Subject:</b>Welcome to SCIE Technologies</p>
        <p>Dear '.$name.' '.$lname.',</p>
        <p style="color:#000000">Thanks for registering with SCIE Technologies. Your User registration ID is <b>'.<?php echo !empty($user_id) ? $user_id : ""; ?>.'</b>.We are happy to have you as our valued customer. Below are the login credentials you just created.<b> Kindly save this mail for further reference.</b></p>
        <table style="width:50%">
            <tr>
                <th style="float:left">Email</th><td>: '.<?php echo !empty($email) ? $email : ""; ?>.'</td>
            </tr>
            <tr>
                <th style="float:left">Password</th><td>: '.<?php echo !empty($password) ? $password : ""; ?>.'</td>
            </tr>
            <tr>
                <th style="float:left">App Settings Password</th><td>: '.<?php echo !empty($setting_password) ? $setting_password : ""; ?>.'</td>
            </tr>
        </table>
        <p style="color:#000000">This login will allow you to access your customer profiles.<br>
            For any technical assistance you can contact us on: +91 '.<?php echo !empty($settings['phone_no']) ? $settings['phone_no'] : ""; ?>.' or email us at <?php echo !empty($settings['email']) ? $settings['email'] : ""; ?>. <br>
            For new updates and information please visit <a href="http://www.scietechnologies.com/"> http://www.scietechnologies.com</a><br>
            We look forward to serve you in the future.</p>

    </div>
    <div style="color: #000 !important; text-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; float: left !important; margin: 25px 0 0; padding: 25px 50px; border-color: #ddd; border-style: solid; border-width: 1px 1px 0 0;">
        <p style="color: #000 !important; text-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; orphans: 3; widows: 3; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; margin: 0 0 10px;"><strong style="font-weight: 700; color: #000 !important; text-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;">Sincere Regards
            </strong></p>
        <p style="color: #000 !important; text-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; orphans: 3; widows: 3; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; margin: 0 0 10px;">Team SCIE Technologies</p>
    </div>
</div>
</body>
</html>';
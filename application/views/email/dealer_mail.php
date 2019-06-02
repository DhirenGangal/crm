<?php $company_name = 'SCIE Technologies' ?>
<div style="width: 100%;float: left;display: block;font-size: 14px; color: #333;background: #f2f2f2; margin: 10px auto; max-width: 640px; padding: 20px 50px;">
    <div style="width:100%;margin: 0 auto;">
        <div style="width:100%;margin-bottom: 15px;">
            <div style="width:50%;float: left;"><h4><?php echo $company_name; ?></h4></div>
            <div style="width:50%;float: left;text-align:right">
                <img src="<?php echo base_url() ?>data/logo.png" alt="<?php echo $company_name; ?>" width="200" height="100"/></div>
        </div>
        <div style=" border: 1px solid #fff; border-radius: 6px; background: #FFF; float: left; width: 91%;padding: 15px 30px;">
            <p><b>Subject :</b>Welcome to <?php echo $company_name; ?>,</p> <br/>
            <p>Dear <?php echo !empty($to_name) ? $to_name : ""; ?>,</p> <br/>
            <p>Thanks for registering with <?php echo $company_name; ?>. Your dealer registration ID is <?php echo !empty($u_name) ? $u_name : ''; ?>.
                Welcome <?php echo !empty($c_name) ? $c_name : ''; ?> to be our privileged dealer. We wish to work for a
                long term relationship. Below are the login credentials you just created. <b>Kindly save this mail for
                    further reference.</b></p> <br/>
            <ul class="list-unstyled">
                <li><b>login Id</b> : <?php echo !empty($to) ? $to : ""; ?></li>
                <li><b>Password</b> : <?php echo !empty($pwd) ? $pwd : ""; ?></li>
            </ul>
            <p>This login will allow you to access your customer profiles.</p>
            <p> For any technical assistance you can contact us on: +91 9620132023 or email us at
                support@vscietechnologies.com.</p>
            <p>For new updates and information please visit http://www.vscietechnologies.com</p>
            <p> We look forward to serve you in the future.</p>
            <p>See you soon on <?php echo $company_name; ?></p>
            <p><?php echo $company_name; ?> Team</p>
        </div>
    </div>
</div>

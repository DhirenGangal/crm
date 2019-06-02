<?php $company_name1 = 'SCIE Technologies' ?>
<div style="width: 85%;float: left;display: block;font-size: 14px; color: #333;background: #f2f2f2; margin: 10px auto; max-width: 640px; padding: 20px 50px;">
    <div style="width:90%;margin: 0 auto;">
        <div style="width:100%;margin-bottom: 15px;">
            <div style="width:50%;float: left;"><h4><?php echo $company_name1; ?></h4></div>
            <div style="width:50%;float: left;text-align:right">
                <img src="<?php echo base_url() ?>data/logo.png" alt="<?php echo $company_name1; ?>" width="200" height="100"/></div>
        </div>
        <div style=" border: 1px solid #fff; border-radius: 6px; background: #FFF; float: left; width: 91%;padding: 15px 30px;">
            <p>Dear <?php echo !empty($to_name) ? $to_name : ""; ?>,</p> <br/>
            <p>Your Account is De-Activated .Please contact ADMIN to know the reasons.</p>
            <p><b>Contact Number :</b>+91 9620132023</p>
            <p><b>Email :</b>info@scietechnologies.com</p>
            <p>See you soon on <?php echo $company_name1; ?></p>
            <p><?php echo $company_name1; ?> Care Team</p>
        </div>
    </div>
</div>

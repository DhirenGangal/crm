<?php $company_name1 = 'SCIE Technologies' ?>
<div style="width: 85%;float: left;display: block;font-size: 14px; color: #333;background: #f2f2f2; margin: 10px auto; max-width: 640px; padding: 20px 50px;">
    <div style="width:90%;margin: 0 auto;">
        <div style="width:100%;margin-bottom: 15px;">
            <div style="width:50%;float: left;"><h4><?php echo $company_name1; ?></h4></div>
            <div style="width:50%;float: left;text-align:right">
                <img src="<?php echo base_url() ?>data/logo.png" alt="<?php echo $company_name1; ?>" width="200" height="100"/></div>
        </div>
        <div style=" border: 1px solid #fff; border-radius: 6px; background: #FFF; float: left; width: 91%;padding: 15px 30px;">
            <p><b>Subject:</b><?php echo !empty($subject) ? $subject : '' ?></p>
            <p><b>Ticket Title :</b><?php echo !empty($ticket_issue_title) ? $ticket_issue_title : '' ?></p>
            <p><b>Priority:</b> <?php echo !empty($priority) ? $priority : '' ?></p>
            <p><b>Product Name:</b> <?php echo !empty($product_name) ? $product_name : '' ?></p>
            <p><b>Description:</b><?php echo !empty($description) ? $description : '' ?></p>
            <p><b>User Name:</b> <?php echo !empty($user_name) ? $user_name : '' ?></p>
           <p> For any technical assistance you can contact us on: +91 9620132023 or email us at <?php echo !empty($site_email) ? $site_email : '' ?> <br>
            For new updates and information please visit <a href="http://www.scietechnologies.com" target="_blank"><?php echo $company_name1; ?> </a><br>
            We look forward to serve you in the future.</p>


        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <?php if(!empty($image['image_link'])){ ?>
            <img src="<?php echo base_url('uploads/' . $image['image_link']) ?>" style="width: 100%"/>
        <?php } else {?>
        <img src="<?php echo base_url('uploads/no-property.jpg') ?>" style="width: 100%"/>
        <?php }?>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                <span style="font-size: 16px;font-weight: 600;"><?php echo $header['property_name']; ?></span>
            </div>
        </div>
        <div class="row" style="margin-top: 2%;">
            <div class="col-xs-12">
                <span style="font-size: 15px;font-weight: 500;color: #e20031;"><?php echo $header['property_price']; ?>
                    OMR / Month</span>
            </div>
        </div>
        <div class="row" style="margin-top: 2%;">
            <div class="col-xs-12">
                 &nbsp;<i class="fa fa-bed" aria-hidden="true"></i>&nbsp; <?php echo $header['bedroomNo']; ?> &nbsp;<i class="fa fa-shower" aria-hidden="true"></i>&nbsp; 2
            </div>
        </div>
        <div class="row" style="margin-top: 2%;">
            <div class="col-xs-12">
                <span>Agent : </span><span style="font-size: 15px;font-weight: 500;"><?php echo $header['Ename1']; ?></span>
            </div>
        </div>
        <div class="row" style="margin-top: 2%;">
            <div class="col-xs-12">
                 <?php 
                            $agent_id= $header['agent_id'];
                            $sql = $this->db->query('SELECT
                                    srp_employeesdetails.company_id,
                                    company_master.company_name
                                    FROM
                                    srp_employeesdetails
                                    INNER JOIN company_master ON srp_employeesdetails.company_id = company_master.company_id
                                    WHERE
                                    srp_employeesdetails.EIdNo = "'.$agent_id.'" ');
                          
                            $resultset= $sql->result_array(); ?>
                <span>Broker :</span> <span style="font-size: 15px;font-weight: 500;">
                    <?php   if (isset($resultset) && !empty($resultset)) {

                  echo $resultset[0]['company_name'];
                    } ?></span>
            </div>
        </div>
       
    </div>
</div>
<form role="form" id="frm_property_sendEmail" class="form-horizontal">
    <input type="hidden" name="property_id" value="<?php echo $header['property_id']; ?>">

    <div class="row" style="margin-top: 4%;">
        <div class="col-xs-12">
            <textarea name="description" id="description" cols="30" rows="2" class="form-control"
                      style="border-radius:0px;">Hi, I found your property with ref: <?php echo $header['reference']; ?> on <?php echo sys_name(); ?>. Please contact me. Thank you.</textarea>
        </div>
    </div>
    <div class="row" style="margin-top: 2%;">
        <div class="col-xs-6">
            <input type="text" id="senderName" name="senderName" placeholder="Your name" class="form-control"
                   style="border-radius:0px;height: 40px;">
        </div>
        <div class="col-xs-6">
            <input type="text" id="senderEmail" name="senderEmail" placeholder="Your email" class="form-control"
                   style="border-radius:0px;height: 40px;">
        </div>
    </div>
    <div class="row" style="margin-top: 2%;">
        <div class="col-xs-12">
            <input type="text" id="senderPhone" name="senderPhone" placeholder="Your phone" class="form-control"
                   style="border-radius:0px;height: 40px;">
        </div>
    </div>
</form>
<div class="row" style="margin-top: 2%;">
    <div class="col-xs-12">
        <div class="input-group-btn ">
            <button class="btn btn-search pull-right" type="button" onclick="save_property_email()" style="background-color:#3460aa;color: white;height: 40px;"><span>Send</span></button>
        </div>
    </div>
</div>
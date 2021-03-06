<div class="row">
    <div class="col-xs-6">
        <?php if (!empty($header['EmpImage'])) { ?>
            <img src="<?php echo base_url('uploads/agents/' . $header['EmpImage']) ?>"
                 style="width: 100%"/>
        <?php } else { ?>
            <img src="<?php echo base_url('uploads/agents/default-user-img.jpg') ?>" style="width: 100%"/>
        <?php } ?>
    </div>
    <div class="col-xs-6">
        <div class="row">
            <div class="col-xs-12">
                <span style="font-size: 16px;font-weight: 600;"><?php echo $header['Ename1']; ?></span>
            </div>
        </div>
       <!-- <div class="row" style="margin-top: 2%;">
            <div class="col-xs-12">
                <span style="font-size: 15px;font-weight: 500;color: #e20031;"><?php //echo $header['company_name']; ?></span>
            </div>
        </div>-->
        <div class="row" style="margin-top: 2%;">
            <div class="col-xs-12">
                <span>Broker : </span><span style="font-size: 15px;font-weight: 500;"><?php echo isset($header['company_name']) ? $header['company_name'] : 'Not available'; ?></span>
            </div>
        </div>

       <!-- <div class="row" style="margin-top: 2%;">
            <div class="col-xs-12">
                <span>ORN# :</span> <span style="font-size: 15px;font-weight: 500;">34904</span>
            </div>
        </div>-->
    </div>
</div>
<form role="form" id="frm_agent_detailRequest" class="form-horizontal">
    <input type="hidden" name="EIdNo" value="<?php echo $header['EIdNo']; ?>">

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
            <button class="btn btn-search pull-right" type="button" onclick="send_agent_detailRequest_email()" style="background-color:#3460aa;color: white;height: 40px;"><span>Send</span></button>
        </div>
    </div>
</div>
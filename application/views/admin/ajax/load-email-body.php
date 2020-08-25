<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <style type="text/css">
        img {
            max-width: 100%;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
            height: 100%;
            line-height: 1.6em;
        }

        body {
            background-color: #f6f6f6;
        }

        @media only screen and (max-width: 640px) {
            body {
                padding: 0 !important;
            }

            h1 {
                font-weight: 800 !important;
                margin: 20px 0 5px !important;
            }

            h2 {
                font-weight: 800 !important;
                margin: 20px 0 5px !important;
            }

            h3 {
                font-weight: 800 !important;
                margin: 20px 0 5px !important;
            }

            h4 {
                font-weight: 800 !important;
                margin: 20px 0 5px !important;
            }

            h1 {
                font-size: 22px !important;
            }

            h2 {
                font-size: 18px !important;
            }

            h3 {
                font-size: 16px !important;
            }

            .container {
                padding: 0 !important;
                width: 100% !important;
            }

            .content {
                padding: 0 !important;
            }

            .content-wrap {
                padding: 10px !important;
            }

            .invoice {
                width: 100% !important;
            }
        }
    </style>
</head>
<body
    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;"
    bgcolor="#F7F7F7">

<table class="body-wrap"
       style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;"
       bgcolor="#F7F7F7">
    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
            valign="top"></td>
        <td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display:
            block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
            <div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px;
                display: block; margin: 0 auto; padding: 20px;">
                <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing:
                    border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;"
                       bgcolor="#F7F7F7">
                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <td colspan="2">
                            <?php
                            $companyLogo = STATIC_LINK.'/amlak/assets/system/images/amlak-logo.png';
                             $cLogo=preg_replace('/\s+/', '', $companyLogo);    
                            ?>
                            <img src="<?php echo $cLogo; ?>" alt="<?php echo $cLogo ?>"
                                 style="width: 100px; height: 55px"/>
                        </td>
                    </tr>
                </table>
                <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing:
                    border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;"
                       bgcolor="#FFFFFF">
                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <td align="center" class="content-block"
                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; margin: 0; padding: 0px;"
                            valign="top">
                            Your inquiry has been sent to
                        </td>
                    </tr>
                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <td align="center" class="content-block"
                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 18px; font-weight:600;vertical-align: top; margin: 0; padding: 0px;"
                            valign="top">
                            Foot Print Real Estate
                        </td>
                    </tr>
                </table>
                <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing:
                    border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;"
                       bgcolor="#FFFFFF">
                    <tr style="width: 40%">
                        <td style="width:40%;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 16px;font-weight: 600;">
                            <?php
                               $imagePath = PROPERTY_IMAGE_LINK ;
                               $imagePath=preg_replace('/\s+/', '', $imagePath);     
                            ?>
                            <?php if (!empty($body['image']['image_link'])) { ?>
                                <img src="<?php echo $imagePath . $body['image']['image_link']; ?>"
                                     alt="<?php echo $imagePath . $body['image']['image_link']; ?>" style="width: 100px; height: 55px"/>
                            <?php } else { ?>
                                <img src="<?php echo $imagePath . "no-property.jpg"; ?>"
                                     alt="<?php echo $imagePath . "no-property.jpg"; ?>" style="width: 100px; height: 55px"/>
                            <?php } ?>
                        </td>
                        <td style="width:60%;">
                            <table>
                                <tr>
                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 14px;font-weight: 600;"><?php echo $body['header']['property_name']; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 14px;"><?php echo $body['header']['property_address']; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 14px;"><?php echo $body['header']['property_type_name']; ?>
                                        | <?php echo $body['header']['bedroomNo']; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 14px;color: #e20031;"><?php echo $body['header']['property_price']; ?>
                                        OMR / Month
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 14px;">
                                        Ref :<?php echo $body['header']['reference']; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="width: 60%">

                    </tr>
                </table>

                <div class="footer"
                     style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
                    <table width="100%"
                           style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="aligncenter content-block"
                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;"
                                align="center" valign="top">
                                <a href="#" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box;
                                font-size: 12px; color: #999; text-decoration: underline; margin: 0;"><?php echo sys_name() ?></a>.
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </td>
        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
            valign="top"></td>
    </tr>
</table>
</body>
</html>
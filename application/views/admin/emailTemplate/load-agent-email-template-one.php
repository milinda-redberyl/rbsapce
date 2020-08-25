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
                            $companyLogo = STATIC_LINK . '/images/logo/amlak-logo.png';
                            ?>
                            <img src="<?php echo $companyLogo; ?>" alt="<?php echo $companyLogo ?>"
                                 style="width: 100px; height: 55px"/>
                        </td>
                    </tr>
                </table>
                <table width="100%" style="border-collapse:collapse">
                    <tbody>
                    <tr>
                        <td align="center" style="height:70px;color:#38ae43;background-color:#e0efd8;font-size:20px;font-weight:600;padding-left:10px;padding-right:10px">
                            Your message has been sent to the following Agent
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing:
                    border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;"
                       bgcolor="#FFFFFF">
                    <tr style="width: 40%">
                        <td style="width:40%;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 16px;font-weight: 600;">
                            <?php
                            $imagePath = PROPERTY_IMAGE_LINK."agents/" ;
                            ?>
                            <?php if (!empty($body['image']['image_link'])) { ?>
                                <img src="<?php echo $imagePath . $body['header']['EmpImage']; ?>"
                                     alt="<?php echo $imagePath . $body['header']['EmpImage']; ?>" style="width: 100px; height: 55px"/>
                            <?php } else { ?>
                                <img src="<?php echo $imagePath . "default-user-img.jpg"; ?>"
                                     alt="<?php echo $imagePath . "default-user-img.jpg"; ?>" style="width: 100px; height: 55px"/>
                            <?php } ?>
                        </td>
                        <td style="width:60%;">
                            <table width="100%" style="border-collapse:collapse">
                                <tbody>
                                <tr>
                                    <td style="font-size:18px;padding-bottom:10px;font-weight:500">
                                        Message sent</td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px;line-height:16px;padding-bottom:20px">
                                       <?php echo $message; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="<?php echo WEB_URL."agentOverview/".$body['header']['EIdNo'] ?>" style="color:#fff;background-color:#10C4DC;border-radius:4px;display:block;text-align:center;padding-left:15px;padding-right:15px;padding-top:10px;padding-bottom:10px;text-transform:uppercase;text-decoration:none;font-size:16px;line-height:18px;font-weight:300;word-wrap:break-word" target="_blank">View all properties<br>from <?php echo $body['header']['Ename1']; ?></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
                <table width="40%" style="border-collapse:collapse">
                    <tbody>
                    <tr>
                        <td style="background-color:#ffffff;border-bottom:3px solid #dedede;color:#2d383f;line-height:100%">
                            <table width="100%" style="border-collapse:collapse">
                                <tbody>
                                <tr>
                                    <td align="center" style="font-size:18px;padding-top:25px">
                                        <?php echo $body['header']['Ename1']; ?></td>
                                </tr>
                                <tr>
                                    <td align="center" style="font-size:12px;color:#999898;text-transform:uppercase;padding-bottom:15px">
                                        Chief Investment Officer</td>
                                </tr>
                                <tr>
                                    <td style="font-size:12px;padding-right:10px;padding-left:10px;padding-bottom:10px">
                                        <table width="100%" style="border-collapse:collapse">
                                            <tbody>
                                            <tr>
                                                <td valign="top" style="font-size:12px;color:#999898;text-transform:uppercase">
                                                    COMPANY:</td>
                                                <td valign="top">
                                                    Aeon &amp; Trisl Real Estate Brokers
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="font-size:12px;color:#999898;text-transform:uppercase">
                                                    NATIONALITY:</td>
                                                <td valign="top">
                                                    <?php echo $body['header']['country_name']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="font-size:12px;color:#999898;text-transform:uppercase">
                                                    LANGUAGES:
                                                </td>
                                                <td valign="top">
                                                    English, Hindi, Urdu, Memon
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
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
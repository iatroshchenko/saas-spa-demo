<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>Email Verification Notification for {{ config('app.name') }}</title>

    <!-- CSS Reset : BEGIN -->


    <style>
        /* latin-ext */
        @font-face {
            font-family: 'DM Sans';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local('DM Sans Regular'), local('DMSans-Regular'), url(https://fonts.gstatic.com/s/dmsans/v5/rP2Hp2ywxg089UriCZ2IHTWEBlwu8Q.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'DM Sans';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local('DM Sans Regular'), local('DMSans-Regular'), url(https://fonts.gstatic.com/s/dmsans/v5/rP2Hp2ywxg089UriCZOIHTWEBlw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* latin-ext */
        @font-face {
            font-family: 'DM Sans';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: local('DM Sans Medium'), local('DMSans-Medium'), url(https://fonts.gstatic.com/s/dmsans/v5/rP2Cp2ywxg089UriAWCrCBamC3YU-CnE6Q.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'DM Sans';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: local('DM Sans Medium'), local('DMSans-Medium'), url(https://fonts.gstatic.com/s/dmsans/v5/rP2Cp2ywxg089UriAWCrCBimC3YU-Ck.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* latin-ext */
        @font-face {
            font-family: 'DM Sans';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: local('DM Sans Bold'), local('DMSans-Bold'), url(https://fonts.gstatic.com/s/dmsans/v5/rP2Cp2ywxg089UriASitCBamC3YU-CnE6Q.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'DM Sans';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: local('DM Sans Bold'), local('DMSans-Bold'), url(https://fonts.gstatic.com/s/dmsans/v5/rP2Cp2ywxg089UriASitCBimC3YU-Ck.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'DM Sans', sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color:#8094ae;
            font-weight: 400;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        a {
            text-decoration: none;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
    </style>

</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f6fa;">
<center style="width: 100%; background-color: #f5f6fa;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
        <tr>
            <td style="padding: 40px 0;">
                <table style="width:100%;max-width:620px;margin:0 auto;">
                    <tbody>
                    <tr>
                        <td style="text-align: center; padding-bottom:25px">
                            <a href="#"><img style="height: 40px" src="https://dev.mydemosaasapp.com/images/logo.jpg" alt="logo"></a>
                            <p style="font-size: 14px; color: #2660f7; padding-top: 12px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                Email Verification Notification from {{ config('app.name') }}
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                    <tbody>
                    <tr>
                        <td style="padding: 30px 30px 20px;">
                            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">Hi, {{ $user->first_name }},</p>
                            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">We are pleased to have you as a member of {{ config('app.name') }}.</p>
                            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">Please click the button below to verify your email address.</p>

                            <p style="text-align: center; padding: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                <a href="{{ $user->verificationUrl() }}" style="background-color:#2660f7;border-radius:4px;color:#ffffff;display:inline-block;font-size:14px;font-weight:700;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 25px">
                                    Verify Email Address
                                </a>
                            </p>

                            <p style="margin-bottom: 15px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">If you did not create an account, no further action is required.</p>
                            <p style="color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                Regards,
                            </p>
                            <p>
                                <a style="color: #2660f7; text-decoration:none; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;" href="{{ url('/') }}">{{ config('app.name') }}</a>
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table style="width:100%;max-width:620px;margin:0 auto;">
                    <tbody>
                    <tr>
                        <td style="text-align: center; padding:25px 20px 0;">
                            <p style="font-size: 14px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">Copyright © 2020 {{ config('app.name') }}. All rights reserved.</p>
                            <p style="padding-top: 15px; font-size: 14px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                This email was sent to you as a registered user of <a style="color: #2660f7; text-decoration:none;" href="{{ url('/') }}">{{ config('app.name') }}</a>
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</center>
</body>
</html>

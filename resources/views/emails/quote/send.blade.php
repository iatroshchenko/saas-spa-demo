<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>{{ config('app.name') }} Quote Email</title>

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
            font-family: 'DM Sans', Arial, sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color: #8094ae;
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
            -ms-interpolation-mode: bicubic;
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
                            <a href="#"><img style="height: 40px" src="https://dev.mydemosaasapp.com/images/logo.jpg"
                                             alt="logo"></a>
                            <p style="font-size: 14px; color: #2660f7; padding-top: 12px;">
                                {{ config('app.name') }} Quote Email
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                    <tbody>
                    <tr>
                        <td style="padding: 30px 30px 0; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">Dear {{ $quote->quoteShipper->first_name }},</p>
                            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                The price below is the current market rate to transport a vehicle
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                    <tbody>

                    <tr>
                        <td style="padding: 30px 30px 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                            <p style="text-align: center; font-size: 20px; margin-bottom: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                Quote Details:
                            </p>

                            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
{{--                                <img src="{{ asset('images/email/id.png') }}" alt="">--}}
                                <b style="padding-left: 10px; padding-right: 5px;">Quote ID: </b> {{ $quote->id }}
                            </p>

                            <!-- Vehicles -->
                            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
{{--                                <img src="{{ asset('images/email/vehicles.png') }}" alt="">--}}
                                <b style="padding-left: 10px; padding-right: 5px;">Vehicles: </b>
                            </p>
                            <div style="margin-left: 30px; margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                [make], [year], [model], [size], [movable]
                                <ul>
                                    @foreach($quote->quoteVehicles as $vehicle)
                                        <li style="color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                            {{ $vehicle->make }}, {{ $vehicle->year }}, {{ $vehicle->model }}, {{ $vehicle->size_name }}, {{ $vehicle->is_running ? "Movable" : "Immovable" }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
{{--                                <img src="{{ asset('images/email/origin.png') }}" alt="">--}}
                                <b style="padding-left: 10px; padding-right: 5px;">Origin: </b> {{ $quote->quoteOrigin->address_string }}
                            </p>

                            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
{{--                                <img src="{{ asset('images/email/destination.png') }}" alt="">--}}
                                <b style="padding-left: 10px; padding-right: 5px;">Destination: </b> {{ $quote->quoteDestination->address_string }}
                            </p>

                            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
{{--                                <img src="{{ asset('images/email/calendar-icon.png') }}" alt="">--}}
                                <b style="padding-left: 10px; padding-right: 5px;">First Available Date: </b> {{ $quote->quoteTransport->available_date->format('Y/m/d') }}
                            </p>

                            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
{{--                                <img src="{{ asset('images/email/truck-icon.png') }}" alt="">--}}
                                <b style="padding-left: 10px; padding-right: 5px;">Carrier type: </b> {{ $quote->quoteTransport->carrier_type_name }}
                            </p>

                            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
{{--                                <img src="{{ asset('images/email/price.png') }}" alt="">--}}
                                <b style="padding-left: 10px; padding-right: 5px;">Total price: </b> $ {{ $quote->quoteTransport->price }}
                            </p>

                            <p style="text-align: center; padding: 20px; margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                <a href="{{ $quote->convertToOrderUrl() }}" style="background-color:#2660f7;border-radius:4px;color:#ffffff;display:inline-block;font-size:14px;font-weight:700;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 25px">
                                    Confirm This Order
                                </a>
                            </p>

                        </td>
                    </tr>

                    </tbody>
                </table>

                <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;border-top: #fafafa solid 1px;">
                    <tbody>
                        <tr>
                            <td style="padding: 0 30px 20px;">
                                <p style="text-align: center; font-size: 20px; margin: 30px 0px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                    What You Can Expect Next:
                                </p>

                                <p style="margin-bottom: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                    Once You confirm your order, we will start working on assigning your vehicle
                                    to be picked up by the first available driver headed to your destination city
                                </p>

                                <p style="margin-bottom: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                    You can expect to receive a driver confirmation notification within 1-5 days of the ‘first available pick up date’.
                                </p>

                                <p style="font-weight: bold; margin-bottom: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                    Please note that ‘first available pick up date’ is NOT a guaranteed pick up date. Pick up date will range 0-2 days from "first available pick up date"
                                </p>

                                <p style="margin-bottom: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                    Please expect the driver or a dispatcher to call 12-24 hours prior to pick up & delivery of your vehicle, to inform you of ETA
                                </p>

                                <p style="margin-bottom: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                    You will be provided with driver or dispatcher's phone number in case you would like to reach out to them directly, before they contact you.
                                </p>

                                <p style="margin-bottom: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                    While we make every effort to accommodate specific time frame windows,we cannot guarentee that vehicle will be picked up at any exact time. Please plan to have your vehicle readily available starting on ‘first available pick up date’.
                                </p>

                                <p style="color: #F82E2E; margin-bottom: 20px;">
                                    If you have pre-arranged travel plans, we stronly suggest that the "first available pickup date" be a minimum of 48 hours prior to your planned departure.
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;border-top: #fafafa solid 1px;">
                    <tbody>
                    <tr>
                        <td style="padding: 0 30px 20px;">
                            <p style="text-align: center; font-size: 20px; margin: 30px 0px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                Payment Information
                            </p>

                            <p style="font-weight: bold; margin-bottom: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                No payment will be due until your vehicle has been scheduled for pickup and you have received notification. Once vehicle has been scheduled for pickup, full balance will be due.
                            </p>

                            <p style="margin-bottom: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                In event of cancellation, all payments made are 100% fully refundable minus 5% merchant processing fee
                            </p>

                            <p style="margin-bottom: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                Any vehicle shipping order with outstanding balance remaining 24 hours prior to scheduled pickup will be subject to cancellation.
                            </p>

                            <p style="font-weight: bold; margin-bottom: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                We look forward to delivering your vehicle in timely, professional manner.
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                    <tbody>
                        <tr>
                            <td style="padding: 30px 30px 20px;">
                                <p style="color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                    <b>{{ config('app.name') }}</b>
                                </p>
                                <p style="color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">+1 (888) 590-0931</p>
                                <a style="color: #2660f7; text-decoration:none;" href="mailto:support@mydemosaasapp.com">support@mydemosaasapp.com</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table style="width:100%;max-width:620px;margin:0 auto;">
                    <tbody>
                    <tr>
                        <td style="text-align: center; padding:25px 20px 0;">
                            <p style="font-size: 14px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">Copyright © 2020 {{ config('app.name') }}. All rights
                                reserved.</p>
                            <p style="padding-top: 15px; font-size: 14px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                                This email was sent to you as a registered user of <a
                                    style="color: #2660f7; text-decoration:none;"
                                    href="{{ url('/') }}">{{ config('app.name') }}</a>
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

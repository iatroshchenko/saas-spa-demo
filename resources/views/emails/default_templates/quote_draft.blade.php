<table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
    <tbody>
    <tr>
        <td style="padding: 30px 30px 0; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">Dear {{ firstName }},</p>
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
                <b style="padding-left: 10px; padding-right: 5px;">Quote ID: </b> {{ quoteId }}
            </p>

            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                <b style="padding-left: 10px; padding-right: 5px;">Origin: </b> {{ quoteOriginAddress }}
            </p>

            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                <b style="padding-left: 10px; padding-right: 5px;">Destination: </b> {{ quoteDestinationAddress }}
            </p>

            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                <b style="padding-left: 10px; padding-right: 5px;">First Available Date: </b> {{ firstAvailableDate }}
            </p>

            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                <b style="padding-left: 10px; padding-right: 5px;">Carrier type: </b> {{ carrierType }}
            </p>

            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                <b style="padding-left: 10px; padding-right: 5px;">Total price: </b> $ {{ price }}
            </p>

            <p style="text-align: center; padding: 20px; margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                <a href="{{ confirmUrl }}"
                   style="background-color:#2660f7;border-radius:4px;color:#ffffff;display:inline-block;font-size:14px;font-weight:700;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 25px">
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

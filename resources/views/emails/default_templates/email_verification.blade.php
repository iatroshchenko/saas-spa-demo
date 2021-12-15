<table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
    <tbody>
    <tr>
        <td style="padding: 30px 30px 20px;">
            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">Hi, {{ firstName }},</p>
            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">We are pleased to have you as a member of {{ shipperName }}.</p>
            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">Please click the button below to verify your email address.</p>

            <p style="text-align: center; padding: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                <a href="{{ verificationUrl }}" style="background-color:#2660f7;border-radius:4px;color:#ffffff;display:inline-block;font-size:14px;font-weight:700;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 25px">
                    Verify Email Address
                </a>
            </p>

            <p style="margin-bottom: 15px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">If you did not create an account, no further action is required.</p>
            <p style="color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                Regards,
            </p>
            <p>
                <a style="color: #2660f7; text-decoration:none; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;" href="{{ linkToPlatform }}">
                    {{ shipperName }}
                </a>
            </p>
        </td>
    </tr>
    </tbody>
</table>

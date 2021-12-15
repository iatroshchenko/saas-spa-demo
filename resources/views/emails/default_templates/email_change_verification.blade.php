<table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
    <tbody>
    <tr>
        <td style="padding: 30px 30px 20px;">
            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">Hi, {{ firstName }},</p>
            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">We are pleased to have you as a member of {{ shipperName }}.</p>
            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">Click this link to confirm your email change to <b>{{ email }}</b> for <b>{{ config('app.name') }}</b></p>

            <p style="text-align: center; padding: 20px; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                <a href="{{ confirmationLink }}" style="background-color:#2660f7;border-radius:4px;color:#ffffff;display:inline-block;font-size:14px;font-weight:700;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 25px">
                    Confirm
                </a>
            </p>

            <p style="margin-bottom: 15px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">If you did not create an account, no further action is required.</p>
            <p>
                Regards,
            </p>
            <p>
                <a style="color: #2660f7; text-decoration:none;" href="{{ linkToPlatform }}">{{ shipperName }}</a>
            </p>
        </td>
    </tr>
    </tbody>
</table>

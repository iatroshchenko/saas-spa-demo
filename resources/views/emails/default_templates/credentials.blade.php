<table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
    <tbody>
    <tr>
        <td style="padding: 30px 30px 20px;">
            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">Hello</p>
            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">We are pleased to have you as a member of {{ shipperName }}.</p>
            <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                Your credentials:
            </p>

            <p style="color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                <b>Email: </b> {{ email }}
            </p>
            <p style="color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                <b>Password: </b> {{ password }}
            </p>

            <p style="text-align: center; padding: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                <a href="{{ route('start') }}" target="_blank" style="background-color:#2660f7;border-radius:4px;color:#ffffff;display:inline-block;font-size:14px;font-weight:700;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 25px">
                    Login
                </a>
            </p>

            <p style="color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                Regards,
            </p>
            <p style="font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                <a style="color: #2660f7; text-decoration:none;" href="{{ platformUrl }}">ExampleSaasApp</a>
            </p>
        </td>
    </tr>
    </tbody>
</table>

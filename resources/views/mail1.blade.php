<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Demystifying Email Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style type="text/css">
        a[x-apple-data-detectors] {
            color: inherit !important;
        }

    </style>
</head>
<body style="margin: 0; padding: 0;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 20px 0 30px 0;">

                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
                    <tr>
                        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
                            <img src="https://assets.codepen.io/210284/h1_1.gif" alt="Creating Email Magic." width="300" height="230" style="display: block;" />
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 5px 20px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; width: 150px">
                                        <h1 style="font-size: 18px; margin: 0;">ACT TYPE:</h1>
                                    </td>
                                    <td style="font-family: Arial, sans-serif;">
                                        <h1 style="font-size: 18px; margin: 0;">{{ $act }}</h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 5px 20px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; width: 150px">
                                        <h1 style="font-size: 18px; margin: 0;">EVENT TYPE:</h1>
                                    </td>
                                    <td style="font-family: Arial, sans-serif;">
                                        <h1 style="font-size: 18px; margin: 0;">{{ $event }}</h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 5px 20px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; width: 150px">
                                        <h1 style="font-size: 18px; margin: 0;">LOCATION</h1>
                                    </td>
                                    <td style="font-family: Arial, sans-serif;">
                                        <h1 style="font-size: 18px; margin: 0;">{{ $location }}</h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 5px 20px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; width: 150px">
                                        <h1 style="font-size: 18px; margin: 0;">EVENT DATE</h1>
                                    </td>
                                    <td style="font-family: Arial, sans-serif;">
                                        <h1 style="font-size: 18px; margin: 0;">{{ $event_date }}</h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 5px 20px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; width: 150px">
                                        <h1 style="font-size: 18px; margin: 0;">DESCRIPTION:</h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 5px 20px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                <tr>
                                    <td style="font-family: Arial, sans-serif;">
                                        <h1 style="font-size: 18px; margin: 0;">{{ $content }}</h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 5px 20px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                <tr>
                                    <td style="font-family: Arial, sans-serif;">
                                        <h1 style="font-size: 18px; margin: 0;">{{ $request }}</h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
</body>
</html>

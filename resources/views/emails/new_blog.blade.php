<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $blog->title }}</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f2f4f6; font-family: Arial, sans-serif;">

    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding: 30px;">
        <tr>
            <td align="center">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); overflow: hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="background-color: #0056b3; padding: 20px 30px; text-align: center;">
                            <h2 style="color: #ffffff; margin: 0;"> New Blog Published</h2>
                        </td>
                    </tr>


                    <!-- Content -->
                    <tr>
                        <td style="padding: 25px 30px;">
                            <h3 style="color: #333333; font-size: 22px; margin-top: 0;">{{ $blog->title }}</h3>
                            <p style="color: #555555; line-height: 1.6; font-size: 16px;">
                                {!! \Illuminate\Support\Str::limit(strip_tags($blog->short_description), 200) !!}
                            </p>

                            <div style="margin-top: 25px;">
                                <a href="{{ url('blogs/' . $blog->slug) }}"
                                   style="background-color: #28a745; color: #ffffff; padding: 12px 20px; text-decoration: none; border-radius: 4px; display: inline-block; font-weight: bold;">
                                    🔗 Read Full Blog
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f0f0f0; padding: 20px; text-align: center; font-size: 12px; color: #888888;">
                            You received this email because you subscribed to <a href="{{ url('/') }}" style="color: #007bff; text-decoration: none;">AllPrinterSetup.com</a><br>
                            If you no longer wish to receive updates, you can ignore this email.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Nieuw contactformulier</title>
</head>
<body style="margin:0; padding:0; background-color:#fbf9f4; font-family: Arial, Helvetica, sans-serif; color:#10262a;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#fbf9f4; padding:32px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:560px; background-color:#ffffff; border-radius:16px; overflow:hidden; border:1px solid rgba(16,38,42,0.08);">
                    <tr>
                        <td style="background-color:#0b1a1c; padding:24px 32px;">
                            <span style="color:#fbf9f4; font-size:16px; font-weight:600;">NovaMed Research Foundation</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;">
                            <h1 style="font-size:20px; margin:0 0 24px;">Nieuw bericht via het contactformulier</h1>

                            <p style="margin:0 0 8px;"><strong>Type:</strong> {{ ucfirst($submission->type) }}</p>
                            <p style="margin:0 0 8px;"><strong>Naam:</strong> {{ $submission->name }}</p>
                            <p style="margin:0 0 8px;"><strong>E-mail:</strong> {{ $submission->email }}</p>
                            @if ($submission->organisation)
                                <p style="margin:0 0 8px;"><strong>Organisatie:</strong> {{ $submission->organisation }}</p>
                            @endif

                            <p style="margin:24px 0 8px; font-weight:600;">Bericht:</p>
                            <p style="margin:0; white-space:pre-line; line-height:1.6;">{{ $submission->message }}</p>

                            <p style="margin-top:32px;">
                                <a href="mailto:{{ $submission->email }}" style="display:inline-block; background-color:#0b1a1c; color:#fbf9f4; text-decoration:none; padding:12px 24px; border-radius:999px; font-size:14px;">
                                    Reageer op {{ $submission->name }}
                                </a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

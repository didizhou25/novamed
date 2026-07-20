const TYPES = ['algemeen', 'donateur', 'vrijwilliger', 'partner'];
const SUCCESS_MESSAGE = 'Bedankt voor uw bericht. Wij nemen zo spoedig mogelijk contact met u op.';

export async function onRequestPost({ request, env }) {
    const form = await request.formData();

    const website = (form.get('website') || '').toString().trim();
    if (website !== '') {
        // Honeypot tripped — pretend success so bots don't learn anything.
        return json({ status: 'ok', message: SUCCESS_MESSAGE });
    }

    const data = {
        type: (form.get('type') || '').toString(),
        name: (form.get('name') || '').toString().trim(),
        email: (form.get('email') || '').toString().trim(),
        organisation: (form.get('organisation') || '').toString().trim(),
        message: (form.get('message') || '').toString().trim(),
    };

    const errors = validate(data);
    if (Object.keys(errors).length > 0) {
        return json({ message: 'The given data was invalid.', errors }, 422);
    }

    if (env.CONTACT_SUBMISSIONS) {
        const key = `${Date.now()}-${crypto.randomUUID()}`;
        await env.CONTACT_SUBMISSIONS.put(key, JSON.stringify({ ...data, submittedAt: new Date().toISOString() }));
    }

    if (env.RESEND_API_KEY && env.CONTACT_NOTIFY_ADDRESS) {
        await sendNotification(data, env).catch(() => {});
    }

    return json({ status: 'ok', message: SUCCESS_MESSAGE });
}

function validate(data) {
    const errors = {};

    if (!TYPES.includes(data.type)) {
        errors.type = ['Kies een geldig onderwerp.'];
    }
    if (!data.name || data.name.length > 120) {
        errors.name = ['Vul uw naam in (max. 120 tekens).'];
    }
    if (!data.email || data.email.length > 180 || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.email)) {
        errors.email = ['Vul een geldig e-mailadres in.'];
    }
    if (data.organisation.length > 150) {
        errors.organisation = ['Organisatie mag maximaal 150 tekens zijn.'];
    }
    if (!data.message || data.message.length > 5000) {
        errors.message = ['Vul een bericht in (max. 5000 tekens).'];
    }

    return errors;
}

async function sendNotification(data, env) {
    await fetch('https://api.resend.com/emails', {
        method: 'POST',
        headers: {
            Authorization: `Bearer ${env.RESEND_API_KEY}`,
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            from: env.CONTACT_FROM_ADDRESS || 'NovaMed Research Foundation <onboarding@resend.dev>',
            to: env.CONTACT_NOTIFY_ADDRESS,
            reply_to: data.email,
            subject: `Nieuw contactformulier — ${data.type}`,
            text: `Type: ${data.type}\nNaam: ${data.name}\nE-mail: ${data.email}\nOrganisatie: ${data.organisation || '-'}\n\n${data.message}`,
        }),
    });
}

function json(body, status = 200) {
    return new Response(JSON.stringify(body), {
        status,
        headers: { 'Content-Type': 'application/json' },
    });
}

<?php
require_once __DIR__ . '/INCLUDES/form-security.php';
require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\Exception as MailerException;
use PHPMailer\PHPMailer\PHPMailer;

function escapeHtml(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function postedString(string $name): string
{
    $value = $_POST[$name] ?? '';
    return is_string($value) ? trim($value) : '';
}

function buildEmailHtml(string $heading, array $details, string $messageLabel, string $message): string
{
    $rows = '';
    foreach ($details as $label => $value) {
        $safeLabel = escapeHtml((string) $label);
        $safeValue = escapeHtml((string) $value);
        if ($label === 'Reply-to email') {
            $safeValue = '<a href="mailto:' . escapeHtml((string) $value) . '" style="color:#2563eb;text-decoration:none;">' . $safeValue . '</a>';
        }
        $rows .= '<tr>'
            . '<td style="padding:11px 14px;border-bottom:1px solid #e7edf7;color:#61799c;font-size:13px;font-weight:600;vertical-align:top;width:34%;">' . $safeLabel . '</td>'
            . '<td style="padding:11px 14px;border-bottom:1px solid #e7edf7;color:#173b73;font-size:14px;vertical-align:top;">' . $safeValue . '</td>'
            . '</tr>';
    }

    $safeHeading = escapeHtml($heading);
    $safeMessageLabel = escapeHtml($messageLabel);
    $safeMessage = nl2br(escapeHtml($message));

    return '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"></head>'
        . '<body style="margin:0;padding:24px 12px;background-color:#f4f7fc;font-family:Arial,Helvetica,sans-serif;color:#173b73;">'
        . '<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:640px;margin:0 auto;background-color:#ffffff;border:1px solid #e4ebf5;border-radius:12px;overflow:hidden;">'
        . '<tr><td style="padding:22px 28px;background-color:#173b73;border-bottom:5px solid #f4be46;">'
        . '<div style="color:#ffffff;font-size:20px;font-weight:700;letter-spacing:.3px;">MavutiHub</div>'
        . '<div style="margin-top:5px;color:#dbe7fb;font-size:12px;">VUT STUDENT COMMUNITIES</div>'
        . '</td></tr>'
        . '<tr><td style="padding:28px;">'
        . '<div style="margin-bottom:8px;color:#2563eb;font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;">Website form submission</div>'
        . '<h1 style="margin:0 0 20px;color:#173b73;font-size:23px;line-height:1.3;">' . $safeHeading . '</h1>'
        . '<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="border:1px solid #e7edf7;border-collapse:collapse;">'
        . $rows
        . '</table>'
        . '<h2 style="margin:24px 0 10px;color:#173b73;font-size:15px;">' . $safeMessageLabel . '</h2>'
        . '<div style="padding:16px;background-color:#f8faff;border-left:4px solid #f4be46;border-radius:4px;color:#294a77;font-size:14px;line-height:1.65;">' . $safeMessage . '</div>'
        . '</td></tr>'
        . '<tr><td style="padding:16px 28px;background-color:#f8faff;border-top:1px solid #e7edf7;color:#61799c;font-size:11px;line-height:1.5;">'
        . 'This message was sent from the MavutiHub website. Reply directly to the sender using the reply-to address above.'
        . '</td></tr>'
        . '</table></body></html>';
}

function showFormResult(int $status, string $title, string $message, string $returnPage): void
{
    http_response_code($status);
    $safeTitle = escapeHtml($title);
    $safeMessage = escapeHtml($message);
    $safePage = escapeHtml($returnPage);
    $returnLabel = $returnPage === 'contact.php' ? 'Return to Contact' : 'Return to Explore Clubs';

    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{$safeTitle} | MavutiHub</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="stylesheet" href="CSS/clubs-style.css?v=2">
</head>
<body>
HTML;

    include __DIR__ . '/INCLUDES/navbar.php';

    echo <<<HTML
  <main class="section">
    <div class="container">
      <section class="cta-panel" role="status">
        <span class="cta-kicker">MAVUTIHUB FORMS</span>
        <h1>{$safeTitle}</h1>
        <p>{$safeMessage}</p>
        <a class="btn btn-gold" href="{$safePage}">{$returnLabel}</a>
      </section>
    </div>
  </main>
HTML;

    include __DIR__ . '/INCLUDES/footer.php';

    echo "</body>\n</html>";
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    showFormResult(405, 'Submission not accepted', 'Submit this page using one of the website forms.', 'contact.php');
    exit;
}

$formType = postedString('formType');
$returnPage = $formType === 'join' ? 'explore.php' : 'contact.php';
$csrfToken = postedString('csrfToken');

if ($csrfToken === '' || !hash_equals($_SESSION['csrfToken'], $csrfToken)) {
    showFormResult(403, 'Please reload the form', 'This form session has expired or is invalid. Reload the page and submit the form again.', $returnPage);
    exit;
}

$errors = [];
$replyTo = '';
$recipient = '';
$subject = '';
$body = '';
$htmlBody = '';
$config = require __DIR__ . '/INCLUDES/mail-config.php';

if ($formType === 'contact') {
    $firstName = postedString('firstName');
    $lastName = postedString('lastName');
    $replyTo = postedString('email');
    $formSubject = postedString('subject');
    $message = postedString('message');
    $allowedSubjects = ['General Enquiry', 'Club Information', 'Suggest a Club', 'Website Feedback', 'Other'];

    if ($firstName === '' || strlen($firstName) > 100) {
        $errors[] = 'Enter a first name of 1 to 100 characters.';
    }
    if ($lastName === '' || strlen($lastName) > 100) {
        $errors[] = 'Enter a last name of 1 to 100 characters.';
    }
    if (!filter_var($replyTo, FILTER_VALIDATE_EMAIL) || strlen($replyTo) > 254) {
        $errors[] = 'Enter a valid email address.';
    }
    if (!in_array($formSubject, $allowedSubjects, true)) {
        $errors[] = 'Select a valid message subject.';
    }
    if ($message === '' || strlen($message) > 5000) {
        $errors[] = 'Enter a message of 1 to 5,000 characters.';
    }
    if (postedString('consent') !== 'yes') {
        $errors[] = 'Consent is required before emailing your details.';
    }

    $recipient = $config['contactRecipient'];
    $subject = 'MavutiHub contact enquiry';
    $body = "New MavutiHub contact enquiry\n\n"
        . "Name: {$firstName} {$lastName}\n"
        . "Reply-to email: {$replyTo}\n"
        . "Subject: {$formSubject}\n\n"
        . "Message:\n{$message}\n";
    $htmlBody = buildEmailHtml('Contact enquiry', [
        'Name' => "{$firstName} {$lastName}",
        'Reply-to email' => $replyTo,
        'Enquiry subject' => $formSubject,
    ], 'Message', $message);
} elseif ($formType === 'join') {
    $club = postedString('club');
    $title = postedString('title');
    $studentNumber = postedString('studentNumber');
    $firstName = postedString('firstName');
    $lastName = postedString('lastName');
    $replyTo = postedString('email');
    $phone = postedString('phone');
    $programme = postedString('programme');
    $yearOfStudy = postedString('yearOfStudy');
    $message = postedString('message');
    $allowedTitles = ['Mr', 'Ms', 'Mx', 'Dr', 'Prefer not to say'];
    $allowedYears = ['1', '2', '3', '4', 'Postgraduate', 'Other'];

    if (!isset($config['clubRecipients'][$club])) {
        $errors[] = 'Select a valid club.';
    }
    if (!in_array($title, $allowedTitles, true)) {
        $errors[] = 'Select a valid title.';
    }
    if (!preg_match('~^[A-Za-z0-9/-]{3,40}$~D', $studentNumber)) {
        $errors[] = 'Enter a valid student number.';
    }
    if ($firstName === '' || strlen($firstName) > 100) {
        $errors[] = 'Enter a first name of 1 to 100 characters.';
    }
    if ($lastName === '' || strlen($lastName) > 100) {
        $errors[] = 'Enter a last name of 1 to 100 characters.';
    }
    if (!filter_var($replyTo, FILTER_VALIDATE_EMAIL) || strlen($replyTo) > 254) {
        $errors[] = 'Enter a valid email address.';
    }
    if (!preg_match('/^[0-9+() -]{7,20}$/D', $phone)) {
        $errors[] = 'Enter a valid phone number.';
    }
    if ($programme === '' || strlen($programme) > 150) {
        $errors[] = 'Enter a faculty or programme of 1 to 150 characters.';
    }
    if (!in_array($yearOfStudy, $allowedYears, true)) {
        $errors[] = 'Select a valid year of study.';
    }
    if (strlen($message) > 2000) {
        $errors[] = 'The optional message must be no longer than 2,000 characters.';
    }
    if (postedString('consent') !== 'yes') {
        $errors[] = 'Consent is required before emailing your details.';
    }

    $recipient = $config['clubRecipients'][$club] ?? '';
    $subject = 'MavutiHub club membership request';
    $body = "New MavutiHub club membership request\n\n"
        . "Club: {$club}\n"
        . "Title: {$title}\n"
        . "Student number: {$studentNumber}\n"
        . "Name: {$firstName} {$lastName}\n"
        . "Reply-to email: {$replyTo}\n"
        . "Phone: {$phone}\n"
        . "Faculty / Programme: {$programme}\n"
        . "Year of study: {$yearOfStudy}\n\n"
        . "Why the student would like to join:\n{$message}\n";
    $htmlBody = buildEmailHtml('Club membership request', [
        'Club' => $club,
        'Title' => $title,
        'Student number' => $studentNumber,
        'Name' => "{$firstName} {$lastName}",
        'Reply-to email' => $replyTo,
        'Phone' => $phone,
        'Faculty / Programme' => $programme,
        'Year of study' => $yearOfStudy,
    ], 'Why they would like to join', $message !== '' ? $message : 'No additional message provided.');
} else {
    showFormResult(400, 'Submission not accepted', 'The submitted form type is not recognized.', 'contact.php');
    exit;
}

if ($errors !== []) {
    showFormResult(422, 'Please check your form', implode(' ', $errors), $returnPage);
    exit;
}

if (
    !filter_var($recipient, FILTER_VALIDATE_EMAIL)
    || !filter_var($config['fromAddress'], FILTER_VALIDATE_EMAIL)
    || !filter_var($config['smtpUsername'], FILTER_VALIDATE_EMAIL)
    || $config['smtpHost'] === ''
    || $config['smtpPort'] < 1
    || $config['smtpPort'] > 65535
    || $config['smtpPassword'] === ''
    || $config['fromAddress'] !== $config['smtpUsername']
) {
    error_log('MavutiHub form email could not be sent because its SMTP configuration is incomplete or invalid.');
    showFormResult(503, 'Email is not configured', 'The form email settings are incomplete or invalid. Configure the SMTP settings for the local PHP server, then try again.', $returnPage);
    exit;
}

try {
    $mailer = new PHPMailer(true);
    $mailer->isSMTP();
    $mailer->Host = $config['smtpHost'];
    $mailer->SMTPAuth = true;
    $mailer->Username = $config['smtpUsername'];
    $mailer->Password = str_replace(' ', '', $config['smtpPassword']);
    $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mailer->Port = $config['smtpPort'];
    $mailer->CharSet = PHPMailer::CHARSET_UTF8;
    $mailer->setFrom($config['fromAddress'], 'MavutiHub');
    $mailer->addAddress($recipient);
    $mailer->addReplyTo($replyTo);
    $mailer->Subject = $subject;
    $mailer->isHTML(true);
    $mailer->Body = $htmlBody;
    $mailer->AltBody = $body;
    $mailer->send();
} catch (MailerException $exception) {
    error_log('MavutiHub form email failed: ' . $exception->getMessage());
    showFormResult(503, 'Email could not be sent', 'The SMTP service did not accept this message. Check the SMTP account settings and try again.', $returnPage);
    exit;
}

showFormResult(200, 'Submission sent', 'Your message was accepted by the SMTP service for delivery. Check the destination inbox, including its spam folder.', $returnPage);

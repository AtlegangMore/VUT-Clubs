<?php
$testInbox = getenv('MAVUTIHUB_FORM_RECIPIENT') ?: '224158678@edu.vut.ac.za';
$smtpUsername = getenv('MAVUTIHUB_SMTP_USERNAME') ?: '';
$smtpPort = filter_var(getenv('MAVUTIHUB_SMTP_PORT') ?: '587', FILTER_VALIDATE_INT);

return [
    'smtpHost' => getenv('MAVUTIHUB_SMTP_HOST') ?: 'smtp.gmail.com',
    'smtpPort' => $smtpPort === false ? 587 : $smtpPort,
    'smtpUsername' => $smtpUsername,
    'smtpPassword' => getenv('MAVUTIHUB_SMTP_PASSWORD') ?: '',
    'fromAddress' => getenv('MAVUTIHUB_MAIL_FROM') ?: $smtpUsername,
    'contactRecipient' => $testInbox,
    'clubRecipients' => [
        'Tech Collective' => $testInbox,
        'Innovation & Entrepreneurship' => $testInbox,
        'Basotho Cultural Society' => $testInbox,
        'Tsonga VUT Society' => $testInbox,
        'Zulu Cultural Society' => $testInbox,
        'Queer Student Association' => $testInbox,
        'Community Outreach Club' => $testInbox,
        'Soccer Club' => $testInbox,
        'Rugby Club' => $testInbox,
        'Netball Club' => $testInbox,
        'Hockey Club' => $testInbox,
        'Campus Choir' => $testInbox,
        'Dance Society' => $testInbox,
        'Fashion & Creative Arts' => $testInbox,
        'Academic Development Society' => $testInbox,
        'Engineering Society' => $testInbox,
        'Student Life Community' => $testInbox,
    ],
];

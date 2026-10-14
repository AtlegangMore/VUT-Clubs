$names = @(
    'MAVUTIHUB_SMTP_HOST',
    'MAVUTIHUB_SMTP_PORT',
    'MAVUTIHUB_SMTP_USERNAME',
    'MAVUTIHUB_MAIL_FROM',
    'MAVUTIHUB_FORM_RECIPIENT',
    'MAVUTIHUB_SMTP_PASSWORD'
)
foreach ($name in $names) {
    $value = [Environment]::GetEnvironmentVariable($name, 'Process')
    '{0}: {1}' -f $name, $(if ([string]::IsNullOrWhiteSpace($value)) { 'MISSING' } else { 'set' })
}
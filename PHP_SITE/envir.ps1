Set-Location Read-Host 'Enter the path to the directory where you want to store the environment variables'
$env:MAVUTIHUB_SMTP_HOST = 'smtp.gmail.com'
$env:MAVUTIHUB_SMTP_PORT = '587'
$env:MAVUTIHUB_SMTP_USERNAME = Read-Host 'Enter your Gmail username (without @gmail.com)'
$env:MAVUTIHUB_MAIL_FROM = Read-Host 'Enter your Gmail address (with @gmail.com, this will be the "from" address for emails sent from the form)'
$env:MAVUTIHUB_FORM_RECIPIENT = Read-Host 'Enter the email address that should receive form submissions (this can be any email address, not necessarily a Gmail address)'

$securePassword = Read-Host 'Enter your new Gmail app password(from https://myaccount.google.com/apppasswords DO NOT USE SPACE)' -AsSecureString
$passwordPointer = [Runtime.InteropServices.Marshal]::SecureStringToBSTR($securePassword)
try {
    $env:MAVUTIHUB_SMTP_PASSWORD = [Runtime.InteropServices.Marshal]::PtrToStringBSTR($passwordPointer)
} finally {
    [Runtime.InteropServices.Marshal]::ZeroFreeBSTR($passwordPointer)
}
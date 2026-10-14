$env:MAVUTIHUB_SMTP_HOST = 'smtp.gmail.com'
$env:MAVUTIHUB_SMTP_PORT = '587'
$env:MAVUTIHUB_SMTP_USERNAME = 'maxfire745@gmail.com'
$env:MAVUTIHUB_MAIL_FROM = 'maxfire745@gmail.com'
$env:MAVUTIHUB_FORM_RECIPIENT = '224158678@edu.vut.ac.za'

$securePassword = Read-Host 'Enter your new Gmail app password' -AsSecureString
$passwordPointer = [Runtime.InteropServices.Marshal]::SecureStringToBSTR($securePassword)
try {
    $env:MAVUTIHUB_SMTP_PASSWORD = [Runtime.InteropServices.Marshal]::PtrToStringBSTR($passwordPointer)
} finally {
    [Runtime.InteropServices.Marshal]::ZeroFreeBSTR($passwordPointer)
}
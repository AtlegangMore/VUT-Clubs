# MavutiHub — PHP Implementation

This directory is a separate PHP version of the MavutiHub student-communities website. It keeps the original HTML version in the parent folder unchanged. PHP is used to share common page components and to process Contact and Join Club form submissions on the server.

## How PHP is used

- The pages use `.php` files so they can include reusable navigation and footer components from `INCLUDES/`.
- `INCLUDES/form-security.php` starts a session and creates a CSRF token. The forms include the token, and `submit.php` checks it before accepting a POST request.
- `submit.php` validates submitted fields on the server, checks that the selected club is supported, and chooses the recipient using the server-side map in `INCLUDES/mail-config.php`.
- `submit.php` builds a branded HTML email and a plain-text alternative. User-provided values are escaped before being inserted into the HTML email.
- Form submissions are emailed; the website does not save them to a database.

## Email transport

PHPMailer, installed through Composer, creates and sends the messages using SMTP. The current Gmail setup uses `smtp.gmail.com` on port `587` with STARTTLS authentication. The sender username, sender address, password, and optional recipient override are read from process environment variables by `INCLUDES/mail-config.php`, not hard-coded as credentials in the PHP source.

For local testing, the recipient defaults to a VUT test inbox and club requests currently share that destination. Change the recipient environment variable for testing, or update `clubRecipients` in `INCLUDES/mail-config.php` when official club email addresses are available.

SMTP credentials are not included in this project. Configure a suitable account and app password privately on the machine running PHP; never commit or share the password. A successful response means the SMTP server accepted the message for delivery, not that it has reached the recipient’s inbox.

## Run locally

Install the Composer dependency, then start PHP’s built-in development server from this directory:

```powershell
composer install
php -S localhost:8000 -t .
```

Open `http://localhost:8000/`. Before testing email, set `MAVUTIHUB_SMTP_USERNAME`, `MAVUTIHUB_MAIL_FROM`, and `MAVUTIHUB_SMTP_PASSWORD` in the same PowerShell session that starts the server. The password should be entered securely at the command prompt and must not be placed in this README or source files.

## Main files

- `index.php`, `explore.php`, `about.php`, `contact.php` — PHP pages for the site.
- `INCLUDES/` — shared navigation, footer, form security, and mail configuration.
- `submit.php` — server-side form validation and email delivery.
- `CSS/`, `JS/`, `IMAGES/` — presentation, browser interactions, and site assets.
- `composer.json` and `composer.lock` — PHP dependency declarations and locked versions.

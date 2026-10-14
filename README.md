# MavutiHub — VUT Student Communities

MavutiHub is a student-club website concept for Vaal University of Technology (VUT). It helps students discover campus communities, learn about student life, and find ways to contact or join clubs.

This folder contains the **static HTML version** of the website. A separate PHP implementation is in [`PHP_SITE`](./PHP_SITE/README.md).

## Main pages and features

- **Home (`index.html`):** introduces the site and highlights student communities. The hero message alternates between English and Sesotho every 15 seconds. A responsive embedded video presents the VUT Vice-Chancellor and Principal’s 2026 welcome address.
- **Explore (`explore.html`):** presents student clubs and lets visitors browse the available communities.
- **About (`about.html`):** explains the website and its purpose.
- **Contact (`contact.html`):** provides a demonstration contact form.

The pages are built with HTML, styled with CSS in `CSS/`, and use JavaScript in `JS/` for interactive behaviour such as mobile navigation, filtering, animations, and the rotating hero message. Images and other website assets are stored in `IMAGES/`.

## Run the HTML version

Open the project through a local web server rather than opening the HTML file directly. For example, with PHP installed, run this from the project folder:

```powershell
php -S localhost:8001 -t .
```

Then visit `http://localhost:8001/`. Serving the site over HTTP is important for features such as the embedded YouTube video. The site can also be hosted as a static website, for example with GitHub Pages.

## Demonstration forms

The forms in this HTML version are front-end demonstrations. JavaScript performs browser-side validity checks and displays a confirmation, but it does **not** send or store submissions. For server-side form processing and SMTP email delivery, see the PHP implementation’s README.

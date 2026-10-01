# Catwees 2026 WordPress theme

This is a first-pass conversion of the static `index.html` design into a WordPress theme.

## Install

1. Copy the `catwees-2026` folder into `wp-content/themes/`.
2. In WordPress admin, go to Appearance -> Themes.
3. Activate `Catwees 2026`.
4. Set the homepage to use the front page if WordPress does not pick it automatically.

## What this pass does

- Moves the original inline CSS into `style.css`.
- Moves the original inline JavaScript into `assets/js/app.js`.
- Copies local image assets into `assets/images`.
- Converts local image URLs to WordPress theme asset URLs.
- Adds a minimal `functions.php`, `header.php`, `footer.php`, `front-page.php`, and fallback `index.php`.

## What still needs a second pass

- Replace static page sections with WordPress fields or ACF blocks.
- Connect Contact Form 7 or another form handler.
- Connect used-car inventory / Auto24 feed.
- Add WPML translation handling for editable fields.
- Replace static navigation with a WordPress menu or keep this custom single-page router intentionally.

# NOVA storefront

NOVA is a PHP 8 storefront for Apache with MySQL-backed customer accounts. Product browsing, cart, wishlist, and the demo checkout continue to use the existing vanilla JavaScript and browser storage. Sign-up and login use MySQL, `password_hash()`, prepared PDO statements, and PHP sessions.

## Run with XAMPP

1. Start Apache and MySQL from the XAMPP Control Panel.
2. Import `database/schema.sql` using phpMyAdmin at `http://localhost/phpmyadmin`, or run `C:\xampp\mysql\bin\mysql.exe -u root < database\schema.sql` from the project directory. The schema creates the `nova` database and its `users` table.
3. Open `http://localhost/nova/`. In this workspace, the `C:\xampp\htdocs\nova` junction serves the live project directory. For another machine, place the project under Apache's document root or configure an Apache alias/virtual host to this directory.

The default database settings match a fresh local XAMPP install (`127.0.0.1`, port `3306`, database `nova`, user `root`, blank password). Override them for a different or production database with `NOVA_DB_HOST`, `NOVA_DB_PORT`, `NOVA_DB_NAME`, `NOVA_DB_USER`, and `NOVA_DB_PASSWORD` in Apache's environment.

## Accounts

- Create accounts at `signup.php`; passwords must have at least 10 characters.
- Sign in at `login.php`; use `My account` in the navigation to view the signed-in account or log out.
- Logout is a CSRF-protected POST action. Passwords are never stored in plain text.
- The checkout remains a front-end demo and does not process payments.

The `.htaccess` file sets `index.php` as the directory index, disables directory listings, and maps legacy `.html` links to the PHP routes. Apache must allow `.htaccess` overrides and have `mod_rewrite` enabled.
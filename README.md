# ITSEBA Laravel starter

This repository contains a scaffold for the ITSEBA Laravel site (public pages + Admin CRUD). It is intended to be installed on a server with SSH & Composer available.

Key points:
- This repo intentionally excludes vendor/ and node_modules/.
- Run the setup script on the server to create a fresh Laravel project and copy the scaffold into it.

Quick install (on server with SSH & Composer):

1. Upload the repository ZIP or clone it:
   git clone https://github.com/ITDEBA/itseba.git
   cd itseba

2. Make the setup script executable and run it (it will create a fresh Laravel project in ./app and copy scaffold files):
   chmod +x setup.sh
   ./setup.sh

3. Enter the created project folder and continue:
   cd app
   cp .env.example .env
   # Edit .env to set DB credentials (or use the provided .env.example defaults)
   composer install
   php artisan key:generate
   php artisan migrate --seed
   php artisan storage:link
   npm install && npm run build  # optional

4. Set your web server document root to the project's public/ directory (or move public contents to public_html according to cPanel setup).

If you prefer manual installation (without running setup.sh), follow the README details below.

#!/usr/bin/env bash
set -e

# setup.sh - Create a fresh Laravel project and copy scaffold files into it.
# Usage: chmod +x setup.sh && ./setup.sh

TARGET_DIR="app"
LARAVEL_PACKAGE="laravel/laravel"

echo "Creating Laravel project in ./$TARGET_DIR (this may take a few minutes)..."
if [ -d "$TARGET_DIR" ]; then
  echo "Target directory $TARGET_DIR already exists. Aborting to avoid overwrite." 
  exit 1
fi

composer create-project $LARAVEL_PACKAGE $TARGET_DIR --prefer-dist --no-progress

echo "Copying scaffold files into project..."
# Copy scaffold subfolders into target project
rsync -av --exclude='vendor' --exclude='node_modules' scaffold/ $TARGET_DIR/

echo "Done. Now edit $TARGET_DIR/.env (DB credentials, APP_URL if needed), then run:
  cd $TARGET_DIR
  composer install
  php artisan key:generate
  php artisan migrate --seed
  php artisan storage:link
  npm install && npm run build (optional)
"

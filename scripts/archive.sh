#!/bin/bash

rootPath=$(dirname "$(dirname "$0")")
distDir="$rootPath/dist"

if [ ! -d "$distDir" ]; then
  mkdir "$distDir"
fi

output="$rootPath/dist/ridge.zip"

zip -r -9 "$output" \
  "$rootPath/assets" \
  "$rootPath/parts" \
  "$rootPath/patterns" \
  "$rootPath/templates" \
  "$rootPath/functions.php" \
  "$rootPath/LICENSE" \
  "$rootPath/README.md" \
  "$rootPath/screenshot.png" \
  "$rootPath/style.css" \
  "$rootPath/theme.json" \
  > /dev/null

archiveSize="$(du -h "$output" | cut -f1) total bytes"

echo "[info] Theme archive created successfully. ($archiveSize)"

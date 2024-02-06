#!/bin/bash

downloadsFolder="$HOME/Downloads"
zipFilePath="$downloadsFolder/ridge.zip"
destinationPath=$(pwd)

# Check if the archive file exists
if [ ! -f "$zipFilePath" ]; then
  echo "Archive file not found in the Downloads folder."
  exit 1
fi

# Extract all files from the archive
unzip -o "$zipFilePath" -d "$destinationPath" > /dev/null

# Remove the archive file
rm "$zipFilePath"

echo "[info] Theme imported successfully."

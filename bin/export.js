const fs = require("fs");
const path = require("path");
const AdmZip = require("adm-zip");

const downloadsFolder = path.join(require("os").homedir(), "Downloads");
const zipFilePath = path.join(downloadsFolder, "ridge.zip");
const destinationPath = process.cwd();

// Check if the archive file exists
if (!fs.existsSync(zipFilePath)) {
  console.error("Archive file not found in the Downloads folder.");
  process.exit(1);
}

// Create a new instance of AdmZip
const zip = new AdmZip(zipFilePath);

try {
  // Extract all files from the archive
  zip.extractAllTo(destinationPath, true);

  // Remove the archive file
  fs.unlink(zipFilePath, (error) => {
    if (error) {
      console.error("Error removing the ZIP file:", error);
    } else {
      console.log("Archive file removed successfully.");
    }
  });
  console.log("Archive extracted successfully.");
} catch (error) {
  console.error("Error extracting the archive:", error);
}

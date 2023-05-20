const archiver = require("archiver");
const fs = require("fs");
const { join, relative, resolve } = require("path");

const rootPath = resolve(__dirname + "/..");
const distDir = join(rootPath, "/dist");

if (!fs.existsSync(distDir)) {
  fs.mkdirSync(distDir);
}

const output = fs.createWriteStream(join(rootPath, "/dist/ridge.zip"));
const archive = archiver("zip", {
  zlib: { level: 9 },
});

output.on("close", function () {
  console.log(archive.pointer() + " total bytes");
  console.log("Theme ZIP file has been created successfully.");
});

archive.on("warning", function (err) {
  if (err.code === "ENOENT") {
    console.log('Warning: "' + err.path + '" does not exist');
  } else {
    // throw error
    throw err;
  }
});

archive.on("error", function (err) {
  throw err;
});

archive.pipe(output);

archive.directory(join(rootPath, "parts/"), "parts");
archive.directory(join(rootPath, "scripts/"), "scripts");
archive.directory(join(rootPath, "templates/"), "templates");
archive.file(join(rootPath, "functions.php"), { name: "functions.php" });
archive.file(join(rootPath, "LICENSE"), { name: "LICENSE" });
archive.file(join(rootPath, "README.md"), { name: "README.md" });
archive.file(join(rootPath, "style.css"), { name: "style.css" });
archive.file(join(rootPath, "theme.json"), { name: "theme.json" });

archive.finalize();

const fs = require("fs");
const path = require("path");

const BLOB_PATH = "catwees/teated-store.json";
const LOCAL_PATH = path.join(__dirname, "..", "..", "data", "teated-store.json");

function filePath() {
  if (process.env.VERCEL) return path.join("/tmp", "catwees-teated-store.json");
  return LOCAL_PATH;
}

function readFileStore() {
  try {
    return JSON.parse(fs.readFileSync(filePath(), "utf8"));
  } catch (err) {
    return {};
  }
}

function writeFileStore(data) {
  const target = filePath();
  fs.mkdirSync(path.dirname(target), { recursive: true });
  fs.writeFileSync(target, JSON.stringify(data));
}

async function readBlob() {
  const { get } = require("@vercel/blob");
  try {
    const result = await get(BLOB_PATH, { access: "private" });
    if (!result || !result.stream) return {};
    return JSON.parse(await new Response(result.stream).text());
  } catch (err) {
    const missing = err && (err.statusCode === 404 || /not found|does not exist|BlobNotFound/i.test(String(err.message || err.name || "")));
    if (missing) return {};
    throw err;
  }
}

async function writeBlob(data) {
  const { put } = require("@vercel/blob");
  await put(BLOB_PATH, JSON.stringify(data), {
    access: "private",
    addRandomSuffix: false,
    allowOverwrite: true,
    contentType: "application/json"
  });
}

function useBlob() {
  return Boolean(process.env.BLOB_READ_WRITE_TOKEN);
}

async function readAll() {
  if (useBlob()) return readBlob();
  return readFileStore();
}

async function readStore(key, fallback) {
  const all = await readAll();
  return Object.prototype.hasOwnProperty.call(all, key) ? all[key] : fallback;
}

async function writeStore(key, value) {
  const all = await readAll();
  all[key] = value;
  if (useBlob()) await writeBlob(all);
  else writeFileStore(all);
}

module.exports = { readStore, writeStore };

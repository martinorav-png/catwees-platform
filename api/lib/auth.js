const crypto = require("crypto");

function authorized(req) {
  const expected = process.env.TEADE_SECRET || "";
  const header = req.headers["x-catwees-key"];
  const got = Array.isArray(header) ? header[0] : header;
  if (!expected || !got) return false;
  const a = Buffer.from(expected);
  const b = Buffer.from(String(got));
  if (a.length !== b.length) return false;
  return crypto.timingSafeEqual(a, b);
}

module.exports = { authorized };

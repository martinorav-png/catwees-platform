const { listNotices, cleanNotice } = require("./lib/teated");
const { readStore, writeStore } = require("./lib/store");
const { pushNotice } = require("./lib/send");
const { authorized } = require("./lib/auth");

module.exports = async function handler(req, res) {
  try {
    if (req.method === "GET") {
      const extra = await readStore("extra-notices", []);
      res.setHeader("Cache-Control", "no-store");
      res.status(200).json({ notices: listNotices(extra) });
      return;
    }
    if (req.method === "POST") {
      if (!authorized(req)) {
        res.status(401).json({ error: "unauthorized" });
        return;
      }
      const notice = cleanNotice(req.body);
      if (!notice) {
        res.status(400).json({ error: "invalid" });
        return;
      }
      const extra = await readStore("extra-notices", []);
      const notices = listNotices([notice].concat(extra));
      const subs = await readStore("subscriptions", []);
      const result = await pushNotice(notice, notices, subs);
      extra.unshift(notice);
      await writeStore("extra-notices", extra.slice(0, 50));
      if (result.removed) await writeStore("subscriptions", result.kept);
      res.setHeader("Cache-Control", "no-store");
      res.status(201).json({ notice: notice, sent: result.sent });
      return;
    }
    res.setHeader("Allow", "GET, POST");
    res.status(405).end();
  } catch (err) {
    res.status(500).json({ error: "store" });
  }
};

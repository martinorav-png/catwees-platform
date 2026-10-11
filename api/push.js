const { readStore, writeStore } = require("./lib/store");

function cleanSubscription(body) {
  const sub = body && body.subscription;
  if (!sub || typeof sub.endpoint !== "string" || !sub.keys) return null;
  const p256dh = sub.keys.p256dh;
  const auth = sub.keys.auth;
  if (typeof p256dh !== "string" || typeof auth !== "string") return null;
  if (!sub.endpoint.startsWith("https://")) return null;
  const seen = Array.isArray(body.seen) ? body.seen.filter((item) => typeof item === "string").slice(0, 200) : [];
  return {
    endpoint: sub.endpoint.slice(0, 2000),
    keys: { p256dh: p256dh.slice(0, 200), auth: auth.slice(0, 200) },
    signedIn: Boolean(body.signedIn),
    seen: seen
  };
}

module.exports = async function handler(req, res) {
  if (req.method !== "POST") {
    res.setHeader("Allow", "POST");
    res.status(405).end();
    return;
  }
  try {
    const next = cleanSubscription(req.body);
    if (!next) {
      res.status(400).json({ error: "invalid" });
      return;
    }
    const subs = await readStore("subscriptions", []);
    const index = subs.findIndex((item) => item && item.endpoint === next.endpoint);
    if (index >= 0) subs[index] = next;
    else subs.push(next);
    await writeStore("subscriptions", subs.slice(-500));
    res.status(204).end();
  } catch (err) {
    res.status(500).json({ error: "store" });
  }
};

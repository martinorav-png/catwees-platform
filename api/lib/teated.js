const base = require("./base-notices.json");

const CUTOFF = "2026-07-30";

function noticeId(item) {
  return item.id || (item.iso + "|" + item.title);
}

function isRecent(iso) {
  return typeof iso === "string" && iso >= CUTOFF;
}

function listNotices(extra) {
  const merged = [];
  const seen = new Set();
  const all = (Array.isArray(extra) ? extra : []).concat(base);
  for (const item of all) {
    if (!item || typeof item.iso !== "string" || typeof item.title !== "string") continue;
    const id = noticeId(item);
    if (seen.has(id)) continue;
    seen.add(id);
    merged.push(item);
  }
  return merged;
}

function unreadFor(notices, sub) {
  const seen = new Set(Array.isArray(sub.seen) ? sub.seen : []);
  const signedIn = Boolean(sub.signedIn);
  return notices
    .filter((item) => {
      if (!signedIn && item.personal) return false;
      if (!isRecent(item.iso)) return false;
      return !seen.has(noticeId(item));
    })
    .sort((a, b) => (a.iso < b.iso ? 1 : a.iso > b.iso ? -1 : 0));
}

function cleanNotice(body) {
  if (!body || typeof body !== "object") return null;
  const title = String(body.title || "").trim().slice(0, 120);
  const text = String(body.body || "").trim().slice(0, 400);
  if (!title || !text) return null;
  const iso = /^\d{4}-\d{2}-\d{2}$/.test(body.iso) ? body.iso : new Date().toISOString().slice(0, 10);
  const href = /^[a-z0-9.-]+\.html(\?n=4)?$/.test(body.href) ? body.href : "teated.html?n=4";
  const act = String(body.act || "Teated").trim().slice(0, 40) || "Teated";
  return {
    id: "live-" + Date.now().toString(36) + "-" + Math.random().toString(36).slice(2, 8),
    iso: iso,
    personal: Boolean(body.personal),
    title: title,
    body: text,
    href: href,
    act: act
  };
}

module.exports = { noticeId, isRecent, listNotices, unreadFor, cleanNotice };

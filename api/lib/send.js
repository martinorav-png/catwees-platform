const webpush = require("web-push");
const { unreadFor } = require("./teated");

function configured() {
  return Boolean(process.env.VAPID_PUBLIC_KEY && process.env.VAPID_PRIVATE_KEY);
}

function payloadFor(notice, unread) {
  return JSON.stringify({
    title: notice.title,
    body: notice.body,
    url: notice.href || "teated.html?n=4",
    unread: unread.length,
    unreadIds: unread.map((item) => item.id || (item.iso + "|" + item.title))
  });
}

async function pushNotice(notice, notices, subs) {
  if (!configured()) return { sent: 0, removed: 0 };
  webpush.setVapidDetails(
    process.env.VAPID_SUBJECT || "mailto:tallinn@catwees.ee",
    process.env.VAPID_PUBLIC_KEY,
    process.env.VAPID_PRIVATE_KEY
  );
  const kept = [];
  let sent = 0;
  for (const sub of subs) {
    if (!sub || !sub.endpoint || !sub.keys) continue;
    if (notice.personal && !sub.signedIn) {
      kept.push(sub);
      continue;
    }
    const unread = unreadFor(notices, sub);
    try {
      await webpush.sendNotification(
        { endpoint: sub.endpoint, keys: sub.keys },
        payloadFor(notice, unread),
        { TTL: 60 * 60 * 12 }
      );
      sent += 1;
      kept.push(sub);
    } catch (err) {
      const status = err && err.statusCode;
      if (status !== 404 && status !== 410) kept.push(sub);
    }
  }
  return { sent: sent, removed: subs.length - kept.length, kept: kept };
}

module.exports = { pushNotice, configured };

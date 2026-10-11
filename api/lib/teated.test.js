const test = require("node:test");
const assert = require("node:assert/strict");
const { listNotices, unreadFor, cleanNotice, noticeId } = require("./teated");

test("guest unread count skips personal and old notices", () => {
  const notices = listNotices([]);
  const unread = unreadFor(notices, { signedIn: false, seen: [] });
  assert.equal(unread.length, 3);
  assert.equal(unread[0].title, "Teenindus on avatud");
});

test("signed-in unread count includes personal notices", () => {
  const unread = unreadFor(listNotices([]), { signedIn: true, seen: [] });
  assert.equal(unread.length, 6);
});

test("seen ids drop out of the unread count", () => {
  const notices = listNotices([]);
  const seen = notices.filter((item) => !item.personal).map(noticeId);
  const unread = unreadFor(notices, { signedIn: true, seen: seen });
  assert.equal(unread.length, 3);
  assert.ok(unread.every((item) => item.personal));
});

test("a published notice is unread for a phone that has read the samples", () => {
  const samples = listNotices([]);
  const fresh = cleanNotice({ title: "Rehvid on kohal", body: "Talverehvid ootavad Tallinnas.", personal: false });
  const notices = listNotices([fresh]);
  const unread = unreadFor(notices, { signedIn: false, seen: samples.map(noticeId) });
  assert.equal(unread.length, 1);
  assert.equal(unread[0].title, "Rehvid on kohal");
});

test("cleanNotice rejects an empty teade", () => {
  assert.equal(cleanNotice({ title: "  ", body: "tekst" }), null);
});

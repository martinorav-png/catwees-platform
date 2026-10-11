function badgeCount(count) {
  if (!self.navigator.setAppBadge) return Promise.resolve();
  const next = Number(count) || 0;
  if (next > 0) return self.navigator.setAppBadge(next).catch(() => {});
  if (!self.navigator.clearAppBadge) return Promise.resolve();
  return self.navigator.clearAppBadge().catch(() => {});
}

self.addEventListener("install", () => {
  self.skipWaiting();
});

self.addEventListener("activate", (event) => {
  event.waitUntil(self.clients.claim());
});

self.addEventListener("message", (event) => {
  const data = event.data || {};
  if (data.type === "badge") event.waitUntil(badgeCount(data.count));
});

self.addEventListener("push", (event) => {
  let payload = {};
  try {
    payload = event.data ? event.data.json() : {};
  } catch (err) {
    payload = {};
  }
  const title = payload.title || "Catwees";
  const unread = Number(payload.unread) || 0;
  const target = new URL(payload.url || "teated.html?n=4", self.registration.scope).href;
  event.waitUntil(Promise.all([
    self.registration.showNotification(title, {
      body: payload.body || "",
      icon: new URL("assets/icon-192.png", self.registration.scope).href,
      tag: "catwees-teated",
      data: { url: target }
    }),
    badgeCount(unread)
  ]));
});

self.addEventListener("notificationclick", (event) => {
  event.notification.close();
  const target = (event.notification.data && event.notification.data.url)
    || new URL("teated.html?n=4", self.registration.scope).href;
  event.waitUntil((async () => {
    const open = await self.clients.matchAll({ type: "window", includeUncontrolled: true });
    for (const client of open) {
      if ("navigate" in client) {
        try { await client.navigate(target); } catch (err) {}
      }
      if ("focus" in client) return client.focus();
    }
    if (self.clients.openWindow) return self.clients.openWindow(target);
  })());
});

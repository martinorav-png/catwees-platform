module.exports = function handler(req, res) {
  if (req.method !== "GET") {
    res.setHeader("Allow", "GET");
    res.status(405).end();
    return;
  }
  const publicKey = process.env.VAPID_PUBLIC_KEY || "";
  res.setHeader("Cache-Control", "no-store");
  if (!publicKey) {
    res.status(404).json({ publicKey: "" });
    return;
  }
  res.status(200).json({ publicKey: publicKey });
};

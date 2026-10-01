"""Local preview server. Sends no-store so the browser cannot keep an old page."""
import json
import os
from http.server import SimpleHTTPRequestHandler, ThreadingHTTPServer

WHEELS = os.path.join(os.path.dirname(os.path.abspath(__file__)), "assets", "wheels.json")


class Handler(SimpleHTTPRequestHandler):
    def end_headers(self):
        self.send_header("Cache-Control", "no-store")
        super().end_headers()

    def do_POST(self):
        path = self.path.split("?", 1)[0]
        if path != "/mockup/assets/wheels.json":
            self.send_error(404)
            return
        length = int(self.headers.get("Content-Length", "0"))
        raw = self.rfile.read(length)
        try:
            data = json.loads(raw.decode("utf-8"))
        except (UnicodeDecodeError, json.JSONDecodeError):
            self.send_error(400, "Expected JSON")
            return
        if not isinstance(data, dict):
            self.send_error(400, "Expected an object")
            return
        os.makedirs(os.path.dirname(WHEELS), exist_ok=True)
        with open(WHEELS, "w", encoding="utf-8") as handle:
            json.dump(data, handle, indent=2)
            handle.write("\n")
        self.send_response(204)
        self.end_headers()


if __name__ == "__main__":
    ThreadingHTTPServer(("127.0.0.1", 8765), Handler).serve_forever()

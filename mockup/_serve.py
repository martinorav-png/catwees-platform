"""Local preview server. Sends no-store so the browser cannot keep an old page."""
import json
import os
import urllib.request
from http.server import SimpleHTTPRequestHandler, ThreadingHTTPServer

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
WHEELS = os.path.join(os.path.dirname(os.path.abspath(__file__)), "assets", "wheels.json")
ASK = "/mockup/api/ask"
REFUSAL = "Vabandust, ma oskan vastata ainult Honda kohta käivatele küsimustele."
MODEL_URL = "https://text.pollinations.ai/openai"

SYSTEM = """Sa oled Catweesi nõuandja. Vasta eesti keeles kahe kuni nelja lausega.
Kasuta ainult etteantud fakti. Ära lisa nuppe, külgi ega samme, mida faktis ei ole.
Kui keegi on viga saanud, alusta lausega: Helista 112.
"""

HONDA_WORDS = (
    "honda", "catwees", "cr-v", "crv", "hr-v", "hrv", "zr-v", "zrv", "civic",
    "jazz", "prelude", "crosstar", "accord", "auto", "rehv", "kütus", "kutus",
    "paak", "luuk", "peegel", "hooldus", "teenindus", "avarii", "klaas", "aku",
    "hübriid", "hubriid", "rool", "mootor", "õli", "tuli", "kindlustus",
    "proovisõit", "proovisoit", "tagasiost", "registreerim", "esindus"
)

UNSURE = "Seda täpset juhist mul siin ei ole. Helista Catweesi teenindusse, Tallinn 6 503 320 või Tartu 7 300 383."

FACTS = (
    (("kütus", "kutus", "paak", "luuk", "tank"), ("vasakul", "avaja"),
     "CR-V Hybridil on kütusepaagi luuk auto vasakul küljel taga. Seiska jõuallikas ja tõmba luugi avaja, mis on juhi poole armatuuri alumises välisnurgas. Keera kork aeglaselt lahti. Pärast tankimist keera kork kinni, kuni kuuled klõpsu, ja sulge luuk käega."),
    (("peegl",), ("kokkuklapp", "lukustusnuppu"),
     "Kui toide on sees, on juhiuksel peeglilüliti: L/R valib poole ja suunalüliti liigutab peeglit. Kokkuklappimise nupp on samal lülitil. Puldiga vajuta lukustusnuppu kaks korda 10 sekundi jooksul ja hoia, kuni peeglid hakkavad kokku minema."),
    (("autoabi", "teeabi"), ("6 503 320", "nuppu"),
     "Honda autoabi nupu täpset kohta selle mudeli kohta siin ei ole. Kui nuppu ei leia või kõne ei lähe läbi, helista Catweesi teenindusse: Tallinn 6 503 320, Tartu 7 300 383."),
    (("rehv", "rõhk"), ("sildil", "rehvimõõd"),
     "Rehvirõhk on kirjas juhiukse sildil ja kasutusjuhendis. Number sõltub rehvimõõdust, seepärast seda siin ei oletata."),
    (("õli", "hooldus"), ("indikaator", "broneeri"),
     "Hooldusvälba näitab auto hooldusindikaator. Kui indikaator põleb või tähtaeg on käes, broneeri aeg Catweesi teenindusse."),
    (("tuli", "hoiatus"), ("punane", "kollase"),
     "Punane hoiatustuli tähendab peatuda ohutus kohas ja helistada teenindusse. Kollase tulega saab üldjuhul teenindusse sõita."),
    (("klaas", "pragu", "kivi"), ("pildista", "vaate"),
     "Pildista pragu ja registreerimismärk päevavalguses. Kui pragu varjab vaate, ära sõida edasi. Broneeri aeg Teeninduses."),
    (("avarii", "kokkupõrge", "õnnetus"), ("ohutuled", "112"),
     "Peatu ohutus kohas ja lülita ohutuled. Kui keegi on viga saanud, helista 112. Pildista autod ja teekate. Ära tunnista süüd sündmuskohal, siis helista Catweesi."),
    (("hind", "maksab", "hindad"), ("22 900", "43 900"),
     "Avaldatud alghinnad: Jazz Hybrid 22 900 €, Crosstar Hybrid 24 900 €, HR-V Hybrid 28 900 €, Civic Hybrid 32 900 €, ZR-V Hybrid 36 900 €, CR-V Hybrid 43 900 €, Prelude 49 900 €."),
    (("telefon", "number", "lahti", "kontakt", "esindus"), ("6 503 320", "8:00"),
     "Catweesi teenindus on lahti esmaspäevast reedeni 8:00–18:00. Tallinn 6 503 320, tallinn@catwees.ee. Tartu 7 300 383, tartu@catwees.ee."),
)

BLOCK_WORDS = ("varasta", "immobil", "lõhu lukk", "lohu lukk", "mööda lukust", "mooda lukust")


class Handler(SimpleHTTPRequestHandler):
    def end_headers(self):
        self.send_header("Cache-Control", "no-store")
        super().end_headers()

    def do_POST(self):
        path = self.path.split("?", 1)[0]
        if path == ASK:
            self.handle_ask()
            return
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

    def handle_ask(self):
        length = int(self.headers.get("Content-Length", "0"))
        if length <= 0 or length > 32000:
            self.send_error(400, "Bad body")
            return
        try:
            data = json.loads(self.rfile.read(length).decode("utf-8"))
        except (UnicodeDecodeError, json.JSONDecodeError):
            self.send_error(400, "Expected JSON")
            return
        raw = data.get("messages") if isinstance(data, dict) else None
        if not isinstance(raw, list) or not raw:
            self.send_error(400, "Expected messages")
            return
        messages = []
        for item in raw[-8:]:
            if not isinstance(item, dict):
                continue
            role = item.get("role")
            content = item.get("content")
            if role not in ("user", "assistant") or not isinstance(content, str):
                continue
            text = content.strip()
            if text:
                messages.append({"role": role, "content": text[:2000]})
        if not messages or messages[-1]["role"] != "user":
            self.send_error(400, "Expected a question")
            return
        question = messages[-1]["content"].lower()
        if any(word in question for word in BLOCK_WORDS) or not any(word in question for word in HONDA_WORDS):
            body = json.dumps({"answer": REFUSAL}, ensure_ascii=False).encode("utf-8")
            self.send_response(200)
            self.send_header("Content-Type", "application/json; charset=utf-8")
            self.send_header("Content-Length", str(len(body)))
            self.end_headers()
            self.wfile.write(body)
            return
        car = data.get("car") if isinstance(data, dict) else ""
        car_line = car.strip()[:180] if isinstance(car, str) else ""
        scope = question + " " + car_line.lower()
        fact = None
        for words, anchors, text in FACTS:
            if not any(word in question for word in words):
                continue
            if "kütusepaagi luuk" in text and "cr-v" not in scope and "crv" not in scope:
                continue
            fact = (anchors, text)
            break
        if fact is None:
            answer = UNSURE
        else:
            anchors, text = fact
            system = SYSTEM + "Fakt: " + text
            if car_line:
                system += " Kasutaja auto: " + car_line + "."
            answer = self.complete([{"role": "system", "content": system}] + messages[-4:])
            lowered = answer.lower()
            if not all(part.lower() in lowered for part in anchors):
                answer = text
        body = json.dumps({"answer": answer}, ensure_ascii=False).encode("utf-8")
        self.send_response(200)
        self.send_header("Content-Type", "application/json; charset=utf-8")
        self.send_header("Content-Length", str(len(body)))
        self.end_headers()
        self.wfile.write(body)

    def complete(self, messages):
        payload = json.dumps({"model": "openai", "messages": messages}).encode("utf-8")
        request = urllib.request.Request(
            MODEL_URL,
            data=payload,
            headers={"Content-Type": "application/json"}
        )
        try:
            with urllib.request.urlopen(request, timeout=40) as response:
                result = json.loads(response.read().decode("utf-8"))
            text = result["choices"][0]["message"]["content"].strip()
            if text:
                return text
        except Exception:
            pass
        return ""


if __name__ == "__main__":
    os.chdir(ROOT)
    ThreadingHTTPServer(("127.0.0.1", 8765), Handler).serve_forever()

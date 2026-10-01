(function () {
  const TODAY = new Date(2026, 8, 30);
  const MONTHS = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
  const WEEK = ["E", "T", "K", "N", "R", "L", "P"];
  const USER = {
    name: "Mari Tamm",
    email: "mari.tamm@gmail.com",
    phone: "5123 4567",
    cars: [
      { id: "crv", make: "Honda", model: "CR-V Hybrid", year: 2022, plate: "482 MHT", km: 64200 }
    ]
  };
  const MODELS = [
    ["Jazz Hybrid", "22 900"],
    ["Crosstar Hybrid", "24 900"],
    ["HR-V Hybrid", "28 900"],
    ["Civic Hybrid", "32 900"],
    ["ZR-V Hybrid", "36 900"],
    ["CR-V Hybrid", "43 900"],
    ["Prelude", "49 900"]
  ];

  const state = {
    auth: sessionStorage.getItem("catwees-auth") === "1",
    mode: "claim",
    tradeOther: false,
    motion: !window.matchMedia("(prefers-reduced-motion: reduce)").matches
  };

  const $ = (id) => document.getElementById(id);
  const status = $("status");

  function say(text) {
    if (!status) return;
    status.textContent = "";
    window.setTimeout(() => { status.textContent = text; }, 30);
  }

  function formatKm(n) {
    return String(n).replace(/\B(?=(\d{3})+(?!\d))/g, " ") + " km";
  }

  function formatDate(date) {
    const d = String(date.getDate()).padStart(2, "0");
    const m = String(date.getMonth() + 1).padStart(2, "0");
    return d + "." + m + "." + date.getFullYear();
  }

  function sameDay(a, b) {
    return a && b && a.getFullYear() === b.getFullYear() && a.getMonth() === b.getMonth() && a.getDate() === b.getDate();
  }

  function startOfDay(date) {
    return new Date(date.getFullYear(), date.getMonth(), date.getDate());
  }

  function pulse(el) {
    if (!state.motion || !el) return;
    el.classList.remove("is-stamping", "is-reprint");
    void el.offsetWidth;
    el.classList.add(el.classList.contains("stamp") ? "is-stamping" : "is-reprint");
  }

  function activeCar() {
    return USER.cars[0];
  }

  function setPlate(glyphs, meta, sr) {
    if (!$("plate-glyphs")) return;
    $("plate-glyphs").textContent = glyphs;
    $("plate-meta").textContent = meta;
    $("plate-sr").textContent = sr + " ";
  }

  function paintIdentity(animate) {
    const stamp = $("stamp");
    if (!state.auth) {
      setPlate("Sinu Honda", "Logi sisse, et näha oma Honda teateid.", "Registreerimismärk puudub.");
      $("stamp-name").innerHTML = "Logi sisse <span class=\"stamp-gmail\">Gmailiga</span>";
      stamp.setAttribute("aria-label", "Logi sisse Gmailiga");
      stamp.classList.remove("is-in");
      return;
    }
    const car = activeCar();
    setPlate(
      car.plate,
      "Honda " + car.model + " · " + car.year + " · " + formatKm(car.km),
      "Registreerimismärk " + car.plate + ", Honda " + car.model + " " + car.year + ", " + formatKm(car.km) + "."
    );
    $("stamp-name").textContent = USER.name;
    stamp.setAttribute("aria-label", USER.name);
    stamp.classList.add("is-in");
    if (animate) {
      pulse($("stamp"));
      pulse($("plate-num"));
    }
  }

  function fillPrefill() {
    document.querySelectorAll("[data-prefill]").forEach((input) => {
      const key = input.getAttribute("data-prefill");
      if (state.auth) input.value = USER[key];
      else if (!input.dataset.touched) input.value = "";
    });
  }

  function fillCarSelects() {
    const service = $("service-car");
    if (service) {
      const options = USER.cars.map((car) => {
        const opt = document.createElement("option");
        opt.value = car.id;
        opt.textContent = "Honda " + car.model + " · " + car.plate;
        return opt;
      });
      const extra = document.createElement("option");
      extra.value = "other";
      extra.textContent = "Sisesta muu autonumber";
      service.replaceChildren(...options, extra);
    }
    const manual = $("manual-car-select");
    if (manual) {
      manual.replaceChildren(...USER.cars.map((car) => {
        const opt = document.createElement("option");
        opt.value = car.id;
        opt.textContent = "Honda " + car.model + " · " + car.year + " · " + car.plate;
        return opt;
      }));
    }
  }

  function fillModels() {
    const select = $("drive-model");
    if (!select) return;
    const blank = document.createElement("option");
    blank.value = "";
    blank.textContent = "Vali mudel";
    const rest = MODELS.map(([name, price]) => {
      const opt = document.createElement("option");
      opt.value = name;
      opt.textContent = name + " — alates " + price + " €";
      return opt;
    });
    select.replaceChildren(blank, ...rest);
  }

  function syncAuthChrome() {
    if ($("notices-guest")) $("notices-guest").hidden = state.auth;
    if ($("notices-user")) $("notices-user").hidden = !state.auth;
    if ($("notices-title")) $("notices-title").textContent = state.auth ? "Sinu CR-V teated" : "Üldteated";
    if ($("service-car-user")) $("service-car-user").hidden = !state.auth;
    if ($("service-plate-guest")) {
      $("service-plate-guest").hidden = state.auth;
      $("service-plate").required = !state.auth;
    }
    if ($("sales-lede")) {
      $("sales-lede").textContent = state.auth
        ? "Sinu CR-V on 2022. aastast. Uue auto proovisõit ja tagasiost on siin."
        : "Uue Honda proovisõit või tagasiostupakkumine. Mõlemad kinnitab müügiosakond.";
    }
    if ($("trade-known")) $("trade-known").hidden = !state.auth;
    if ($("trade-other")) $("trade-other").hidden = state.auth && !state.tradeOther;
    if (state.auth && $("trade-known-line")) {
      const car = activeCar();
      $("trade-known-line").textContent = car.plate + " · Honda " + car.model + " · " + car.year + " · " + formatKm(car.km);
    }
    if ($("profile-name")) {
      $("profile-name").textContent = state.auth
        ? USER.name + " · näidisprofiil"
        : "Logi sisse, et näha oma Honda andmeid.";
    }
    if ($("logout")) $("logout").hidden = !state.auth;
    if ($("profile-cars")) {
      $("profile-cars").replaceChildren(...USER.cars.map((car) => {
        const li = document.createElement("li");
        const plate = document.createElement("b");
        plate.textContent = car.plate;
        const line = document.createElement("span");
        line.textContent = "Honda · " + car.model + " · " + car.year;
        const km = document.createElement("span");
        km.textContent = formatKm(car.km);
        li.append(plate, line, km);
        return li;
      }));
    }
    if ($("service-car")) syncServicePlateField();
    if ($("manual-select-wrap")) syncMode();
    fillPrefill();
  }

  function syncServicePlateField() {
    const other = state.auth && $("service-car").value === "other";
    $("service-plate-other").hidden = !other;
    $("service-plate-extra").required = other;
  }

  function login() {
    state.auth = true;
    state.tradeOther = false;
    sessionStorage.setItem("catwees-auth", "1");
    paintIdentity(true);
    syncAuthChrome();
    say("Sisse logitud. Näidisprofiil Mari Tamm, Honda CR-V Hybrid 482 MHT.");
  }

  function logout() {
    sessionStorage.removeItem("catwees-auth");
    location.href = "index.html?n=4";
  }

  function clearSent(name) {
    $(name + "-form-fields").hidden = false;
    $(name + "-sent").hidden = true;
    $(name + "-sent").replaceChildren();
    const summary = $(name + "-summary");
    if (summary) summary.replaceChildren();
  }

  function syncMode() {
    if (!$("mode-claim")) return;
    const claim = state.mode === "claim";
    $("mode-claim").setAttribute("aria-pressed", claim ? "true" : "false");
    $("mode-manual").setAttribute("aria-pressed", claim ? "false" : "true");
    $("claim-contact").hidden = !claim;
    $("manual-car").hidden = claim;
    $("manual-select-wrap").hidden = !state.auth || claim;
    $("manual-guest-fields").hidden = state.auth || claim;
    $("chat-text").placeholder = claim
      ? "Kirjelda, mis juhtus"
      : "Küsi funktsiooni või rikke kohta";
    if (!$("thread").childElementCount) seedThread();
  }

  function seedThread() {
    const thread = $("thread");
    thread.replaceChildren();
    addMsg("Catwees", state.mode === "claim"
      ? "Kirjelda juhtumit. Kui keegi on viga saanud, helista 112. Vastus on näidis, kontaktid kõrval on päris."
      : "Küsi auto funktsiooni või rikke kohta. Vastus on näidis, mitte Honda juhendi tsitaat.");
  }

  function addMsg(who, text) {
    const row = document.createElement("div");
    row.className = "msg";
    const name = document.createElement("b");
    name.textContent = who;
    const body = document.createElement("p");
    body.textContent = text;
    row.append(name, body);
    $("thread").append(row);
    $("thread").scrollTop = $("thread").scrollHeight;
  }

  function claimReply(text) {
    const t = text.toLowerCase();
    let body;
    if (/klaas|kivi|pragu/.test(t)) {
      body = "Pildista pragu ja registreerimismärk päevavalguses. Kui pragu varjab vaate, ära sõida edasi. Broneeri aeg Teeninduses. Aja kinnitab teeninduslett.";
    } else if (/\bviga\b|vigast|\b112\b/.test(t)) {
      body = "Kui keegi on viga saanud, helista 112. Ära liiguta vigastatut, kui see pole hädavajalik. Kui oht on möödas, helista Catweesi teenindusse.";
    } else if (/avarii|kokkupõrge|õnnetus|liiklus/.test(t)) {
      body = "Peatu ohutus kohas ja lülita ohutuled. Vigastuse korral helista 112. Pildista autod, teekate ja märgid. Ära tunnista süüd sündmuskohal. Siis helista Catweesi.";
    } else {
      body = "Kirjelda, mis juhtus, kus auto praegu on ja kas sellega tohib sõita. Ära tunnista süüd sündmuskohal. Vigastuse korral helista 112. Remondi kinnitab Catweesi teenindus.";
    }
    return body + " See on näidisjuhis.";
  }

  function manualCarLabel() {
    if (state.auth) {
      const car = USER.cars.find((item) => item.id === $("manual-car-select").value) || activeCar();
      return "Honda " + car.model + " " + car.year;
    }
    const make = $("manual-make").value.trim();
    const model = $("manual-model").value.trim();
    const year = $("manual-year").value.trim();
    return [make, model, year].filter(Boolean).join(" ");
  }

  function manualReady() {
    if (state.auth) return true;
    return $("manual-make").value.trim() && $("manual-model").value.trim() && $("manual-year").value.trim();
  }

  function manualReply(text) {
    const who = manualCarLabel();
    const t = text.toLowerCase();
    if (/rehvi|rõhk|rohk/.test(t)) {
      return who + ": rehvirõhk on juhiukse sildil ja kasutusjuhendis. Number sõltub rehvimõõdust, seepärast seda siin ei oletata. Catwees kontrollib rõhku hooldusel.";
    }
    if (/õli|oli|hooldus/.test(t)) {
      return who + ": hooldusvälba näitab auto hooldusindikaator. Tööde nimekiri on Honda kasutusjuhendis. Broneeri aeg, kui indikaator põleb või tähtaeg on käes.";
    }
    if (/tuli|hoiatus|mootor|aku|hübriid|hybriid/.test(t)) {
      return who + ": punane hoiatustuli tähendab peatuda ohutus kohas ja helistada teenindusse. Kollase tulega saab üldjuhul teenindusse sõita. Sümboli tähendus on selle mudeli juhendis.";
    }
    return who + ": täpne juhis on Honda kasutusjuhendis, mitte selles näidisvestluses. Kui vastust pole käepärast, helista Catweesi teenindusse.";
  }

  function slotsFor(kind, date) {
    if (!date) return [];
    const day = date.getDay();
    if (kind === "service") {
      if (day === 0 || day === 6) return [];
      return ["08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00"];
    }
    if (day === 0) return [];
    if (day === 6) return ["10:00", "11:00", "12:00", "13:00", "14:00"];
    return ["08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00"];
  }

  function renderTimes(container, date, kind) {
    const selected = container.dataset.value || "";
    const slots = slotsFor(kind, date);
    container.replaceChildren(...(slots.length ? slots : ["—"]).map((slot) => {
      const btn = document.createElement("button");
      btn.type = "button";
      btn.className = "time";
      btn.textContent = slot;
      if (!date || slot === "—") {
        btn.disabled = true;
        btn.textContent = date ? "Suletud" : "Vali kuupäev";
        return btn;
      }
      btn.setAttribute("aria-pressed", slot === selected ? "true" : "false");
      btn.addEventListener("click", () => {
        container.dataset.value = slot;
        renderTimes(container, date, kind);
      });
      return btn;
    }));
    if (!slots.includes(selected)) delete container.dataset.value;
  }

  function makeCalendar(root, kind, times) {
    const cal = {
      cursor: new Date(TODAY.getFullYear(), TODAY.getMonth(), 1),
      selected: null,
      render() {
        root.replaceChildren();
        const bar = document.createElement("div");
        bar.className = "cal-bar";
        const prev = document.createElement("button");
        prev.type = "button";
        prev.className = "icon-btn";
        prev.setAttribute("aria-label", "Eelmine kuu");
        prev.innerHTML = "<svg width='12' height='12' viewBox='0 0 12 12' aria-hidden='true'><path d='M8 1.5L3.5 6 8 10.5' fill='none' stroke='currentColor' stroke-width='1.5'/></svg>";
        const title = document.createElement("strong");
        title.textContent = MONTHS[cal.cursor.getMonth()] + " " + cal.cursor.getFullYear();
        const next = document.createElement("button");
        next.type = "button";
        next.className = "icon-btn";
        next.setAttribute("aria-label", "Järgmine kuu");
        next.innerHTML = "<svg width='12' height='12' viewBox='0 0 12 12' aria-hidden='true'><path d='M4 1.5L8.5 6 4 10.5' fill='none' stroke='currentColor' stroke-width='1.5'/></svg>";
        const min = new Date(TODAY.getFullYear(), TODAY.getMonth(), 1);
        const max = new Date(2027, 2, 1);
        prev.disabled = cal.cursor <= min;
        next.disabled = cal.cursor >= max;
        prev.addEventListener("click", () => {
          cal.cursor = new Date(cal.cursor.getFullYear(), cal.cursor.getMonth() - 1, 1);
          cal.render();
        });
        next.addEventListener("click", () => {
          cal.cursor = new Date(cal.cursor.getFullYear(), cal.cursor.getMonth() + 1, 1);
          cal.render();
        });
        bar.append(prev, title, next);
        const week = document.createElement("div");
        week.className = "week";
        WEEK.forEach((name) => {
          const cell = document.createElement("span");
          cell.textContent = name;
          week.append(cell);
        });
        const days = document.createElement("div");
        days.className = "days";
        const first = new Date(cal.cursor.getFullYear(), cal.cursor.getMonth(), 1);
        const pad = (first.getDay() + 6) % 7;
        const count = new Date(cal.cursor.getFullYear(), cal.cursor.getMonth() + 1, 0).getDate();
        for (let i = 0; i < pad; i += 1) {
          const empty = document.createElement("span");
          days.append(empty);
        }
        for (let day = 1; day <= count; day += 1) {
          const date = new Date(cal.cursor.getFullYear(), cal.cursor.getMonth(), day);
          const btn = document.createElement("button");
          btn.type = "button";
          btn.className = "day";
          btn.textContent = String(day);
          const closed = kind === "service" && (date.getDay() === 0 || date.getDay() === 6);
          const past = startOfDay(date) < startOfDay(TODAY);
          btn.disabled = past || closed;
          btn.setAttribute("aria-pressed", sameDay(date, cal.selected) ? "true" : "false");
          btn.setAttribute("aria-label", formatDate(date));
          btn.addEventListener("click", () => {
            cal.selected = date;
            delete times.dataset.value;
            cal.render();
            renderTimes(times, cal.selected, kind);
          });
          days.append(btn);
        }
        root.append(bar, week, days);
        renderTimes(times, cal.selected, kind);
      }
    };
    cal.render();
    return cal;
  }

  function fieldError(input, message) {
    input.setAttribute("aria-invalid", "true");
    let note = input.parentElement.querySelector(".field-error");
    if (!note) {
      note = document.createElement("p");
      note.className = "field-error";
      note.id = (input.id || "field") + "-error";
      input.parentElement.append(note);
    }
    note.textContent = message;
    input.setAttribute("aria-describedby", note.id);
    return message;
  }

  function clearFieldErrors(form) {
    form.querySelectorAll("[aria-invalid]").forEach((el) => {
      el.removeAttribute("aria-invalid");
      el.removeAttribute("aria-describedby");
    });
    form.querySelectorAll(".field-error").forEach((el) => el.remove());
  }

  function requireText(input, emptyMessage) {
    if (!input || input.closest("[hidden]")) return "";
    if (!input.value.trim()) return fieldError(input, emptyMessage);
    return "";
  }

  function requireEmail(input) {
    if (!input.value.trim()) return fieldError(input, "E-post on puudu.");
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value.trim())) return fieldError(input, "E-post ei ole korrektne. Kontrolli aadressi.");
    return "";
  }

  function requirePhone(input) {
    const digits = input.value.replace(/\D/g, "");
    if (digits.length < 7) return fieldError(input, "Telefon on puudu või liiga lühike.");
    return "";
  }

  function writeSummary(node, messages) {
    node.replaceChildren();
    if (!messages.length) return;
    const list = document.createElement("ul");
    messages.forEach((message) => {
      const li = document.createElement("li");
      li.textContent = message;
      list.append(li);
    });
    node.append(list);
  }

  function contactErrors(prefix) {
    return [
      requireText($(prefix + "-name"), "Nimi on puudu."),
      requireEmail($(prefix + "-email")),
      requirePhone($(prefix + "-phone"))
    ].filter(Boolean);
  }

  function showSent(name, title, rows) {
    $(name + "-form-fields").hidden = true;
    const box = $(name + "-sent");
    box.hidden = false;
    box.replaceChildren();
    const wrap = document.createElement("div");
    wrap.className = "carbon";
    const mark = document.createElement("div");
    mark.className = "sent-mark";
    mark.textContent = "Saadetud";
    const lead = document.createElement("p");
    lead.textContent = title;
    const dl = document.createElement("dl");
    rows.forEach(([dt, dd]) => {
      const row = document.createElement("div");
      const term = document.createElement("dt");
      term.textContent = dt;
      const def = document.createElement("dd");
      def.textContent = dd;
      row.append(term, def);
      dl.append(row);
    });
    const again = document.createElement("button");
    again.type = "button";
    again.className = "back";
    again.textContent = "Uus päring";
    again.addEventListener("click", () => clearSent(name));
    wrap.append(mark, lead, dl);
    box.append(wrap, again);
    mark.tabIndex = -1;
    mark.focus();
  }

  function bindForm(form, name, collect) {
    const button = form.querySelector(".submit");
    const label = button.textContent;
    form.addEventListener("submit", (event) => {
      event.preventDefault();
      clearFieldErrors(form);
      const messages = collect().filter(Boolean);
      writeSummary($(name + "-summary"), messages);
      if (messages.length) {
        const first = form.querySelector("[aria-invalid='true']");
        if (first) first.focus();
        return;
      }
      button.disabled = true;
      button.textContent = "Saadan…";
      window.setTimeout(() => {
        button.disabled = false;
        button.textContent = label;
        const sent = collect.sent();
        showSent(name, sent.title, sent.rows);
        say(sent.title);
      }, state.motion ? 350 : 0);
    });
  }

  let serviceCal = null;
  let driveCal = null;
  if ($("service-cal")) serviceCal = makeCalendar($("service-cal"), "service", $("service-times"));
  if ($("drive-cal")) driveCal = makeCalendar($("drive-cal"), "drive", $("drive-times"));

  if ($("form-service")) {
    bindForm($("form-service"), "service", Object.assign(function collect() {
      const messages = [];
      if (!state.auth) messages.push(requireText($("service-plate"), "Autonumber on puudu. Sisesta registreerimismärk."));
      if (state.auth && $("service-car").value === "other") messages.push(requireText($("service-plate-extra"), "Muu autonumber on puudu."));
      if (!serviceCal.selected) messages.push("Vali kuupäev.");
      if (!$("service-times").dataset.value) messages.push("Vali kellaaeg.");
      return messages.concat(contactErrors("service"));
    }, {
      sent() {
        const plate = !state.auth
          ? $("service-plate").value.trim()
          : ($("service-car").value === "other" ? $("service-plate-extra").value.trim() : activeCar().plate);
        return {
          title: "Broneering on saadetud Catweesi teenindusletile kinnitamiseks. Kirja päriselt ei saadeta.",
          rows: [
            ["Auto", plate],
            ["Aeg", formatDate(serviceCal.selected) + " " + $("service-times").dataset.value],
            ["Asendusauto", $("service-loaner").checked ? "Jah" : "Ei"],
            ["Kontakt", $("service-name").value.trim() + ", " + $("service-email").value.trim() + ", " + $("service-phone").value.trim()]
          ]
        };
      }
    }));
  }

  if ($("form-drive")) {
    bindForm($("form-drive"), "drive", Object.assign(function collect() {
      const messages = [];
      if (!$("drive-model").value) messages.push(fieldError($("drive-model"), "Vali mudel."));
      if (!driveCal.selected) messages.push("Vali kuupäev.");
      if (!$("drive-times").dataset.value) messages.push("Vali kellaaeg.");
      return messages.concat(contactErrors("drive"));
    }, {
      sent() {
        return {
          title: "Proovisõidu soov on saadetud Catweesi müügiosakonnale. Kirja päriselt ei saadeta.",
          rows: [
            ["Mudel", $("drive-model").value],
            ["Aeg", formatDate(driveCal.selected) + " " + $("drive-times").dataset.value],
            ["Kontakt", $("drive-name").value.trim() + ", " + $("drive-email").value.trim() + ", " + $("drive-phone").value.trim()]
          ]
        };
      }
    }));
  }

  if ($("form-trade")) {
    bindForm($("form-trade"), "trade", Object.assign(function collect() {
      const messages = [];
      const other = !state.auth || state.tradeOther;
      if (other) {
        messages.push(requireText($("trade-plate"), "Autonumber on puudu."));
        messages.push(requireText($("trade-model"), "Mudeli nimetus on puudu."));
        if ($("trade-km").value === "" || Number($("trade-km").value) < 0) messages.push(fieldError($("trade-km"), "Läbisõit kilomeetrites on puudu."));
      }
      if (!document.querySelector("input[name='condition']:checked")) messages.push("Vali seisukord.");
      return messages.concat(contactErrors("trade"));
    }, {
      sent() {
        const other = !state.auth || state.tradeOther;
        const car = other
          ? $("trade-plate").value.trim() + " · " + $("trade-model").value.trim() + " · " + $("trade-km").value.trim() + " km"
          : activeCar().plate + " · Honda " + activeCar().model + " · " + formatKm(activeCar().km);
        const condition = document.querySelector("input[name='condition']:checked").value;
        return {
          title: "Tagasiostu küsimus on saadetud Catweesi müügiosakonnale. Pakkumist siin ei arvutata.",
          rows: [
            ["Auto", car],
            ["Seisukord", condition],
            ["Kontakt", $("trade-name").value.trim() + ", " + $("trade-email").value.trim() + ", " + $("trade-phone").value.trim()]
          ]
        };
      }
    }));
  }

  if ($("form-recovery")) {
    $("form-recovery").addEventListener("submit", (event) => {
      event.preventDefault();
      clearFieldErrors($("form-recovery"));
      const message = requireEmail($("recovery-email"));
      writeSummary($("recovery-summary"), message ? [message] : []);
      if (message) {
        $("recovery-email").focus();
        return;
      }
      $("recovery-fields").hidden = true;
      const box = $("recovery-sent");
      box.hidden = false;
      box.replaceChildren();
      const wrap = document.createElement("div");
      wrap.className = "carbon";
      const mark = document.createElement("div");
      mark.className = "sent-mark";
      mark.textContent = "Saadetud";
      const lead = document.createElement("p");
      lead.textContent = "Kui see aadress on kontoga seotud, saadab Catwees juhise. See on näidis, kirja ei saadeta.";
      wrap.append(mark, lead);
      box.append(wrap);
      say("Taastelink on näidisena märgitud saadetuks.");
    });
  }

  if ($("form-chat")) {
    $("form-chat").addEventListener("submit", (event) => {
      event.preventDefault();
      const text = $("chat-text").value.trim();
      if (!text) {
        fieldError($("chat-text"), "Küsimus on tühi.");
        return;
      }
      clearFieldErrors($("form-chat"));
      if (state.mode === "manual" && !manualReady()) {
        if (!$("manual-model").value.trim()) fieldError($("manual-model"), "Täielik mudelinimi on puudu.");
        if (!$("manual-year").value.trim()) fieldError($("manual-year"), "Tootmisaasta on puudu.");
        if (!$("manual-make").value.trim()) fieldError($("manual-make"), "Mark on puudu.");
        return;
      }
      addMsg(state.auth ? USER.name : "Sina", text);
      addMsg("Catwees", state.mode === "claim" ? claimReply(text) : manualReply(text));
      $("chat-text").value = "";
    });
  }

  $("stamp").addEventListener("click", () => {
    if (state.auth) location.href = "profiil.html?n=4";
    else login();
  });

  if ($("logout")) $("logout").addEventListener("click", logout);

  if ($("trade-other-toggle")) {
    $("trade-other-toggle").addEventListener("click", () => {
      state.tradeOther = !state.tradeOther;
      $("trade-other").hidden = !state.tradeOther;
      $("trade-other-toggle").textContent = state.tradeOther ? "Kasuta konto autot" : "Sisesta muu auto";
    });
  }

  if ($("service-car")) {
    $("service-car").addEventListener("change", () => {
      syncServicePlateField();
      if (!state.auth) return;
      if ($("service-car").value === "other") {
        setPlate("Muu auto", "Sisesta registreerimismärk.", "Muu auto.");
      } else paintIdentity();
    });
  }

  if ($("service-plate")) {
    $("service-plate").addEventListener("input", () => {
      if (state.auth) return;
      const value = $("service-plate").value.trim();
      if (!value) paintIdentity();
      else setPlate(value.toUpperCase(), "Broneeringu auto.", "Registreerimismärk " + value.toUpperCase() + ".");
    });
  }

  if ($("mode-claim")) {
    $("mode-claim").addEventListener("click", () => {
      state.mode = "claim";
      seedThread();
      syncMode();
    });
    $("mode-manual").addEventListener("click", () => {
      state.mode = "manual";
      seedThread();
      syncMode();
    });
  }

  document.querySelectorAll("[data-prefill]").forEach((input) => {
    input.addEventListener("input", () => { input.dataset.touched = "1"; });
  });

  fillCarSelects();
  fillModels();
  paintIdentity();
  syncAuthChrome();
  if ($("mode-claim")) syncMode();

  const header = document.querySelector("header");
  if (header && header.classList.contains("is-overlay")) {
    const onScroll = () => header.classList.toggle("is-solid", window.scrollY > 40);
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  }

  const drive = $("drive");
  const driveCar = $("drive-car");
  if (drive && driveCar && driveCar.getContext && !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    const fleet = [
      { name: "Prelude", price: "alates 49 900 €", src: "assets/cars/prelude.png", wheels: [[0.2206, 0.6554, 0.2056], [0.7366, 0.6455, 0.2054]] },
      { name: "CR-V Hybrid", price: "alates 43 900 €", src: "assets/cars/crv.png", wheels: [[0.2381, 0.7486, 0.2026], [0.7667, 0.7441, 0.2005]] },
      { name: "ZR-V", price: "alates 36 900 €", src: "assets/cars/zrv.png", wheels: [[0.2437, 0.5994, 0.1542], [0.7548, 0.5938, 0.1600]] },
      { name: "HR-V", price: "alates 28 900 €", src: "assets/cars/hrv.png", wheels: [[0.2453, 0.5864, 0.1587], [0.7453, 0.5883, 0.1624]] },
      { name: "Civic Hybrid", price: "alates 32 900 €", src: "assets/cars/civic.png", wheels: [[0.2302, 0.6199, 0.1725], [0.7556, 0.6199, 0.1696]] },
      { name: "Jazz Hybrid", price: "alates 22 900 €", src: "assets/cars/jazz.png", wheels: [[0.2493, 0.5949, 0.1494], [0.7484, 0.6098, 0.1396]] }
    ];
    const ctx = driveCar.getContext("2d");
    const images = {};
    const ensureImage = (i) => {
      if (i < 0 || i >= fleet.length) return;
      const src = fleet[i].src;
      if (images[src]) return;
      const img = new Image();
      img.decoding = "async";
      img.onload = () => wake();
      img.src = src;
      images[src] = img;
    };
    let shown = 0;
    let driveIndex = -1;
    let last = 0;
    let layoutW = 0;
    let layoutH = 0;

    const isBodyPaint = (r, g, b, a) => {
      if (a < 220) return false;
      const max = Math.max(r, g, b);
      const min = Math.min(r, g, b);
      const sat = max === 0 ? 0 : (max - min) / max;
      const lum = 0.2126 * r + 0.7152 * g + 0.0722 * b;
      if (sat > 0.16 && lum > 35) return true;
      if (lum > 185) return true;
      return false;
    };

    const archMask = (img, wheel) => {
      const key = wheel.join(",");
      if (!img._masks) img._masks = {};
      if (img._masks[key]) return img._masks[key];
      const sx = wheel[0] * img.naturalWidth;
      const sy = wheel[1] * img.naturalHeight;
      const sr = wheel[2] * img.naturalHeight;
      const size = Math.max(2, Math.ceil(sr * 2));
      const mask = document.createElement("canvas");
      mask.width = size;
      mask.height = size;
      const g = mask.getContext("2d", { willReadFrequently: true });
      g.drawImage(img, sx - sr, sy - sr, sr * 2, sr * 2, 0, 0, size, size);
      const frame = g.getImageData(0, 0, size, size);
      const pix = frame.data;
      const mid = size / 2;
      const mark = new Uint8Array(size * size);
      for (let y = 0; y < size; y += 1) {
        for (let x = 0; x < size; x += 1) {
          const dist = Math.hypot(x - mid, y - mid);
          const i = (y * size + x) * 4;
          if (dist <= mid && dist >= mid * 0.78 && isBodyPaint(pix[i], pix[i + 1], pix[i + 2], pix[i + 3])) {
            mark[y * size + x] = 1;
          }
        }
      }
      for (let y = 0; y < size; y += 1) {
        for (let x = 0; x < size; x += 1) {
          const here = y * size + x;
          let neighbours = 0;
          if (mark[here]) {
            for (let oy = -1; oy <= 1; oy += 1) {
              for (let ox = -1; ox <= 1; ox += 1) {
                const nx = x + ox;
                const ny = y + oy;
                if (nx >= 0 && ny >= 0 && nx < size && ny < size && mark[ny * size + nx]) neighbours += 1;
              }
            }
          }
          if (neighbours < 6) pix[here * 4 + 3] = 0;
        }
      }
      g.putImageData(frame, 0, 0);
      img._masks[key] = mask;
      return mask;
    };

    const paintCar = (item, cssW, cssH, travel) => {
      const img = images[item.src];
      if (!img) return;
      const dpr = Math.min(window.devicePixelRatio || 1, 2);
      const bw = Math.round(cssW * dpr);
      const bh = Math.round(cssH * dpr);
      if (driveCar.width !== bw || driveCar.height !== bh) {
        driveCar.width = bw;
        driveCar.height = bh;
      }
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
      ctx.clearRect(0, 0, cssW, cssH);
      ctx.drawImage(img, 0, 0, cssW, cssH);
      item.wheels.forEach((wheel) => {
        const cx = wheel[0] * cssW;
        const cy = wheel[1] * cssH;
        const rad = wheel[2] * cssH;
        const sx = wheel[0] * img.naturalWidth;
        const sy = wheel[1] * img.naturalHeight;
        const sr = wheel[2] * img.naturalHeight;
        const spin = rad > 0 ? travel / rad : 0;
        ctx.save();
        ctx.beginPath();
        ctx.arc(cx, cy, rad, 0, Math.PI * 2);
        ctx.clip();
        ctx.translate(cx, cy);
        ctx.rotate(spin);
        ctx.drawImage(img, sx - sr, sy - sr, sr * 2, sr * 2, -rad, -rad, rad * 2, rad * 2);
        ctx.restore();
        const mask = archMask(img, wheel);
        ctx.save();
        ctx.beginPath();
        ctx.arc(cx, cy, rad, 0, Math.PI * 2);
        ctx.clip();
        ctx.drawImage(mask, cx - rad, cy - rad, rad * 2, rad * 2);
        ctx.restore();
      });
      ctx.setTransform(1, 0, 0, 1, 0, 0);
    };

    let frame = 0;
    let paintedKey = "";
    let held = null;
    const tick = (now) => {
      const dt = last ? Math.min(34, now - last) : 16;
      last = now;
      const rect = drive.getBoundingClientRect();
      const span = drive.offsetHeight - window.innerHeight;
      const raw = span <= 0 ? 0 : Math.min(1, Math.max(0, -rect.top / span));
      if (held === null || Math.abs(raw - held) > 0.0003) held = raw;
      const target = held;
      const near = rect.bottom > -80 && rect.top < window.innerHeight + 80;
      if (!near) shown = target;
      else shown += (target - shown) * (1 - Math.exp(-dt / 110));
      if (Math.abs(target - shown) < 0.00004) shown = target;

      const scaled = shown * fleet.length;
      const index = Math.min(fleet.length - 1, Math.floor(scaled));
      const local = scaled - index;
      if (rect.top < window.innerHeight * 0.72) {
        ensureImage(index);
        ensureImage(index + 1);
      }
      const item = fleet[index];
      const img = images[item.src];
      const ready = img && img.complete && img.naturalWidth;
      if (ready && near) {
        const center = window.innerHeight * 0.46;
        const buttonTop = window.innerHeight * 0.94 - 72;
        const maxH = Math.max(240, (buttonTop - 16 - center) * 2);
        const cssW = Math.min(window.innerWidth * 0.9, maxH / (591 / 1400)) * 0.8;
        const cssH = cssW * (img.naturalHeight / img.naturalWidth);
        const x = -cssW + local * (window.innerWidth + cssW);
        const key = index + ":" + Math.round(cssW) + ":" + x.toFixed(1);
        if (key !== paintedKey) {
          paintedKey = key;
          if (index !== driveIndex || cssW !== layoutW || cssH !== layoutH) {
            const arrived = index !== driveIndex;
            driveIndex = index;
            layoutW = cssW;
            layoutH = cssH;
            driveCar.style.width = cssW + "px";
            driveCar.style.height = cssH + "px";
            if (arrived) {
              const name = $("drive-name");
              const price = $("drive-price");
              const copy = name.parentElement;
              name.textContent = item.name;
              price.textContent = item.price;
              driveCar.setAttribute("aria-label", "Honda " + item.name + ", külgvaade");
              copy.classList.remove("is-arriving");
              void copy.offsetWidth;
              copy.classList.add("is-arriving");
            }
          }
          paintCar(item, cssW, cssH, x);
          driveCar.style.transform = "translate3d(" + x.toFixed(2) + "px, -50%, 0)";
        }
      }
      frame = (near && shown !== target) ? requestAnimationFrame(tick) : 0;
    };
    const wake = () => {
      if (!frame) frame = requestAnimationFrame(tick);
    };
    window.addEventListener("scroll", wake, { passive: true });
    window.addEventListener("resize", wake);
    fetch("assets/wheels.json", { cache: "no-store" })
      .then((response) => response.ok ? response.json() : null)
      .then((saved) => {
        if (!saved) return;
        fleet.forEach((item) => {
          const key = item.src.split("/").pop();
          const pair = saved[key];
          if (pair && pair.length === 2) item.wheels = pair;
        });
        paintedKey = "";
        wake();
      })
      .catch(() => {});
    wake();
  }
})();

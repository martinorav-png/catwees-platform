<?php
/**
 * Front page template for the static Catwees 2026 conversion.
 */

get_header();
?>

<!-- ════════════════ HEADER ════════════════ -->
<header>
  <div class="nav-inner">
    <div class="logo-group" onclick="showPage('home')">
      <img class="honda-logo" src="<?php echo esc_url( catwees_2026_asset('honda POD logo png valge.png') ); ?>" alt="Honda" />
      <div class="logo-divider"></div>
      <img class="catwees-logo" src="<?php echo esc_url( catwees_2026_asset('Catwees logo png valge tekst.png') ); ?>" alt="Catwees" />
    </div>
    <nav>
      <a data-page="home" class="active" onclick="showPage('home')"><span class="nav-label"><span>Uued Hondad</span><span>Uued Hondad</span></span></a>
      <a data-page="laopakkumised" onclick="showPage('laopakkumised')"><span class="nav-label"><span>Laopakkumised</span><span>Laopakkumised</span></span></a>
      <a data-page="eripakkumised" onclick="showPage('eripakkumised')"><span class="nav-label"><span>Eripakkumised</span><span>Eripakkumised</span></span></a>
      <a data-page="kasutatud" onclick="showPage('kasutatud')"><span class="nav-label"><span>Kasutatud autod</span><span>Kasutatud autod</span></span></a>
      <a data-page="teenindus" onclick="showPage('teenindus')"><span class="nav-label"><span>Teenindus</span><span>Teenindus</span></span></a>
      <a data-page="meist" onclick="showPage('meist')"><span class="nav-label"><span>Meist</span><span>Meist</span></span></a>
    </nav>
    <div class="nav-cta">
      <button class="nav-lang">RU</button>
      <span class="nav-btn nav-btn-outline" onclick="showPage('teenindus')">Broneeri Teenindus</span>
      <span class="nav-btn nav-btn-red" onclick="showPage('home')">Proovisõit</span>
    </div>
  </div>
</header>


<!-- ════════════════════════════════════════════════════════════
     PAGE: HOME
════════════════════════════════════════════════════════════ -->
<div class="page active" id="page-home">

  <!-- 01. HERO -->
  <section class="hero">
    <div class="hero-grid-overlay"></div>
    <div class="hero-inner">
      <div class="hero-left">
        <h1 class="hero-headline" aria-label="Catwees Honda">
          <span class="hero-word-swap" aria-hidden="true">
            <span class="word-catwees">CATWEES</span>
            <span class="word-honda">HONDA</span>
          </span>
        </h1>
        <p class="hero-sub">Catwees on vanim ja suurim ainult Honda mudeleid müüv ja hooldav ettevõte Eestis.</p>
        <div class="hero-decision" aria-label="Vali Honda teekond Catweesis">
          <div class="hero-choice-grid" role="tablist" aria-label="Avalehe põhivalikud">
            <button class="hero-choice" type="button" role="tab" aria-selected="false" aria-controls="hero-panel-models" data-hero-menu="models">
              <small>01 / Uus Honda</small>
              <strong>UUED AUTOD</strong>
              <span>Laos autod, mudelite info ja Honda.ee mudelivalik ühes kohas.</span>
            </button>
            <button class="hero-choice" type="button" role="tab" aria-selected="false" aria-controls="hero-panel-used" data-hero-menu="used">
              <small>02 / Kontrollitud valik</small>
              <strong>Kasutatud autod</strong>
              <span>Vali Tallinn või Tartu enne kui liigud pakkumiste juurde.</span>
            </button>
            <button class="hero-choice" type="button" role="tab" aria-selected="false" aria-controls="hero-panel-service" data-hero-menu="service">
              <small>03 / Honda hooldus</small>
              <strong>Teenindus</strong>
              <span>Honda sertifitseeritud hooldus samas Catweesi võrgus.</span>
            </button>
          </div>
          <div class="hero-panel-shell">
            <div class="hero-menu-panel" id="hero-panel-models" role="tabpanel" data-hero-panel="models">
              <div class="hero-menu-copy">
                <b>Uus Honda Catweesist</b>
                <p>Alusta Catweesi valikust. Kui tahad võrrelda kogu ametlikku mudelirivi, saad edasi minna Honda.ee mudelivalikusse.</p>
              </div>
              <div class="hero-menu-links">
                <button class="hero-menu-link" type="button" onclick="showPage('laopakkumised')"><strong>Laos autod</strong><span>Laopakkumised: kohe saadaval Honda mudelid Tallinnas ja Tartus.</span></button>
                <button class="hero-menu-link" type="button" onclick="document.getElementById('home-models-section').scrollIntoView({behavior:'smooth'})"><strong>Mudelite info</strong><span>CR-V, ZR-V, HR-V, Civic, Jazz ja e:Ny1 Catweesi vaates.</span></button>
                <a class="hero-menu-link" href="https://www.honda.ee/cars/new" target="_blank" rel="noopener"><strong>Honda.ee</strong><span>Ametlik Honda mudelivalik uues aknas.</span></a>
              </div>
            </div>
            <div class="hero-menu-panel" id="hero-panel-used" role="tabpanel" data-hero-panel="used">
              <div class="hero-menu-copy">
                <b>Kasutatud Honda</b>
                <p>Vali esindus esmalt. Nii jääb esimene klikk rahulikuks ja kasutaja ei kaota konteksti.</p>
              </div>
              <div class="hero-menu-links">
                <button class="hero-menu-link" type="button" onclick="showPage('kasutatud')"><strong>Tallinn</strong><span>Vaata Pärnu mnt valikut ja küsi proovisõitu.</span></button>
                <button class="hero-menu-link" type="button" onclick="showPage('kasutatud')"><strong>Tartu</strong><span>Vaata Ringtee esinduse kasutatud Hondasid.</span></button>
                <button class="hero-menu-link" type="button" onclick="showPage('kasutatud')"><strong>Kogu valik</strong><span>Kui asukoht pole oluline, alusta kogu nimekirjast.</span></button>
              </div>
            </div>
            <div class="hero-menu-panel" id="hero-panel-service" role="tabpanel" data-hero-panel="service">
              <div class="hero-menu-copy">
                <b>Honda teenindus Catweesis</b>
                <p>Catwees ei ole mitme margi töökoda. Meie fookus on Honda, garantiist igapäevase hoolduseni.</p>
              </div>
              <div class="hero-menu-links">
                <button class="hero-menu-link" type="button" onclick="showPage('teenindus')"><strong>Tallinn</strong><span>Broneeri hooldus Pärnu mnt 555 esinduses.</span></button>
                <button class="hero-menu-link" type="button" onclick="showPage('teenindus')"><strong>Tartu</strong><span>Broneeri hooldus Ringtee 77 esinduses.</span></button>
                <button class="hero-menu-link" type="button" onclick="showPage('teenindus')"><strong>Honda garantii</strong><span>Sertifitseeritud hooldus ja tootja standardid.</span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-right">
        <img class="hero-slide-layer" src="<?php echo esc_url( catwees_2026_asset('hero-crv-2026.jpg') ); ?>" alt="Honda sõiduauto maanteel" data-hero-slideshow />
        <div class="hero-badge">
          <img src="https://catwees.ee/wp-content/themes/catwees/img/6aastat.png" alt="6 aastat garantii" />
        </div>
      </div>
    </div>
    <div class="hero-stats">
      <article class="hero-stat" data-index="01">
        <div class="hero-stat-kicker">Proovisõidu algus</div>
        <div class="num">Tallinn</div>
        <div class="lbl">Pärnu mnt 555 - vali mudel, küsi võtmed ja tee päris linnaring.</div>
        <div class="hero-stat-note">Esindus + teenindus</div>
      </article>
      <article class="hero-stat" data-index="02">
        <div class="hero-stat-kicker">Lõuna-Eesti rada</div>
        <div class="num">Tartu</div>
        <div class="lbl">Ringtee 77 - CR-V, ZR-V, HR-V ja Jazz ootavad võrdlust samal päeval.</div>
        <div class="hero-stat-note">Müük + järelhooldus</div>
      </article>
      <article class="hero-stat" data-index="03">
        <div class="hero-stat-kicker">Honda jõuallikad</div>
        <div class="num"><em>e:HEV</em> / e:PHEV</div>
        <div class="lbl">Hübriid, pistikhübriid ja elektriline Honda valik ühe Catweesi tiimi juures.</div>
        <div class="hero-stat-note">Ametlik garantii</div>
      </article>
    </div>
  </section>

  <!-- STRIP -->
  <div class="swiss-strip">
    <div class="swiss-strip-inner">
      <div class="swiss-strip-item"><em>Honda</em> ametlik garantii</div>
      <div class="swiss-strip-item">Sertifitseeritud tehnikud</div>
      <div class="swiss-strip-item">Proovisõit tasuta</div>
      <div class="swiss-strip-item">Paindlik finantseerimine</div>
      <div class="swiss-strip-item">Tallinn &amp; Tartu</div>
    </div>
  </div>

  <!-- TICKER -->
  <div class="ticker-strip">
    <div class="ticker-track">
      <span class="ticker-item">Honda e:HEV</span><span class="ticker-dot">·</span>
      <span class="ticker-item">Ametlik Honda esindustus</span><span class="ticker-dot">·</span>
      <span class="ticker-item">Tallinn &amp; Tartu</span><span class="ticker-dot">·</span>
      <span class="ticker-item">Proovisõit tasuta</span><span class="ticker-dot">·</span>
      <span class="ticker-item">6 aastat garantii</span><span class="ticker-dot">·</span>
      <span class="ticker-item">Honda e:PHEV</span><span class="ticker-dot">·</span>
      <span class="ticker-item">Paindlik finantseerimine</span><span class="ticker-dot">·</span>
      <span class="ticker-item">Sertifitseeritud tehnikud</span><span class="ticker-dot">·</span>
      <span class="ticker-item">Honda e:HEV</span><span class="ticker-dot">·</span>
      <span class="ticker-item">Ametlik Honda esindustus</span><span class="ticker-dot">·</span>
      <span class="ticker-item">Tallinn &amp; Tartu</span><span class="ticker-dot">·</span>
      <span class="ticker-item">Proovisõit tasuta</span><span class="ticker-dot">·</span>
      <span class="ticker-item">6 aastat garantii</span><span class="ticker-dot">·</span>
      <span class="ticker-item">Honda e:PHEV</span><span class="ticker-dot">·</span>
      <span class="ticker-item">Paindlik finantseerimine</span><span class="ticker-dot">·</span>
      <span class="ticker-item">Sertifitseeritud tehnikud</span><span class="ticker-dot">·</span>
    </div>
  </div>

  <!-- 02. MUDELID -->
  <section class="models-section" id="home-models-section">
    <div class="section-header-row">
      <div class="section-title-block">
        <h2 class="section-h2">MUDELID<span class="count-tag" id="model-count">6</span></h2>
      </div>
      <p style="font-size:14px;color:rgba(0,0,0,.45);max-width:380px;">Leia endale sobiv sõiduk meie laiast mudelivalikust.</p>
    </div>
    <div class="filter-row" id="home-filter-tabs">
      <button class="filter-tab active" data-filter="all">Kõik</button>
      <button class="filter-tab" data-filter="suv">SUV</button>
      <button class="filter-tab" data-filter="hubriid">Hübriid</button>
      <button class="filter-tab" data-filter="elekter">Elekter</button>
      <button class="filter-tab" data-filter="sedaan">Sedaan</button>
      <button class="filter-tab" data-filter="eripakkumine">Eripakkumised</button>
    </div>
    <div class="models-grid" id="home-models-grid">

      <div class="car-card" data-categories="suv hubriid">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2023/06/CRV_PHEV_ADVANCE.jpg" alt="Honda CR-V e:PHEV" />
          <span class="card-badge card-badge-outline">UUS</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda</div>
          <div class="car-card-name">CR-V e:PHEV</div>
          <div class="car-card-desc">Plug-in hübriid · 7-kohaline · AWD</div>
          <div class="car-card-footer">
            <div class="car-price">45 500 € <small>/ alates</small></div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card" data-categories="suv hubriid">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2023/06/ZR-V_ADVANCE.jpg" alt="Honda ZR-V" />
          <span class="card-badge">LAOS</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda</div>
          <div class="car-card-name">ZR-V e:HEV</div>
          <div class="car-card-desc">Compact SUV · Täishübriid · Sport</div>
          <div class="car-card-footer">
            <div class="car-price">38 900 € <small>/ alates</small></div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card" data-categories="suv hubriid eripakkumine">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2021/03/HR-V-thumbnail.jpg" alt="Honda HR-V" />
          <span class="card-badge card-badge-red">ERIPAKKUMINE</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda</div>
          <div class="car-card-name">HR-V e:HEV</div>
          <div class="car-card-desc">Compact SUV · Täishübriid · 4 värvi</div>
          <div class="car-card-footer">
            <div class="car-price">
              <span class="car-old-price">31 500 €</span>
              29 900 €
            </div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card" data-categories="sedaan hubriid">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2022/03/Civic-ikoon-1.jpg" alt="Honda Civic" />
          <span class="card-badge card-badge-outline">UUS</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda</div>
          <div class="car-card-name">Civic e:HEV</div>
          <div class="car-card-desc">Sedaan · Täishübriid · Sport disain</div>
          <div class="car-card-footer">
            <div class="car-price">33 200 € <small>/ alates</small></div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card" data-categories="suv elekter">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2023/07/eNY1_ADVANCE.jpg" alt="Honda e:Ny1" />
          <span class="card-badge card-badge-red">ELEKTER</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda</div>
          <div class="car-card-name">e:Ny1</div>
          <div class="car-card-desc">Täiselektriline · SUV · 412 km läbisõit</div>
          <div class="car-card-footer">
            <div class="car-price">43 500 € <small>/ alates</small></div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card" data-categories="sedaan hubriid">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2025/11/26YM_Prelude_ADVANCE_EU_f34_stu_NH_904M_001-1.jpg" alt="Honda Prelude" />
          <span class="card-badge">UUS 2026</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda</div>
          <div class="car-card-name">Prelude e:HEV</div>
          <div class="car-card-desc">Coupe hübriid · Sport · Uus mudel</div>
          <div class="car-card-footer">
            <div class="car-price">Küsi hind</div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- 03. TEENINDUS -->
  <section class="service-section swiss-dots">
    <div class="service-inner">
      <div class="service-header">
        <h2 class="section-h2">TEENINDUS</h2>
      </div>
      <div class="service-body">
        <div class="service-panel-left">
          <span class="panel-label">Meie teenused</span>
          <div class="service-list-item">
            <span class="service-list-num">01</span>
            <div class="service-list-text">
              <h4>Korraline hooldus</h4>
              <p>Oli, filtrid, plaanilised kontrollid</p>
            </div>
            <span class="service-arrow">→</span>
          </div>
          <div class="service-list-item">
            <span class="service-list-num">02</span>
            <div class="service-list-text">
              <h4>Rehvivahetus &amp; hoiustamine</h4>
              <p>Suve- ja talverehvid, tasakaalustus</p>
            </div>
            <span class="service-arrow">→</span>
          </div>
          <div class="service-list-item">
            <span class="service-list-num">03</span>
            <div class="service-list-text">
              <h4>Elektri- ja hübriidsüsteemid</h4>
              <p>e:HEV ja PHEV diagnostika</p>
            </div>
            <span class="service-arrow">→</span>
          </div>
          <div class="service-list-item">
            <span class="service-list-num">04</span>
            <div class="service-list-text">
              <h4>Diagnostika &amp; garantiitööd</h4>
              <p>Tarkvara uuendused, garantiitööd</p>
            </div>
            <span class="service-arrow">→</span>
          </div>
          <div class="service-list-item">
            <span class="service-list-num">05</span>
            <div class="service-list-text">
              <h4>Asendusauto</h4>
              <p>Saadaval teeninduse ajaks</p>
            </div>
            <span class="service-arrow">→</span>
          </div>
        </div>
        <div class="service-panel-right">
          <div>
            <span class="sec-num">Broneeri aeg</span>
            <h2 class="service-promo-title">Teie auto on<br/>heades kätes</h2>
            <p class="service-promo-body">Catweesi sertifitseeritud tehnikud hooldavad teie Hondat vastavalt tootja standarditele. Tallinn ja Tartu.</p>
            <span class="swiss-btn swiss-btn-black" onclick="showPage('teenindus')">Broneeri teenindus</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 04. NÕUANDED / TIMELINE -->
  <section class="timeline-section">
    <div class="timeline-header">
      <h2 class="section-h2">NÕUANDED</h2>
    </div>
    <div class="timeline" id="timeline-home">
      <div class="timeline-body">
        <div class="tl-step" style="--d:0s">
          <div class="tl-node">1</div>
          <div class="tl-content">
            <h4>Uue või kasutatud auto ostmine</h4>
            <p>Liisingu abil, vana autoga sissemakseks või ühekorraga välja — auto ostmiseks on just nii mitu erinevat võimalust.</p>
          </div>
        </div>
        <div class="tl-step" style="--d:0.9s">
          <div class="tl-node">2</div>
          <div class="tl-content">
            <h4>Ohutus ja turvalisus</h4>
            <p>Honda turvalisus väljendub pühendumuses pakkuda sõidukeid, mis on ohutud sõitjatele, kaasliiklejatele ja jalakäijatele.</p>
          </div>
        </div>
        <div class="tl-step" style="--d:1.8s">
          <div class="tl-node">3</div>
          <div class="tl-content">
            <h4>Auto hooldamine</h4>
            <p>Ostule järgneva Honda järelteeninduse võtmesõnaks on mugavus, et luua järjepidevus regulaarsetes hooldustes.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 05. TRUST BAR -->
  <section class="trust-bar">
    <div class="trust-inner">
      <div class="trust-item">
        <div class="trust-word">Vali mudel</div>
        <div class="trust-lbl">Laos või tellimisel</div>
      </div>
      <div class="trust-item">
        <div class="trust-word">Sõida läbi</div>
        <div class="trust-lbl">Tallinnas või Tartus</div>
      </div>
      <div class="trust-item">
        <div class="trust-word"><em>Hoia</em> korras</div>
        <div class="trust-lbl">Honda sertifitseeritud hooldus</div>
      </div>
      <div class="trust-item">
        <div class="trust-word">Tule tagasi</div>
        <div class="trust-lbl">Üks tiim kogu auto elukaareks</div>
      </div>
    </div>
  </section>

  <!-- 06. ASUKOHAD -->
  <section class="locations-section swiss-grid-pattern">
    <div class="locations-header">
      <h2 class="section-h2">ESINDUSED</h2>
    </div>
    <div class="locations-grid">
      <div class="location-card">
        <div class="location-city">TALLINN</div>
        <div class="location-detail">
          <span class="location-detail-label">Aadress</span>
          <span class="location-detail-val">Pärnu mnt 555, 10603 Tallinn</span>
        </div>
        <div class="location-detail">
          <span class="location-detail-label">Telefon</span>
          <span class="location-detail-val">+372 612 3456</span>
        </div>
        <div class="location-detail">
          <span class="location-detail-label">Lahtiolekuajad</span>
          <span class="location-detail-val">E–R 8:00–18:00 · L 9:00–15:00</span>
        </div>
        <div class="location-map-placeholder">Google Maps</div>
      </div>
      <div class="location-card">
        <div class="location-city">TARTU</div>
        <div class="location-detail">
          <span class="location-detail-label">Aadress</span>
          <span class="location-detail-val">Ringtee 77, 50106 Tartu</span>
        </div>
        <div class="location-detail">
          <span class="location-detail-label">Telefon</span>
          <span class="location-detail-val">+372 712 3456</span>
        </div>
        <div class="location-detail">
          <span class="location-detail-label">Lahtiolekuajad</span>
          <span class="location-detail-val">E–R 8:00–18:00 · L 9:00–15:00</span>
        </div>
        <div class="location-map-placeholder">Google Maps</div>
      </div>
    </div>
  </section>

  <!-- 07. UUDISED -->
  <section class="news-section swiss-diagonal">
    <div class="news-header">
      <div>
        <h2 class="section-h2">UUDISED</h2>
      </div>
      <a href="#" class="swiss-btn swiss-btn-outline">Kõik uudised</a>
    </div>
    <div class="news-grid">
      <div class="news-card">
        <div class="news-img"><img src="https://catwees.ee/wp-content/uploads/2026/04/Honda_EE_3100x1330_Suvine.jpg" alt="Suvine pakkumine" /></div>
        <div class="news-body">
          <div class="news-meta">Aprill 2026 · Pakkumised</div>
          <h4 class="news-title">Suvine Honda kampaania — eripakkumised laomudelitele</h4>
          <p class="news-excerpt">Kevad toob kaasa suurepäraseid pakkumisi laos olevatele Honda mudelitele.</p>
          <a href="#" class="news-link">Loe rohkem</a>
        </div>
      </div>
      <div class="news-card">
        <div class="news-img"><img src="https://catwees.ee/wp-content/uploads/2026/03/suverehvide-pakkumised.jpg" alt="Suverehvide pakkumised" /></div>
        <div class="news-body">
          <div class="news-meta">Märts 2026 · Teenindus</div>
          <h4 class="news-title">Kevadine rehvivahetus — broneeri aeg ette</h4>
          <p class="news-excerpt">Kevad on käes! Broneeri rehvivahetus õigeaegselt ja säästa ootamisaega.</p>
          <a href="#" class="news-link">Loe rohkem</a>
        </div>
      </div>
      <div class="news-card">
        <div class="news-img"><img src="https://catwees.ee/wp-content/uploads/2019/12/HONDA-Jazz.jpg" alt="Honda Jazz" /></div>
        <div class="news-body">
          <div class="news-meta">Veebruar 2026 · Uued mudelid</div>
          <h4 class="news-title">Honda Jazz e:HEV — rohkem ruumi, vähem kütust</h4>
          <p class="news-excerpt">Linnamaastur uues kuues. Jazz e:HEV on nüüd saadaval mõlemas esinduses.</p>
          <a href="#" class="news-link">Loe rohkem</a>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA — PROOVISÕIT -->
  <section class="cta-strip">
    <div class="cta-strip-inner">
      <div class="cta-strip-left">
        <span class="cta-strip-eyebrow">Proovisõit</span>
        <h2 class="cta-strip-headline">Tule proovi.<br/>Sõida ära.</h2>
      </div>
      <div class="cta-strip-right">
        <p class="cta-strip-desc">Broneeri tasuta proovisõit meie esinduses. Tallinn või Tartu — teie valik. Ilma kohustuseta.</p>
        <div style="display:flex;gap:0;">
          <span class="swiss-btn swiss-btn-white" onclick="showPage('teenindus')" style="border-right:2px solid rgba(0,0,0,.2);">Broneeri proovisõit</span>
          <span class="swiss-btn swiss-btn-black" onclick="showPage('laopakkumised')">Vaata laopakkumisi</span>
        </div>
      </div>
    </div>
  </section>

</div><!-- /page-home -->


<!-- ════════════════════════════════════════════════════════════
     PAGE: LAOPAKKUMISED
════════════════════════════════════════════════════════════ -->
<div class="page" id="page-laopakkumised">

  <div class="page-hero">
    <div class="page-hero-inner">
      <div class="breadcrumb"><a onclick="showPage('home')">Avaleht</a><span>/</span> Laopakkumised</div>
      <h1 class="page-title">LAOPAKKUMISED</h1>
      <p class="page-sub">Kohe saadaolevad Honda mudelid meie Tallinna ja Tartu laost — kiire üleandmine, kindel hind.</p>
    </div>
  </div>

  <div style="background:var(--swiss-white);border-bottom:var(--border-thick);">
    <div class="filter-bar-swiss" data-card-filter="laopakkumised">
      <div class="filter-group-swiss"><label>Mudel</label><select data-filter-field="model"><option value="all">Kõik mudelid</option><option value="cr-v">CR-V</option><option value="zr-v">ZR-V</option><option value="hr-v">HR-V</option><option value="civic">Civic</option><option value="jazz">Jazz</option></select></div>
      <div class="filter-group-swiss"><label>Asukoht</label><select data-filter-field="location"><option value="all">Tallinn &amp; Tartu</option><option value="tallinn">Tallinn</option><option value="tartu">Tartu</option></select></div>
      <div class="filter-group-swiss"><label>Hind kuni</label><select data-filter-field="price"><option value="all">Kõik hinnad</option><option value="30000">kuni 30 000 €</option><option value="40000">kuni 40 000 €</option><option value="50000">kuni 50 000 €</option></select></div>
      <div class="filter-group-swiss"><label>Jõuallikas</label><select data-filter-field="powertrain"><option value="all">Kõik</option><option value="hybrid">Hübriid</option><option value="plug-in-hybrid">Plug-in hübriid</option><option value="electric">Elekter</option></select></div>
      <button class="swiss-btn swiss-btn-black" type="button" data-filter-submit style="align-self:flex-end;">Otsi</button>
    </div>
    <div class="models-grid" data-filter-grid="laopakkumised" style="padding-top:0;">

      <div class="car-card" data-model="cr-v" data-location="tallinn" data-price="47200" data-powertrain="plug-in-hybrid">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2023/06/CRV_PHEV_ADVANCE.jpg" alt="CR-V" />
          <span class="card-badge card-badge-red">LAOS — TALLINN</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda · 2025 · Plug-in hübriid</div>
          <div class="car-card-name">CR-V e:PHEV Advance</div>
          <div class="car-card-desc">Platinum White · AWD · 7-kohaline</div>
          <div class="car-card-footer">
            <div class="car-price">47 200 €</div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card" data-model="zr-v" data-location="tartu" data-price="39500" data-powertrain="hybrid">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2023/06/ZR-V_ADVANCE.jpg" alt="ZR-V" />
          <span class="card-badge card-badge-red">LAOS — TARTU</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda · 2025 · Hübriid</div>
          <div class="car-card-name">ZR-V e:HEV Advance</div>
          <div class="car-card-desc">Sonic Grey · FWD · Sport pakett</div>
          <div class="car-card-footer">
            <div class="car-price">39 500 €</div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card" data-model="hr-v" data-location="tallinn" data-price="29900" data-powertrain="hybrid">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2021/03/HR-V-thumbnail.jpg" alt="HR-V" />
          <span class="card-badge card-badge-red">LAOS — TALLINN</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda · 2024 · Hübriid</div>
          <div class="car-card-name">HR-V e:HEV Elegance</div>
          <div class="car-card-desc">Lunar Silver · FWD · Nahkistmed</div>
          <div class="car-card-footer">
            <div class="car-price"><span class="car-old-price">31 500 €</span>29 900 €</div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card" data-model="civic" data-location="tartu" data-price="34800" data-powertrain="hybrid">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2022/03/Civic-ikoon-1.jpg" alt="Civic" />
          <span class="card-badge card-badge-red">LAOS — TARTU</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda · 2025 · Hübriid</div>
          <div class="car-card-name">Civic e:HEV Advance</div>
          <div class="car-card-desc">Crystal Black · FWD · Bose heli</div>
          <div class="car-card-footer">
            <div class="car-price">34 800 €</div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card" data-model="e-ny1" data-location="tallinn" data-price="44900" data-powertrain="electric">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2023/07/eNY1_ADVANCE.jpg" alt="e:Ny1" />
          <span class="card-badge card-badge-red">LAOS — TALLINN</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda · 2025 · Elekter</div>
          <div class="car-card-name">e:Ny1 Advance</div>
          <div class="car-card-desc">Aegean Blue · AWD · 412 km</div>
          <div class="car-card-footer">
            <div class="car-price">44 900 €</div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card" data-model="jazz" data-location="tallinn" data-price="26400" data-powertrain="hybrid">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2019/12/HONDA-Jazz.jpg" alt="Jazz" />
          <span class="card-badge card-badge-red">LAOS — TALLINN</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda · 2024 · Hübriid</div>
          <div class="car-card-name">Jazz e:HEV Elegance</div>
          <div class="car-card-desc">Premium Crystal Red · FWD</div>
          <div class="car-card-footer">
            <div class="car-price"><span class="car-old-price">27 900 €</span>26 400 €</div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

    </div>
    <div class="filter-empty" data-filter-empty="laopakkumised">Selle filtriga laopakkumisi ei leitud.</div>
  </div>

</div><!-- /page-laopakkumised -->


<!-- ════════════════════════════════════════════════════════════
     PAGE: ERIPAKKUMISED
════════════════════════════════════════════════════════════ -->
<div class="page" id="page-eripakkumised">

  <div class="page-hero">
    <div class="page-hero-inner">
      <div class="breadcrumb"><a onclick="showPage('home')">Avaleht</a><span>/</span> Eripakkumised</div>
      <h1 class="page-title">ERIPAKKUMISED</h1>
      <p class="page-sub">Piiratud aja pakkumised ja kampaaniad — säästke kuni 3 000 € valitud mudelitelt.</p>
    </div>
  </div>

  <div class="offer-banner-wrap">
    <div class="offer-banner" style="border-bottom:none;">
      <div>
        <span class="offer-tag">Suvekampaania 2026</span>
        <h2 class="offer-title">Kuni 3 000 € soodustust<br/>laos olevatele mudelitele</h2>
        <p class="offer-desc">Kampaania kehtib kuni 30. juunini 2026. Piiratud arv sõidukeid. Tingimused esinduses.</p>
      </div>
      <button class="swiss-btn swiss-btn-white" onclick="showPage('laopakkumised')">Vaata laopakkumisi</button>
    </div>
  </div>

  <div style="background:var(--swiss-white);border-bottom:var(--border-thick);">
    <div class="models-grid" style="padding-top:0;">

      <div class="car-card">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2021/03/HR-V-thumbnail.jpg" alt="HR-V" />
          <span class="card-badge card-badge-red">−1 600 €</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda · Eripakkumine</div>
          <div class="car-card-name">HR-V e:HEV</div>
          <div class="car-card-desc">Compact SUV · Täishübriid · Kohe laos</div>
          <div class="car-card-footer">
            <div class="car-price"><span class="car-old-price">31 500 €</span>29 900 €</div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2019/12/HONDA-Jazz.jpg" alt="Jazz" />
          <span class="card-badge card-badge-red">−1 500 €</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda · Eripakkumine</div>
          <div class="car-card-name">Jazz e:HEV</div>
          <div class="car-card-desc">Linnamaastur · Täishübriid · Kohe laos</div>
          <div class="car-card-footer">
            <div class="car-price"><span class="car-old-price">27 900 €</span>26 400 €</div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2026/03/suverehvide-pakkumised.jpg" alt="Suverehvid" />
          <span class="card-badge">TEENINDUS</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Teenindus · Kampaania</div>
          <div class="car-card-name">Suverehvide vahetus</div>
          <div class="car-card-desc">Rehvivahetus + tasakaalustus · Honda mudelitele</div>
          <div class="car-card-footer">
            <div class="car-price"><span class="car-old-price">89 €</span>69 €</div>
            <button class="card-cta" onclick="showPage('teenindus')">Broneeri</button>
          </div>
        </div>
      </div>

      <div class="car-card">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2023/06/CRV_PHEV_ADVANCE.jpg" alt="CR-V liising" />
          <span class="card-badge">FINANTSEERIMINE</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">Honda · Liisingpakkumine</div>
          <div class="car-card-name">CR-V e:PHEV liising</div>
          <div class="car-card-desc">0% intress · 12 kuud · Sissemakse alates 20%</div>
          <div class="car-card-footer">
            <div class="car-price">alates 549 € <small>/ kuus</small></div>
            <button class="card-cta">Küsi</button>
          </div>
        </div>
      </div>

    </div>
  </div>

</div><!-- /page-eripakkumised -->


<!-- ════════════════════════════════════════════════════════════
     PAGE: KASUTATUD AUTOD
════════════════════════════════════════════════════════════ -->
<div class="page" id="page-kasutatud">

  <div class="page-hero">
    <div class="page-hero-inner">
      <div class="breadcrumb"><a onclick="showPage('home')">Avaleht</a><span>/</span> Kasutatud autod</div>
      <h1 class="page-title">KASUTATUD<br/>AUTOD</h1>
      <p class="page-sub">Hoolikalt valitud kasutatud Honda mudelid — tehniline ülevaatus tehtud, garantii olemas.</p>
    </div>
  </div>

  <div style="background:var(--swiss-white);border-bottom:var(--border-thick);">
    <div class="filter-bar-swiss">
      <div class="filter-group-swiss"><label>Mudel</label><select><option>Kõik mudelid</option><option>CR-V</option><option>HR-V</option><option>Civic</option><option>Jazz</option><option>Accord</option></select></div>
      <div class="filter-group-swiss"><label>Aasta alates</label><select><option>Kõik</option><option>2022</option><option>2021</option><option>2020</option><option>2019</option></select></div>
      <div class="filter-group-swiss"><label>Läbisõit kuni</label><select><option>Kõik</option><option>kuni 20 000 km</option><option>kuni 50 000 km</option><option>kuni 100 000 km</option></select></div>
      <div class="filter-group-swiss"><label>Hind kuni</label><select><option>Kõik</option><option>kuni 15 000 €</option><option>kuni 25 000 €</option><option>kuni 35 000 €</option></select></div>
      <button class="swiss-btn swiss-btn-black" style="align-self:flex-end;">Otsi</button>
    </div>
    <div class="models-grid" style="padding-top:0;">

      <div class="car-card">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2023/06/CRV_PHEV_ADVANCE.jpg" alt="CR-V" />
          <span class="card-badge card-badge-outline">SERTIFITSEERITUD</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">2022 · 28 400 km · Hübriid</div>
          <div class="car-card-name">Honda CR-V e:HEV</div>
          <div class="car-card-desc">Elegance · Platinum White · 1 omanik</div>
          <div class="car-card-footer">
            <div class="car-price">34 500 €</div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2022/03/Civic-ikoon-1.jpg" alt="Civic" />
          <span class="card-badge card-badge-outline">SERTIFITSEERITUD</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">2022 · 41 200 km · Hübriid</div>
          <div class="car-card-name">Honda Civic e:HEV</div>
          <div class="car-card-desc">Elegance · Crystal Black · 1 omanik</div>
          <div class="car-card-footer">
            <div class="car-price">26 900 €</div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2021/03/HR-V-thumbnail.jpg" alt="HR-V" />
          <span class="card-badge">HEA HIND</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">2021 · 63 800 km · Hübriid</div>
          <div class="car-card-name">Honda HR-V e:HEV</div>
          <div class="car-card-desc">Executive · Lunar Silver · 2 omanikku</div>
          <div class="car-card-footer">
            <div class="car-price">21 400 €</div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

      <div class="car-card">
        <div class="car-card-img">
          <img src="https://catwees.ee/wp-content/uploads/2019/12/HONDA-Jazz.jpg" alt="Jazz" />
          <span class="card-badge">HEA HIND</span>
        </div>
        <div class="car-card-body">
          <div class="car-brand-label">2020 · 52 100 km · Hübriid</div>
          <div class="car-card-name">Honda Jazz e:HEV</div>
          <div class="car-card-desc">Comfort · Premium Red · 1 omanik</div>
          <div class="car-card-footer">
            <div class="car-price">17 800 €</div>
            <button class="card-cta">Vaata</button>
          </div>
        </div>
      </div>

    </div>
  </div>

</div><!-- /page-kasutatud -->


<!-- ════════════════════════════════════════════════════════════
     PAGE: TEENINDUS
════════════════════════════════════════════════════════════ -->
<div class="page" id="page-teenindus">

  <div class="page-hero">
    <div class="page-hero-inner">
      <div class="breadcrumb"><a onclick="showPage('home')">Avaleht</a><span>/</span> Teenindus</div>
      <h1 class="page-title">TEENINDUS</h1>
      <p class="page-sub">Broneeri aeg Honda sertifitseeritud teenindusesse. Tallinn ja Tartu.</p>
    </div>
  </div>

  <section class="booking-section-swiss">
    <div class="booking-inner">
      <div class="booking-left">
        <span class="panel-label">Meie teenused</span>
        <div class="service-list-item is-selected" role="button" tabindex="0" data-booking-service="hooldus" aria-pressed="true">
          <span class="service-list-num">01</span>
          <div class="service-list-text">
            <h4>Korraline hooldus</h4>
            <p>Oli, filtrid, pidurid, tehnoülevaatus</p>
          </div>
          <span class="service-arrow">→</span>
        </div>
        <div class="service-list-item" role="button" tabindex="0" data-booking-service="rehvid" aria-pressed="false">
          <span class="service-list-num">02</span>
          <div class="service-list-text">
            <h4>Rehvivahetus &amp; hoiustamine</h4>
            <p>Suve- ja talverehvid, tasakaalustus</p>
          </div>
          <span class="service-arrow">→</span>
        </div>
        <div class="service-list-item" role="button" tabindex="0" data-booking-service="hybrid" aria-pressed="false">
          <span class="service-list-num">03</span>
          <div class="service-list-text">
            <h4>Elektri- ja hübriidsüsteemid</h4>
            <p>e:HEV, PHEV ja BEV diagnostika</p>
          </div>
          <span class="service-arrow">→</span>
        </div>
        <div class="service-list-item" role="button" tabindex="0" data-booking-service="diagnostika" aria-pressed="false">
          <span class="service-list-num">04</span>
          <div class="service-list-text">
            <h4>Diagnostika &amp; garantiitööd</h4>
            <p>Honda ametlik garantiiremont ja tarkvarauuendused</p>
          </div>
          <span class="service-arrow">→</span>
        </div>
        <div class="service-list-item" role="button" tabindex="0" data-booking-service="keretood" aria-pressed="false">
          <span class="service-list-num">05</span>
          <div class="service-list-text">
            <h4>Kere- ja viimistlustööd</h4>
            <p>Kriimustused, värvimised, poleerimised</p>
          </div>
          <span class="service-arrow">→</span>
        </div>
        <div class="service-list-item" role="button" tabindex="0" data-booking-service="asendusauto" aria-pressed="false">
          <span class="service-list-num">06</span>
          <div class="service-list-text">
            <h4>Asendusauto</h4>
            <p>Tasuta asendusauto teeninduse ajaks</p>
          </div>
          <span class="service-arrow">→</span>
        </div>
      </div>
      <div class="booking-right">
        <h3>Broneeri aeg</h3>
        <div class="form-row-swiss">
          <div class="form-group-swiss" style="border-right:var(--border-thin);padding-right:20px;margin-right:0;">
            <label>Eesnimi</label>
            <input type="text" placeholder="Martin" />
          </div>
          <div class="form-group-swiss" style="padding-left:20px;">
            <label>Perekonnanimi</label>
            <input type="text" placeholder="Tamm" />
          </div>
        </div>
        <div class="form-row-swiss">
          <div class="form-group-swiss" style="border-right:var(--border-thin);padding-right:20px;">
            <label>Telefon</label>
            <input type="tel" placeholder="+372 5123 4567" />
          </div>
          <div class="form-group-swiss" style="padding-left:20px;">
            <label>E-post</label>
            <input type="email" placeholder="martin@email.ee" />
          </div>
        </div>
        <div class="form-group-swiss">
          <label>Auto registreerimisnumber</label>
          <input type="text" placeholder="123ABC" />
        </div>
        <div class="form-group-swiss">
          <label>Asukoht</label>
          <select><option>Tallinn</option><option>Tartu</option></select>
        </div>
        <div style="margin-top:24px;">
          <div style="font-size:9px;font-weight:900;letter-spacing:.18em;text-transform:uppercase;color:rgba(0,0,0,.35);margin-bottom:8px;">Teenus</div>
          <div class="service-types-swiss">
            <div class="service-type-btn selected" data-service-type="hooldus">Korraline hooldus</div>
            <div class="service-type-btn" data-service-type="rehvid">Rehvivahetus</div>
            <div class="service-type-btn" data-service-type="hybrid">Elektri- ja hübriidsüsteemid</div>
            <div class="service-type-btn" data-service-type="diagnostika">Diagnostika / garantii</div>
            <div class="service-type-btn" data-service-type="keretood">Keretööd</div>
            <div class="service-type-btn" data-service-type="asendusauto">Asendusauto</div>
          </div>
        </div>
        <div class="form-group-swiss">
          <label>Lisainfo</label>
          <textarea rows="3" placeholder="Kirjeldage probleemi või lisasoove..."></textarea>
        </div>
        <button class="swiss-btn swiss-btn-black" style="width:100%;margin-top:24px;">Saada broneering</button>
      </div>
    </div>
  </section>

  <section style="background:var(--swiss-white);border-bottom:var(--border-thick);">
    <div class="locations-header" style="border-bottom:var(--border-thin);padding-bottom:28px;">
      <h2 class="section-h2">TEENINDUSKESKUSED</h2>
    </div>
    <div class="locations-grid">
      <div class="location-card">
        <div class="location-city">TALLINN</div>
        <div class="location-detail"><span class="location-detail-label">Aadress</span><span class="location-detail-val">Pärnu mnt 555, 10603 Tallinn</span></div>
        <div class="location-detail"><span class="location-detail-label">Teeninduse tel</span><span class="location-detail-val">+372 612 3456</span></div>
        <div class="location-detail"><span class="location-detail-label">Lahtiolekuajad</span><span class="location-detail-val">E–R 8:00–18:00 · L 9:00–14:00</span></div>
        <div class="location-map-placeholder">Google Maps</div>
      </div>
      <div class="location-card">
        <div class="location-city">TARTU</div>
        <div class="location-detail"><span class="location-detail-label">Aadress</span><span class="location-detail-val">Ringtee 77, 50106 Tartu</span></div>
        <div class="location-detail"><span class="location-detail-label">Teeninduse tel</span><span class="location-detail-val">+372 712 3456</span></div>
        <div class="location-detail"><span class="location-detail-label">Lahtiolekuajad</span><span class="location-detail-val">E–R 8:00–18:00 · L 9:00–14:00</span></div>
        <div class="location-map-placeholder">Google Maps</div>
      </div>
    </div>
  </section>

</div><!-- /page-teenindus -->


<!-- ════════════════════════════════════════════════════════════
     PAGE: MEIST
════════════════════════════════════════════════════════════ -->
<div class="page" id="page-meist">

  <div class="page-hero">
    <div class="page-hero-inner">
      <div class="breadcrumb"><a onclick="showPage('home')">Avaleht</a><span>/</span> Meist</div>
      <h1 class="page-title">MEIST</h1>
      <p class="page-sub">Catwees on ametlik Honda esindustus Eestis alates 2000. aastast — kaks esindust, üks eesmärk.</p>
    </div>
  </div>

  <div class="about-intro-swiss">
    <div class="about-img-panel">
      <img src="<?php echo esc_url( catwees_2026_asset('hero-crv-2026.jpg') ); ?>" alt="Honda CR-V Catwees esinduses" />
    </div>
    <div class="about-text-panel">
      <span class="sec-num">Meie lugu</span>
      <h2>Üle 25 aasta Eesti<br/>Honda eksperdid</h2>
      <p>Catwees alustas tegevust 2000. aastal Tallinnas, eesmärgiga tuua Eesti turule Honda uusimad mudelid koos tasemel teenindusega. Täna töötab meil üle 30 spetsialisti kahes esinduses — Tallinnas ja Tartus.</p>
      <p>Meie tehnikud läbivad regulaarselt Honda koolitusi Euroopas ning on sertifitseeritud kõigi praeguste mudelite hooldamiseks, kaasa arvatud e:HEV, PHEV ja täiselektriliste sõidukite süsteemid.</p>
      <p>Honda esindusena järgime rangelt tootja standardeid — nii müügis kui teeninduses. Teie auto on alati heades kätes.</p>
    </div>
  </div>

  <section class="values-section swiss-dots">
    <div class="values-header">
      <h2 class="section-h2">VÄÄRTUSED</h2>
    </div>
    <div class="values-grid">
      <div class="value-card-swiss">
        <div class="value-icon">★</div>
        <h4>Honda sertifitseering</h4>
        <p>Kõik meie tehnikud on läbinud Honda ametliku väljaõppe ja regulaarsed koolitused.</p>
      </div>
      <div class="value-card-swiss">
        <div class="value-icon">◆</div>
        <h4>Aus hinnakujundus</h4>
        <p>Selge hinnakirjaga, ilma peidetud tasudeta. Läbipaistvus igas tehingus.</p>
      </div>
      <div class="value-card-swiss">
        <div class="value-icon">●</div>
        <h4>Kaks asukohta</h4>
        <p>Tallinn ja Tartu — lähim esindus on teile alati käepärast.</p>
      </div>
      <div class="value-card-swiss">
        <div class="value-icon">⚡</div>
        <h4>Elektri- ja hübriidekspertiis</h4>
        <p>e:HEV, PHEV ja BEV — kõikide Honda elektrisüsteemide spetsialistid.</p>
      </div>
      <div class="value-card-swiss">
        <div class="value-icon">▲</div>
        <h4>Asendusauto</h4>
        <p>Teeninduse ajaks saate asendusauto, et elu saaks edasi minna.</p>
      </div>
      <div class="value-card-swiss">
        <div class="value-icon">■</div>
        <h4>Klienditugi</h4>
        <p>Meie klienditoe meeskond on valmis aitama igal tööpäeval.</p>
      </div>
    </div>
  </section>

  <section style="background:var(--swiss-white);border-bottom:var(--border-thick);">
    <div class="locations-header" style="border-bottom:var(--border-thin);padding-bottom:28px;">
      <h2 class="section-h2">KONTAKT</h2>
    </div>
    <div class="locations-grid">
      <div class="location-card">
        <div class="location-city">TALLINN</div>
        <div class="location-detail"><span class="location-detail-label">Aadress</span><span class="location-detail-val">Karamelli 6, 11318 Tallinn</span></div>
        <div class="location-detail"><span class="location-detail-label">Keskus</span><span class="location-detail-val"><a href="tel:+3726503300">6 503 300</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Teenindus</span><span class="location-detail-val"><a href="tel:+3726503320">6 503 320</a></span></div>
        <div class="location-detail"><span class="location-detail-label">E-post</span><span class="location-detail-val"><a href="mailto:tallinn@catwees.ee">tallinn@catwees.ee</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Ajad</span><span class="location-detail-val">E-R 8.00 - 18.00 · L-P suletud</span></div>
        <button class="location-map-placeholder contact-page-link" type="button" onclick="showPage('muugikonsultandid')">Müügikonsultandid</button>
      </div>
      <div class="location-card">
        <div class="location-city">TARTU</div>
        <div class="location-detail"><span class="location-detail-label">Aadress</span><span class="location-detail-val">Tehnika 3, 50104 Tartu</span></div>
        <div class="location-detail"><span class="location-detail-label">Keskus</span><span class="location-detail-val"><a href="tel:+3727300385">7 300 385</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Teenindus</span><span class="location-detail-val"><a href="tel:+3727300383">7 300 383</a></span></div>
        <div class="location-detail"><span class="location-detail-label">E-post</span><span class="location-detail-val"><a href="mailto:tartu@catwees.ee">tartu@catwees.ee</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Ajad</span><span class="location-detail-val">E-R 8.00 - 18.00 · L-P suletud</span></div>
        <button class="location-map-placeholder contact-page-link" type="button" onclick="showPage('muugikonsultandid')">Müügikonsultandid</button>
      </div>
    </div>
  </section>

</div><!-- /page-meist -->

<div class="page" id="page-uldkontaktid">
  <section class="page-hero">
    <div class="page-hero-inner">
      <div class="breadcrumb"><a onclick="showPage('home')">Avaleht</a><span>/</span><a onclick="showPage('meist')"> Meist</a><span>/</span> Üldkontaktid</div>
      <h1 class="page-title">Üldkontaktid</h1>
      <p class="page-sub">Catweesi Tallinna ja Tartu keskuste kontaktid, aadressid ja lahtiolekuajad.</p>
    </div>
  </section>

  <section style="background:var(--swiss-white);border-bottom:var(--border-thick);">
    <div class="locations-header">
      <h2 class="section-h2">Tallinn ja Tartu</h2>
    </div>
    <div class="locations-grid">
      <div class="location-card">
        <div class="location-city">Tallinn</div>
        <div class="location-detail"><span class="location-detail-label">Aadress</span><span class="location-detail-val">Karamelli 6, 11318 Tallinn</span></div>
        <div class="location-detail"><span class="location-detail-label">Keskus</span><span class="location-detail-val"><a href="tel:+3726503300">6 503 300</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Teenindus</span><span class="location-detail-val"><a href="tel:+3726503320">6 503 320</a></span></div>
        <div class="location-detail"><span class="location-detail-label">E-post</span><span class="location-detail-val"><a href="mailto:tallinn@catwees.ee">tallinn@catwees.ee</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Teenindus</span><span class="location-detail-val">E-R 8.00 - 18.00 · L-P suletud</span></div>
        <button class="location-map-placeholder contact-page-link" type="button" onclick="showPage('muugikonsultandid')">Tallinna müügikonsultandid</button>
      </div>
      <div class="location-card">
        <div class="location-city">Tartu</div>
        <div class="location-detail"><span class="location-detail-label">Aadress</span><span class="location-detail-val">Tehnika 3, 50104 Tartu</span></div>
        <div class="location-detail"><span class="location-detail-label">Keskus</span><span class="location-detail-val"><a href="tel:+3727300385">7 300 385</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Teenindus</span><span class="location-detail-val"><a href="tel:+3727300383">7 300 383</a></span></div>
        <div class="location-detail"><span class="location-detail-label">E-post</span><span class="location-detail-val"><a href="mailto:tartu@catwees.ee">tartu@catwees.ee</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Müük</span><span class="location-detail-val">E-R 8.00 - 18.00 · L 10.00 - 15.00 · P suletud</span></div>
        <div class="location-detail"><span class="location-detail-label">Teenindus</span><span class="location-detail-val">E-R 8.00 - 18.00 · L-P suletud</span></div>
        <button class="location-map-placeholder contact-page-link" type="button" onclick="showPage('muugikonsultandid')">Tartu müügikonsultandid</button>
      </div>
    </div>
  </section>
</div><!-- /page-uldkontaktid -->

<div class="page" id="page-muugikonsultandid">
  <section class="page-hero">
    <div class="page-hero-inner">
      <div class="breadcrumb"><a onclick="showPage('home')">Avaleht</a><span>/</span><a onclick="showPage('meist')"> Meist</a><span>/</span> Müügikonsultandid</div>
      <h1 class="page-title">Müügikonsultandid</h1>
      <p class="page-sub">Uute ja kasutatud autode müügikontaktid Tallinna ja Tartu keskustes.</p>
    </div>
  </section>

  <section style="background:var(--swiss-white);border-bottom:var(--border-thick);">
    <div class="locations-header">
      <h2 class="section-h2">Tallinn</h2>
    </div>
    <div class="locations-grid">
      <div class="location-card">
        <div class="location-city">Tõnis Lepp</div>
        <div class="location-detail"><span class="location-detail-label">Roll</span><span class="location-detail-val">Müügikonsultant, uued autod</span></div>
        <div class="location-detail"><span class="location-detail-label">E-post</span><span class="location-detail-val"><a href="mailto:tonis.lepp@catwees.ee">tonis.lepp@catwees.ee</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Mobiil</span><span class="location-detail-val"><a href="tel:+37255955335">55955335</a></span></div>
      </div>
      <div class="location-card">
        <div class="location-city">Silver Kattai</div>
        <div class="location-detail"><span class="location-detail-label">Roll</span><span class="location-detail-val">Müügikonsultant, uued autod</span></div>
        <div class="location-detail"><span class="location-detail-label">E-post</span><span class="location-detail-val"><a href="mailto:silver.kattai@catwees.ee">silver.kattai@catwees.ee</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Mobiil</span><span class="location-detail-val"><a href="tel:+3725068118">5068118</a></span></div>
      </div>
    </div>
  </section>

  <section style="background:var(--swiss-white);border-bottom:var(--border-thick);">
    <div class="locations-header">
      <h2 class="section-h2">Tartu</h2>
    </div>
    <div class="locations-grid">
      <div class="location-card">
        <div class="location-city">Aivar Ruugla</div>
        <div class="location-detail"><span class="location-detail-label">Roll</span><span class="location-detail-val">Müügikonsultant, uued autod</span></div>
        <div class="location-detail"><span class="location-detail-label">E-post</span><span class="location-detail-val"><a href="mailto:aivar.ruugla@catwees.ee">aivar.ruugla@catwees.ee</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Telefon</span><span class="location-detail-val"><a href="tel:+3727300388">7300388</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Mobiil</span><span class="location-detail-val"><a href="tel:+3725067232">5067232</a></span></div>
      </div>
      <div class="location-card">
        <div class="location-city">Ranno Reiman</div>
        <div class="location-detail"><span class="location-detail-label">Roll</span><span class="location-detail-val">Müügikonsultant, uued ja kasutatud autod</span></div>
        <div class="location-detail"><span class="location-detail-label">E-post</span><span class="location-detail-val"><a href="mailto:ranno.reiman@catwees.ee">ranno.reiman@catwees.ee</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Telefon</span><span class="location-detail-val"><a href="tel:+3727300945">7300945</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Mobiil</span><span class="location-detail-val"><a href="tel:+3725146987">5146987</a></span></div>
      </div>
      <div class="location-card">
        <div class="location-city">Taavi Siruli</div>
        <div class="location-detail"><span class="location-detail-label">Roll</span><span class="location-detail-val">Tartu keskuse juhataja</span></div>
        <div class="location-detail"><span class="location-detail-label">E-post</span><span class="location-detail-val"><a href="mailto:taavi.siruli@catwees.ee">taavi.siruli@catwees.ee</a></span></div>
        <div class="location-detail"><span class="location-detail-label">Telefon</span><span class="location-detail-val"><a href="tel:+3727300385">7300385</a></span></div>
      </div>
    </div>
  </section>
</div><!-- /page-muugikonsultandid -->


<!-- ════════════════ FOOTER ════════════════ -->
<footer>
  <div class="footer-top">
    <div class="footer-brand">
      <div class="footer-logos">
        <img class="footer-catwees" src="<?php echo esc_url( catwees_2026_asset('Catwees logo png valge tekst.png') ); ?>" alt="Catwees" />
        <img class="footer-honda" src="<?php echo esc_url( catwees_2026_asset('honda POD logo png valge.png') ); ?>" alt="Honda" />
      </div>
      <p>Ametlik Honda esindustus Eestis. Kogenud meeskond, kaks asukohta, üks eesmärk.</p>
      <button class="swiss-btn swiss-btn-red" onclick="showPage('meist')" style="font-size:10px;padding:12px 20px;">Võtke ühendust</button>
    </div>
    <div class="footer-col">
      <h4>Autod</h4>
      <ul>
        <li><a onclick="showPage('home')">Uued Hondad</a></li>
        <li><a onclick="showPage('kasutatud')">Kasutatud autod</a></li>
        <li><a onclick="showPage('laopakkumised')">Laopakkumised</a></li>
        <li><a onclick="showPage('eripakkumised')">Eripakkumised</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Teenindus</h4>
      <ul>
        <li><a onclick="showPage('teenindus')">Broneeri aeg</a></li>
        <li><a onclick="showPage('teenindus')">Hooldus</a></li>
        <li><a onclick="showPage('teenindus')">Rehvivahetus</a></li>
        <li><a onclick="showPage('teenindus')">Garantii</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Ettevõte</h4>
      <ul>
        <li><a onclick="showPage('meist')">Meist</a></li>
        <li><a href="#">Uudised</a></li>
        <li><a onclick="showPage('meist')">Kontakt</a></li>
        <li><a href="#">Tagasiside</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2026 Catwees OÜ. Kõik õigused kaitstud.</span>
    <div class="footer-bottom-links">
      <a href="#">Privaatsuspoliitika</a>
      <a href="#">Küpsised</a>
      <a href="#">Saidikaart</a>
    </div>
  </div>
</footer>

<a class="float-btn" onclick="showPage('teenindus')">Broneeri teenindus</a>

<?php
get_footer();

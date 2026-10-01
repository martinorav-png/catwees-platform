# Catwees Honda Design Language for Variant

Use this as the design source of truth for the Catwees Honda website. The look is not a generic car dealer template. It is a sharp Swiss automotive dealership interface: official Honda confidence, local Catwees clarity, black-white-red discipline, real vehicle photography, hard grid structure, and direct Estonian service language.

## Core Direction

Create a premium, functional Honda dealership experience for Estonia. The page should feel like a modern official showroom system, not a soft marketing landing page. Use a Swiss International layout language with full-bleed automotive photography, hard rectangular sections, visible dividing rules, oversized condensed typography, and confident red accents.

The emotional tone is: precise, official, energetic, practical, local, and trustworthy. It should feel like Catwees knows Honda deeply and can help users quickly choose between new cars, used cars, offers, test drives, and service booking.

## Brand Position

Catwees is the official Honda dealership and service partner in Estonia, focused only on Honda.

Design around these messages:

- Official Honda experience in Estonia
- Honda models and Catwees people
- New cars, used Hondas, service, test drives, and offers
- Two physical locations: Tallinn and Tartu
- Certified Honda service and warranty confidence
- Hybrid, plug-in hybrid, and electric Honda expertise

## Visual Keywords

Swiss grid, black header, Honda red, dealership precision, hard borders, condensed uppercase headlines, full-bleed car photography, tabular product cards, showroom clarity, local trust, no decoration without function.

## Palette

Use a restricted palette. The design should read black, white, near-white, Honda red, and real photographic color.

Primary colors:

- Ink Black: `#000000`
- Hero Black: `#090909`
- Panel Black: `#111111`
- White: `#FFFFFF`
- Warm Neutral: `#F4F4F1`
- Honda Red: `#E30613`

Supporting colors:

- Soft black text: `rgba(0,0,0,.62)`
- Muted white text: `rgba(255,255,255,.72)`
- Fine black line: `rgba(0,0,0,.12)`
- Fine white line: `rgba(255,255,255,.14)`

Usage:

- Red is an action and authority color. Use it for primary CTAs, active states, small section numbers, badges, and key brand words.
- Black is the main frame color for navigation, hero overlays, footer, and high-emphasis panels.
- White and `#F4F4F1` are functional surfaces for inventory, forms, service content, and dealership information.
- Avoid blues, purples, beige/tan, gradients, glassy color effects, and decorative color variety.

## Typography

Use IBM Plex Sans as the main family.

Fonts:

- Display: `IBM Plex Sans Condensed`, fallback `IBM Plex Sans`, sans-serif
- Body/UI: `IBM Plex Sans`, sans-serif

Type behavior:

- Headlines are uppercase, condensed, heavy, and left aligned.
- Section titles should feel poster-like: very large, compressed, and anchored to the grid.
- Body copy is clear and service-oriented, not poetic.
- Labels, nav items, badges, and metadata use small uppercase text with measured letter spacing.

Suggested scale:

- Hero H1: `clamp(3.1rem, 7.2vw, 6.8rem)`, line-height `.88`
- Main section H2: `clamp(3.25rem, 8vw, 7.5rem)`, line-height `.9`
- Card title: `1.6rem` to `2.4rem`, condensed, uppercase where appropriate
- Body copy: `14px` to `18px`, line-height `1.45` to `1.6`
- Micro labels: `9px` to `12px`, uppercase, `700-900` weight, letter spacing around `.08em`

Avoid:

- Rounded friendly display fonts
- Serif typography
- Thin elegant fashion typography
- Centered hero typography
- Long paragraphs in large display areas

## Layout System

The layout is built from full-width bands and hard grid modules.

Rules:

- Use full-width sections, not floating decorative cards.
- Keep content aligned to a max width around `1440px`.
- Use `40px` desktop side padding, `16px-22px` mobile side padding.
- Divide areas with 1px black or translucent white rules.
- Use rectangular modules with no border radius.
- Use borders instead of soft shadows for normal UI.
- Use large asymmetric sections: image-heavy hero, text-heavy left panels, product grids.
- Let section headers occupy real vertical space.

Structural motifs:

- Sticky black top navigation
- Full-bleed hero image with dark gradient overlay
- Left-aligned large masthead
- Three-option hero decision hub
- Inventory cards in a strict grid
- Service list next to booking/action panel
- Location cards split by hard borders
- Black footer with red action

## Hero Language

The hero is the signature moment.

Hero composition:

- Full viewport or near-full viewport.
- Use real Honda vehicle photography as the entire background.
- Apply a dark overlay so white/red text remains legible.
- Place content left, not centered.
- H1 should be large and blunt, for example `CATWEES. / SINU HONDA KODU.`
- Make one word red to tie directly to the Honda/Catwees brand.
- Under the intro copy, show a short authorization line with a red rule.
- Primary interaction is a three-column decision hub, not a generic CTA pair.

Hero decision hub:

- Three choices: new Honda models, used cars, service.
- Each choice is a hard-edged rectangular tab.
- Black translucent background by default.
- White hover/active state with red underline.
- Secondary panel opens below with contextual links.
- Text should help the user choose a path, not repeat marketing slogans.

Do not use:

- Generic split hero with image card on one side
- Decorative gradient orbs
- Centered headline floating over blurred stock image
- Rounded CTA pills
- Overly emotional car advertising copy

## Navigation

Header:

- Sticky at top.
- Black background.
- Honda and Catwees logos together on the left, separated by a thin vertical divider.
- Navigation items in uppercase micro text.
- Active/hover state uses red.
- CTA area on the right with language, service booking, and test drive.
- Use hard vertical dividers between nav zones.

Desktop nav should feel like an official control strip. Mobile nav can scroll horizontally if needed, preserving the same black bar and compact uppercase language.

## Buttons and Actions

Button style:

- Rectangular, zero radius.
- Uppercase text.
- Heavy weight.
- Clear black/white/red states.
- Minimum height around `48px` for primary hero actions.
- Use borders for outlines.

Button types:

- Primary red: red background, white text.
- Primary black: black background, white text; hover red.
- White action: white background, black text; hover red/white.
- Outline: transparent with 1px border.

Avoid pill buttons, soft shadows, gradient buttons, and icon-only CTAs unless the icon is a real functional control.

## Product and Inventory Cards

Cards are grid cells, not soft cards.

Card rules:

- White or neutral background.
- 1px borders between cards.
- No rounded corners.
- Image area has a light neutral background.
- Vehicle image should be clean and inspectable.
- Badges sit top-left.
- Card body uses brand label, model name, description, price, and a compact CTA.
- Hover can invert to black with white text and red CTA.
- First card may span two columns to create editorial rhythm.

Content pattern:

- Brand label: `Honda`
- Model title: `CR-V e:PHEV`
- Description: drivetrain/body/powertrain facts
- Price: clear amount or `Kusi hind`
- CTA: `Vaata`, `Kusi`, or `Broneeri`

Use real model names and avoid invented trims unless the product data provides them.

## Filters and Forms

Filters:

- Use horizontal tab controls for model categories.
- Active tab is black with white text and a red inset underline.
- Keep labels short: `Koik`, `SUV`, `Hubriid`, `Elekter`, `Sedaan`, `Eripakkumised`.

Forms:

- White or neutral surface.
- Black 1px borders.
- Labels in small uppercase.
- Inputs are rectangular, no radius.
- Focus state uses Honda red.
- Service types use segmented rectangular controls.

Forms should look operational and trustworthy, like dealership intake, not like a lifestyle newsletter form.

## Service Section

Service content should feel practical and certified.

Layout:

- Two-column split.
- Left: numbered service list with thin dividers.
- Right: white or black action panel for booking.
- Use section numbers and service numbers as structural elements.

Service list pattern:

- `01 Korraline hooldus`
- `02 Rehvivahetus & hoiustamine`
- `03 Elektri- ja hubriidsusteemid`
- `04 Diagnostika & garantiitood`
- `05 Kere- ja viimistlustood`
- `06 Asendusauto`

Use arrows sparingly as interaction cues. If icons are used, use a real icon set, not random unicode symbols.

## Location Cards

Location information should be stark and easy to scan.

Use:

- Large city name in condensed uppercase: `TALLINN`, `TARTU`
- Detail rows with label and value
- Address, phone, email, opening hours
- Map placeholder or actual map in a dark rectangle
- 1px borders between cards and rows

Avoid decorative maps, rounded contact cards, and vague copy.

## Motion and Interaction

Motion should be quick, mechanical, and purposeful.

Use:

- 180-260ms hover transitions for UI states.
- 420ms image opacity/filter transitions.
- 650-850ms load-up animations for hero text and major blocks.
- Hero background rotation every ~5 seconds if multiple vehicle images exist.
- Reduced-motion support that disables nonessential animation.

Motion personality:

- Precise
- Confident
- Functional
- Never bouncy or playful

## Imagery

Use real Honda vehicle imagery. Images should show the product clearly.

Hero imagery:

- Road or driving photography works well.
- Vehicle should be visible and recognizable.
- Dark overlay is allowed for legibility.
- Do not blur the subject beyond recognition.

Product imagery:

- Prefer clean studio or dealer-style vehicle shots.
- Use consistent padding and object fit.
- Avoid stock lifestyle images when the user needs to compare vehicles.

Service imagery:

- Use dealership, workshop, parts, or technician imagery.
- Avoid generic smiling-people stock photos.

## Copy Voice

Write in clear Estonian dealership language. Keep it direct and useful.

Voice:

- Local
- Precise
- Helpful
- Official
- Short

Good copy examples:

- `Catwees on vanim ja suurim ainult Honda mudeleid müüv ja hooldav ettevõte Eestis.`
- `Laopakkumised: kohe saadaval Honda mudelid Tallinnas ja Tartus.`
- `Broneeri hooldus Parnu mnt 555 esinduses.`
- `Sertifitseeritud hooldus ja tootja standardid.`

Avoid:

- Generic premium claims
- Empty slogans
- Fake statistics
- Overwritten lifestyle prose
- Cute microcopy
- Themed replacement for normal UI words

## Component Checklist

Every page should include:

- Black sticky header with Honda + Catwees logos
- Large uppercase page or section title
- Red section number or active marker
- Hard grid or divided layout
- Real Honda/service/location content
- Clear path to service booking or test drive
- Black footer with brand links and contact direction

## Responsive Rules

Desktop:

- Preserve strong horizontal navigation and wide grid.
- Use large display type.
- Product cards can be 3-column or editorial 2+1 layouts.
- Hero decision hub uses three columns.

Tablet:

- Navigation can scroll horizontally.
- Product and news grids become two columns.
- Hero left content can occupy more width over the image.

Mobile:

- Keep the black header compact.
- Stack hero decision choices vertically.
- Keep text left aligned.
- Reduce hero H1 enough to avoid clipping.
- Product cards become one column.
- Forms stack fields.
- CTA buttons should remain full-width or easy to tap.

## Do

- Use black, white, neutral, and Honda red.
- Use hard 1px borders.
- Use oversized condensed uppercase titles.
- Use left alignment.
- Use real dealership facts.
- Use real vehicle names and service categories.
- Keep the interface purposeful and scan-friendly.
- Make every repeated module feel like part of a grid.

## Do Not

- Do not use rounded cards or pill buttons.
- Do not use decorative gradients, blobs, or orbs.
- Do not use beige luxury styling.
- Do not use serif editorial styling.
- Do not center the main hero.
- Do not invent fake offers, fake testimonials, or fake metrics.
- Do not make the site feel like a generic SaaS dashboard.
- Do not replace standard actions with clever wording.
- Do not use random unicode symbols as icons.

## CSS Token Starter

```css
:root {
  --catwees-black: #000000;
  --catwees-hero-black: #090909;
  --catwees-panel-black: #111111;
  --catwees-white: #FFFFFF;
  --catwees-neutral: #F4F4F1;
  --catwees-red: #E30613;
  --catwees-ink-soft: rgba(0,0,0,.62);
  --catwees-white-soft: rgba(255,255,255,.72);
  --catwees-line-black: rgba(0,0,0,.12);
  --catwees-line-white: rgba(255,255,255,.14);
  --catwees-font-body: "IBM Plex Sans", sans-serif;
  --catwees-font-display: "IBM Plex Sans Condensed", "IBM Plex Sans", sans-serif;
  --catwees-border: 1px solid #000000;
  --catwees-border-strong: 3px solid #000000;
}
```

## Variant Prompt

Design and build a Catwees Honda website using a Swiss automotive dealership design language. The interface should feel official, precise, local, and product-focused. Use a black sticky header with Honda and Catwees logos, hard vertical dividers, uppercase micro navigation, and red active states. Use full-bleed Honda vehicle photography in the hero with a dark overlay, left-aligned oversized condensed headline typography, and a three-choice decision hub for new Honda models, used cars, and service.

Use IBM Plex Sans for body/UI and IBM Plex Sans Condensed for large display headings. Use the palette `#000000`, `#090909`, `#111111`, `#FFFFFF`, `#F4F4F1`, and Honda red `#E30613`. Build with hard rectangular modules, 1px borders, no rounded cards, no pill buttons, no decorative gradient blobs, and no generic stock styling. Product cards should behave like inventory grid cells with clear car images, badges, model names, short facts, prices, and compact CTAs. Service and location sections should feel operational and trustworthy, with numbered lists, segmented controls, rectangular form fields, and clear Tallinn/Tartu details.

All copy should be direct Estonian dealership language. Emphasize that Catwees sells and services only Honda, is an official Honda experience in Estonia, and operates in Tallinn and Tartu. Use real product/service labels and avoid fake metrics, empty slogans, decorative icons, and clever wording where standard UI copy is clearer.

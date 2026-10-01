---
name: Catwees
description: A Honda dealer site where the car crosses the model name and the booking stays below.
colors:
  catwees-red: "#d62629"
  catwees-red-deep: "#b01e21"
  ink: "#161616"
  muted: "#5c5c5c"
  paper: "#f4f3f0"
  sand: "#e7e4de"
  white: "#ffffff"
  line: "rgba(22, 22, 22, 0.12)"
  scrim-strong: "rgba(0, 0, 0, 0.55)"
  scrim-mid: "rgba(0, 0, 0, 0.18)"
  scrim-fade: "rgba(0, 0, 0, 0.05)"
typography:
  display:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "clamp(3.4rem, 7vw, 6.4rem)"
    fontWeight: 500
    lineHeight: 0.95
    letterSpacing: "-0.045em"
  headline:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "clamp(4.2rem, 13vw, 11rem)"
    fontWeight: 500
    lineHeight: 0.9
    letterSpacing: "-0.055em"
  title:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "clamp(2.4rem, 5vw, 4.2rem)"
    fontWeight: 500
    lineHeight: 1
    letterSpacing: "-0.04em"
  body:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "16px"
    fontWeight: 400
    lineHeight: 1.5
  label:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "14px"
    fontWeight: 500
    lineHeight: 1.2
    letterSpacing: "0"
  micro:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "11px"
    fontWeight: 400
    lineHeight: 1.2
  meta:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "13px"
    fontWeight: 400
    lineHeight: 1.4
  ui:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "15px"
    fontWeight: 500
    lineHeight: 1.2
  lead:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "17px"
    fontWeight: 400
    lineHeight: 1.5
  lead-lg:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "18px"
    fontWeight: 400
    lineHeight: 1.5
  name:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "20px"
    fontWeight: 560
    lineHeight: 1.2
  card-title:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "22px"
    fontWeight: 560
    lineHeight: 1.2
  panel-title:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "28px"
    fontWeight: 500
    lineHeight: 1.15
  feature:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "32px"
    fontWeight: 500
    lineHeight: 1.1
  feature-lg:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "34px"
    fontWeight: 560
    lineHeight: 1.1
  sent:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "clamp(2.2rem, 4vw, 3.4rem)"
    fontWeight: 500
    lineHeight: 1
  hero-phone:
    fontFamily: "IBM Plex Sans, Segoe UI, sans-serif"
    fontSize: "clamp(2.8rem, 12vw, 4rem)"
    fontWeight: 500
    lineHeight: 0.95
rounded:
  field: "12px"
  calendar: "16px"
  card: "20px"
  pill: "999px"
spacing:
  xs: "8px"
  sm: "12px"
  md: "20px"
  lg: "28px"
  xl: "32px"
  section: "72px"
components:
  button-primary:
    backgroundColor: "{colors.catwees-red}"
    textColor: "{colors.white}"
    rounded: "{rounded.pill}"
    padding: "0 22px"
    height: "44px"
  button-primary-hover:
    backgroundColor: "{colors.catwees-red-deep}"
    textColor: "{colors.white}"
    rounded: "{rounded.pill}"
  button-ink:
    backgroundColor: "{colors.ink}"
    textColor: "{colors.white}"
    rounded: "{rounded.pill}"
    height: "44px"
  button-white:
    backgroundColor: "{colors.white}"
    textColor: "{colors.ink}"
    rounded: "{rounded.pill}"
    height: "44px"
  input:
    backgroundColor: "{colors.white}"
    textColor: "{colors.ink}"
    rounded: "{rounded.field}"
    padding: "12px 14px"
  card:
    backgroundColor: "{colors.white}"
    textColor: "{colors.ink}"
    rounded: "{rounded.card}"
    padding: "32px"
---

# Design System: Catwees

## Overview

**Creative North Star: "The showroom crossing"**

Catwees is a Honda dealer for owners in Tallinn and Tartu. The page is a full-viewport site: a black-to-white header, a full-bleed photograph, then a lane where the side-view car drives across the model name and the published from-price. The booking control sits under the car, clear of the body.

The accent is Catwees red, used for the wordmark on a solid header, the current page, the primary action, the selected day or time, and phone and email links. Everything else is ink, muted grey, paper, and white. Type is IBM Plex Sans in sentence case. Corners on actions are pills. Cards are a 20px radius with a hairline, not a thick coloured edge.

**Key Characteristics:**

- Catwees red is the action and the current state, not a frame around every card
- The car crosses the title; the booking button stays below it
- IBM Plex Sans, sentence case, tight negative tracking on large titles
- Shared header on every page: Honda and Catwees logos, wordmark, menu, login, red Proovisõit pill
- Light paper bands and a light footer; the hero is the only full-bleed photograph

## Colors

One red, then ink and warm neutrals. Red is rare enough that a selected control and a current link read immediately.

### Primary
- **Catwees red** (#d62629): Wordmark on a solid header, current navigation item, submit, selected day, time, and choice, phone and email links, focus ring, text selection.
- **Deep red** (#b01e21): Hover on a red button.

### Neutral
- **Ink** (#161616): Body text, solid header text, ink pills, the hero fallback.
- **Muted** (#5c5c5c): Secondary copy, prices under a model name, placeholders, disabled labels.
- **Paper** (#f4f3f0): Page heroes, footer, disabled field fill, scrollbar track.
- **Sand** (#e7e4de): Model-card photo wells and the disabled submit fill.
- **White** (#ffffff): Page background, solid header, cards, the light pill.
- **Line** (rgba(22, 22, 22, 0.12)): Hairline borders and the solid-header shadow.
- **Scrim strong** (rgba(0, 0, 0, 0.55)), **scrim mid** (rgba(0, 0, 0, 0.18)), **scrim fade** (rgba(0, 0, 0, 0.05)): The left-to-right darkening on the hero photograph. They are not text colours.

### Named Rules
**The Red Is the Action Rule.** Red marks the thing you can do or the thing that is current. It is not a stripe on a rounded card and it is not a bar above the footer.

## Typography

**Display Font:** IBM Plex Sans (with Segoe UI)
**Body Font:** IBM Plex Sans (with Segoe UI)

**Character:** One family. Large titles are medium weight with tight negative tracking. Labels stay sentence case. There is no condensed display face and no uppercase kicker above a title.

### Hierarchy
- **Display** (500, clamp(3.4rem, 7vw, 6.4rem), line-height 0.95): Home hero headline.
- **Headline** (500, clamp(4.2rem, 13vw, 11rem), line-height 0.9): Model name in the driving lane. The car may cover the lower part of this line.
- **Title** (500, clamp(2.4rem, 5vw, 4.2rem), line-height 1): Page titles and section headings. A 48×3px red rule sits under the page title.
- **Body** (400, 16px, line-height 1.5): Paragraphs. Leads are 17–18px and stay near 46ch.
- **Label** (500, 14px): Navigation, field labels, footer column titles.
- **Supporting sizes**, same family: 11px login subline, 13px meta, 15px wordmark, 17px and 18px leads, 20px and 22px names, 28px panel titles, 32px and 34px feature titles. The confirmation line uses clamp(2.2rem, 4vw, 3.4rem). The phone hero uses clamp(2.8rem, 12vw, 4rem).

### Named Rules
**The Sentence Case Rule.** Titles, buttons, and navigation are sentence case. Do not set a kicker in tracked capitals above them.

## Layout

The content column is 1200px, inset 28px, and 16px on viewports at or below 900px. The home header overlays the hero and becomes a fixed white bar after 40px of scroll. Inner pages use the same header, sticky and white from the start.

The driving lane is a sticky pin inside a tall section. Copy sits high, the car translates across it, and the booking link is centered near the bottom of the pin. Below 900px the menu wraps onto a second row, the wordmark hides at 1100px, and the split booking stacks to one column.

## Elevation & Depth

Depth is tonal. Paper bands sit on white. Cards use a 1px line, not a shadow. The solid header uses a 1px shadow so the hero does not show through. The hero photograph has a left dark scrim so white type stays readable. The driving car has no CSS drop shadow.

### Shadow Vocabulary
- **Header seam** (`box-shadow: 0 1px 0 rgba(22, 22, 22, 0.08)`): Only the solid header.

### Named Rules
**The Flat Card Rule.** A card at rest is white, 20px radius, and a hairline. Do not add a thick top border to a rounded card.

## Shapes

Actions, navigation items, day and time chips, and the Proovisõit pill are fully rounded. Fields are 12px. The calendar shell is 16px. Cards, the contact panel, and path tiles are 20px. The page-title accent is a short 3px red rule, 48px wide, not a border on the card.

## Components

### Buttons
- **Shape:** Pill (999px), at least 44px tall.
- **Primary:** Catwees red fill, white label. Hover deepens to #b01e21. Submit spans the form grid.
- **Ink:** Black fill, white label. Used for the booking link under the car and “Tagasi müüki”.
- **White:** White fill, ink label, on the hero.
- **Hover / Focus:** Red controls darken. Every control shows a 2px Catwees-red outline on `:focus-visible`, offset 3px.

### Cards / Containers
- **Corner Style:** 20px.
- **Background:** White on the page, paper for the page hero and footer.
- **Shadow Strategy:** None. See Elevation.
- **Border:** 1px line.
- **Internal Padding:** 32px, 28px on path tiles.

### Inputs / Fields
- **Style:** 12px radius, 1px line, white fill.
- **Focus:** Border and caret turn Catwees red.
- **Error:** Red message under the field, tied to the input with `aria-describedby`. Focus moves to the first invalid field.
- **Disabled:** Sand fill and muted text for a disabled submit. Disabled days and times use muted text on paper.

### Navigation
- White bar, Honda mark then Catwees mark, tracked red “Catwees” wordmark centered on wide screens, four links, Parool, the login stamp, and a red Proovisõit pill.
- The current page is red text on a transparent pill, not a grey chip.
- On the home hero the bar is transparent, the wordmark and logos are white, and it turns solid white after scroll.
- Below 900px the wordmark is already hidden, logos stay left, the pill stays right, and the links take the full width of the next row.

### The driving lane
Six official side views, facing right, translate left to right as the page scrolls. Each wheel, including the tyre, rotates in place around the hub the user placed. The next car loads as its segment approaches. When the motion has settled, the canvas stops redrawing until the next scroll.

## Do's and Don'ts

### Do:
- **Do** use Catwees red (#d62629) for the current page, the solid-header wordmark, primary actions, selected booking states, and tel/mailto links.
- **Do** keep IBM Plex Sans and sentence case.
- **Do** keep the booking control below the car in the driving lane.
- **Do** quote only published from-prices and label demo people and cars as näidis.

### Don't:
- **Don't** restore the cream “Honda omanikule” bar.
- **Don't** put a kicker or eyebrow above a page title.
- **Don't** put a thick red border on a rounded card or a thick red rule on the footer.
- **Don't** switch the site to Barlow Condensed, Source Sans, or square job-card chrome.
- **Don't** colour an ink button’s label red. “Tagasi müüki” stays white on ink.

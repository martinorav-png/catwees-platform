# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Stack

static HTML/CSS mockup

## Users

Primary user: an existing Honda owner in Estonia, usually on a phone browser, who already bought or services a car at Catwees. Their job is to stay in contact with the dealer, book service (and a loan car when needed), get help with a claim or a fault, and notice the right moment to change cars.

Secondary user: an anonymous visitor who can read general notices and still book service, ask the assistant, book a test drive, or request a trade-in offer without an account.

## Product Purpose

Catwees is a customer web app for Honda owners. It keeps a continuous relationship after the sale, makes service easy to book, and catches the moment when the owner is ready to replace the car. Success is a signed-in owner acting on a notice that matches their own car: booking service, booking a test drive, or asking for a trade-in offer.

## Positioning

The app is keyed to the owner's specific Honda (make is Honda, model, registration, age). Personal notices, the handbook, and the default trade-in car all start from that vehicle. A general dealer website cannot truthfully do that for a named customer. Anonymous use stays possible, with required vehicle fields the signed-in owner does not have to retype.

## Operating Context

Used mainly in a smartphone browser, also on desktop. Two physical centers: Tallinn (Karamelli 6) and Tartu (Tehnika 3). A confirmed booking or trade-in request is an email to the Catwees service desk for a person to confirm. It is not an instant calendar hold. Sign-in is Gmail, simulated in this mockup. The signed-in demo is sample data and must read as such.

## Capabilities and Constraints

Confirmed modules:

- Header always shows sign-in or the customer name and profile, plus the main menu.
- Home / notices. Guests see general notices. Signed-in owners see notices aimed at their model and the car's age, each with a title, short text, date, and a call to action.
- Service and loan car. Signed-in: pick one of the customer's cars, or enter another registration. Guest: registration is required. Date and time, optional loan car, name, email, phone (prefilled when signed in). Action: confirm booking.
- Assistant with two modes. Claims: free text, rule-based guidance, and a contact block that is always visible (phone, email, opening hours). Handbook and faults: signed-in users pick their car; guests must enter make (Honda), full model name, and year. Then a free-text conversation about features and faults.
- Test drive. Pick from available Honda models, date and time, contact details, book.
- Trade-in request. Signed-in: the account car is selected by default, with a way to enter another car. Guest or other car: registration, model name, mileage in km. Condition: very good, normal wear, or with faults. Action: request an offer.

Language of this mockup is Estonian. A Russian switch is out of scope. There is no live backend, no real Gmail OAuth, and no invented prices, offers, or customers presented as real. Public model names and published from-prices may be quoted only as they appear on catwees.ee. Extra photos the team supplies go in `mockup/assets`.

## Brand Commitments

The name is Catwees. The app should feel related to https://catwees.ee and https://www.honda.ee: official Honda dealer in Estonia, Honda wordmark with "The Power of Dreams", the Catwees mark, and the live site's red (`#D62629`) with charcoal (`#4D5052`, `#272D33`) and white. Logos and car photography already in `catweessite2026` may be used. That earlier remake is inspiration only and is not to be copied as a layout. Voice is direct Estonian dealership language.

## Evidence on Hand

- Live site facts, fetched 30 Sep 2026: Tallinn Karamelli 6, 11318, keskus 6 503 300, teenindus 6 503 320, tallinn@catwees.ee. Tartu Tehnika 3, 50104, keskus 7 300 385, teenindus 7 300 383, tartu@catwees.ee. Sales Mon–Fri 8:00–18:00, Sat 10:00–15:00. Service Mon–Fri 8:00–18:00, weekend closed.
- Published model ladder on the homepage: Jazz Hybrid from 22 900€, Crosstar Hybrid from 24 900€, HR-V Hybrid from 28 900€, Civic Hybrid from 32 900€, ZR-V Hybrid from 36 900€, CR-V Hybrid from 43 900€, Prelude from 49 900€.
- Company line: founded in 2000, Honda sales and service in Tallinn and Tartu.
- Logos: `catweessite2026/Catwees logo png valge.png`, `Catwees logo png valge tekst.png`, `Catwees logo png tumehall.png`, `honda POD logo png.png`, `honda POD logo png valge.png`.
- Car photos in that same folder: `hero-crv-2026.jpg`, `honda-hero-crv.jpg`, `honda-hero-hrv.jpg`, `honda-hero-jazz.jpg`, `honda-hero-zrv.jpg`.
- Holiday-hours news on the live site is dated December 2025 and is not current copy for this mockup.

## Product Principles

- The owner's car is the context. Personal screens start from that vehicle.
- A guest can still finish the task. Missing account data becomes required fields, not a dead end.
- A claim always shows a person to call. The assistant does not replace the service desk.
- The trade-in ask is the moment a service relationship can become the next car.
- The phone is the primary scene. Forms, notices, and the chat must be usable one-handed.

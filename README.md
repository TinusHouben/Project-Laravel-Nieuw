# Het Eerste Nieuws

## Over het project

Dit project is een nieuwswebsite gebouwd met Laravel en Breeze. Het bevat een login/registratiesysteem, profielbeheer, een nieuwssectie, een FAQ-pagina, en een contactformulier. Admins hebben toegang tot extra beheermogelijkheden zoals gebruikersbeheer en contentbeheer.

## Functionaliteiten

### Algemeen
- Publieke homepagina
- Publieke FAQ-pagina met categorieën
- Publiek contactformulier (alleen voor ingelogde gebruikers)

### Authenticatie
- Registreer, login, wachtwoord reset
- Gebruikersrollen: gebruiker & admin
- Admins kunnen gebruikers beheren en rollen aanpassen

### Profielpagina
- Iedereen heeft een profielpagina
- Gebruikers kunnen hun gegevens aanpassen:
  - Gebruikersnaam
  - Verjaardag
  - Profielfoto (upload)
  - "Over mij"-tekst

### Nieuws
- Bezoekers kunnen nieuwsitems bekijken
- Admins kunnen nieuws aanmaken, bewerken en verwijderen
- Elk nieuwsitem bevat:
  - Titel
  - Inhoud
  - Afbeelding (optioneel)
  - Publicatiedatum

### FAQ
- Bezoekers kunnen de FAQ zien zonder ingelogd te zijn
- Admins kunnen:
  - FAQ's aanmaken, bewerken, verwijderen
  - Categorieën aanmaken, bewerken, verwijderen

### Contact
- Ingelogde gebruikers kunnen een bericht sturen naar de admin
- Admins kunnen contactberichten bekijken via een aparte interface


## Technische vereisten die voldaan zijn

- CSRF, XSS bescherming
- Controllers & route-middleware
- Meerdere Blade componenten
- Database met seeders
- Relaties:
  -One-to-many: FAQ ↔ Category

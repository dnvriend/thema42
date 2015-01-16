## 4.3. (Her)gebruik van componenten en frameworks

Deze paragraaf beschrijft de componenten en frameworks die in het project zijn gebruikt/toegepast.

### 4.3.1. Presentatielaag
De presentatielaag is op te delen in de mobiele applicatie en de website.

__Mobiele App__
De volgende componenten/frameworks zijn gebruikt bij het ontwikkelen van de mobiele applicatie:

- Cordova – Vanwege de mogelijkheid om te ontwikkelen zonder gebruik te maken van de native APIs van devices;
- Onsen UI – Vanwege de mogelijkheid om simpel een native “_look and feel_” te creëren in een webomgeving. Daarnaast heeft Onsen UI een betere performance voor mobiele apparaten dan een regulier HTML5 UI Framework.

__Website__
De volgende componenten/frameworks zijn gebruikt bij het ontwikkelen van de website:

- Twitter Bootstrap – Vanwege de moeilijkheidsgraad om er een mooi product mee te maken;
- Laravel - Laravel biedt zelf een ingebouwde template engine. Vanwege het gemak is deze gebruikt.

### 4.3.2. Service laag
De service laag bestaat uit:

- RESTful API – Vanwege de eenvoud van de benadering is er voor gekozen om de API RESTful te implementeren. Complexiteit wordt hierdoor zoveel mogelijk verminderd. Deze API is geïmplementeerd in het Laravel framework. Zie hiervoor ook het kopje “Domeinlaag”.

### 4.3.3. Domeinlaag
De domeinlaag is de applicatielogica en valt te omvatten in de term “back-end”. Hieronder valt de mogelijkheid om boodschappenlijstjes te beheren en de applicatielogica. Hiervoor is het volgende framework gebruikt:

- Laravel (PHP-framework) – Vanwege de hoeveelheid documentatie die er over beschikbaar is en de duidelijke MVC-structuur die het biedt zonder te veel op te leggen.

### 4.3.4. Datalaag
De datalaag bestaat uit het volgende onderdeel:

- MySQL – Als database voor de opslag van gegevens, vanwege het sterke relationele karakter van onze data en de kleine pool van proefpersonen.

[English](README.md) | [Polski](README.pl.md)

# ThermoWEB 2.0 &#x1F321;  [thermoweb.wtx.pl](http://thermoweb.wtx.pl)

System do monitorowania i analizy temperatury przez Internet, umożliwiający użytkownikom zdalne monitorowanie i udostępnianie pomiarów ze swoich stacji i czujników. Dzięki ThermoWEB możesz kontrolować temperaturę w dowolnym miejscu - w kotłowni, szklarni, domu czy basenie - z każdego urządzenia podłączonego do Internetu.

## 🛠️ Technologie
### Hardware & Komunikacja
[![1-Wire](https://img.shields.io/badge/1--Wire-Magistrala-black?style=flat-square&logo=1wire&logoColor=white)](https://www.maximintegrated.com/en/products/1-wire.html)
[![RS232](https://img.shields.io/badge/RS232-Standard-black?style=flat-square&logo=rs232&logoColor=white)](https://en.wikipedia.org/wiki/RS-232)

### Backend
[![Java](https://img.shields.io/badge/Java-8%2B-blue?style=flat-square&logo=openjdk&logoColor=white)](https://www.java.com)
[![SOAP](https://img.shields.io/badge/SOAP-Protokół-black?style=flat-square&logo=soapui&logoColor=white)](https://www.w3.org/TR/soap/)
[![PHP](https://img.shields.io/badge/PHP-Web-777BB4?style=flat-square&logo=php&logoColor=white)](https://www.php.net)
[![MySQL](https://img.shields.io/badge/MySQL-BazaDanych-4479A1?style=flat-square&logo=mysql&logoColor=white)](https://www.mysql.com)
[![Apache](https://img.shields.io/badge/Apache-SerwerWeb-D22128?style=flat-square&logo=apache&logoColor=white)](https://httpd.apache.org)

### Frontend
[![JavaScript](https://img.shields.io/badge/JavaScript-Język-F7DF1E?style=flat-square&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![Flash](https://img.shields.io/badge/Flash-Przestarzały-red?style=flat-square&logo=adobe&logoColor=white)](https://www.adobe.com/products/flashplayer/end-of-life.html)

System dostępny online: [thermoweb.wtx.pl](http://thermoweb.wtx.pl)

## &#x1F4D6; Opis
ThermoWEB 2.0 to otwarty system do monitorowania temperatury, gdzie każdy użytkownik może:
- &#x1F4E1; Dodać własne stacje pomiarowe i czujniki
- &#x1F4BB; Udostępniać pomiary publicznie lub prywatnie
- &#x1F4A1; Korzystać z publicznych pomiarów innych użytkowników
- &#x1F4CA; Analizować trendy i zmiany temperatury
- &#x1F4E2; Tworzyć własną sieć monitoringu

## &#x1F4BB; Architektura systemu
**Schemat działania ThermoWEB 2.0**  
![Architektura systemu](/assets/architektura_1.png)

## &#x1F4E1; Czujniki i hardware
**Zestaw pomiarowy - adapter i czujniki**  
![Zestaw pomiarowy](/assets/termo_zestaw_1.jpg)

**Adapter umożliwiający sprzężenie magistrali 1-wire z RS232**  
![Adapter RS232](/assets/termo_adapter_1.jpg)

**Czujniki temperatury - różne modele**  
![Czujniki temperatury](/assets/termo_czujniki_1.jpg)

**Pierwsza wersja ThermoWEB - historia projektu**  
![Pierwsza wersja ThermoWEB](/assets/thermoweb_v1.png)

## &#x1F3A5; Demo
### Film demonstracyjny
[![Film instruktażowy ThermoWEB 2.0](http://img.youtube.com/vi/iuZR4jFVNRk/0.jpg)](http://www.youtube.com/watch?v=iuZR4jFVNRk)

## &#x1F464; Autor
[Bartek Śliwiński](https://www.linkedin.com/in/bsliwinski/)

## &#x2728; Główne funkcjonalności
- &#x1F321; Zdalny monitoring temperatury z dowolnego miejsca na świecie
- &#x1F321; Wizualizacja temperatur maksymalnych i minimalnych na termometrze graficznym
- &#x1F4C8; Wizualizacja danych w formie interaktywnych wykresów
- &#x1F4CD; Interaktywna mapa z lokalizacjami czujników
- &#x1F321; Dodawanie i konfiguracja czujników temperatury
- &#x1F512; Konfiguracja widoczności czujników (tryb publiczny/prywatny)
- &#x1F511; Rejestracja i zarządzanie kontem użytkownika
- &#x1F4E6; Eksport danych w formacie CSV

## &#x1F4C2; Mapa serwisu

### Publiczna część serwisu
- `/` - Strona główna systemu
- `/pomiary/` - Aktualne pomiary temperatury
- `/pomiary/{stacja}/{czujnik}/` - Pomiary z konkretnego czujnika
- `/mapa/` - Lokalizacja stacji pomiarowych
- `/info/` - Informacje o ThermoWEB
- `/jak_dziala/` - Jak działa ThermoWEB
- `/demo/` - Demo działania ThermoWEB 2.0
- `/kontakt/` - Formularz kontaktowy

### Panel użytkownika
- `/moje_czujniki/` - Zarządzanie czujnikami
- `/moje_czujniki/{czujnik}/` - Szczegóły konkretnego czujnika
- `/dodaj_czujnik/` - Dodawanie nowego czujnika
- `/usun_czujnik/` - Usuwanie czujnika
- `/wykresy/` - Wizualizacja danych
- `/wykresy/{czujnik}/` - Wykres dla konkretnego czujnika
- `/ustawienia/` - Ustawienia systemu
- `/moje_dane/` - Dane użytkownika
- `/faq/` - Często zadawane pytania

### API i integracje
- `/rss.xml` - Kanał RSS z pomiarami ThermoWEB
- `/rss_{stacja}.xml` - Kanał RSS dla konkretnej stacji
- `/wap/` - Dostęp przez WAP
- `/wap/{stacja}/` - WAP dla konkretnej stacji
- `/thermoweb_{stacja}.js` - Skrypt JavaScript z pomiarami
- `/generuj_kod_{stacja}/` - Generator kodu do osadzenia na stronie

## &#x2696; Licencja
&#x00A9; 2007-2025 Bartłomiej Śliwiński  
Wszelkie prawa zastrzeżone.

---

## Licencja
Projekt udostępniany na licencji MIT – szczegóły w pliku LICENSE.

## &#x1F4E7; Kontakt
Wszelkie problemy, sugestie i propozycje ulepszeń proszę zgłaszać poprzez system Issues na GitHubie. Dzięki temu będę mógł sprawniej zarządzać zgłoszeniami i współpracować nad rozwojem projektu. 
[English](README.md) | [Polski](README.pl.md)

# ThermoWEB 2.0 &#x1F321;

An Internet-based temperature monitoring and analysis platform that enables users to remotely monitor and share measurements from their stations and sensors. With ThermoWEB, you can control temperature anywhere - in a boiler room, greenhouse, home, or swimming pool - from any Internet-connected device.

## 🛠️ Technologies
### Hardware & Communication
![1-Wire](https://img.shields.io/badge/1--Wire-000000?style=for-the-badge&logo=1wire&logoColor=white)
![RS232](https://img.shields.io/badge/RS232-000000?style=for-the-badge&logo=rs232&logoColor=white)

### Backend
![Java](https://img.shields.io/badge/Java-ED8B00?style=for-the-badge&logo=java&logoColor=white)
![SOAP](https://img.shields.io/badge/SOAP-000000?style=for-the-badge&logo=soap&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Apache](https://img.shields.io/badge/Apache-D22128?style=for-the-badge&logo=apache&logoColor=white)

### Frontend
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Flash](https://img.shields.io/badge/Flash-FF0000?style=for-the-badge&logo=adobe&logoColor=white) (legacy)

System available online: [thermoweb.wtx.pl](http://thermoweb.wtx.pl)

## &#x1F4D6; Description
ThermoWEB 2.0 is an open temperature monitoring system where each user can:
- &#x1F4E1; Add their own measurement stations and sensors
- &#x1F4BB; Share measurements publicly or privately
- &#x1F4A1; Use public measurements from other users
- &#x1F4CA; Analyze temperature trends and changes
- &#x1F4E2; Create their own monitoring network

## &#x1F4BB; System Architecture
**ThermoWEB 2.0 Operation Schema**  
![System Architecture](/pliki/architektura_1.png)

## &#x1F4E1; Sensors and Hardware
**Measurement Kit - Adapter and Sensors**  
![Measurement Kit](/pliki/termo_zestaw_1.jpg)

**Adapter enabling 1-wire bus to RS232 coupling**  
![RS232 Adapter](/pliki/termo_adapter_1.jpg)

**Temperature Sensors - Various Models**  
![Temperature Sensors](/pliki/termo_czujniki_1.jpg)

**First Version of ThermoWEB - Project History**  
![First Version of ThermoWEB](/pliki/thermoweb_v1.png)

## &#x1F3A5; Demo
### Demo Video
[![ThermoWEB 2.0 Tutorial Video](http://img.youtube.com/vi/iuZR4jFVNRk/0.jpg)](http://www.youtube.com/watch?v=iuZR4jFVNRk)

## &#x1F464; Author
[Bartek Śliwiński](https://www.linkedin.com/in/bsliwinski/)

## &#x2728; Main Features
- &#x1F321; Remote temperature monitoring from anywhere in the world
- &#x1F321; Visualization of maximum and minimum temperatures on a graphical thermometer
- &#x1F4C8; Data visualization in the form of interactive charts
- &#x1F4CD; Interactive map with sensor locations
- &#x1F321; Adding and configuring temperature sensors
- &#x1F512; Configuring sensor visibility (public/private mode)
- &#x1F511; User account registration and management
- &#x1F4E6; Data export in CSV format

## &#x1F4C2; Site Map

### Public Section
- `/` - Main page
- `/pomiary/` - Current temperature measurements
- `/pomiary/{station}/{sensor}/` - Measurements from a specific sensor
- `/mapa/` - Measurement station locations
- `/info/` - ThermoWEB information
- `/jak_dziala/` - How ThermoWEB works
- `/demo/` - ThermoWEB 2.0 demo
- `/kontakt/` - Contact form

### User Panel
- `/moje_czujniki/` - Sensor management
- `/moje_czujniki/{sensor}/` - Specific sensor details
- `/dodaj_czujnik/` - Add new sensor
- `/usun_czujnik/` - Remove sensor
- `/wykresy/` - Data visualization
- `/wykresy/{sensor}/` - Chart for specific sensor
- `/ustawienia/` - System settings
- `/moje_dane/` - User data
- `/faq/` - Frequently asked questions

### API and Integrations
- `/rss.xml` - RSS feed with ThermoWEB measurements
- `/rss_{station}.xml` - RSS feed for specific station
- `/wap/` - WAP access
- `/wap/{station}/` - WAP for specific station
- `/thermoweb_{station}.js` - JavaScript script with measurements
- `/generuj_kod_{station}/` - Code generator for website embedding

## &#x2696; License
&#x00A9; 2007-2025 Bartłomiej Śliwiński  
All rights reserved.

## &#x1F4E7; Contact
Please report any issues, suggestions, and improvement proposals through the GitHub Issues system. This will help me manage reports more efficiently and collaborate on project development.
# README #

Der Seminarmanager entstand als Projektarbeit im Rahmen meiner Weiterbildung zum Web-Developer innerhalb des Kurses zum Thema PHP & Frameworks.
Als Framework wurde hierbei Doctrine benutzt. F�r die Realisierung war eine Zeit von 2 Tagen vorgesehen.

### Online Demo ###

Unter diesem [Link](https://demo26.solution-developer.de/) finden Sie eine Online Demo des Seminar-Managers.

Der Benutzername lautet demouser und das Passwort demo13507

Sie k�nnen die Daten zur�cksetzen in dem Sie folgenden [Link](https://demo26.solution-developer.de/demodata.php) benutzen.

### Die Installation ###

Zur Installation m�ssen folgende Schritte ausgef�hrt bzw. Dateien einmalig aufgerufen werden:

1. Erstellen Sie eine Datenbank mit dem Namen "seminarmanager" mit der Kollation "utf8_general_ci"
2. F�hren Sie die setup.php aus dem Wurzelverzeichnis aus. Hiermit wird die Datenbankstruktur erstellt.
3. F�hren Sie die demodata.php aus dem Wurzelverzeichnis aus. Hiermit werden Musterdaten angelegt.
4. Alternativ k�nnen Sie das SQL-Backup mit der Bezeichnung "seminarmanager.sql" einspielen (empfohlen).

### Offene Punkte ###

* Nachfrage beim L�schen von Datens�tzen
* Validierung von Eingaben (z. Bsp. bereits vorhandene Kategorien)
* Weitere Spezifizierung der Seminardarstellung (z. Bsp. keine Kurse aus der Vergangenheit)
* Demodaten erzeugen keine Kurse in der Vergangenheit

### Erfahrungen ###

* Die Erstellung der Datenbankstruktur �ber Annotations bzw. Doctrine ist eine tolle Funktion!
* Leider ist das Debugging per var_dump() in Doctrine kaum m�glich, da die Objekte sehr umfangreich sind.
* In einem Framework kommt man viel schneller zu einer arbeitsf�higen L�sung.
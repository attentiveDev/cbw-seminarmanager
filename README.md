# README #

Der Seminarmanager entstand als Projektarbeit im Rahmen meiner Weiterbildung zum Web-Developer innerhalb des Kurses zum Thema PHP & Frameworks.
Als Framework wurde hierbei Doctrine benutzt. Für die Realisierung war eine Zeit von 2 Tagen vorgesehen.

### Online Demo ###

Unter diesem [Link](https://demo26.solution-developer.de/) finden Sie eine Online Demo des Seminar-Managers.

Der Benutzername lautet demouser und das Passwort demo13507

Sie können die Daten zurücksetzen in dem Sie folgenden [Link](https://demo26.solution-developer.de/demodata.php) benutzen.

### Die Installation ###

Zur Installation müssen folgende Schritte ausgeführt bzw. Dateien einmalig aufgerufen werden:

1. Erstellen Sie eine Datenbank mit dem Namen "seminarmanager" mit der Kollation "utf8_general_ci"
2. Führen Sie die setup.php aus dem Wurzelverzeichnis aus. Hiermit wird die Datenbankstruktur erstellt.
3. Führen Sie die demodata.php aus dem Wurzelverzeichnis aus. Hiermit werden Musterdaten angelegt.
4. Alternativ können Sie das SQL-Backup mit der Bezeichnung "seminarmanager.sql" einspielen (empfohlen).

### Offene Punkte ###

* Nachfrage beim Löschen von Datensätzen
* Validierung von Eingaben (z. Bsp. bereits vorhandene Kategorien)
* Weitere Spezifizierung der Seminardarstellung (z. Bsp. keine Kurse aus der Vergangenheit)
* Demodaten erzeugen keine Kurse in der Vergangenheit

### Erfahrungen ###

* Die Erstellung der Datenbankstruktur über Annotations bzw. Doctrine ist eine tolle Funktion!
* Leider ist das Debugging per var_dump() in Doctrine kaum möglich, da die Objekte sehr umfangreich sind.
* In einem Framework kommt man viel schneller zu einer arbeitsfähigen Lösung.
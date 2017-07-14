<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Seminarmanager - Dokumentation</title>
    </head>
    <body>
        <h1>Dokumentation zum Seminarmanager</h1>
        <p>
            Der Seminarmanager entstand als Projektarbeit innerhalb meiner Weiterbildung zum Web-Developer 2016 innerhalb des Kurses zum Thema PHP & Frameworks.<br>
            Als Framework wurde hierbei Doctrine benutzt. Für die Realisierung war eine Zeit von 2 Tagen vorgesehen.
        </p>
        <h2>Das Datenmodell</h2>
        <figure>
            <img src="img/seminarmanager.svg" alt="Das Datenmodel" width="45%">
            <figcaption>Die Ansicht des Datenmodels erstellt mit Dia</figcaption>
        </figure>
        <p>Dieses Datenmodel habe ich direkt aus phpmyadmn exportiert und mit Dia bearbeitet.
        <h2>Die Installation</h2>
        <p>Zur Installation müssen folgende Schritte ausgeführt bzw. Dateien einmalig aufgerufen werden:</p>
        <ol>
            <li>Erstellen Sie eine Datenbank mit dem Namen "seminarmanager" mit der Kollation "utf8_general_ci"</li>
            <li>Führen Sie die setup.php aus dem Wurzelverzeichnis aus. Hiermit wird die Datenbankstruktur erstellt.</li>
            <li>Führen Sie die demodata.php aus dem Wurzelverzeichnis aus. Hiermit werden Musterdaten angelegt.</li>
            <li>Alternativ können Sie das SQL-Backup mit der Bezeichnung "seminarmanager.sql" einspielen (empfohlen).</li>
        </ol>
        <h2>Offene Punkte</h2>
        <ul>
            <li>Nachfrage beim Löschen von Datensätzen</li>
            <li>Validierung von Eingaben (z. Bsp. bereits vorhandene Kategorien)</li>
            <li>Weitere Spezifizierung der Seminardarstellung (z. Bsp. keine Kurse aus der Vergangenheit)</li>
            <li>Demodaten erzeugen keine Kurse in der Vergangenheit</li>
        </ul>
        <h2>Erfahrungen</h2>
        <ul>
            <li>Die Erstellung der Datenbankstruktur über Annotations bzw. Doctrine ist eine tolle Funktion!</li>
            <li>Leider ist das Debugging per var_dump() in Doctrine kaum möglich da die Objekte sehr umfangreich sind.</li>
            <li>In einem Framework kommt man viel schneller zu einer arbeitsfähigen Lösung.</li>
        </ul>
        <footer>
            <p>Copyright &copy; 2016 Sven Sonntag - <a href="http://www.solution-developer.de" target="_blank">Solution Developer</a></p>
        </footer>
    </body>
</html>
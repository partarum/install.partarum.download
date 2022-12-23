# install.partarum

## Ablauf
1. base()
   1. Scripte einbinden und Variablen setzen
2. checkRoot()
   1. Rechte prüfen | sudo
3. loadSystem()
   1. System analysieren
      1. Keyhelp || Plesk || raw
      2. Betriebssystem
      3. Abhängigkeiten installieren
         1. Composer
         2. ...
   2. User anlegen
   3. Gruppe anlegen
   4. Rechte anpassen
   5. ...
6. Partarum via Git & Composer installieren

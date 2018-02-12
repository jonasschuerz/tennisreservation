# **Pflichtenheft**
____
Projektbezeichnung: Tennisplatzreservierung <Br>
Projektleiter:  Lukas Feck-Melzer <Br>
Erstellt am:    13/11/2017 <Br>
Zustand: in Bearbeitung <Br>
Dokumentenablage: <Br>

### Weitere Produktinformationen
Mitwirkend: Lukas Feck-Melzer,
Lukas Erhart,
Mario Lengauer,
Jonas Schürz

### Änderungsverzeichnis
|Version| geänderte Kapitel| Beschreibung der Änderung| Autor
|-------|-------------|--------------|-------------|
|  0.1  | Alle| Erstellung| Mario Lengauer|
|  0.2  | Alle | Überarbeitung | Lukas Feck-Melzer
|  0.3  | Alle | Überarbeitung | Lukas Feck-Melzer


## Inhalt
- 1 Motivation...
- 2 Ausgangssituation und Zielsetzung...
   - 2.1 Ausgangssituation...
      - 2.1.1 Beschreibung des Problembereiches...
      - 2.1.2 Aufgabenstellung
      - 2.1.3 Glossar...
      - 2.1.4 Modell des Problembereichs...
      - 2.1.5 Beschreibung der Geschäftsprozesse...
   - 2.2 Zielbestimmung...
- 3 Funktionale Anforderungen...
   - 3.1 Use Case Diagramme...
- 4 Nicht-funktionale Anforderungen...
- 5 Mengengerüst...
- 6 Lieferumfang...
- 7 Abnahmekriterien...
- 8 Abbildungsverzeichnis...

## 1 Motivation
Dieses Projekt wird im Rahmen des Gegenstandes "SYP" durchgeführt. Es soll die Reservierung von Plätzen in Tennisvereinen vereinfachen.

## 2 Ausgangssituation und Zielsetzung

### 2.1 Ausgangssituation
Die Tennisplatzreservierung wird durch ein Steckbrett am Tennisplatz geregelt. Das Mitglied muss zum Reservieren zu dem jeweiligen Tennisplatz fahren.

#### 2.1.1 Beschreibung des Problembereichs
**Die derzeitige Reservierung durch Steckbretter ist**, aufgrund dessen dass im Voraus zum Tennisplatz gefahren werden muss um zu reservieren, **zeitintensiv und unsicher**, da nicht sichergestellt wird, dass die vorgenommene Reservierung nicht von Anderen verändert wird.

#### 2.1.2 Aufgabenstellung
Die Reservierung durch Steckbretter soll durch eine Webapplikation ersetzt werden.

#### 2.1.3 Glossar

#### 2.1.4 Modell des Problembereichs
![CLD Diagram](./images/Klassendiagramm.jpg)

#### 2.1.5 Beschreibung der Geschäftsprozesse
Name des Geschäftsprozesses | Auslösendes Ereignis | Ergebnis | Mitwirkende
------------------ | ---------------|----------|-----------------
Platz reservieren | Ein Spieler will einen Platz reservieren | Spieler hat sich einen Platz reserviert| Spieler
Reservierung löschen| Ein Spieler will einen reservierten Platz wieder löschen | Der reservierte Platz ist nun wieder frei | Spieler
Plätze verwalten | Der Tennisverein bekommt einen neuen Platz | Man kann nun den Platz reservieren | Admin
Spieler verwalten | Ein neuer Spieler möchte dem Verein beitreten | Spieler kann sich nun einloggen und reservieren | Admin

### 2.2 Zielbestimmung
Diese Webanwendung wird zum Reservieren der Tennisplätze verwendet werden. <Br>
Die Zielgruppe wird von jungen Leuten bis zu älteren Leuten reichen. Deswegen setzen wir leichte Computerkenntnisse voraus.

## 3 Funktionale Anforderungen
Spieler/Vereinsmitglieder müssen Plätze reservieren und Reservierungen aufheben können. Der Vereinsadministrator muss Spieler/Mitglieder zu einem Verein hinzufügen und Plätze verwalten können.

### 3.1 Use Case Diagramme
![UC Diagram](./images/USE_Case_Diagram.jpg)

## 4 Nicht-funktionale Anforderungen
Die Webapplikiation wird sowohl von jungen als auch von älteren Menschen bedient, weshalb sie intuitiv und leicht zu verstehen sein muss. Die Zeitersparnis und Sicherheit beim Reservieren muss maximiert werden. Die Anwendung muss performant und ohne Fehler funktionieren.

## 5 Mengengerüst
Am Anfang werden es 5 Tennisvereine sein. Diese Zahl wird im Laufe der Zeit steigen.<Br>
Wir schätzen mit täglich 10 Reservierungen pro Tennisverein. (Im Sommer)<Br>

## 6 Lieferumfang
Es wird nur einen Zugang für einen Admin geben, welcher die User erstellen/ verwalten kann und die Anzahl der Plätze konfigurieren kann.

## 7 Abnahmekriterien
Die Platzreservierung muss fehlerfrei funktionieren.

## 8 Abbildungsverzeichnis
- Abb. 1: Klassendiagramm.png
- Abb. 2: UseCaseDiagram.png

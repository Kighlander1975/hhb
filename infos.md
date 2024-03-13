# Tabellenstruktur Haushaltsbuch

## Einnahmen- und Ausgabentabelle

*Beispiel*
| id | user_id (FK) | e/a | cat (null) (FK)| subcat (FK) | ammount | text | Buchungszeit |
|:--:|:-------:|:---:|----:|-------:|--------:|:-----|:------|
| 1 | 1 | e | 0100 | 0101 | 798,43 | arbeitlosengeld 1 | 2023-02-13 08:28:15 |

- __id__
    - fortlaufende Nummer
- __user_id__
    - Benutzerkennung
- __e/a__
    - Einnahme oder Ausgabe
- __cat__
    - Kategorie (Format: xx00, Beispiel 0100 = Gehalt, gesonderte Tabelle)
- __subcat__
    - Unterkategorie (Format XXxx, Beispiel 0101 = Gehalt, Job 1). Bei *NULL* in dem Feld bedeutet keine SubKategorie
- __ammount__
    - Betrag (Nur positive Werte, anhand der e/a wird gerechnet)
- __text__
    - Buchungstext

## Kategorientabelle
Kann durch Premium-User ergänzt, aber nicht mehr gelöscht werden. Diese sind dann für ALLE User benutzbar.
Die Admins behalten sich Änderungen vor.

Einnahmen werden von 0100 bis 4800 dargestellt, Ausgaben somit von 5000 - 9800. Die Nummer 4900 und 9900 sind reservierte Nummern für allgemeine Einnahmen und Ausgaben.

*Beispiel*
|cat_id|cat_text|
|:----:|:-------|
|0101|Gehalt|
|5000|Mietzahlung|

- __cat_id__
    - Kategorie Nr (0100 - 9900)
- __cat_text__
    - Kategoriebezeichnung

## SubKategorien (Premium-Funktion)
Premium-User können bis zu 99 Unterkategorien pro Kategorie erstellen, um die Ausgaben besser aufschlüsseln zu können.

*Beispiel*
|id|user_id (FK)|subcat|subcat_text|
|:--:|:--:|----:|:---|
|1|3|0101|Gehalt von *Firma*|

- __id__
    - fortlaufende Nummer
- __user_id__
    - Benutzerkennung
- __subcat__
    - Unterkategorie Nummer
- __subcat_text__
    - Unterkategorie Bezeichnung
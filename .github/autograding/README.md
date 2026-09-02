# Autograding — podklad pro Classroom 50

Tato složka je **učitelský podklad**, ne součást řešení. Žák do ní nic nepíše.

> [!IMPORTANT]
> **Stav: neodzkoušeno, nenasazeno.** Testy nikdy neběžely na skutečném
> GitHub runneru. Ze základní podoby cvičení jsou proto vyřazené — větev
> `master` je bez nich a žáci je k dispozici nemají. Tahle větev je odkladiště,
> ze kterého se dají vrátit, až proběhne ověření na jednom skutečném odevzdání.
>
> Ověřeno je zatím jen lokálně (PHP 8.4.25, emulace semantiky deklarativních
> testů): vzorové řešení 48/48, nevyplněné zadání 6/48.

## Testy jsou svázané se starou podobou zadání

Tahle větev drží zadání ve stavu, pro který byly testy napsané. Na `master` se
zadání od té doby změnilo, takže **testy na aktuální zadání nepasují**. Před
oživením je potřeba srovnat dvě věci:

- **Cvičení 6 už nemá variantu B.** Rozměry 7.5 a 12 existovaly jen proto, aby
  se test vyhnul echu komentáře v souboru bez `<?php`. Na `master` zůstaly jen
  rozměry 15 a 20 s uvedeným očekávaným výstupem, takže tři tvrzení
  `6: obsah…`, `6: obvod…` a `6: výsledky jsou tučně` míří na hodnoty, které
  žák nemá zadané. Buď variantu B do zadání vrátit, nebo tyhle testy přepsat —
  a pozor, hodnoty 15, 20, 300 a 70 jsou v komentáři, takže test na ně projde
  i nevyplněnému souboru.
- **Značky úkolů se změnily** z `[hodnoceno automaticky]` /
  `[nehodnoceno automaticky]` na `[+ odpověď v komentáři]` /
  `[odpověď v komentáři]` / `[bonus]`. Textace v zadáních i v `README.md`
  na `master` už žádnou automatickou kontrolu neslibuje; při oživení se to
  musí vrátit, jinak bude dokumentace lhát v opačném směru.

## Než se to nasadí, pozor na `.github/`

Testy jsou tady podle preference umístění, ale `.github/` **nic neschová
a neizoluje**:

- Classroom 50 **re-fetchuje `.github/` z templatu při každém
  `gh student submit`**. Cokoli tady bude, se do žákovských repozitářů kopíruje
  opakovaně, ne jen při prvním přijetí úlohy.
- Žák si tedy může přečíst hodnoty, které má u cvičení 6 a 7 objevit sám —
  přesně to, co má `failure-details: actual-only` skrývat. Pokud má být
  tipování ve cvičení 7 k něčemu, musí `tests.json` skončit mimo template:
  buď na téhle větvi (do žákovských repů se kopíruje jen default branch),
  nebo přímo v systémovém repu `oa-pva4-2026-2027/classroom50`.
- **`.github/workflows/autograde.yaml` se do templatu nesmí dostat nikdy** —
  ten soubor píše `gh student accept` a kopie v templatu by grading rozbila.
  Cokoli jiného pod `.github/` je z tohoto pohledu v pořádku.

## Kde je kanonický zdroj testů

Deklarativní testy Classroom 50 žijí **inline v `assignments.json`** v systémovém
repozitáři `oa-pva4-2026-2027/classroom50`. Soubor `tests.json` v této složce je
pouze **vstup pro hromadné nastavení** přes `--tests`, aby se testy daly verzovat
u zadání a znovu použít v dalším ročníku.

> **Nezaměňovat** s `<classroom>/autograders/<slug>/tests.json` v systémovém repu —
> ten je **generovaný** (publish-pages ho materializuje z `assignments.json` do Pages
> bundlu) a ručně se needituje.

`autograder.py` tady záměrně není — na PHP stačí deklarativní typy `run` a `io`.

## Nasazení

```sh
gh teacher assignment add oa-pva4-2026-2027 <classroom> php-01-promenne \
    --name "PHP 01 – Proměnné a výrazy" \
    --template oa-pva4-Syllabus/PHP_01_PromenneVyrazy \
    --tests .github/autograding/tests.json \
    --runtime .github/autograding/runtime.json
```

Kontrola a dílčí úpravy:

```sh
gh teacher assignment test list oa-pva4-2026-2027 <classroom> php-01-promenne
gh teacher assignment test remove oa-pva4-2026-2027 <classroom> php-01-promenne "<název testu>"
```

Pozor: opakované `assignment add` přepisuje celý záznam úlohy, takže `--tests`
i `--runtime` je potřeba předat znovu.

## Bodování

50 testů, **48 bodů**. Nulabodové jsou dva a oba jsou jen diagnostika:

- `prostředí: PHP je dostupné` — viz níže.
- `6: syntaxe je v pořádku (diagnostika, 0 bodů)` — `6_souhrn.php` je záměrně bez
  `<?php`, takže na nevyplněném souboru `php -l` **projde** (je to prostý text)
  a bod za něj by byl falešná pochvala. Nula bodů to řeší: žák za něj nic
  nedostane, ale když si při doplňování `<?php` rozbije syntaxi, uvidí u toho
  testu příčinu místo tří slepých chyb u hodnot (ty mají `actual-only`).

Ověřeno lokálně na PHP 8.4.25:

| Stav odevzdání | Skóre |
| --- | --- |
| vzorové řešení všech cvičení | 48/48 |
| nevyplněné zadání, jak ho žák dostane | 6/48 (jen kontroly syntaxe) |

## PHP na runneru — jedna věc k ověření při prvním běhu

`runtime.json` **PHP needinstaluje** a spoléhá na to, že ho image
`ubuntu-latest` už obsahuje. Neověřoval jsem to na skutečném runneru, proto je
v testech nulabodový `run` test `php -v`: pokud PHP na runneru chybí, tenhle test
spadne jako první a je z něj hned vidět příčina (místo 48 nejasných chyb).

Fallback — do `runtime.json` doplnit instalaci a nasadit znovu:

```json
{
  "runs-on": "ubuntu-latest",
  "apt": ["php-cli"]
}
```

## Na co si dát pozor při úpravách zadání

- **Testy nesmí mířit na hodnotu, která je v komentáři daného souboru.**
  `6_souhrn.php` je záměrně bez `<?php`, takže se jeho obsah vypisuje jako text —
  test na hodnoty z varianty A (15, 20, 300, 70) by proto prošel i úplně
  nevyplněnému souboru. Autograduje se proto varianta B (7.5 a 12), jejíž výsledek
  v zadání uvedený není. Ze stejného důvodu není v `6_souhrn.php` jmenovitě
  uvedena značka `<strong>` — je až v hlavním `README.md`.
- **Testy nesmí předepisovat formátování.** Žák si volí, jestli odřádkuje
  `PHP_EOL`, nebo `<br>`, a jestli obalí výsledek do `<strong>` nebo `<b>`.
  Tvrzení proto míří na krátké fragmenty bez HTML značek nebo regexem na hodnoty.
- **Značka úkolu musí odpovídat tomu, co test opravdu umí.** V zadáních jsou tři:
  `[hodnoceno automaticky]` (test pokrývá celý úkol),
  `[výstup hodnocen automaticky, odpověď kontroluje učitel]` (úkol má navíc
  otázku do komentáře, kterou stroj přečíst nedokáže — úkol tedy může být zelený
  a přesto nehotový) a `[nehodnoceno automaticky]` (test žádný).
  Přidáváš-li k úkolu otázku do komentáře, změň i značku.
- **`failure-details: actual-only`** je nastaveno u cvičení 7 a u varianty B
  v cvičení 6 — tam by výpis očekávané hodnoty prozradil odpověď, kterou má žák
  objevit sám.

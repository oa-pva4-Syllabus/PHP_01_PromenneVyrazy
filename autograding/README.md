# Autograding — podklad pro Classroom 50

Tato složka je **učitelský podklad**, ne součást řešení. Žák do ní nic nepíše.

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
    --tests autograding/tests.json \
    --runtime autograding/runtime.json
```

Kontrola a dílčí úpravy:

```sh
gh teacher assignment test list oa-pva4-2026-2027 <classroom> php-01-promenne
gh teacher assignment test remove oa-pva4-2026-2027 <classroom> php-01-promenne "<název testu>"
```

Pozor: opakované `assignment add` přepisuje celý záznam úlohy, takže `--tests`
i `--runtime` je potřeba předat znovu.

## Bodování

49 testů, **48 bodů**. Test `prostředí: PHP je dostupné` má 0 bodů — je to jen
diagnostika (viz níže). Zbytek je 1 bod za jedno tvrzení, aby žák viděl, co přesně
mu nefunguje, a dostal dílčí body.

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
- **Volné úlohy se nehodnotí.** Kde má žák psát vlastní odpověď do komentáře nebo
  si volit vlastní hodnotu, je v zadání `[nehodnoceno automaticky]`.
- **`failure-details: actual-only`** je nastaveno u cvičení 7 a u varianty B
  v cvičení 6 — tam by výpis očekávané hodnoty prozradil odpověď, kterou má žák
  objevit sám.

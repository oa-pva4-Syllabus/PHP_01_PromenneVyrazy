# PVA4 — PHP 01: Proměnné a výstupy

Obsahem repozitáře je první blok cvičení předmětu PVA4 pro tematický oddíl výuky
programovacího jazyka PHP. Cvičení vypracujte v uvedeném pořadí — každé staví na
předchozím.

## Obsah

| Soubor | Téma | Kde kontrolovat výstup |
| --- | --- | --- |
| `1_helloWorld.php` | První skript, spuštění | konzole i prohlížeč |
| `2_deklarace.php` | Deklarace proměnných, datové typy, konstanty | konzole |
| `3_vystup.php` | Matematické operace, výpis, záměna hodnot | konzole |
| `4_spojovaniRetezcu.php` | Spojování řetězců třemi způsoby | konzole, úkol 4 prohlížeč |
| `5_escapovani.php` | Escapovací sekvence, apostrofy vs. uvozovky | prohlížeč (zdrojový kód stránky) |
| `6_souhrn.php` | Souhrnná úloha — obdélník | prohlížeč |
| `7_typy.php` | Datové typy a jejich převody | konzole |

## Jak spustit skript

Máte dvě možnosti a obě se vám budou hodit. Některá cvičení vypisují HTML značky —
ty mají smysl v prohlížeči; jiná vypisují datové typy — ty se lépe čtou v konzoli.

### 1. V konzoli (příkazová řádka)

Otevřete příkazovou řádku ve složce s cvičeními a spusťte:

```sh
php 1_helloWorld.php
```

Výstup se vypíše přímo do konzole. HTML značky se tady **nezobrazí jako
formátování** — uvidíte je jako text, protože konzole HTML neumí.

Řádky v konzoli oddělujete konstantou `PHP_EOL`:

```php
echo 'první řádek' . PHP_EOL;
```

### 2. V prohlížeči

**Přes FlyEnv:** nastavte tuto složku jako document root webu a otevřete
`http://localhost/1_helloWorld.php` (port si ověřte v nastavení FlyEnv, může se
lišit).

**Bez jakéhokoli nastavování** funguje i vestavěný server PHP — ve složce
s cvičeními spusťte:

```sh
php -S localhost:8000
```

…a v prohlížeči otevřete `http://localhost:8000/1_helloWorld.php`.

Řádky v prohlížeči oddělujete značkou `<br>`:

```php
echo 'první řádek<br>';
```

> **Tip:** u cvičení, kde se má kontrolovat HTML, se v prohlížeči dívejte na
> **zdrojový kód stránky** (`Ctrl+U`). Jinak neuvidíte, jaké značky jste vypsali —
> uvidíte jen jejich výsledek.

## Konvence, které se od vás čekají

- **Názvy proměnných** anglicky, `camelCase`, **bez diakritiky** — tedy
  `$firstName`, ne `$jméno` ani `$Jmeno`. PHP by diakritiku snesl, ale je to zlozvyk,
  který vás v praxi bude bolet.
- **Konstanty** VELKÝMI písmeny s podtržítky: `SCHOOL_YEAR`.
- **Uzavírací značku `?>` na konci souboru nepište.** Je zbytečná a snadno za ni
  omylem propadne mezera nebo prázdný řádek, který pak rozbije výstup.
- Řešení pište **přímo pod zadání příslušného úkolu**, ne na konec souboru.

## Jak poznáte, že to máte správně

Každý úkol má v zadání uvedenou sekci **`Očekávaný výstup:`** — porovnejte s ní, co
vám skript vypsal. To je vaše první kontrola a měli byste ji udělat vždy, ještě než
odevzdáte.

Každý úkol je navíc označený:

- **`[hodnoceno automaticky]`** — po odevzdání ho zkontroluje autograding
  a dostanete zpětnou vazbu, jestli je splněný.
- **`[nehodnoceno automaticky]`** — obvykle otázka, na kterou odpovídáte do
  komentáře, nebo vlastní experiment. Stroj ji posoudit nedokáže, prohlíží ji učitel.

Dvě cvičení se od tohoto schématu záměrně odchylují:

- **`6_souhrn.php` nemá na začátku `<?php`** a celé se vypisuje jako text. Není to
  chyba zadání, je to první úkol toho cvičení. Značka pro tučný text, kterou tam
  budete potřebovat, je `<strong>`.
- **`7_typy.php` neuvádí očekávané výstupy.** Nejdřív si tipnete, co PHP udělá,
  a pak si to ověříte. Jestli jste tipovali správně, se dozvíte z autogradingu.

## Odevzdání

Práci odevzdáváte do svého repozitáře přes **Classroom 50**. Stačí změny
commitnout a pushnout:

```sh
git add <soubory>
git commit -m "Cviceni 01 - vypracovano"
git push
```

Vždy si zkontrolujte, že jsou všechny změny skutečně nahrané na GitHubu — tedy že
jste provedli **`commit` i `push`**. Co není pushnuté, to jste neodevzdali.

Po odevzdání se spustí autograding a k vašemu odevzdání se objeví výsledek
s přehledem, které úkoly prošly a které ne. Pokud něco neprošlo, můžete opravit
a pushnout znovu.

---

Složka `autograding/` obsahuje učitelský podklad pro Classroom 50, nikoli část
zadání — nic v ní neupravujte.

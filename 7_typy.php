<?php
// Blok cvičení 01 - Proměnné a výstupy
// Cvičení 7 - Datové typy a jejich převody
//
// Kde výstup zkontrolujete: v konzoli (postup je v README.md).
// Konvence: názvy proměnných anglicky, camelCase, bez diakritiky.
//
// POZOR - tohle cvičení je jiné než ostatní: očekávané výstupy tu schválně
// uvedené NEJSOU. Nejdřív si tipnete, co PHP udělá, a pak si to ověříte.
// Zpětnou vazbu, jestli to máte správně, vám dá autograding po odevzdání.


/* --- ÚKOL 1 --- [hodnoceno automaticky]
 *
 * PHP je jazyk se slabým typováním - když spolu potřebuje spočítat text
 * a číslo, sám si je převede. Někdy to udělá tak, jak čekáte, jindy ne.
 *
 * Pro každý výraz v tabulce níže:
 *   1. do sloupce "Můj tip" napište, co si myslíte, že vyjde (typ i hodnotu),
 *   2. pak výraz vypište funkcí `var_dump()` a porovnejte se svým tipem.
 *
 * Výraz              | Můj tip
 * -------------------|---------
 * "5" + 5            |
 * "5" . 5            |
 * "5 koni" + 5       |
 * (int) "abc"        |
 * "10" == "1e1"      |
 * 0 == ""            |
 * "abc" == 0         |
 * 1 + 1.0            |
 * (int) 7.9          |
 *
 * Vypisujte je v tomto pořadí, ať se vám výstup dá porovnat s tabulkou.
 */


/* --- ÚKOL 2 --- [nehodnoceno automaticky]
 *
 * U jednoho z výrazů vypíše PHP navíc varování (Warning), i když nějaký
 * výsledek vrátí. Najděte který a do komentáře napište, co vám PHP vyčítá
 * a proč je to varování užitečné.
 *
 * Odpověď:
 */


/* --- ÚKOL 3 --- [nehodnoceno automaticky]
 *
 * Dva z výrazů srovnávají hodnotu operátorem `==`. Vyzkoušejte je znovu
 * s operátorem `===` a do komentáře napište, jak se výsledek změnil
 * a v čem se tedy `==` a `===` liší.
 *
 * Odpověď:
 */

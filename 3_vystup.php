<?php
// Blok cvičení 01 - Proměnné a výstupy
// Cvičení 3 - Výstup
//
// Kde výstup zkontrolujete: v konzoli (postup je v README.md).
// Konvence: názvy proměnných anglicky, camelCase, bez diakritiky.
//
// Odřádkování: v konzoli oddělíte řádky konstantou PHP_EOL, v prohlížeči
// značkou <br>. Na hodnocení to nemá vliv - kontroluje se obsah, ne to,
// čím jste řádky oddělili.


/* --- ÚKOL 1 --- [výstup hodnocen automaticky, odpověď kontroluje učitel]
 *
 * Deklarujte proměnné `$a` = 15 a `$b` = 4.
 * Proveďte s nimi pět matematických operací a každý výsledek uložte
 * do samostatné proměnné: součet, rozdíl, součin, podíl a zbytek po dělení
 * (operátor `%`).
 *
 * Každý výsledek vypište na samostatný řádek přesně v tomto formátu:
 *
 * Očekávaný výstup:
 * Soucet: 19
 * Rozdil: 11
 * Soucin: 60
 * Podil: 3.75
 * Zbytek: 3
 *
 * Všimněte si podílu: 15 a 4 jsou celá čísla, ale výsledek celé číslo není.
 * V komentáři odpovězte, jakého datového typu je proměnná s podílem
 * a čím jste to zjistili.
 *
 * Odpověď:
 */


/* --- ÚKOL 2 --- [hodnoceno automaticky]
 *
 * Deklarujte tři proměnné:
 *   `$alpha` = 200
 *   `$beta`  = 350
 *   `$gamma` = 100
 *
 * Vhodným způsobem zaměňte jejich obsah tak, aby platilo:
 *   `$alpha` obsahuje původní hodnotu `$beta`
 *   `$beta`  obsahuje původní hodnotu `$alpha`
 *   `$gamma` obsahuje součet `$beta` a `$gamma`
 *
 * POZOR na pořadí příkazů: do `$gamma` se sčítá hodnota `$beta` UŽ PO záměně
 * (tedy 200), ne původních 350. Na pořadí řádků tady záleží.
 *
 * Nápověda: hodnotu, kterou budete přepisovat, si nejdřív někam odložte.
 *
 * Výsledek vypište v tomto formátu:
 *
 * Očekávaný výstup:
 * alpha = 350
 * beta = 200
 * gamma = 300
 */


/* --- ÚKOL 3 --- [nehodnoceno automaticky]
 *
 * Bonus: záměnu dvou proměnných z úkolu 2 zvládne PHP i bez odkládací
 * proměnné, jediným příkazem. Zkuste najít jak a napsat to pod tento
 * komentář (výsledek vypisovat nemusíte).
 */

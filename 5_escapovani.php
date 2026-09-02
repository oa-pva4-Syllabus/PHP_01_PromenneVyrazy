<?php
// Blok cvičení 01 - Proměnné a výstupy
// Cvičení 5 - Escapování
//
// Kde výstup zkontrolujete: úkoly 1, 2 a 4 v prohlížeči ve zdrojovém kódu
// stránky, úkol 3 v konzoli - prohlížeč tabulátor slévá do jedné mezery,
// takže byste v něm rozdíl nepoznali (postup je v README.md).
// Konvence: názvy proměnných anglicky, camelCase, bez diakritiky.
//
// Escapování = zápis znaku, který by jinak v řetězci znamenal něco jiného.
// Escapovací sekvence (\n, \t, \", \$) fungují POUZE v dvojitých uvozovkách.
// V apostrofech mají zvláštní význam jen \' a \\.


/* --- ÚKOL 1 --- [+ odpověď v komentáři]
 *
 * Deklarujte proměnnou `$imageUrl` s hodnotou `https://placehold.co/200x100`.
 *
 * Vypište HTML značku obrázku se všemi náležitostmi - adresou, velikostí
 * a popiskem - a to DVAKRÁT, ve dvou variantách zápisu řetězce:
 *
 *   a) řetězec v dvojitých uvozovkách; uvozovky uvnitř HTML atributů
 *      budete muset escapovat
 *   b) řetězec v apostrofech; uvozovky uvnitř escapovat nemusíte
 *
 * Očekávaný výstup (dvakrát stejný, ve zdrojovém kódu stránky):
 * <img src="https://placehold.co/200x100" width="200" height="100" alt="Ukazkovy obrazek">
 *
 * V komentáři odpovězte, proč se v jedné variantě escapovat musí
 * a v druhé ne.
 *
 * Odpověď:
 */


/* --- ÚKOL 2 --- [+ odpověď v komentáři]
 *
 * Deklarujte proměnnou `$userName` s hodnotou `Karel`.
 * Vypište dva řádky:
 *
 *   a) řetězec `$userName` zapsaný v APOSTROFECH
 *   b) řetězec `$userName` zapsaný v DVOJITÝCH UVOZOVKÁCH
 *
 * Očekávaný výstup:
 * a) $userName
 * b) Karel
 *
 * Ano, na každém řádku je něco jiného, i když jste napsali totéž.
 * V komentáři vysvětlete, proč.
 *
 * Odpověď:
 */


/* --- ÚKOL 3 ---
 *
 * Vypište čtyři řádky níže. Všechny řetězce zapište v DVOJITÝCH UVOZOVKÁCH,
 * takže se bez escapovacích sekvencí neobejdete. Mezi `sloupec1`
 * a `sloupec2` bude skutečný tabulátor, ne mezery.
 *
 * Očekávaný výstup:
 * Zpetne lomitko: \
 * Tabulator: sloupec1	sloupec2
 * Dolar: $100
 * Uvozovky: "citace"
 */


/* --- ÚKOL 4 --- [+ odpověď v komentáři]
 *
 * Bonus - proč se escapování řeší i kvůli bezpečnosti.
 *
 * Deklarujte proměnnou `$userInput` s hodnotou `<script>alert("ahoj")</script>`
 * (představte si, že to uživatel napsal do formuláře).
 * Vypište ji tak, aby ji prohlížeč zobrazil jako TEXT a nespustil jako kód -
 * použijte funkci `htmlspecialchars()`.
 *
 * Očekávaný výstup (ve zdrojovém kódu stránky):
 * &lt;script&gt;alert(&quot;ahoj&quot;)&lt;/script&gt;
 *
 * Zkuste si i výpis bez `htmlspecialchars()` a porovnejte, co prohlížeč
 * udělá. Do komentáře napište rozdíl.
 *
 * Odpověď:
 */

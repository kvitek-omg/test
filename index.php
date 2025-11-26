<?php
/**                         
 *   CVIČENÍ [3] - Pokročilé cykly
 */

///     ### ~ Pomocná funkce pro vypisování pole     ///
function pole($jmeno, $pole)
{
    echo "<h1>$jmeno</h1>";
    foreach ($pole as $index => $hodnota): ?>

        <div
            style='box-shadow: 0px 0px 4px 1px grey; position:relative; text-align:center; display:inline-block;width: 90px;height:90px; border: 0px solid grey; border-radius: 7px; margin: 4px;'>
            <div style="font-size: 2em;height: 90%; display: flex;justify-content:center; align-items: center;">
                <?= $hodnota ?>
            </div>
            <span style='margin-left: 7px;font-size: 0.85em;position: absolute; bottom: 5px; left: 5px;'>
                <i> <sub>Index </sub> <?= $index ?></i>
            </span>

        </div>

    <?php endforeach;
}

//////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////// 




///     Najdi problém/y a doplň     ///
/* Cyklus má sečíst čísla do určitého maxima a vypočítat průměr */

$maximum = 10;
$soucet = 0;

for ($i = 1; $i <= $maximum; $i++) { 
    echo "+" . $i;
    $soucet += $i;
}

echo " = $soucet => PRŮMĚR: " . ($soucet / $maximum);




///     Najdi problém/y a doplň     ///
/* Tento kód hledá největší prvek pole */
$cisla = [2, 4, 5, 8, 6];

// jako výchozí největší vezmeme první prvek pole
$nejvetsi = $cisla[0];

for ($index = 0; $index < count($cisla); $index++) { 
   $aktualniPrvek = $cisla[$index];
   if ($aktualniPrvek > $nejvetsi) {
     $nejvetsi = $aktualniPrvek;
   }
}
echo "<br>Největší číslo: " . $nejvetsi;
/* Tento kód má vypsat: 8 */





///     Najdi problém/y a doplň     ///
// Chceme troj-úhelník obrácený špičkou DOLŮ !!!
# # # #
# # #
# #
#
$znakPixelu = '#';
$vyska = 5;

// začneme od nejdelšího řádku a jdeme dolů
for ($radky = $vyska; $radky > 0; $radky--) {
    for ($linka = 0; $linka < $radky; $linka++) {
        echo $znakPixelu . " ";
    }
    echo '<br>';
}




///     Najdi problém/y a doplň     ///
/* Tento kód hledá spolužáka v poli polí na základě kritérií */

$spoluzaci = [
    [ 
        'jmeno' => "Jan Doležal",
        'pohlavi' => 'muz',
        'prumer' => 5
    ],
    [ 
        'jmeno' => "Anna Brávůrská",
        'pohlavi' => 'zena',
        'prumer' => 3
    ],
    [ 
        'jmeno' => "Radek Pálka",
        'pohlavi' => 'muz',
        'prumer' => 1
    ],
    [ 
        'jmeno' => "Marie Jasná",
        'pohlavi' => 'zena',
        'prumer' => 2
    ],
];

function hledatSpoluzaka($spoluzaci, $pohlavi, $prumernaZnamka) {
    foreach ($spoluzaci as $zak) { 
       if ($zak['pohlavi'] == $pohlavi && $zak['prumer'] == $prumernaZnamka) {
            return $zak; // Nalezen -> vracíme celé pole žáka
       }
    }
    return false; // NE-nalezen
}

$nalezen = hledatSpoluzaka($spoluzaci, 'muz', 1);

if($nalezen) {
    echo "<br>Našli jsme podle vašich kritérií:<br>";
    print_r($nalezen);
} else {
    echo "<br>Nebyl nalezen žádný záznam!";
}
/* Tento kód má najít: Radek Pálka */







///     Najdi problém/y a doplň     ///
/* Potřebujeme seřadit pole tak, aby každý prvek který najdeme,
   byl z původního pole odebrán (pomocí array_splice) */

function najdi_nejmensi($pole)
{
    $nejmensi = $pole[0];
    for ($i = 1; $i < count($pole); $i++) {
        $aktualni_prvek = $pole[$i];
        if ($aktualni_prvek < $nejmensi) {
            $nejmensi = $aktualni_prvek;
        }
    }
    return $nejmensi;
}

function muj_sort($puvodni)
{
    $ordered = [];

    // dokud v původním poli něco je, vždy najdeme nejmenší a odstraníme ho
    while (count($puvodni) > 0) {
        $nejmensi = najdi_nejmensi($puvodni);
        $ordered[] = $nejmensi;

        // najdeme index nejmenšího prvku a smažeme ho z původního pole
        $index = array_search($nejmensi, $puvodni);
        array_splice($puvodni, $index, 1);
    }

    return $ordered;
}

// Vypíšeme pole před a po našem seřazení
$neserazen = [3, 7, 1, 2, 10];
pole("Neseřazené", $neserazen);

$serazen = muj_sort($neserazen);
pole("Test", $serazen);
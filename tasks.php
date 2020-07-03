<?php
echo "<h2>Zadatak 1</h2>Your year of birth is " . (date("Y") - $_POST["age"]);
$stringVar = explode(" ", "The quick brown fox jumps over the lazy dog");
$shuffledString = shuffleStringArray($stringVar);
function shuffleStringArray($stringVar)
{
    $shuffledString = array();
    $index = array_keys($stringVar);
    shuffle($index);
    foreach ($index as $index) {
        $shuffledString[$index] = $stringVar[$index];
    }
    return $shuffledString;
}
function printSolution($indexZadatka, $implosionGlue, $outputString)
{
    echo "<h3>" . $indexZadatka . "</h3>";
    print_r(implode($implosionGlue, $outputString));
}
echo "<h2>Zadatak 2</h2>";
printSolution('Original string:', ' ', $stringVar);
printSolution('Shuffled string:', ' ', $shuffledString);
printSolution('Zadatak 2a', "", array_map('strtolower', $shuffledString));
$outputString = array_map('ucfirst', $shuffledString);
array_splice($outputString, 8, 0, "Obuka");
printSolution('Zadatak 2b', " ", $outputString);
printSolution('Zadatak 2c', " ", preg_replace("/o/", "*", $shuffledString));

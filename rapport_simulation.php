<?php

include "entete.html";
include "bernouilli.php";

define("SAMPLE_SIZE", 100);


echo "<p>Taille échantillon : " . SAMPLE_SIZE . "</p>";

echo "<h1>Sample loi Bernouilli</h1>";

$proba = 0.1;
$samples = sampleBernoulli(SAMPLE_SIZE, $proba);

$sum = 0;

foreach ($samples as $value) {
	$sum += $value;
}
$moyenneSamples = $sum/SAMPLE_SIZE;
echo "<p>Moyenne Bernouilli : " . $moyenneSamples . " de probabilité " . $proba . "</p>";



echo "<h1>Sample loi Binomiale</h1>";
$n = 100;
$samples = sampleBinomiale(SAMPLE_SIZE, $n, $proba);

$sum = 0;

foreach ($samples as $value) {
	$sum += $value;
}
$moyenneSamples = $sum/SAMPLE_SIZE;

echo "<p>Moyenne Binomiale : " . $moyenneSamples . " de probabilité " . $proba . " et d'ensemble " . $n . "</p>";

include "fin.html";

?>
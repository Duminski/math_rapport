<?php

include "entete.html";
include "loisSimul.php";

define("SAMPLE_SIZE", 100);

echo "<h1>Rapport simulation de variables aléatoires</h1>";

echo "<p><i>Tous les résultats probabilistes seront arrondis à 4 chiffres après la virgule pour des raisons de lisibilité.</i></p>";
echo "<p>Taille échantillon : " . SAMPLE_SIZE . "</p>";

echo '</br>';

echo "<h2>Sample loi Bernoulli</h2>";

$proba = 0.1;
$samples = sampleBernoulli(SAMPLE_SIZE, $proba);

$sum = 0;

foreach ($samples as $value) {
	$sum += $value;
}
$moyenneSamples = $sum/SAMPLE_SIZE;
echo "<p>Moyenne Bernoulli : " . $moyenneSamples . " de probabilité " . $proba . "</p>";




echo '</br>';
echo "<h2>Sample loi binomiale</h2>";
$n = 100;
$samples = sampleBinomiale(SAMPLE_SIZE, $n, $proba);

$sum = 0;

foreach ($samples as $value) {
	$sum += $value;
}
$moyenneSamples = $sum/SAMPLE_SIZE;

echo "<p>Moyenne binomiale : " . $moyenneSamples . " de probabilité " . $proba . " et d'ensemble " . $n . "</p>";




echo '</br>';
echo "<h2>Simulation loi uniforme discrète</h2>";

$proba = (1/6);
$val = array(1,2,3,4,5,6);

$uniforme = uniforme($proba, $val);

echo "<p>Moyenne uniforme : " . $uniforme . " de probabilité " . round($proba,4) . " et d'ensemble " . sizeof($val) . "</p>";




echo '</br>';
echo "<h2>Simulation loi géométrique</h2>";

$k = 6;
$proba = (1/6);
$sum = 0;

$arrGeom = geometrique($k, $proba);
echo '<table>';

	echo '<tr>';
		echo '<th>k</th>';
		echo '<th>Probabilité</th>';
		echo '<th>Probabilité * 100</th>';
	echo '</tr>';

	foreach ($arrGeom as $key => $value) {		
		echo '<tr>';
			echo '<td>' . $key . '</td>';
			echo '<td>' . $value . '</td>';
			echo '<td>' . $value*100 . ' %</td>';
		echo '</tr>';
		$sum += $value*100;
	}

echo '</table>';
echo "<p>Moyenne géométrique : " . round($sum,0) . "/" . $k . " (somme/nb éléments) = " . round($sum/$k,0) . " %</p>";




echo '</br>';
echo "<h2>Simulation loi poisson</h2>";

$k = 10;
$tps = 2;
$sum = 0;

$arrPoisson = poisson($k, $tps);

echo '<table>';

	echo '<tr>';
		echo '<th>k</th>';
		echo '<th>Probabilité</th>';
		echo '<th>Probabilité * 100</th>';
	echo '</tr>';

	foreach ($arrPoisson as $key => $value) {		
		echo '<tr>';
			echo '<td>' . $key . '</td>';
			echo '<td>' . $value . '</td>';
			echo '<td>' . $value*100 . ' %</td>';
		echo '</tr>';
		$sum += $value*100;
	}

echo '</table>';
echo "<p>Moyenne poisson : " . $sum . " %</p>";

include "fin.html";

?>
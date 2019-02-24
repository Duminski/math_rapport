<?php

function bernoulli($proba){
	$u = rand(0,1000)/1000;
	//echo $u;
	if ($u < 1-$proba) return 0;
	else return 1;
}

function sampleBernoulli($sizeSample, $proba){
	$samples = array();
	for($i = 0;$i < $sizeSample;$i++){
		$samples[$i] = bernoulli($proba);
	}
	return $samples;
}

function binomiale ($n, $proba){
	$sum = 0;
	for($i=1;$i<$n;$i++){
		$sum += bernoulli($proba);
	}
	return $sum;
}

function sampleBinomiale($sizeSample, $n, $proba){
	$samples = array();
	for($i = 0;$i < $sizeSample;$i++){
		$samples[$i] = binomiale($n, $proba);
	}
	return $samples;
}

function uniforme($p, $val){
	$sum = 0;

	if ($p*sizeof($val) != 1) {
		return "Proba non valide";
	}

	foreach ($val as $value) {
		$sum += $value*$p;
	}

	return $sum;
}

function geometrique($k, $p) {
	$res = 1-$p;

	echo 'K = ' . $k;
	echo '</br>';
	echo 'Probabilité = ' . round($p,4);
	echo '</br></br>';

	$arrayRes = array();
	for($i=1;$i<=$k;$i++) {

		$pui = $i-1;
		$pow = pow($res,$pui);
		array_push($arrayRes, round($pow*$p,4));

	}

	return $arrayRes;
}

function poisson($k, $tps) {
	$lambda = calcLambda($k, $tps);

	echo 'K = ' . $k;
	echo '</br>';
	echo 'Temps = ' . $tps;
	echo '</br>';
	echo 'Lambda = ' . $lambda;
	echo '</br></br>';

	$arrayRes = array();

	for($i=0;$i<=$k;$i++) {

		$lPowk = pow($lambda, $i);
		$exp = exp(-$lambda);
		$factK = gmp_fact($i);
		$res = ($lPowk*$exp)/(int)$factK;

		array_push($arrayRes,round($res, 10));

	}

	return $arrayRes;
}

function calcLambda($k, $tps) {
	return $k*$tps;;
}


?>
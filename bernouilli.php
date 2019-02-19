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

?>
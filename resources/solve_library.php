<?php

function zero($x) {
  return $x;
}

function tanDeg($deg) {
  $rad = $deg * pi()/180;
  return tan($rad);
}

function sinDeg($deg) {
  $rad = $deg * pi()/180;
  return sin($rad);
}

function cosDeg($deg) {
  $rad = $deg * pi()/180;
  return sin($rad);
}

function solve($obj){
    $m1 = (isset($obj['m1'])) ? $obj['m1'] : 0;
    $m2 = (isset($obj['m2'])) ? $obj['m2'] : 0;
    $theta = (isset($obj['theta'])) ? $obj['theta'] : 0;
    $muk = (isset($obj['muk'])) ? $obj['muk'] : 0;
    $mus = (isset($obj['mus'])) ? $obj['mus'] : 0;
    $g = (isset($obj['g'])) ? $obj['g'] : 0;
    $Fnet = (isset($obj['Fnet'])) ? $obj['Fnet'] : 0;
    $Vf = (isset($obj['Vf'])) ? $obj['Vf'] : 0;
    $V0 = (isset($obj['V0'])) ? $obj['V0'] : 0;
    $d = (isset($obj['d'])) ? $obj['d'] : 0;
    $a = (isset($obj['a'])) ? $obj['a'] : 0;
    
    
    $mT=       $m1+$m2;
    $cos=      cosDeg($theta);
    $sin=      sinDeg($theta);
    $tan=      tanDeg($theta);
    $Ffr=      $m1*$g*$cos*$muk;
    $p_a=      @zero(($m1*$g*$sin-$m2*$g-$Ffr)/$mT)+@zero($Fnet/$mT)+$g*($sin-$cos*$muk);
    $n_a=      @zero(($m2*$g-$m1*$g*$sin-$Ffr)/$mT)+@zero($Fnet/$mT)-$g*($sin+$cos*$muk);
    $p_Fnet=    $m1*$g*$sin-$m2*$g-$Ffr+$mT*$a;
    $n_Fnet=    $m2*$g-$m1*$g*$sin-$Ffr+$mT*$a;
    $p_theta = @zero(asin($a/$g))+@zero(asin($Fnet/($m1*$g)))+@zero(asin((pow($Vf,2)-pow($V0,2))/(2*$g*$d)));
    $n_theta = @zero(asin($a/$g))+@zero(asin($Fnet/(-$m1*$g)))+@zero(asin((pow($V0,2)-pow($Vf,2))/(2*$g*$d)));
    $s_theta = @zero(atan($mus));
    $p_m1 =    @zero($m2*(1+$g/$a))/@zero(($g/$a)*($sin+$cos*$muk)-1)+@zero($Fnet/$a);
    $n_m1 =    @zero($m2*($g/$a-1))/@zero((1+($g/$a)*($sin+$cos*$muk)))+@zero($Fnet/$a);
    $s_m1 =    @zero($m2/($sin-$cos*$mus));
    $p_m2 =    @zero(1/$a)*($m1*$g*$sin-$m1*$g*$Ffr)/@zero(1+$g/$a);
    $n_m2 =    @zero(-$m1-1/$a)*($m1*$g-$m1*$g*$sin*$Ffr)/@zero(1-$g/$a);
    $s_m2 =    ($m1*($sin-$cos*$mus));
    $p_muk =   ($Vf == 0) ? @zero(($m1*$g*$sin-$Fnet)/($m1*$g*$cos)) : @zero((pow($Vf,2)-pow($V0,2))/(2*$g*$d*$cos))-$tan;
    $n_muk =   ($Vf == 0) ? @zero((-$m1*$g*$sin-$Fnet)/($m1*$g*$cos)) : @zero((pow($V0,2)-pow($Vf,2))/(2*$g*$d*$cos))-$tan;
    $p_Vf =    ($a == 0) ? (sqrt(pow($V0,2)+2*$p_a*$d)) : (sqrt(pow($V0,2)+2*$a*$d));
    $n_Vf =    ($a == 0) ? (sqrt(pow($V0,2)+2*$n_a*$d)) : (sqrt(pow($V0,2)+2*$a*$d));
    $p_V0 =    ($a == 0) ? (sqrt(pow($V0,2)-2*$p_a*$d)) : (sqrt(pow($V0,2)+2*$a*$d));
    $n_V0 =    ($a == 0) ? (sqrt(pow($V0,2)-2*$n_a*$d)) : (sqrt(pow($V0,2)+2*$a*$d));
    $p_d =     ($a == 0) ? ((pow($Vf,2)-pow($V0,2))/(2*$p_a)) : ((pow($Vf,2)-pow($V0,2))/(2*$a));
    $n_d =     ($a == 0) ? (sqrt(pow($V0,2)+2*$n_a*$d)) : (sqrt(pow($V0,2)+2*$a*$d));
    
$solve_library = [
  
'+as'=> $p_a,
'-as'=> $n_a,
'sas'=> 0,
'+Fnets'=> $p_Fnet,
'-Fnets'=> $n_Fnet,
'sFnets'=> 0,
'+thetas'=> $p_theta,
'-thetas'=> $n_theta,
'sthetas'=> $s_theta,
'+m1s'=> $p_m1,
'-m1s'=> $n_m1,
'sm1s'=> $s_m1,
'+m2s'=> $p_m2,
'-m2s'=> $n_m2,
'sm2s'=> $s_m2,
'+Vfs'=> $p_Vf,
'-Vfs'=> $n_Vf,
'sVfs'=> 0,
'+V0s'=> $p_V0,
'-V0s'=> $n_V0,
'sV0s'=> 0,
'+ds'=> $p_d,
'-ds'=> $n_d,
'sds'=> 0,
'+muks'=> $p_muk,
'-muks'=> $n_muk,
  
];

return $solve_library;
}

?>
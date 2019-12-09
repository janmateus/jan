<?php 
$DT=new DateTime();
$diff=$DT->diff(new DateTime($data));
if ($diff->y==0 && $diff->m==0 && $diff->d==0 && $diff->h==0 && $diff->i==0 && $diff->s>=0) {
	if ($diff->s==1) {$resto=" segundo atrás";}
	else {$resto=" segundos atrás";}
	$date=$diff->s.$resto;
}elseif ($diff->y==0 && $diff->m==0 && $diff->d==0 && $diff->h==0 && $diff->i>=0 && $diff->s>=0) {
	if ($diff->i==1) {$resto=" minuto atrás";}
	else {$resto=" minutos atrás";}
	$date=$diff->i.$resto;
}elseif ($diff->y==0 && $diff->m==0 && $diff->d==0 && $diff->h>=0 && $diff->i>=0 && $diff->s>=0) {
	if ($diff->h==1) {$resto=" hora atrás";}
	else {$resto=" horas atrás";}
	$date=$diff->h.$resto;
}elseif ($diff->y==0 && $diff->m==0 && $diff->d>=0 && $diff->h>=0 && $diff->i>=0 && $diff->s>=0) {
	if ($diff->d==1) {$resto=" dia atrás";}
	else {$resto=" dias atrás";}
	$date=$diff->d.$resto;
}elseif ($diff->y==0 && $diff->m>=0 && $diff->d>=0 && $diff->h>=0 && $diff->i>=0 && $diff->s>=0) {
	if ($diff->m==1) {$resto=" mês atrás";}
	else {$resto=" meses atrás";}
	$date=$diff->m.$resto;
}elseif ($diff->y>=0 && $diff->m>=0 && $diff->d>=0 && $diff->h>=0 && $diff->i>=0 && $diff->s>=0) {
	if ($diff->y==1) {$resto=" ano atrás";}
	else {$resto=" anos atrás";}
	$date=$diff->y.$resto;
}
?> 
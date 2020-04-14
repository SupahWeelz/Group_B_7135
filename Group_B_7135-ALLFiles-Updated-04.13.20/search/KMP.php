<?php
	$text='babacaccbaccabcbbbabcab';
	$pattern='abacab';
	
	function failure($P){
		$F[0] = 0;
		$i = 1;
		$j = 0;
		$m = strlen($P);
		while($i<$m){
			if($P[$i] == $P[$j]){
				$F[$i] = $j + 1;
				$i = $i + 1;
				$j = $j + 1;
			}
			elseif($j > 0){
				$j = $F[$j-1];
			}
			else{
				$F[$i] = 0;
				$i = $i + 1;
			}
		}
		return $F;
	}
	echo '<br>';
	$myFailure=failure($pattern);
	
	function kmp($T,$P){
		$i=0;
		$j=0;
		$F = failure($P);
		$n = strlen($T);
		$m = strlen($P);
		while($i < $n){
			if($T[$i] == $P[$j]){
				if ($j==$m-1){
					return $i-$j;
				}
				else{
					$i=$i+1;
					$j=$j+1;
				}
			}
			else{
				if($j>0){
					$j = $F[$j-1];
				}
				else{
					$i=$i+1;
				}
			}
		}
		return -1;
	}
	
	echo '<br>';
	$myKMP=kmp($text,$pattern);
?>
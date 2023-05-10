<?php
$principal = array(2,3,5,7,8,9,10,11,12,13,16,20,21,22,25);
//$principal = array_rand(array_flip(range(1, 25)), 15);


$comp_um = array(2, 3, 5, 6, 7,  8,  9, 10, 11, 15, 16, 17, 18, 19, 23);
$comp_da = array(1, 2, 6, 7, 8, 11, 12, 16, 17, 18, 20, 21, 22, 23, 25);


/*
//$comp_um = array(3,4,5,6,9,10,12,16,17,19,20,21,22,23,24);
//$comp_da = array(4,7,8,9,10,11,12,13,15,16,17,18,21,22,24);
$comp_tr = array(1,2,3,4,5,8,9,10,12,13,19,20,21,22,23);
$comp_qa = array(1,2,4,5,6,7,9,10,12,13,14,19,23,24,25);
$comp_ci = array(2,5,7,10,11,12,13,14,16,17,18,21,22,24,25);
$comp_se = array(3,5,6,8,11,12,13,14,16,17,18,19,20,21,24);
$comp_st = array(2,3,4,5,6,10,11,12,15,18,20,21,22,24,25);
$comp_oi = array(1,2,5,8,9,10,12,13,15,17,18,19,22,23,25);
$comp_no = array(2,3,5,6,7,9,12,14,15,17,20,22,23,24,25);
$comp_db = array(1,2,5,6,8,9,10,11,13,17,18,19,21,23,24);
$comp_on = array(1,2,3,4,7,10,11,12,13,20,21,22,23,24,25);
$comp_dc = array(3,4,5,6,7,8,9,11,14,15,17,18,22,24,25);
$comp_tz = array(1,2,3,4,5,6,7,10,11,12,15,17,20,23,25);
$comp_qb = array(1,4,6,7,8,9,10,15,16,17,20,22,23,24,25);
$comp_qc = array(1,6,7,8,9,10,11,12,16,17,19,20,21,22,25);
$comp_dd = array(2,4,5,7,8,9,10,11,14,15,18,19,20,22,23);
$comp_de = array(1,3,6,7,9,10,11,14,15,18,20,21,23,24,25);
$comp_df = array(2,4,7,10,11,12,14,16,18,19,21,22,23,24,25);
$comp_dg = array(2,3,4,5,6,7,8,16,17,18,19,21,22,23,25);
$comp_va = array(1,3,5,6,8,10,11,13,14,15,16,18,19,20,23);
$comp_vb = array(2,5,7,8,10,11,14,15,19,20,21,22,23,24,25);
$comp_vc = array(6,7,8,9,10,12,14,15,17,18,20,22,23,24,25);
$comp_vd = array(1,2,3,7,9,10,13,14,17,18,20,21,22,24,25);
$comp_ve = array(1,2,4,5,6,9,11,12,14,15,18,20,22,24,25);
*/
$td_arrays = array($comp_um,$comp_da);
/*
$comp_tr,$comp_qa,$comp_ci,$comp_se,$comp_st,$comp_oi,$comp_no,
				   $comp_db,$comp_on,$comp_dc,$comp_tz,$comp_qb,$comp_qc,$comp_dd,$comp_de,$comp_df,
				   $comp_dg,$comp_va,$comp_vb,$comp_vc,$comp_vd,$comp_ve);
*/

$posi = array("primeiro","segundo");

/*
"terceiro","quarto","quinto","sexto","setimo","oitavo","nono",
	          "decimo","dec prim","dec sec","dec terc","dec quart","dec cin","dec sex",
	     	  "dec set","dec oit","dec nono","vigesimo","vig prim","vig sec","vig ter","vig quart");
*/

/////FUNÇÃO QUE FAZ O FATORIAL///////////////////
function combinations($input, $size) {
  $count = count($input);
  if ($count == 0 || $size == 0 || $size > $count) {
    return array();
  }
  if ($size == 1) {
    return array_map(function($el) { return array($el); }, $input);
  }
  $result = array();
  foreach (combinations(array_slice($input, 1), $size - 1) as $c) {
    array_unshift($c, $input[0]);
    $result[] = $c;
  }
  foreach (combinations(array_slice($input, 1), $size) as $c) {
    $result[] = $c;
  }
  return $result;
}



//////FIM DA FUNÇÃO QUE FAZ O FATORIAL//////////////////////////////////////

for ($i = 0; $i < count($td_arrays); $i++) {
    for ($j = $i+1; $j < count($td_arrays); $j++) {

        $posi1 = $posi[$i];
        $ator1 = $td_arrays[$i];

        $posi2 = $posi[$j];
        $ator2 = $td_arrays[$j];

        ///USE ESTE PROCESSO PARA FAZER A CONFERENCIA NO FINAL
		$acer_v = array_intersect($ator1,$ator2);
		$num    = count($acer_v);

		///USE ESTE PROCESSO PARA FAZER A CONFERENCIA NO FINAL
		$acer_g = array_intersect($ator1,$principal);
		$numg    = count($acer_g);

		///USE ESTE PROCESSO PARA FAZER A CONFERENCIA NO FINAL
		$acer_h = array_intersect($ator2,$principal);
		$numh    = count($acer_h);

			if ($num >= 9){

					echo "{$posi1} com {$posi2}" ."<br>" ; 

					//////PEGA OS DIFERENTES
					$difer      = array_diff($ator2,$ator1);
					sort($difer);
					$difer_dois = array_diff($ator1,$ator2);
					sort($difer_dois);


					$set      = $ator1;
					$set_dois = $ator2;

					// Obtém todas as combinações de 4 elementos do conjunto
					$combinations = combinations($set, 11);
					$new_comb     = combinations($difer, 4);

					// Obtém todas as combinações de 4 elementos do conjunto
					$combinations_dois = combinations($set_dois, 11);
					$new_comb_dois     = combinations($difer_dois, 4);

					////Imprime as combinações
					foreach ($new_comb as $quatros) {
					  	
					  	

					  		foreach($new_comb_dois as $quatros_dois){

					  			echo implode(',', $quatros) . "**";
					  			echo implode(',', $quatros_dois) . "<br>";
					  		}///fecha o foreach mais central
					   
					}////fecha o foreach

					echo "<br>";

			}////fecha o if $num
        		
			

    }////fecha o form do meio
}///fecha o for maior


?>
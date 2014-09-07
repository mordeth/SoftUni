<?php
$text = $_GET['text'];
$minfont = $_GET['minFontSize'];
$maxfont = $_GET['maxFontSize'];
$step = $_GET['step'];
$fontSize = $minfont;
$up = true;
$textArray = str_split($text);

foreach($textArray as $key=>$char) {
	echo "<span style='font-size:".$fontSize.";".if_even($char)."'>".htmlspecialchars($char)."</span>";

	if (if_letter($char) && $up == true && $fontSize < $maxfont)
	{
		  $fontSize += $step;
		  $up = true;
	}
	else
	{	
		if(if_letter($char) && $fontSize > $minfont) {
		
			$fontSize -= $step;
			$up = false;
			
		} elseif(if_letter($char)) {
		
			$up = true;
			$fontSize += $step;
		}
	}
		
}


function if_even($char) {
	if(ord($char) % 2 == 0) {
		return 'text-decoration:line-through;';
	} 
}

function if_letter($char) {
	if(ctype_alpha($char)) {
		return true;
	} else {
		return false;
	}
}
?>

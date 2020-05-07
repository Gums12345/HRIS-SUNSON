<?php 

function calculate_string($mathString) {
   eval("\$mathString = \"$mathString\";");
   $mathString = trim($mathString);     // trim white spaces
   $mathString = preg_replace('[^0-9\+-\*\/\(\) ]', '', $mathString);    // remove any non-numbers chars; exception for math operators
   $compute = create_function("", "return (" . $mathString . ");");
   return 0 + $compute();
}


$gapok = 50000	;

$formula = "1/60*$gapok";  // as drawn from db

echo calculate_string($formula); //outputs 9

		?>

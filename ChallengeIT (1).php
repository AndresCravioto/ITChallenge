<?php 

//All the numbers we're going to label

$range = range (1,100,1);

/* We'll make subsets of the $i array, 1 for numbers divisible by 3 and not by 5, one for divisible by 5 and not by 3,
one for numbers divisible by both 3 and 5, and a subset for the numbers that don't fall into the other 3 subsets.
*/

// Not divisible by 3 or 5

$numbers = array_filter($range, function ($x) {
return $x % 3 != 0 && $x % 5 != 0;
}
); 

// Divisible by 3 and not by 5

$Linio = array_filter($range, function ($y) {
return $y % 3 == 0 && $y % 5 != 0;
}
); 


// Divisible by 5 and not by 3

$IT = array_filter($range, function ($z) {
return $z % 3 != 0 && $z % 5 == 0;
}
); 


// Divisible by 5 and 3

$Linianos = array_filter($range, function ($yz) {
return $yz % 3 == 0 && $yz % 5 == 0;
}
); 


/* We'll make a vector with 2 entries, the first one will only be all the numbers we're working with
so we can order all the vectors, the other entry will be the desired output for each vector
*/

//Numbers e.g (1,1), (2,2)

$numbervectors = array_combine ($numbers, $numbers);

//Linio set e.g (3, Linio), (6, Linio)

$Liniosize = count($Linio); 								//number of elements in Linio set
$Linioword = array_fill(0, $Liniosize, "Linio");			//create an array of the word Linio with as many elements as $Linio
$Liniovectors = array_combine ($Linio, $Linioword); 		 //Vectors with the word Linio


//IT set e.g (5, IT)

$ITsize = count($IT); 			
$ITword = array_fill(0, $ITsize, "IT");	
$ITvectors = array_combine ($IT, $ITword);  


//Linianos set e.g (15, Linianos)

$Linianossize = count($Linianos); 			
$Linianosword = array_fill(0, $Linianossize, "Linianos");	
$Linianosvectors = array_combine ($Linianos, $Linianosword);  



//Join the vector sets and order it

$allvectors = $numbervectors + $Liniovectors + $ITvectors + $Linianosvectors;			
ksort($allvectors); 																	

//Print all vectors
foreach($allvectors as $output){			
echo $output . "<br>";}




?>
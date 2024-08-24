<?php



# function generate values 1-- > 1000000
//function generate_nums()
//{
//    $vals =[];
//    for ($i = 1; $i <= 1000000; $i++) {
//        array_push($vals, $i);
//    }
//    return $vals;
//} #array size 1000000


function generate_nums()
{

    for ($i = 1; $i <= 10; $i++) {
       yield $i;
    }

}

$nums = generate_nums();
var_dump($nums);
# gen object => reserve one place at time
foreach ($nums as $num) {
    echo "<h1> {$num} </h1>";
}








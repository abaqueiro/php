<?php

$t1 = microtime();

function microtime_to_double( $t ){
        $A = explode(' ',$t);
        return $A[0] + $A[1];
}

echo "t1: " . microtime_to_double($t1) . "\n";

//sleep(1);
$count_limit = 10000000;
echo "Counting to ". number_format($count_limit) . " ... ";
for ($i=0; $i<$count_limit; $i++){
}
echo "[ DONE ]\n";

$t2 = microtime();
echo "t2: " . microtime_to_double($t2) . "\n";

$elapsed = microtime_to_double($t2) - microtime_to_double($t1);
echo "elapsed: $elapsed\n";

?>

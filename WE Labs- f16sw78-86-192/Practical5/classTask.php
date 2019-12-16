

<?php

function factorial($num){
    $factorial=1;
    for($i=1; $i<$num; $i++){
        $factorial=$factorial*$num;
        $num=$num-1;
    }
return $factorial;
}

function add($first,$second){
return $first+$second;
}
function division($first,$second){
    return $first/$second;
    }

    function subtract($first,$second){
        return $first-$second;
        }
        function multiply($first,$second){
            return $first*$second;
            }
                    

?>


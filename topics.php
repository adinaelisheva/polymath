<?php
echo("[");

include("cnfg.php");

$result = mysqli_query($con,"SELECT * from topics");

$first = true;

while($result && $row = mysqli_fetch_array($result)){
    if( !$first ){
        echo ",";
    }
    echo '{"topic":"'; 
    echo $row["topic"];
    echo '","exp":"';
    echo $row["exp"];
    echo '"}';

    $first = false;
}

echo("]");
?>
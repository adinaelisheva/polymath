<?php
echo("[");

include("cnfg.php");

$result = mysqli_query($con,"SELECT * from tasks ORDER BY topic");

$first = true;

while($result && $row = mysqli_fetch_array($result)){
    if( !$first ){
        echo ",";
    }
    echo '{"task":"'; 
    echo $row["task"];
    echo '","topic":"';
    echo $row["topic"];
    echo '","level":"';
    echo $row["level"];
    echo '"}';

    $first = false;
}

echo("]");
?>
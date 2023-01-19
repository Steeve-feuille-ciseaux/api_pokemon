<?php
if(count($argv) < 2) {
    throw new Exception('Usage php -f wait_db_up.php db_container_name:port [time_limit]');
}
$containerName = explode(":", $argv[1])[0] ?? "NULL";
$port = explode(":", $argv[1])[1] ?? -1;
$timeLimit = $argv[2]  ?? 15;
set_time_limit($timeLimit);
echo "Wait to $containerName:$port database... for $timeLimit secondes" . PHP_EOL;
for($i=0;;$i++) {
    if(@fsockopen($containerName, $port)) {
        echo "\033[1;32mConnection to $containerName database ok\033[0m" . PHP_EOL;
        break;
    }
    sleep(1);
    echo "$i \r";
    if( $i >= $timeLimit ) {
        throw new Exception('Timeout');
    }
}

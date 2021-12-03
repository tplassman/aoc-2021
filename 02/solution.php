<?php

$data = explode("\n", file_get_contents('./input', true)); // Load input
$lines = array_filter($data); // Strip empty lines
$commands = array_map(fn ($c) => explode(' ', $c), $lines); // Split command into direction and value
[$xf, $yf, $aimf] =  array_reduce(
    array_map(fn ($c) => [$c[0], intval($c[1])], $commands), // Parse value into int
    fn ($pos, $c) => [
        'forward' => [($pos[0] + $c[1]), ($pos[1] + $pos[2] * $c[1]), $pos[2]],
        'up' => [$pos[0], $pos[1], ($pos[2] - $c[1])],
        'down' => [$pos[0], $pos[1], ($pos[2] + $c[1])],
    ][$c[0]],
    [0, 0, 0]
);

printf("%d\n", $xf * $yf);

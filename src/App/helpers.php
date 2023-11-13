<?php

/**
 * Print data in a human-readable format for debugging purposes and exit.
 *
 * @param mixed $data The data to be printed
 *
 * @return void
 */
function dd(mixed $data): void
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    exit;
}

<?php

    $iteration = 0;

    while(True)
    {
        if($iteration == 10)
            break;

        print("Hello World, this is iteration number $iteration" . PHP_EOL);
        $iteration += 1;
        sleep(1);
    }
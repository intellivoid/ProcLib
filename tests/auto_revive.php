<?php

    /**
     * This example automatically revives a killed process
     */

    require("ppm");
    ppm_import("net.intellivoid.proclib");

    $process = new \ProcLib\Process(["/usr/bin/php", __DIR__ . DIRECTORY_SEPARATOR . "examples" . DIRECTORY_SEPARATOR . "long_executing_script.php"]);
    $process->start();
    print("Process Monitor started" . PHP_EOL);

    while(true)
    {
        if($process->isRunning() == false)
        {
            print("Process was killed after running for, restarting" . PHP_EOL);
            $process->start();
        }

        sleep(1); // Reduce CPU usage
    }


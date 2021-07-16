<?php

    /**
     * This test simply shows the output of a process once it's done executing
     */

    require("ppm");
    ppm_import("net.intellivoid.proclib");

    $process = new \ProcLib\Process(["ls", "-lart"]);
    $process->run();

    if($process->isSuccessful() == false)
    {
        print("The process couldn't execute, " . $process->getErrorOutput() . PHP_EOL);
        exit($process->getExitCode());
    }

    print($process->getOutput());
    exit($process->getExitCode());
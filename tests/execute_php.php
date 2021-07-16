<?php

    /**
     * This test simply shows the output of a process once it's done executing
     */

    require("ppm");
    ppm_import("net.intellivoid.proclib");

    $source_code = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "examples" . DIRECTORY_SEPARATOR . "hello_world.php");
    $process = new \ProcLib\PhpProcess($source_code);
    $process->run();

    if($process->isSuccessful() == false)
    {
        print("The process couldn't execute, " . $process->getErrorOutput() . PHP_EOL);
        exit($process->getExitCode());
    }

    print($process->getOutput());
    exit($process->getExitCode());
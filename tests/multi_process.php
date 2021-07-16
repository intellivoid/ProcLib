<?php

    /**
     * This test executes multiple processes and outputs the stdout for all of them and waits for
     * all the processes to terminate before exiting
     */

    require("ppm");
    ppm_import("net.intellivoid.proclib");

    $iteration = 0;
    $processes = [];

    while(true)
    {
        if($iteration == 20)
            break;
        $process = new \ProcLib\Process(["/usr/bin/php", __DIR__ . DIRECTORY_SEPARATOR . "examples" . DIRECTORY_SEPARATOR . "long_executing_script.php"]);
        $process->enableOutput();
        $processes[] = $process;
        $iteration += 1;
    }

    /** @var \ProcLib\Process $process */
    foreach($processes as $process)
    {
        $process->start(function ($type, $buffer) use ($process) {
            print("Process " . $process->getPid() . " > " . $buffer);
        });
        print("Executed process " . $process->getPid() . PHP_EOL);
    }

    print("Waiting for all processes to complete" . PHP_EOL);
    while(true)
    {
        $completed_processes = 0;

        /** @var \ProcLib\Process $process */
        foreach($processes as $process)
        {
            if($process->isRunning() == false)
                $completed_processes += 1;
        }

        if($completed_processes == count($processes))
            break;
    }

    print("Done!" . PHP_EOL);
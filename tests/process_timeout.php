<?php

    /**
     * This example streams the process output as it's executing, ideally for long-executing processes
     */

    require("ppm");
    ppm_import("net.intellivoid.proclib");

    $process = new \ProcLib\Process(["/usr/bin/php", __DIR__ . DIRECTORY_SEPARATOR . "examples" . DIRECTORY_SEPARATOR . "long_executing_script.php"]);
    $process->start();

    $process->wait(function ($type, $buffer) {
        print('OUT > ' . $buffer);
    });

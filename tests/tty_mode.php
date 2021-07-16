<?php

    /**
     * This test simply shows the output of a process once it's done executing
     */

    require("ppm");
    ppm_import("net.intellivoid.proclib");

    $process = new \ProcLib\Process(["htop"]);
    $process->setTty(true);
    $process->run();
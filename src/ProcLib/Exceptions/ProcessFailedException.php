<?php


    namespace ProcLib\Exceptions;


    use ProcLib\Process;

    /**
     * Class ProcessFailedException
     * @package ProcLib\Exceptions
     */
    class ProcessFailedException extends RuntimeException
    {
        /**
         * @var Process
         */
        private $process;

        /**
         * ProcessFailedException constructor.
         * @param Process $process
         */
        public function __construct(Process $process)
        {
            if ($process->isSuccessful())
            {
                throw new InvalidArgumentException('Expected a failed process, but the given process was successful.');
            }

            $error = sprintf('The command "%s" failed.'."\n\nExit Code: %s(%s)\n\nWorking directory: %s",
                $process->getCommandLine(),
                $process->getExitCode(),
                $process->getExitCodeText(),
                $process->getWorkingDirectory()
            );

            if (!$process->isOutputDisabled())
            {
                $error .= sprintf("\n\nOutput:\n================\n%s\n\nError Output:\n================\n%s",
                    $process->getOutput(),
                    $process->getErrorOutput()
                );
            }

            parent::__construct($error);

            $this->process = $process;
        }

        /**
         * @return Process
         */
        public function getProcess()
        {
            return $this->process;
        }
    }

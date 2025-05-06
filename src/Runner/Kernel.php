<?php

declare(strict_types=1);

namespace Gollumeo\Verrastra\Runner;

use Exception;
use Gollumeo\Verrastra\Discovery\SpecFinder;
use Gollumeo\Verrastra\Presentation\CLI\Contract\CLIOutputContract;

final class Kernel
{
    public function __construct(
        private CLIOutputContract $output,
    ) {}

    public function run(): int
    {
        $specFinder = new SpecFinder();
        try {
            $specs = $specFinder->find();

            if (count($specs) === 0) {
                $this->output->warning('No specs found in ./specs');
                $this->output->hint('Make sure you have at least one class implementing SpecCase.');

                return 1;
            }

            foreach ($specs as $spec) {
                echo $spec;
            }

            return 0;

        } catch (Exception $exception) {
            echo $exception->getMessage();

            return 1;
        }
    }
}

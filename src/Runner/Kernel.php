<?php

declare(strict_types=1);

namespace Gollumeo\Verrastra\Runner;

use Exception;
use Gollumeo\Verrastra\Application\UseCase\DiscoverSpecs;
use Gollumeo\Verrastra\Presentation\CLI\Contract\CLIOutputContract;

final readonly class Kernel
{
    public function __construct(
        private CLIOutputContract $output,
        private DiscoverSpecs $discoverSpecs,
    ) {}

    public function run(): int
    {
        try {
            $specs = $this->discoverSpecs->handle();

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
            $this->output->error($exception->getMessage());

            return 1;
        }
    }
}

<?php

declare(strict_types=1);

namespace Gollumeo\Verrastra\Runner;

use Exception;
use Gollumeo\Verrastra\Discovery\SpecFinder;

final class Kernel
{
    public function run(): int
    {
        $specFinder = new SpecFinder();
        try {
            $specs = $specFinder->find();

            if (count($specs) === 0) {
                echo 'No specs found in ./specs'.PHP_EOL.'Make sure you have at least one class implementing SpecCase.'.PHP_EOL;

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

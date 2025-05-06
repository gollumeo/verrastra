<?php

declare(strict_types=1);

namespace Gollumeo\Verrastra\Runner;

use Gollumeo\Verrastra\Discovery\SpecFinder;

final class Kernel
{
    public function run(): int
    {
        $specFinder = new SpecFinder();
        $specs = $specFinder->find();

        foreach ($specs as $spec) {
            echo $spec;
        }

        return 0;
    }
}

<?php

declare(strict_types=1);

namespace Gollumeo\Verrastra\Runner;

final class Kernel
{
    public function run(): int
    {
        echo 'Verrastra booted 🐉';

        return 0;
    }
}

<?php

declare(strict_types=1);

namespace Gollumeo\Verrastra\Application\Contract;

interface SpecDiscoveryContract
{
    /**
     * @return class-string[]
     */
    public function find(string $path = 'specs'): array;
}

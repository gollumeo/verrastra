<?php

declare(strict_types=1);

namespace Gollumeo\Verrastra\Domain\Contract;

interface SpecCase
{
    /**
     * @return class-string[]
     */
    public function find(string $path = 'specs'): array;
}

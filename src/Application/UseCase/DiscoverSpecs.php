<?php

declare(strict_types=1);

namespace Gollumeo\Verrastra\Application\UseCase;

use Gollumeo\Verrastra\Application\Contract\SpecDiscoveryContract;

final readonly class DiscoverSpecs
{
    public function __construct(
        private SpecDiscoveryContract $specs
    ) {}

    /**
     * @return class-string[]
     */
    public function handle(): array
    {
        return $this->specs->find();
    }
}

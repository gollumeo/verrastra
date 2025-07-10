<?php

declare(strict_types=1);

namespace specs;

use Gollumeo\Verrastra\Domain\Contract\SpecCase;

final class BootTest implements SpecCase
{
    public function itRunsTheRest(): void
    {
        echo 'BootTest loaded';
        file_put_contents(__DIR__.'/../test.log', 'VERIFIED');
    }
}

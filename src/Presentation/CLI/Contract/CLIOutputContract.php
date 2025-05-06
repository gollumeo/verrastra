<?php

declare(strict_types=1);

namespace Gollumeo\Verrastra\Presentation\CLI\Contract;

interface CLIOutputContract
{
    public function info(string $message): void;

    public function error(string $message): void;

    public function success(string $message): void;

    public function warning(string $message): void;

    public function hint(string $message): void;

    public function raw(string $message): void;
}

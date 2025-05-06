<?php

declare(strict_types=1);

namespace Gollumeo\Verrastra\Presentation\CLI;

use Gollumeo\Verrastra\Presentation\CLI\Contract\CLIOutputContract;

final class CLIOutput implements CLIOutputContract
{
    public function info(string $message): void
    {
        $this->write(STDOUT, "\033[36mℹ {$message}\033[0m");
    }

    public function success(string $message): void
    {
        $this->write(STDOUT, "\033[32m✔ {$message}\033[0m");
    }

    public function warning(string $message): void
    {
        $this->write(STDOUT, "\033[33m⚠ {$message}\033[0m");
    }

    public function hint(string $message): void
    {
        $this->write(STDOUT, "\033[36m  → {$message}\033[0m");
    }

    public function error(string $message): void
    {
        $this->write(STDERR, "\033[31m✘ {$message}\033[0m");
    }

    public function raw(string $message): void
    {
        $this->write(STDOUT, $message);
    }

    /**
     * @param  resource  $stream
     */
    private function write($stream, string $message): void
    {
        fwrite($stream, $message.PHP_EOL);
    }
}

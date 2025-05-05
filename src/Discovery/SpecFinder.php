<?php

declare(strict_types=1);

namespace Gollumeo\Verrastra\Discovery;

use FilesystemIterator;
use Gollumeo\Verrastra\Contract\SpecCase;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;
use SplFileInfo;

final class SpecFinder
{
    /**
     * @var list<class-string<SpecCase>>
     */
    private array $classes = [];

    public function find(string $path = 'specs'): array
    {
        $this->detectClasses($path);

        return $this->classes;
    }

    private function detectClasses(string $path): void
    {
        $snapshot = get_declared_classes();

        $directory = new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS);
        $iterator = new RecursiveIteratorIterator($directory);

        /** @var SplFileInfo $file */
        foreach ($iterator as $file) {
            if (! $file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            require_once $file->getPathname();
        }

        $after = get_declared_classes();
        $newClasses = array_diff($after, $snapshot);

        foreach ($newClasses as $class) {
            if (! class_exists($class)) {
                continue;
            }
            $reflection = new ReflectionClass($class);

            if ($reflection->implementsInterface(SpecCase::class)) {
                $this->classes[] = $class;
            }
        }
    }
}

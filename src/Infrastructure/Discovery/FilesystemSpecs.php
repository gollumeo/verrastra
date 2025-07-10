<?php

declare(strict_types=1);

namespace Gollumeo\Verrastra\Infrastructure\Discovery;

use Exception;
use FilesystemIterator;
use Gollumeo\Verrastra\Application\Contract\SpecDiscoveryContract;
use Gollumeo\Verrastra\Domain\Contract\SpecCase;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;
use ReflectionException;
use SplFileInfo;

final class FilesystemSpecs implements SpecDiscoveryContract
{
    /**
     * @var list<class-string<SpecCase>>
     */
    private array $classes = [];

    /**
     * @return class-string[]
     *
     * @throws Exception
     */
    public function find(string $path = 'specs'): array
    {
        if (! $this->isValidPath($path)) {
            throw new Exception("Invalid path: $path");
        }

        $snapshot = get_declared_classes();

        $this->loadPhpFiles($path);

        $newClasses = $this->getNewDeclaredClasses($snapshot);

        $this->filterSpecCases($newClasses);

        return $this->classes;
    }

    private function isValidPath(string $path): bool
    {
        return is_dir($path) || is_file($path);
    }

    /**
     * @throws Exception
     */
    private function loadPhpFiles(string $path): void
    {
        $directory = new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($directory);

        /** @var SplFileInfo $file */
        foreach ($files as $file) {
            if (! $file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            require_once $file->getPathname();
        }
    }

    /**
     * @param  class-string[]  $snapshot
     * @return class-string[]
     */
    private function getNewDeclaredClasses(array $snapshot): array
    {
        $after = get_declared_classes();

        return array_diff($after, $snapshot);
    }

    /**
     * @param  class-string[]  $classes
     *
     * @throws ReflectionException
     */
    private function filterSpecCases(array $classes): void
    {
        /** @var class-string<SpecCase> $class */
        foreach ($classes as $class) {
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

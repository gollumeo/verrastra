<?php

declare(strict_types=1);

describe('Basic test', function (): void {
    it('executes a test marked with #[Test]', function (): void {
        $path = __DIR__.'/../../test.log';

        if (file_exists($path)) {
            unlink($path);
        }

        shell_exec('php bin/verrastra');

        expect(file_exists($path))->toBeTrue()
            ->and(file_get_contents($path))->toBe('VERIFIED');
    });
});

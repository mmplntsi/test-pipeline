<?php
declare(strict_types=1);

namespace Ticka\Tests\Http;

use PHPUnit\Framework\TestCase;
use Ticka\Http\TicketIdResolver;

final class TicketIdResolverTest extends TestCase {
    public function testItReturnsZeroWhenTicketIsMissing(): void {
        $resolver = new TicketIdResolver();

        self::assertSame(0, $resolver->resolve([]));
    }

    public function testItConvertsNumericStringsIntoIntegers(): void {
        $resolver = new TicketIdResolver();

        self::assertSame(42, $resolver->resolve(['ticket' => '42']));
    }

    public function testItRejectsNonNumericValues(): void {
        $resolver = new TicketIdResolver();

        self::assertSame(0, $resolver->resolve(['ticket' => 'DROP TABLE tickets']));
    }

    public function testItNormalizesNegativeValuesToZero(): void {
        $resolver = new TicketIdResolver();

        self::assertSame(0, $resolver->resolve(['ticket' => '-8']));
    }
}

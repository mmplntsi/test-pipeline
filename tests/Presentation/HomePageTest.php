<?php
declare(strict_types=1);

namespace Ticka\Tests\Presentation;

use PHPUnit\Framework\TestCase;
use Ticka\Presentation\HomePage;

final class HomePageTest extends TestCase {
    public function testItRendersTheSelectedTicketIdentifier(): void {
        $page = new HomePage();

        self::assertSame(
            "<h1>Hello World!</h1>\n<p>Ticket selezionato: 12</p>\n",
            $page->render(12)
        );
    }

    public function testItNeverRendersNegativeTicketIdentifiers(): void {
        $page = new HomePage();

        self::assertStringContainsString('Ticket selezionato: 0', $page->render(-3));
    }
}

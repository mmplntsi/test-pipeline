<?php
declare(strict_types=1);

namespace Ticka\Presentation;

final class HomePage {
    public function render(int $ticketId): string {
        $safeTicketId = max(0, $ticketId);

        return sprintf(
            "<h1>Hello World!</h1>\n<p>Ticket selezionato: %d</p>\n",
            $safeTicketId
        );
    }
}

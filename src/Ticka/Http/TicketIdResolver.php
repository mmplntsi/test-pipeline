<?php
declare(strict_types=1);

namespace Ticka\Http;

final class TicketIdResolver {
    public function resolve(array $query): int {
        $rawTicketId = $query['ticket'] ?? 0;

        if (is_int($rawTicketId)) {
            return $this->normalize($rawTicketId);
        }

        if (is_string($rawTicketId) && preg_match('/^-?\d+$/', $rawTicketId) === 1) {
            return $this->normalize((int) $rawTicketId);
        }

        return 0;
    }

    private function normalize(int $ticketId): int {
        return max(0, $ticketId);
    }
}

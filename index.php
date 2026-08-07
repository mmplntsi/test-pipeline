<?php
declare(strict_types=1);

$autoload = __DIR__ . '/vendor/autoload.php';

if (file_exists($autoload)) {
    require $autoload;
} else {
    require __DIR__ . '/src/Ticka/Http/TicketIdResolver.php';
    require __DIR__ . '/src/Ticka/Presentation/HomePage.php';
}

$resolver = new Ticka\Http\TicketIdResolver();
$page = new Ticka\Presentation\HomePage();

$ticketId = $resolver->resolve($_GET);

echo $page->render($ticketId);

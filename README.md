# test-pipeline

Esempio minimale di modulo Ticka con pipeline GitHub Actions deterministica basata su PHPUnit.

## Eseguire i test con Docker

Installazione dipendenze:

```powershell
docker run --rm -v "${PWD}:/app" -w /app plnt_php_8.0.30:20231127 composer install
```

Esecuzione test:

```powershell
docker run --rm -v "${PWD}:/app" -w /app plnt_php_8.0.30:20231127 composer test
```

Esecuzione coverage:

```powershell
docker run --rm -e XDEBUG_MODE=coverage -v "${PWD}:/app" -w /app plnt_php_8.0.30:20231127 composer test:coverage
```

## Workflow CI

Il workflow [ticka-ci.yml](.github/workflows/ticka-ci.yml) esegue in sequenza:

- lint sintattico dei file PHP tracciati
- build deterministica con Composer e lock file
- test unitari PHPUnit con report JUnit e TestDox HTML
- calcolo copertura con report Clover e HTML
- preservazione finale degli artifact CI in un bundle immutabile

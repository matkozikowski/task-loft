APP HOW TO
========================
- run `composer install` and `composer dumpautoload -o`
- run `sh run.sh` to run tests and application with default json
- to run only test: `./vendor/bin/phpunit --testdox tests`
- to run only script `php index.php --json=''`

### Full Command
```
php index.php --json='[ { "from": "Adolfo Suárez Madrid–Barajas Airport, Spain", "to": "London Heathrow, UK" }, { "from": "Fazenda São Francisco Citros, Brazil", "to": "São Paulo–Guarulhos International Airport, Brazil" }, { "from": "London Heathrow, UK", "to": "Loft Digital, London, UK" }, { "from": "Porto International Airport, Portugal", "to": "Adolfo Suárez Madrid–Barajas Airport, Spain" }, { "from": "São Paulo–Guarulhos International Airport, Brazil", "to": "Porto International Airport, Portugal" } ]'
```
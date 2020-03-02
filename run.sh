#!/bin/sh
./vendor/bin/phpunit --testdox tests && \
php index.php --json='[ { "from": "Adolfo Suárez Madrid–Barajas Airport, Spain", "to": "London Heathrow, UK" }, { "from": "Fazenda São Francisco Citros, Brazil", "to": "São Paulo–Guarulhos International Airport, Brazil" }, { "from": "London Heathrow, UK", "to": "Loft Digital, London, UK" }, { "from": "Porto International Airport, Portugal", "to": "Adolfo Suárez Madrid–Barajas Airport, Spain" }, { "from": "São Paulo–Guarulhos International Airport, Brazil", "to": "Porto International Airport, Portugal" } ]'

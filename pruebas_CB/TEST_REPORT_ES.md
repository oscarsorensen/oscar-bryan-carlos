## Contexto
Para esta tarea, revisé el flujo de login y el validador en mi proyecto Chamitos, y ejecuté pruebas automatizadas de caja blanca sobre la implementación actual.

## Pruebas que ejecuté
- `php test_validador.php`
- `php test_bd.php`

## Resultados de las pruebas

### Pruebas del validador (`test_validador.php`)
Probé el validador con valores vacíos y no vacíos:

- username=`""`, password=`""`
  - Esperado: `"Rellena todos los campos."`
  - Actual: `"Rellena todos los campos."` (PASS)
- username=`"pepe"`, password=`""`
  - Esperado: `"Rellena todos los campos."`
  - Actual: `"Rellena todos los campos."` (PASS)
- username=`""`, password=`"1234"`
  - Esperado: `"Rellena todos los campos."`
  - Actual: `"Rellena todos los campos."` (PASS)
- username=`"pepe"`, password=`"1234"`
  - Esperado: `""` (sin error de validación)
  - Actual: `""` (PASS)

### Prueba de base de datos (`test_bd.php`)
Probé que `bd.php` crea un objeto de conexión `mysqli` válido.

- Esperado: conexión creada y assertions correctas
- Actual: assertions correctas (PASS)

## Resumen
- `test_validador.php`: PASS (`OK: test_validador`)
- `test_bd.php`: PASS (`OK: test_bd`)

En este momento, las pruebas incluidas en `pruebas_CB` funcionan correctamente.

## Archivos incluidos para revisión
- `/opt/homebrew/var/www/Projects/ChamitosMC/pruebas_CB/login.php`
- `/opt/homebrew/var/www/Projects/ChamitosMC/pruebas_CB/validador.php`
- `/opt/homebrew/var/www/Projects/ChamitosMC/pruebas_CB/bd.php`
- `/opt/homebrew/var/www/Projects/ChamitosMC/pruebas_CB/test_validador.php`
- `/opt/homebrew/var/www/Projects/ChamitosMC/pruebas_CB/test_bd.php`

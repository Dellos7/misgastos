# Mis Gastos

## Desarrollo

Lanzar con Docker en desarrollo:

```
docker-compose -f docker-compose.yml -f docker-compose.override.yml up --build
```

## Producción

Lanzar con Docker en producción:

```
docker-compose -f docker-compose.yml -f docker-compose.production.yml up -d
```

Aplicar cambios a un servicio (`php`):

```
docker-compose build php
docker-compose up --no-deps -d php
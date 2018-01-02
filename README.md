# Drupal 8 project using docker

## Technologies used:
- Docker
- Drupal 8 [Composer Install]
- Nginx
- PHP FPM
- PHP 7.1
- Memcached
- Varnish

## New database and site setup:
Run below command to setup database and install drupal 8 site.
```
docker exec -i php /opt/projects/app/vendor/bin/drush site-install --db-url=mysql://root@db/app --root=/opt/projects/app/web
```

## Enable modules
Run below command to enable modules.
```
docker exec -i php /opt/projects/app/vendor/bin/drush en features_ui --root=/opt/projects/app/web
```

## Cache Clear
Run below command to clear cache.
```
docker exec -i php /opt/projects/app/vendor/bin/drush cache-rebuild --root=/opt/projects/app/web
```

## Caching Stats
Below stats are based on just one module called products. This module calls database couple of times to grab information about all products and display it in a templated layout.

- Stock config probably have opcache installed as default and stock application caching from drupal.
    - Cache Cleared: 6.66s
    - Second Refresh: 134ms

- Stock caching + Memcached installed.
    - Cache Cleared: 6s
    - Second Refresh: 99ms







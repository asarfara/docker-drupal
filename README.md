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
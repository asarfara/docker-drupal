# Drupal 8 project using docker

## Technologies used:
- Docker
- Drupal 8 [Composer Install]
- Nginx
- PHP FPM
- PHP 7.1
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
Below stats are based on just stock install of drupal 8 with one custom module and single page.
Cache cleared on multiple intervals and page reloaded.
Also it is using stock configuration for nginx and fpm. The load times are based on first and second reload after cache rebuild.
Benchmarking is based on 
```
siege -b -t60S  http://localhost
```

- Stock config probably have opcache installed as default and stock application caching from drupal.
```
Transactions:                   5091 hits
Availability:                 100.00 %
Elapsed time:                  59.23 secs
Data transferred:             132.13 MB
Response time:                  0.29 secs
Transaction rate:              85.95 trans/sec
Throughput:                     2.23 MB/sec
Concurrency:                   24.86
Successful transactions:        5091
Failed transactions:               0
Longest transaction:            5.27
Shortest transaction:           0.00
```
    
- Stock caching + Varnish(Config with enhancements).
```
Transactions:                   5347 hits
Availability:                 100.00 %
Elapsed time:                  59.09 secs
Data transferred:             139.00 MB
Response time:                  0.27 secs
Transaction rate:              90.49 trans/sec
Throughput:                     2.35 MB/sec
Concurrency:                   24.82
Successful transactions:        5347
Failed transactions:               0
Longest transaction:            2.98
Shortest transaction:           0.00
```






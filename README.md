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
Below stats are based on just stock install of drupal 8 with one custom module and single page.
Cache cleared on multiple intervals and page reloaded.
Also it is using stock configuration for nginx and fpm. The load times are based on first and second reload after cache rebuild.
Benchmarking is based on 
```
siege -b -t60S  http://localhost
```

- Stock config probably have opcache installed as default and stock application caching from drupal.
```
Transactions:                   4684 hits
Availability:                 100.00 %
Elapsed time:                  59.30 secs
Data transferred:             121.64 MB
Response time:                  0.31 secs
Transaction rate:              78.99 trans/sec
Throughput:                     2.05 MB/sec
Concurrency:                   24.83
Successful transactions:        4684
Failed transactions:               0
Longest transaction:           10.27
Shortest transaction:           0.00

```

- Stock caching + Memcached installed.
```
Transactions:                   3872 hits
Availability:                  99.97 %
Elapsed time:                  59.66 secs
Data transferred:             100.76 MB
Response time:                  0.38 secs
Transaction rate:              64.90 trans/sec
Throughput:                     1.69 MB/sec
Concurrency:                   24.82
Successful transactions:        3872
Failed transactions:               1
Longest transaction:           15.87
Shortest transaction:           0.00
```

- Stock caching + Memecached + Varnish(Default config).
```
Transactions:                   4188 hits
Availability:                 100.00 %
Elapsed time:                  59.51 secs
Data transferred:             108.99 MB
Response time:                  0.35 secs
Transaction rate:              70.37 trans/sec
Throughput:                     1.83 MB/sec
Concurrency:                   24.81
Successful transactions:        4188
Failed transactions:               0
Longest transaction:           11.85
Shortest transaction:           0.00
```
    
- Stock caching + Memecached + Varnish(Config with enhancements).
```
Transactions:                   5016 hits
Availability:                 100.00 %
Elapsed time:                  59.10 secs
Data transferred:             130.45 MB
Response time:                  0.29 secs
Transaction rate:              84.87 trans/sec
Throughput:                     2.21 MB/sec
Concurrency:                   24.82
Successful transactions:        5016
Failed transactions:               0
Longest transaction:            2.77
Shortest transaction:           0.00

```






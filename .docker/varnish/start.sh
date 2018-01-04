#!/bin/bash

varnishd -j unix,user=vcache -F -f /etc/varnish/default.vcl -s malloc,100m -a 0.0.0.0:80
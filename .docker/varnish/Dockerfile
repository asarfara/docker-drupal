FROM ubuntu:latest

RUN apt-get update && \
    apt-get install -y \
        varnish

ADD .docker/varnish/default.vcl /etc/varnish/default.vcl

ADD .docker/varnish/start.sh /tmp/

RUN chmod +x /tmp/start.sh

EXPOSE 80

CMD ["bash", "/tmp/start.sh"]
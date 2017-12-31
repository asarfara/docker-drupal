FROM nginx:alpine

ADD .docker/web/default.conf /etc/nginx/conf.d/
COPY app /opt/projects/app

EXPOSE 80

FROM matiux/php:fpm-7.4-bullseye-dev

ENV TZ=Europe/Rome

USER root

# php.ini
COPY conf/php.ini /usr/local/etc/php/conf.d/zz_custom_php.ini

RUN apt-get update && apt-get install -y --no-install-recommends \
    jq

###> Dipendenze sviluppo
#RUN apt-get update \
#    && apt-get -y upgrade \
#    && apt-get install -y --no-install-recommends \
#    graphviz #Per deptrac
###> Fine dipendenze sviluppo

COPY conf/xdebug-starter.sh /usr/local/bin/xdebug-starter
RUN chmod +x /usr/local/bin/xdebug-starter
RUN /usr/local/bin/xdebug-starter

USER utente

###> Bashrc con alias
COPY conf/shell-custom.rc /tmp/shell-custom.rc
RUN cat /tmp/shell-custom.rc >> /home/utente/.zshrc \
    && cat /tmp/shell-custom.rc >> /home/utente/.bashrc
###> Fine bashrc con alias

USER www-data

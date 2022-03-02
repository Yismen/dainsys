FROM ubuntu:21.10

LABEL maintainer="Taylor Otwell"

ARG WWWGROUP
ARG NODE_VERSION=16

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update \
    && apt-get install -y gnupg gosu curl ca-certificates zip unzip git supervisor sqlite3 libcap2-bin libpng-dev python2 \
    && mkdir -p ~/.gnupg \
    && chmod 600 ~/.gnupg \
    && echo "disable-ipv6" >> ~/.gnupg/dirmngr.conf \
    && apt-key adv --homedir ~/.gnupg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys E5267A6C \
    && apt-key adv --homedir ~/.gnupg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys C300EE8C \
    && echo "deb http://ppa.launchpad.net/ondrej/php/ubuntu impish main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && apt-get update \
    && apt-get install -y php7.4-cli php7.4-dev \
       php7.4-pgsql php7.4-sqlite3 php7.4-gd \
       php7.4-curl php7.4-memcached \
       php7.4-imap php7.4-mysql php7.4-mbstring \
       php7.4-xml php7.4-zip php7.4-bcmath php7.4-soap \
       php7.4-intl php7.4-readline php7.4-pcov \
       php7.4-msgpack php7.4-igbinary php7.4-ldap \
       php7.4-redis php7.4-xdebug \
    && php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && curl -sL https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get install -y yarn \
    && apt-get install -y mysql-client \
    && apt-get install -y postgresql-client \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*


# sqlrv installation. install pre requisites
RUN apt-get update
RUN apt-get install -y apt-transport-https
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN curl https://packages.microsoft.com/config/ubuntu/21.10/prod.list > /etc/apt/sources.list.d/mssql-release.list
RUN apt-get update
RUN ACCEPT_EULA=Y apt-get install -y msodbcsql17 mssql-tools
RUN apt-get install -y unixodbc

# install driver sqlsrv
RUN apt-get install -y php-pear
RUN apt-get update
RUN apt-get install -y php7.4-dev
# RUN apt-get install -y php-dev
RUN apt-get install -y make
RUN apt-get install -y autoconf
RUN apt-get install -y libc-dev
RUN apt-get install -y pkg-config
RUN apt-get install -y gcc
RUN apt-get install -y g++
RUN apt-get update
RUN pecl update-channels
# install composer
# RUN curl -sS https://getcomposer.org/installer | php
# RUN chmod a+x composer.phar
# RUN mv composer.phar /usr/local/bin/composer

# install ODBC Driver
RUN ACCEPT_EULA=Y apt-get install -y msodbcsql17
RUN apt-get install -y unixodbc-dev
RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bash_profile
RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc
RUN exec bash

# initial sqlsrv
RUN pecl install sqlsrv
RUN pecl install pdo_sqlsrv

# load driver sqlsrv
RUN echo "extension=sqlsrv.so" >> /etc/php/7.4/mods-available/sqlsrv.ini
# RUN ln -s /etc/php/7.4/mods-available/sqlsrv.ini /etc/php/7.4/apache2/conf.d/sqlsrv.ini
RUN ln -s /etc/php/7.4/mods-available/sqlsrv.ini /etc/php/7.4/cli/conf.d/sqlsrv.ini

RUN echo "extension=pdo_sqlsrv.so" >> /etc/php/7.4/mods-available/pdo_sqlsrv.ini
# RUN ln -s /etc/php/7.4/mods-available/pdo_sqlsrv.ini /etc/php/7.4/apache2/conf.d/pdo_sqlsrv.ini
RUN ln -s /etc/php/7.4/mods-available/pdo_sqlsrv.ini /etc/php/7.4/cli/conf.d/pdo_sqlsrv.ini

# end of sqlsrv installation. continue with laravel

RUN setcap "cap_net_bind_service=+ep" /usr/bin/php7.4

RUN groupadd --force -g $WWWGROUP sail
RUN useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u 1337 sail

COPY start-container /usr/local/bin/start-container
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY php.ini /etc/php/7.4/cli/conf.d/99-sail.ini
RUN chmod +x /usr/local/bin/start-container

EXPOSE 8000

ENTRYPOINT ["start-container"]

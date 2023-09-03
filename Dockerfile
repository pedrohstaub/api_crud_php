FROM ubuntu:20.04
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

#   Core
RUN export DEBIAN_FRONTEND=noninteractive && \
    apt update && \
    apt install -y software-properties-common tzdata ca-certificates curl unzip && \
    ln -sf /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime && \
    dpkg-reconfigure --frontend noninteractive tzdata
#   Repositorios
RUN add-apt-repository ppa:ondrej/php -y && \
    add-apt-repository ppa:ondrej/apache2 -y && \
    apt update

RUN apt-get update && apt-get install -y \
    tzdata \
    apache2 \
    php8.0 \
    libapache2-mod-php8.0 \
    php8.0-mysql \
    php8.0-pdo \
    php8.0-cli \
    php8.0-zip \
    php8.0-curl \
    php8.0-gd \
    php8.0-xml \
    php8.0-mbstring \
    php8.0-soap \
    php-pear \
    php8.0-dev \
    php8.0-zmq 
RUN apt-get install curl wget -y
RUN apt-get upgrade -y
RUN apt-get install vim -y

RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN curl https://packages.microsoft.com/config/ubuntu/20.04/prod.list > /etc/apt/sources.list.d/mssql-release.list

RUN apt-get update && ACCEPT_EULA=Y apt-get install -y msodbcsql17

RUN ACCEPT_EULA=Y apt-get install -y mssql-tools
RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc
RUN ["/bin/bash", "-c", "source ~/.profile"]

RUN apt-get install -y unixodbc-dev nano

# install driver sqlsrv
RUN pecl uninstall -r sqlsrv
RUN pecl uninstall -r pdo_sqlsrv
RUN pecl -d php_suffix=8.0 install sqlsrv
RUN pecl -d php_suffix=8.0 install pdo_sqlsrv
RUN printf "; priority=30\nextension=sqlsrv.so\n" > /etc/php/8.0/mods-available/sqlsrv.ini
RUN printf "; priority=40\nextension=pdo_sqlsrv.so\n" > /etc/php/8.0/mods-available/pdo_sqlsrv.ini
RUN phpenmod -v 8.0 sqlsrv pdo_sqlsrv

#COPY openssl.cnf /etc/ssl/openssl.cnf
RUN DEBIAN_FRONTEND=noninteractive apt-get -q update && apt-get -qy install wget make \
    && wget https://www.openssl.org/source/openssl-1.1.1l.tar.gz -O openssl-1.1.1h.tar.gz\
    && tar -xzvf openssl-1.1.1h.tar.gz \
    && cd openssl-1.1.1l \
    && ./config \
    && make install \ 
    && ln -sf /usr/local/ssl/bin/openssl 'which openssl'

RUN ldconfig

#RUN wget https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox_0.12.6-1.focal_amd64.deb

#COPY wkhtmltox_0.12.6-1.focal_amd64.deb /tmp/
#RUN dpkg -i /tmp/wkhtmltox_0.12.6-1.focal_amd64.deb
#RUN apt-get install -f
RUN wget https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox_0.12.6-1.focal_amd64.deb --no-check-certificate
RUN apt-get install ./wkhtmltox_0.12.6-1.focal_amd64.deb -y
#COPY php.ini /etc/php/8.0/apache2/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


WORKDIR /var/www/html

#ENTRYPOINT ["/usr/sbin/apache2", "-k", "start"]


ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
EXPOSE 80
CMD ["apachectl", "-D", "FOREGROUND"]
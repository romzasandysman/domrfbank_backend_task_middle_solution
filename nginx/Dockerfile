FROM nginx:latest

RUN apt-get update && \
    apt-get install -y \
    wget \
    tar \
    build-essential \
    libpcre3 \
    libpcre3-dev \
    zlib1g \
    zlib1g-dev \
    bind9

RUN mkdir /usr/local/nginx/
RUN mkdir /usr/local/nginx/modules/
RUN mkdir /etc/nginx/bx
RUN mkdir /etc/nginx/bx/conf
RUN mkdir /etc/nginx/bx/site_available
RUN mkdir /etc/nginx/bx/site_enabled

RUN cd /usr/local/nginx/ && \
    wget http://nginx.org/download/nginx-1.23.4.tar.gz && \
    tar zxvf nginx-1.23.4.tar.gz && \
    cd modules && \
    wget https://github.com/openresty/headers-more-nginx-module/archive/refs/tags/v0.34.tar.gz && \
    tar zxvf v0.34.tar.gz && \
    mv headers-more-nginx-module-0.34 headers-more-nginx-module && \
    cd ../nginx-1.23.4 && \
    ./configure --with-compat --add-dynamic-module=../modules/headers-more-nginx-module && \
    make modules && \
    cp objs/*.so /etc/nginx/modules && \
    rm -rf /usr/local/nginx

RUN useradd testUser

COPY nginx.conf /etc/nginx/nginx.conf
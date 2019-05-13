FROM ubuntu:trusty

RUN apt-get update -qq && apt-get install -qq -y software-properties-common && add-apt-repository -y ppa:ubuntu-toolchain-r/test && \
  apt-get update -qq && apt-get install -qq -y \
    libstdc++6 \
    libtbb2 \
    libcurl3 \
    libace-6.0.3 \
    libmysql++3 \
    git

EXPOSE 3724

COPY ./launch_realmd.sh /

VOLUME /server
WORKDIR /server/

RUN useradd -ms /bin/bash realm && chown -R realm:realm /server

USER realm
CMD ["/launch_realmd.sh"]
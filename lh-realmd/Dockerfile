# Start the MangOS platform build (LightsHope)
FROM lh-build:latest AS builder

# Create the base image to run the software
FROM ubuntu:trusty AS lh-run
MAINTAINER Bruno Gysels <bruno.gysels@gmail.com>

RUN apt-get update -qq && apt-get install -qq -y software-properties-common && add-apt-repository -y ppa:ubuntu-toolchain-r/test
RUN apt-get update -qq && apt-get install -qq -y \
  libstdc++6 \
  libtbb2 \
  libcurl3 \
  libace-6.0.3 \
  libmysql++3 \
  git

# Copy over the build server to a stable platform!
FROM lh-run
MAINTAINER Bruno Gysels <bruno.gysels@gmail.com>
EXPOSE 3724

ENV LOGIN_DATABASE_INFO=127.0.0.1;3306;root;mangos;realmd

RUN useradd -ms /bin/bash realm

VOLUME /server
WORKDIR /server/
COPY ./launch_realmd.sh .

RUN cp etc/realmd.conf.dist etc/realmd.conf && \
  sed -i 's/^LoginDatabaseInfo =.*$/LoginDatabaseInfo = LOGIN_DATABASE_INFO/' etc/realmd.conf && \
  chown -R realm:realm .

# USER realm
CMD ["./launch_realmd.sh"]


# Start the MangOS platform build
FROM ubuntu:trusty
MAINTAINER Bruno Gysels <bruno.gysels@gmail.com>

RUN apt-get update -qq && apt-get install -qq -y software-properties-common && add-apt-repository -y ppa:ubuntu-toolchain-r/test
RUN apt-get update -qq && apt-get install -qq -y \
  libstdc++6 \
  libtbb2 \
  libcurl3 \
  libace-6.0.3 \
  libmysql++3 \
  git


# Start the MangOS platform build
FROM ubuntu:trusty
MAINTAINER Bruno Gysels <bruno.gysels@gmail.com>

RUN apt-get update -qq && apt-get install -qq -y software-properties-common
RUN add-apt-repository -y ppa:ubuntu-toolchain-r/test && add-apt-repository ppa:george-edison55/cmake-3.x
RUN apt-get update -qq && apt-get install -qq -y \
  g++-6 && \
  update-alternatives --install /usr/bin/g++ g++ /usr/bin/g++-6 90 && \
  apt-get install -qq -y \
  libtbb-dev \
  libcurl4-openssl-dev \
  libace-dev \
  cmake \
  libmysql++-dev \
  git

WORKDIR /
COPY ./compile.sh .
COPY ./launch_build.sh .
CMD ["./launch_build.sh"]

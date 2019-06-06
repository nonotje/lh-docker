FROM ubuntu:trusty

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
  git \
  wget && \
  rm -rf /var/lib/apt/lists/*

# install gosu for a better su+exec command
ARG GOSU_VERSION=1.11
RUN dpkgArch="$(dpkg --print-architecture | awk -F- '{ print $NF }')" \
 && wget -O /usr/local/bin/gosu "https://github.com/tianon/gosu/releases/download/$GOSU_VERSION/gosu-$dpkgArch" \
 && chmod +x /usr/local/bin/gosu

RUN useradd -ms /bin/bash compiler
COPY ./entrypoint.sh /
COPY ./compile.sh /
VOLUME /core
VOLUME /server
ENTRYPOINT ["./entrypoint.sh"]
WORKDIR /
CMD ["bash"]

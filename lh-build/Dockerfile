# Start the MangOS platform build
FROM ubuntu:trusty AS lh-compile
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

FROM lh-compile
ENV TBB_ROOT_DIR=/usr/include/tbb/
ENV ACE_ROOT=/usr/include/ace/
RUN git clone --single-branch --branch development https://github.com/lh-server/core.git /core && git clone https://github.com/nonotje/wow-database.git /database
WORKDIR /core/build/
RUN cmake -DDEBUG=0 -DUSE_LIBCURL=1 .. && make -j8 && make install -j8

WORKDIR /database
RUN tar -zxf world_full_08_june_2018.sql.tgz

WORKDIR /server/sql/source
RUN cp -r /core/sql/* . && mv /database/world_full_08_june_2018.sql ./world.sql && ./migrations/merge.sh

WORKDIR /server/sql
ARG MANGOS_REALM_NAME="DockerServer"
ARG MANGOS_IP_ADDRESS="127.0.0.1"
RUN echo 'INSERT INTO realmlist (name, address) VALUES ("'$MANGOS_REALM_NAME'", "'$MANGOS_IP_ADDRESS'");' >> add_realmlist.sql
RUN mv ./source/*.sql .

WORKDIR /server


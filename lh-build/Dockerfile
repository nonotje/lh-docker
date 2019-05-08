# Start the MangOS platform build
FROM gcc:6
MAINTAINER Bruno Gysels <bruno.gysels@gmail.com>

RUN apt-get update -qq && apt-get install -qq -y \
  libtbb-dev \
  libcurl4-openssl-dev \
  libace-dev \
  cmake \
  git
RUN export TBB_ROOT_DIR=/usr/include/tbb/
RUN export ACE_ROOT=/usr/include/ace/
RUN git clone --single-branch --branch release https://github.com/lh-server/core.git /core
RUN git clone https://github.com/nonotje/wow-database.git /database
WORKDIR /core/build/
RUN cmake -DDEBUG=0 -DUSE_LIBCURL=1 ..
RUN make -j8 && make install -j8
WORKDIR /database
RUN tar -zxf world_full_08_june_2018.sql.tgz
WORKDIR /server/sql
RUN cp -r /core/sql/* .
RUN cp /database/world_full_08_june_2018.sql ./world.sql
RUN ./migrations/merge.sh
WORKDIR /server

#!/bin/bash

export TBB_ROOT_DIR=/usr/include/tbb/
export ACE_ROOT=/usr/include/ace/

if [ ! -d /core/build ]; then
  mkdir /core/build
fi

cd /core/build

if [ ! -f /core/compiled ]; then
  cmake -DDEBUG=0 -DUSE_LIBCURL=1 .. && make -j8
  touch /core/compiled
fi

make install -j8

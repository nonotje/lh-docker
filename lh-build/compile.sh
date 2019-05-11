#!/bin/bash

cd /
export TBB_ROOT_DIR=/usr/include/tbb/
export ACE_ROOT=/usr/include/ace/
git clone --single-branch --branch development https://github.com/nonotje/core.git /core
mkdir /core/build
cd /core/build
cmake -DDEBUG=0 -DUSE_LIBCURL=1 .. && make -j8 && make install -j8

if [ $? -eq 0 ] then
    touch /core.build
fi


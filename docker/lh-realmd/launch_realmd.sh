#!/bin/sh

BINDIR=/server/bin
CONFIGS=/server/etc

${BINDIR}/realmd -c ${CONFIGS}/realmd.conf

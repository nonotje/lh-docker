#!/bin/bash

BINDIR=/server/bin
CONFIGS=/server/etc

${BINDIR}/mangosd -c ${CONFIGS}/mangosd.conf

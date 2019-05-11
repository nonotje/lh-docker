#!/bin/sh

BINDIR=/server/bin
CONFIGS=/server/etc

# populate template with env vars
sed -i "s/LOGIN_DATABASE_INFO/${LOGIN_DATABASE_INFO}/g" ${CONFIGS}/realmd.conf

${BINDIR}/realmd -c ${CONFIGS}/realmd.conf

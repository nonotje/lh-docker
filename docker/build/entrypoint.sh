#!/bin/bash
set -e

chown -R compiler /server
chown -R compiler /core

exec gosu compiler "$@"


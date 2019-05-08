#!/bin/bash

# Copyright 2017 Stephen SORRIAUX
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
# http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

BINDIR=/server/bin
CONFIGS=/server/etc

# populate template with env vars
sed -i "s/LOGIN_DATABASE_INFO/$LOGIN_DATABASE_INFO/g" $CONFIGS/mangosd.conf
sed -i "s/WORLD_DATABASE_INFO/$WORLD_DATABASE_INFO/g" $CONFIGS/mangosd.conf
sed -i "s/CHARACTER_DATABASE_INFO/$CHARACTER_DATABASE_INFO/g" $CONFIGS/mangosd.conf
sed -i "s/LOGS_DATABASE_INFO/$LOGS_DATABASE_INFO/g" $CONFIGS/mangosd.conf

${BINDIR}/mangosd -c $CONFIGS/mangosd.conf ${AHCONFIG}

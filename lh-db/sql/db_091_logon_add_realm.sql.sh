#!/bin/bash

FILE_SQL_TEMPLATE="db_logon_add_realm.template"

sed -e "s/VARIABLE_NAME/${VARIABLE_NAME}/" -e "s/VARIABLE_ADDRESS/${VARIABLE_ADDRESS}/" ${FILE_SQL_TEMPLATE}

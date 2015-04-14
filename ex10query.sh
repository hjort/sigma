#!/bin/bash

# http://stackoverflow.com/questions/21874854/how-do-i-execute-this-cypher-query-its-json-over-php-curl-to-neo4js-rest-api
# http://neo4j.com/docs/stable/rest-api-cypher.html

curl -v -d@ex10query.json \
	-H 'Accept: application/json; charset=UTF-8' \
	-H 'Content-Type: application/json' \
	-H 'X-Stream: true' \
	http://localhost:7474/db/data/cypher

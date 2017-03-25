#!/bin/bash

cd `dirname $0`/..
dir=`pwd`
docker_dir="/var/amidakuji/"

docker run --rm -it -v ${dir}:${docker_dir} php:7.0 \
phpdbg -qrr ${docker_dir}vendor/bin/phpunit \
--coverage-html ${docker_dir}docs/coverage \
--white ${docker_dir}src ${docker_dir}tests
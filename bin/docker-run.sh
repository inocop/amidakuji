#!/bin/bash

cd `dirname $0`/..

docker run --rm -it -v $(pwd):/var/amidakuji php:7.0 php /var/amidakuji/src/index.php
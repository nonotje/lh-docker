# Start the MangOS platform build (LightsHope)
FROM lh-build:latest AS builder

# Install the latest database & merge the latest commits
FROM mysql:5.5
MAINTAINER Bruno Gysels <bruno.gysels@gmail.com>
EXPOSE 3306

COPY ../sql/* ./docker-entrypoint-initdb.d/
COPY my.cnf /etc/mysql/my.cnf
RUN apt-get update -qq && \
    apt-get install git wget -qq -y && \
    apt-get remove --purge --force-yes -qq -y git wget

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["mysqld"]

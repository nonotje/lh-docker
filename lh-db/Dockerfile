# Start the MangOS platform build (LightsHope)
FROM lh-build:latest AS builder

# Install the latest database & merge the latest commits
FROM mysql:5.7
MAINTAINER Bruno Gysels <bruno.gysels@gmail.com>
EXPOSE 3306

ARG MANGOS_DATABASE_VERSION=master

ENV MANGOS_DATABASE_REALM_NAME=NoNoServer
ENV MANGOS_SERVER_VERSION=2
ENV MANGOS_DB_RELEASE=090cdd6

COPY --from=builder /server/sql /server/sql
RUN apt-get update -qq && \
    apt-get install git wget -qq -y && \
    apt-get remove --purge --force-yes -qq -y git wget

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["mysqld"]

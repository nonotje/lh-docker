FROM mysql:5.5
EXPOSE 3306

COPY my.cnf /etc/mysql/my.cnf
RUN apt-get update -qq && \
    apt-get install git wget -qq -y && \
    apt-get remove --purge --force-yes -qq -y git wget

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["mysqld"]

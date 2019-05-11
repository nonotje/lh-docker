# Start the MangOS platform build (LightsHope)
FROM lh-build:latest AS builder

# Copy over the build server to a stable platform!
FROM lh-run
MAINTAINER Bruno Gysels <bruno.gysels@gmail.com>
EXPOSE 3724

ENV LOGIN_DATABASE_INFO=127.0.0.1;3306;root;mangos;realmd

RUN useradd -ms /bin/bash realm

WORKDIR /server/
COPY --from=builder /server .
COPY ./launch_realmd.sh .

RUN cp etc/realmd.conf.dist etc/realmd.conf && \
  sed -i 's/^LoginDatabaseInfo =.*$/LoginDatabaseInfo = LOGIN_DATABASE_INFO/' etc/realmd.conf && \
  chown -R realm:realm .

# USER realm
CMD ["./launch_realmd.sh"]


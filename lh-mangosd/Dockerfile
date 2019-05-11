# Start the MangOS platform build (LightsHope)
FROM lh-build:latest AS builder

# Copy over the build server to a stable platform!
FROM lh-run
MAINTAINER Bruno Gysels <bruno.gysels@gmail.com>
EXPOSE 8085

ENV LOGIN_DATABASE_INFO=127.0.0.1;3306;root;mangos;realmd
ENV WORLD_DATABASE_INFO=127.0.0.1;3306;root;mangos;mangos
ENV CHARACTER_DATABASE_INFO=127.0.0.1;3306;root;mangos;characters
ENV LOGS_DATABASE_INFO=127.0.0.1;3306;root;mangos;logs

RUN useradd -ms /bin/bash mangos

WORKDIR /server/
COPY --from=builder /server .
COPY ./launch_mangosd.sh .

RUN cp etc/mangosd.conf.dist etc/mangosd.conf && \
  sed -i 's/^DataDir = "\."/DataDir = "\/server\/data\/"/' etc/mangosd.conf && \
  sed -i 's/^WowPatch .*$/WowPatch = WOWPATCH_INFO/' etc/mangosd.conf && \
  sed -i 's/^LoginDatabase\.Info .*$/LoginDatabase\.Info = LOGIN_DATABASE_INFO/' etc/mangosd.conf && \
  sed -i 's/^WorldDatabase\.Info .*$/WorldDatabase\.Info = WORLD_DATABASE_INFO/' etc/mangosd.conf && \
  sed -i 's/^CharacterDatabase\.Info .*$/CharacterDatabase\.Info = CHARACTER_DATABASE_INFO/' etc/mangosd.conf && \
  sed -i 's/^LogsDatabase\.Info .*$/LogsDatabase\.Info = LOGS_DATABASE_INFO/' etc/mangosd.conf && \
  chown -R mangos:mangos .

USER mangos
CMD ["./launch_mangosd.sh"]


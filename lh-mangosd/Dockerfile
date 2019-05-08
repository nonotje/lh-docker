# Start the MangOS platform build (LightsHope)
FROM lh-build:latest AS builder

# Copy over the build server to a stable platform!
FROM gcc:6
MAINTAINER Bruno Gysels <bruno.gysels@gmail.com>
EXPOSE 8085

ENV LOGIN_DATABASE_INFO=127.0.0.1;3306;root;mangos;realmd
ENV WORLD_DATABASE_INFO=127.0.0.1;3306;root;mangos;mangos
ENV CHARACTER_DATABASE_INFO=127.0.0.1;3306;root;mangos;characters
ENV LOGS_DATABASE_INFO=127.0.0.1;3306;root;mangos;logs

RUN apt-get -qq update && apt-get install -qq -y \
  wget \
  libtbb2 \
  libcurl3 \
  libace-6.2.8 \
  libmysql++-dev \
  libssl-dev
RUN useradd -ms /bin/bash mangos

WORKDIR /server/
COPY --from=builder /server .
COPY ./launch_mangosd.sh .

RUN cp etc/mangosd.conf.dist etc/mangosd.conf
RUN sed -i 's/^LoginDatabase\.Info .*$/LoginDatabase\.Info = LOGIN_DATABASE_INFO/' etc/mangosd.conf && \
  sed -i 's/^WorldDatabase\.Info .*$/WorldDatabase\.Info = WORLD_DATABASE_INFO/' etc/mangosd.conf && \
  sed -i 's/^CharacterDatabase\.Info .*$/CharacterDatabase\.Info = CHARACTER_DATABASE_INFO/' etc/mangosd.conf && \
  sed -i 's/^LogsDatabase\.Info .*$/LogsDatabase\.Info = LOGS_DATABASE_INFO/' etc/mangosd.conf
RUN chown -R mangos:mangos .

USER mangos
CMD ["./launch_mangosd.sh"]


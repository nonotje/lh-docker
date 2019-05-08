# Start the MangOS platform build (LightsHope)
FROM lh-core:latest AS builder

# Copy over the build server to a stable platform!
FROM gcc:6
MAINTAINER Bruno Gysels <bruno.gysels@gmail.com>
EXPOSE 3724

ENV LOGIN_DATABASE_INFO=127.0.0.1;3306;root;mangos;realmd

RUN apt-get -qq update && apt-get install -qq -y \
  wget \
  libtbb2 \
  libcurl3 \
  libace-6.2.8 \
  libmysql++-dev \
  libssl-dev
RUN useradd -ms /bin/bash realm

WORKDIR /server/
COPY --from=builder /server .
COPY ./launch_realmd.sh .

RUN cp etc/realmd.conf.dist etc/realmd.conf
RUN sed -i 's/^LoginDatabaseInfo =.*$/LoginDatabaseInfo = LOGIN_DATABASE_INFO/' etc/realmd.conf
RUN chown -R realm:realm .

USER realm
CMD ["./launch_realmd.sh"]


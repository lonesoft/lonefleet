###
### BUILDER
###
FROM ubuntu AS builder
RUN apt update
RUN apt upgrade -y
RUN apt install -y postgresql-common
RUN /usr/share/postgresql-common/pgdg/apt.postgresql.org.sh -y
RUN apt install  -y \
    postgresql-17 postgresql-server-dev-17
RUN apt install -y \
    build-essential libreadline-dev zlib1g-dev flex bison libxml2-dev \
    libxslt-dev libssl-dev libxml2-utils xsltproc pkg-config libc++-dev \
    libc++abi-dev libglib2.0-dev libtinfo6 cmake libstdc++-12-dev \
    liblz4-dev ninja-build

RUN apt install -y \
    git

WORKDIR /root

RUN git clone https://github.com/duckdb/pg_duckdb --recursive

WORKDIR /root/pg_duckdb

RUN make -j$(nproc)

RUN mkdir /out
RUN chown -R postgres:postgres . /out
RUN DESTDIR=/out make install

FROM postgres:17.6
RUN apt-get update -y
RUN apt-get install -y ca-certificates
COPY --from=builder /out /

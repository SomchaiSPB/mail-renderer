# P.S. keep in mind that this file is used for local deployment only,
# production Dockerfile is in CI/CD repo http://git.innoscripta.com/devops/innos-microservices/cicd-clusterix-backend

FROM php:7.4-alpine AS prebuild
WORKDIR /app
COPY . /app
COPY ./.docker/supervisor.conf /etc/supervisor/supervisord.conf
RUN addgroup -g 1000 user \
    && adduser -u 1000 -G user -s /bin/sh -D user
RUN set -ex \
  && apk --no-cache add \
    autoconf \
    build-base \
    supervisor \
    postgresql-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
	&& apk add --no-cache git \
	&& chown -R user:user /app
USER user

FROM prebuild
USER root
RUN cp .env.example .env \
	&& composer i --no-dev -a --no-progress \
	&& composer clear-cache \
	&& php artisan key:generate \
	&& rm -rf /usr/local/bin/composer \
		./.docker \
		composer.lock \
		package.json \
		webpack.mix.js \
		.styleci.yml \
		.env.example \
		.env.testing_ci \
		.env.testing
USER 1000
EXPOSE 8000/tcp
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]

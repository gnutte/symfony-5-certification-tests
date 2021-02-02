include .env

run: sources_directory ?= '.'
run: sources_path = $(PWD)/$(sources_directory)
run: docker_mounted ?= /var/www
run: docker_volumes ?= -v $(sources_path):$(docker_mounted)
run: docker_volumes +=  -v ${HOME}/.symfony:/.symfony
run:
	docker run --rm -it \
		$(docker_volumes) \
		-w $(docker_mounted) \
		-p 8000:8000 \
		-u 1000 \
		gnut_php:latest \
		$(command)

start: command = symfony server:start
start: run

console: command = bash
console: run

start:
	docker run --rm -it \
		-v ${PWD}/sources:/var/www \
		-v ${HOME}/.symfony:/.symfony \
		-w /var/www -p 8000:8000 -u 1000 gnut_php:latest symfony server:start

console:
	docker run --rm -it \
		-v ${PWD}/sources:/var/www \
		-v ${HOME}/.symfony:/.symfony \
		-w /var/www -p 8000:8000 -u 1000 gnut_php:latest bash
init: docker-build docker-up

docker-up:
	docker-compose up -d

docker-build:
	docker-compose build

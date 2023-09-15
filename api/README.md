Task Manager API
===

## Prerequisites

* Docker

# Configure

## .env

Create `.env` file inside root folder of this project (based on `.env.dist` file).
Update database information and other settings if necessary.

# Install

#### Docker guide
* Setup docker and docker-compose on your environment
    * https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-18-04 (or https://docs.docker.com/install/linux/docker-ce/ubuntu/#install-docker-ce)
    * https://docs.docker.com/compose/install/
* Run
    * `docker-compose up` to create docker container for PostgreSQL Database and Php and Nginx
   
* Verify that all containers are up and running (task-manager-db and task-manager-php, task-manager-nginx):
    * `docker ps -a` / (`d-ps`)

# Run application

```
$ make up
```

###### Development environment should be up and running on:
  * [http://localhost:8000/](http://localhost:8000)


## Run database migrations

```
$ make migrate
```

## Create database migration 

```
$ make migration
```

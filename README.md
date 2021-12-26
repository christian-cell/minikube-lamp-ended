# minikube-lamp-ended

To share and run this php-apache backend application environment made in docker and kubernetes

RUN

$ git clone https://github.com/christian-cell/minikube-lamp-ended.git

$ cd ejemplo-lamp-kubernetes

$ docker build -t . "dont forget the point at the end"

$ docker tag image-name:tag <yourUserDockerHubName/image-name:tag>

$ docker push <yourUserDockerHubName/image-name:tag>

pull your image

$ docker pull <yourUserDockerHubName/image-name:tag>

to run it in both directions . container ======> your host , your host ======> container

$ docker run -d --name -p 80:80 -v $(pwd)/website:/var/www/html/

To run in kubernetes

after install kubectl and minikube start minikube cluster

$ minikube start --vm-driver= ej

$ minikube start --vm-driver=virtualbox

create the namespace lamp-dev

$ kubectl create namespace lam-dev

move to lamp-dev

$ kubens lamp-dev

and run

./script.sh

get a EXTERNAL IP with

$ minikube tunnel

$ kubectl get svc

copy external ip and PASTE in your browser

You know what? , do something better , apply ingress.yaml , enable addons ingress and ingress-dns

$ minikube addons enable ingress
$ minikube addons enable ingress-dns
$ kubectl apply -f ingress.yaml

get your minikube ip

$ minikube ip
ej: 000.000.00.0

and add the line in /etc/host like this
$ sudo vi /etc/hosts

000.000.00.0 lamp-dev.com

now get phpmyadmin in your browse by 
lamp-dev.com

and your server in
lamp-dev.com/server

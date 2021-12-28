continue=true

if $continue
then
    echo "INFO:construyendo imagen"  
    docker build . -f ./Dockerfile -t my-php:1.0.1
    
    echo "================================================="
fi

if $continue
then

    
	
	docker tag my-php:1.0.1 christianphp/my-php:1.0.1
	docker push christianphp/my-php:1.0.1
	
fi

if $continue
then


	#kubectl apply -f ./kubernetes/secret.yaml
    kubectl delete deployment apachephp-deployment
	kubectl apply -f ./kubernetes/apachephp-depl.yaml
	kubectl apply -f ./kubernetes/mysql-secret.yaml
	kubectl apply -f ./kubernetes/mysql-depl.yaml
	kubectl apply -f ./kubernetes/phpmyadmin-secret.yaml
	kubectl apply -f ./kubernetes/phpmyadmin-depl.yaml
    kubectl apply -f ./kubernetes/ingress.yaml
fi

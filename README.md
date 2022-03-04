# RedCraft website

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Deployment with Kubernetes

Make sure the target namespace exists first, usually it should be your environment (testing/staging/production)

To upload your environment secret, run `kubectl create secret generic dotenv --from-env-file=.env.<environment> --namespace=<environment>`

To deploy Laravel, run `kubectl apply -f .k8s/website-service.yaml --namespace=<environment>`

To deploy the ingress, run `kubectl apply -f .k8s/website-ingress-<environment>.yaml` (you don't need to specify the namespace)

To download your environment secret, make sure `jq` is installed and run `kubectl get secret dotenv --namespace=<environment> | jq '.data' | jq 'map_values(@base64d)' | jq -r 'to_entries | map(.key + "=" + (.value)) | .[]' > .env.<environment>`

If you want to update the secrets, you'll need to delete it before uploading it again. To delete it, run `kubectl delete secret dotenv --namespace=<environment>`


|production Server https://admin.atharinvestment.com/   | [![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2Fc9de3431-2ad4-4e1d-b748-e0a685cf7898%3Fdate%3D1%26commit%3D1&style=for-the-badge)](https://forge.laravel.com/servers/695472/sites/2023626)

## Deploy To Production
Deploy to production pipeline will be triggered automatically when push tag , normal push will only deploy to testing server.
 - create new Version:
	   `git tag -a v1.0.2 -m "Version 1.0.2 for production"`
	   
 - push with tags
`git push origin main --tags `

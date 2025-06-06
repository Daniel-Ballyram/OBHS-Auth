# OBHS Email Authentication Server

This is a simple PHP-based webhook that accepts authorized emails from a login portal and saves them to a flat file.

## Deployment

1. Push to GitHub
2. Deploy using Railway via Dockerfile
3. Replace the endpoint URL in your login.php with the deployed Railway URL

## Endpoint

`GET /add.php?email=user@example.com&secret=obhs123`

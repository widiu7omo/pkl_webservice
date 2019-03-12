HOW TO SETUP

1. setup your database name in config/databases.php
2. setup host, username, pass, and database name
3. setup config/config.php, change base_url
4. open config/migration.php and change version to latest timestamp of migration file in migrations folder
5. do migrate with base_url/migrate
6. do seed to insert master data with base_url/seed/masterdata
7. open config/rest.php, and add uri front url

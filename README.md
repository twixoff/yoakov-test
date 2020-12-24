INSTALL
-------------------
Run:

composer update &&  php yii migrate --migrationPath=@yii/rbac/migrations/ --interactive=0 &&  php yii migrate --interactive=0 && php yii rbac/init

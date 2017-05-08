#!/usr/bin/env bash
PASSWORD='12345678'
PROJECTFOLDER='fighterClub'

sudo apt-get update
sudo apt-get -y upgrade

sudo apt-get install -y apache2
sudo apt-get install -y php5

sudo apt-get -y install mysql-server
sudo apt-get install php5-mysql

sudo apt-get -y install phpmyadmin


sudo mkdir "/var/www"
sudo mkdir "/var/www/html"
sudo mkdir "/var/www/html/${PROJECTFOLDER}"

VHOST=$(cat <<EOF
<VirtualHost *:80>
    DocumentRoot "/var/www/html/${PROJECTFOLDER}/public"
        <Directory "/var/www/html/${PROJECTFOLDER}/public">
                AllowOverride All
                Require all granted
        </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-available/000-default.conf

sudo a2enmod rewrite

service apache2 restart

sudo rm "/var/www/index.html"

sudo apt-get -y install git
sudo git clone https://github.com/FokkFeis/Lokaverkefni_V17 "/var/www/html/${PROJECTFOLDER}"

curl -s https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

cd "/var/www/html/${PROJECTFOLDER}"
composer install

sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/01_database.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/02-addUser_SP.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/03_addFighter_SP.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/04_putInLeague_trigger.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/05_Allfighters_VIEW.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/06_showMyUser_View.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/07_updateStrength_SP.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/08_Leagues_data.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/09_fighters_data.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/10_updateUsername.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/11_updateEmail.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/12_updatePassword.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/13_addFight_SP.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/14_addFighterToAFight_SP.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/15_addBet_SP.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/16_showAllUsers_VIEW.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/17_updateWins_SP.sql"
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/SQL/18_showBets_SP.sql"

sudo sed -i "s/12345678/${PASSWORD}/" "/var/www/html/${PROJECTFOLDER}/application/Config/config.php"

echo "Done!"

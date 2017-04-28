!#/bin/sh
apt-get update
apt-get install apache2 -y mysql-server -y php5 php-pear php5-mysql -y phpmyadmin -y libapache2-mod-php5 -y | ln -s /etc/phpmyadmin/apache.conf /etc/apache2/conf-available/phpmyadmin.conf
a2enconf phpmyadmin.conf | systemctl restart apache2.service 

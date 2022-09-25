# currenvy_exchange
trail task with phalcon

1) Checkout git repo to root directory

2) Create a virtual host smilar to the below one.

<VirtualHost *:80>
DocumentRoot "root_dir_path\currency_exchange"
ServerName localexchangeratesapi
<Directory "root_dir_path\currency_exchange">
</Directory>
</VirtualHost>

3) Add and host entry for the above Vhost localexchangeratesapi

4) Access the below path and you should be able to access the Exchange rate info

http://localexchangeratesapi/currencyexchangerates/displayexchangerates

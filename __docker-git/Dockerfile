FROM webdevops/php-nginx:7.4

#: configs
ENV php.display_errors=On
ENV php.error_reporting='E_WARNING & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT'
ENV php.log_errors=Off

#: set root dir
ENV WEB_DOCUMENT_ROOT=/var/www/html
WORKDIR /var/www/html

#: copy project
RUN git clone https://github.com/MSKhodadady/pishgamcrm.git /var/www/html

#: set access to files
RUN chmod -R 777 /var/www/html

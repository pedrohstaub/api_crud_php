# Configurating Development Enviroment

First you'll have to build the docker image.<br>
Suggested image name: vue-php8.1

<pre>docker build -t <i>image_name</i> .</pre>
Then you'll have to build the container:
<pre>docker-compose up -d</pre>

After building the container, run the following commands:

## Enabling apache mod_rewrite

<pre>a2enmod rewrite</pre>
<pre>service apache2 restart</pre>

If url rewrite still doesn't work, you'll have to edit the following file:<br>
/etc/apache2/apache2.conf<br>

Replace:
<pre>
&lt;Directory /var/www/&gt;
        Options Indexes FollowSymLinks
        AllowOverride <span style="background-color: indianred">None</span>
        Require all granted
&lt;/Directory&gt;
</pre>

For:

<pre>
&lt;Directory /var/www/&gt;
        Options Indexes FollowSymLinks
        AllowOverride <span style="background-color: green">All</span> 
        Require all granted
&lt;/Directory&gt;
</pre>

Then restart apache again<br>
<pre>service apache2 restart</pre>

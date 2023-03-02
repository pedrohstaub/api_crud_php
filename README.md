# Instalação

Após buildar o docker, executar os comandos:

## Habilitar o mod_rewrite do apache

<pre>a2enmod rewrite</pre>
<pre>service apache2 restart</pre>

Caso a reescrita de url ainda não esteja funcionando, será necessário editar o arquivo:<br>
/etc/apache2/apache2.conf<br>

Substituir o trecho:
<pre>
&lt;Directory /var/www/&gt;
        Options Indexes FollowSymLinks
        AllowOverride <span style="background-color: indianred">None</span>
        Require all granted
&lt;/Directory&gt;
</pre>

Por:

<pre>
&lt;Directory /var/www/&gt;
        Options Indexes FollowSymLinks
        AllowOverride <span style="background-color: green">All</span> 
        Require all granted
&lt;/Directory&gt;
</pre>

Reiniciar novamente o apache<br>
<pre>service apache2 restart</pre>

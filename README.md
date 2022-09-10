<center> <h1> WEATHER PROJECT </h1> </center>

<h2> Introduction </h2>

Le projet meteo est un projet permettant d'afficher via une courbe des données de températures et d'humidité d'un lieu voulu.

<h2> Pré-requis </h2>

Pour le site :<br>
* Un serveur avec Ubuntu 20.04 (Préferer la version server)
* Un serveur web, par exemple : [Apache](https://httpd.apache.org/download.cgi), [Nginx](https://www.nginx.com/), ou autres
* [PHP](https://www.php.net/) 8.0 ou 8.1
* [MySQL Server](https://www.mysql.com/fr/) pour stocker les données

<br>Pour le client :
* Un RaspberryPi 3 de préférence
* Raspbian 9 ou ultérieur
* Une sonde DHT11 avec la bibliothèque [AdaFruitDHT11](https://github.com/adafruit/Adafruit_Python_DHT)
* Python3

<h2> Installation </h2>

<h3> Client :</h3>

* Clonez le projet sur le Pi<br>
```
git clone https://github.com/t2plb/WeatherProject.git 
```

* Supprimez les fichiers serveur pour garder uniquement le dossier client<br>
```
cd /votre/chemin/de/fichier/WeatherProject/
sudo rm -r server/
```

* Installer Python3 et la bibliothèque [AdaFruitDHT11](https://github.com/adafruit/Adafruit_Python_DHT)<br>
```
sudo apt update
sudo apt install python3*
sudo python3 -m pip install --upgrade pip setuptools wheel
sudo pip3 install Adafruit_DHT
```

* Installer le service qui fera tourner votre script
Pensez bien à mettre votre chemin du capteur.py dans le WeatherClient.service (ligne 6)
```
sudo mv WeatherProject/client/service/* /etc/systemd/system/
sudo systemctl daemon-reload
sudo systemctl enable WeatherClient.service
sudo systemctl start WeatherClient.service
sudo systemctl status WeatherClient.service //pour verifier le bon lancement du service
```

<h3> Serveur </h3>

* Clonez le projet sur votre serveur<br>
```
git clone https://github.com/t2plb/WeatherProject.git
``` 

* Supprimez les fichiers client pour garder uniquement le dossier server<br>
```
cd /votre/chemin/de/fichier/WeatherProject/
sudo rm -r client/
```

* Ajouter le dossier serveur en tant que virtualhost sur votre serveur web

* Creer une base de données MySQL, puis créer la table stocker dans le dossier [sql](https://github.com/t2plb/WeatherProject/blob/master/server/lib/sql/table.sql)

<h2> Besoin d'aide ? </h2>

N'hésitez pas à créer une issue j'y réponderais dans les plus bref délais<br><br><br><br>

<center> <i>t2plb (ↄ)opyLeft</i> </center>

import os
import datetime
import json
import requests
import time
import Adafruit_DHT
import logging

logging.basicConfig(level=logging.DEBUG,
                    filename="/home/pi/WeatherProject/client/log/client.log",
                    filemode="a",
                    format='%(asctime)s - %(levelname)s - %(message)s')

url = 'http://meteo.projetmeteo.live/api/post.php'
logging.debug(f"URL : {url}")

cap = Adafruit_DHT.DHT11
logging.debug(f"Capteur : {cap}")
pin = 23
logging.debug(f"Pin GPIO : {pin}")
date = datetime.datetime.today().strftime('%Y-%m-%d %H%M%S')
if not os.path.exists('./json'):
    logging.warning("json directory doesnt exist !")
    logging.debug("Creating json directory")
    os.makedirs('./json')
nom = "./json/" + date + '.json'

Humidite, Temperature = Adafruit_DHT.read_retry(cap, pin)
Temperature = int(Temperature)
Humidite = int(Humidite)
data = {
    "datetime": date,
    "temp": Temperature,
    "humi": Humidite
    }
logging.debug(f"date : {date} temp : {Temperature} humid : {Humidite}")
DumpedData = json.dumps(data)

req = requests.post(url, params={"json": DumpedData})
logging.debug(f"HTTPResponseCode : {req.status_code}")
if req.status_code != 200:
    with open(nom, 'w') as file:
        json.dump(data, file)

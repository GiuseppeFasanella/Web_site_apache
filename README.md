# Website

```
sudo su
cd /var/www
git clone https://github.com/GiuseppeFasanella/Web_site_apache.git
cd Web_site_apache/
mv * ../
rm -r Web_site_apache/
mv mysqli_connect_example.php ../mysqli_connect.php
#Edita la passwd di mysqli_connect.php (che qui non e' specificata per ovvi motivi)

#Soft_links:
sudo ln -s /mnt/usb_drive/ usb_drive_soft_link
sudo ln -s usb_drive_soft_link/Film,Musica,Libri,Partiture/Musica_totale/L/Lezioni_musica_radio3/ Lezioni_musica_radio3


```





quando aggiungi un nuovo file, per visualizzarlo:

```
chmod 644 file.txt
```

Altrimenti ti dice "Forbidden"

```
cd /var/www/
sudo su
ln -s ~gfasanel/Scaricati/Arte_Moderna/ Arte_Moderna
apri index.html e inserisci il link
<p><a href="Arte_Moderna" target="_blank">Arte Moderna</a><p>

####NO, NON E@ COSI, MA COME CAZZO HO FATTO???? per ARTE MEDIEVALE FUNZIONA ED E@ UNA GRANDE COMODITA
chmod 644 Arte_Moderna/
Cosi' puoi leggere la cartella
chmod 644 Arte_Moderna/* Funziona ma quando aggiungi un nuovo file, quello NON EREDITA I PERMESSI
####
```

Per i permessi funziona cosi':
```
1= execute
2= write
4= read
```
Questo perche' devi pensare in binario a 3 digit xxx=rwx (read-write-execute).

Ad esempio, tu vuoi solo leggere, bene: in base rwx sara' 100, quindi 4. Ecco perche' read e' 4.

Vuoi solo eseguire, bene: in base rwx sara' 001, quindi 1.

Vuoi leggere e scrivere: 110, quindi 6

Vuoi leggere, scrivere ed eseguire 111, quindi 7

Il comando chmod assegna i permessi a 3 enti: l'utente, l'utente in corso e il gruppo (?, qua mi scordo sempre)

Comunque il punto e' che devi fare `chmod abc file` con abc i 3 permessi che vuoi dare a per l'utente, b per, c per

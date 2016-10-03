Il problema e' che l'utente generico di apache e' www-data e non avrebbe i permessi per cambiare lo stato dei pin del raspberry

E allora: 

```
sudo visudo

e alla fine aggiungi questa riga
www-data ALL=(ALL) NOPASSWD: /var/www/html/light_project/lighton.py,  /var/www/html/light_project/lightoff.py
```

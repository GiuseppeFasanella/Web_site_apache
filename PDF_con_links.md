La cosa piu' semplice da fare e' partire da un latex, che e' facile da scrivere

Ti fai una cartella contenente in progetto, esempio 
`Project_dir` contenente il file.tex a una cartella `Audio_dir` con gli audio

* nel tex inserisci i link cosi' (run: se sono file locali; http:..... se sono file in rete)
```
\href{run:EarTraining_audio/Lezione1_LaNotaPeppino.mp3}{\underline{Nota Peppino: Sol3}}
```

* a questo punto trasformi il tex in html e cambia i permessi agli audio
```
htlatex file.tex #otterrai file.html
chmod 644 Audio_dir/*
sed -i "s|run:||g" file.html
```

* da /var/www, fai un link simbolico al progetto:
```
ln -s path/to/Project_dir
```

* Fatto, adesso se apri da localhost Project_dir/file.html i link dovrebbero funzionare bene

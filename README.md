# 🌸 Manga Blog – README

[![Anteprima del Blog](https://github.com/BIANCA-USER/manga-blog/blob/main/public/images/manga_blog.jpg?raw=true)](https://github.com/BIANCA-USER/manga-blog/blob/main/public/images/manga_blog.jpg)

---

## 📝 Descrizione del progetto

**Manga Blog** è un piccolo blog realizzato con **Laravel**, dedicato al mondo dei manga!  
L’applicazione consente di:

- 📚 Visualizzare una **lista di manga**
- 🔍 Visualizzare il **dettaglio** di ciascun manga
- ➕ **Aggiungere nuovi manga** tramite un form
- 🖼️ Gestire le **immagini** dei manga con un **comando Artisan personalizzato**

Ogni manga ha un’immagine dedicata, e il progetto include un comando per **verificare e correggere** eventuali errori nei percorsi delle immagini.

---

## ⚙️ Setup del progetto

1. **Clonare il repository**
   ```bash
   git clone <URL-del-tuo-repo>
   cd manga-blog
Installare le dipendenze Laravel

bash
Copia codice
composer install
Configurare il database nel file .env:

env
Copia codice
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=manga_blog
DB_USERNAME=root
DB_PASSWORD=...
Eseguire le migrazioni

bash
Copia codice
php artisan migrate
🗃️ Database
Tabella: mangas

Campo	Tipo	Descrizione
id	int (PK)	Identificatore univoco
title	string	Titolo del manga
author	string	Autore
image_path	string/null	Percorso immagine
created_at	timestamp	Data creazione
updated_at	timestamp	Data aggiornamento

Esempi di record inseriti:

Demon Slayer – Koyoharu Gotouge

Naruto – Masashi Kishimoto

One Piece – Eiichiro Oda

Bleach – Tite Kubo

🖼️ Gestione immagini
Tutte le immagini si trovano nella cartella:

swift
Copia codice
public/images/
La colonna image_path nel database punta al file corrispondente, ad esempio:

bash
Copia codice
images/naruto.jpg
images/onepiece.jpg
🧰 Comando personalizzato
FixMangaImages
Comando per controllare e correggere eventuali incongruenze nei nomi dei file immagine.

bash
Copia codice
php artisan manga:fix-images
Registrazione del comando
Nel file app/Console/Kernel.php:

php
Copia codice
protected $commands = [
    \App\Console\Commands\FixMangaImages::class,
];
🚀 Rotte e Controller
Rotta	Descrizione
/mangas	Elenco di tutti i manga
/mangas/{id}	Dettaglio di un manga
/mangas/create	Form per aggiungere un nuovo manga

🎨 Views (Blade)
File	Descrizione
index.blade.php	Lista dei manga
show.blade.php	Dettaglio del manga
create.blade.php	Form di inserimento

✅ Stato del progetto
✅ 4 manga visibili: Demon Slayer, Naruto, One Piece, Bleach

🖼️ Tutte le immagini correttamente collegate

🗑️ I manga non più validi sono stati rimossi dal database

💡 Testato e funzionante in locale con successo!

💖 Autrice
Realizzato da Bianca
per il corso Aulab – Web Developer (Laravel)


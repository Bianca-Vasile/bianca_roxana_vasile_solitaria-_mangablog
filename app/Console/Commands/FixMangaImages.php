<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FixMangaImages extends Command
{
    protected $signature = 'manga:fix-images';
    protected $description = 'Controlla e aggiorna i percorsi delle immagini dei manga in public/images e nel database';

    public function handle()
    {
        $this->info('🔍 Inizio controllo e correzione delle immagini...');

        $disk = Storage::disk('public');
        $path = 'images';

        // --- 1️⃣ Rinominazione file con trattini ---
        $files = $disk->files($path);
        $renamedCount = 0;

        foreach ($files as $file) {
            if (str_contains($file, '-')) {
                $newFile = str_replace('-', '_', $file);
                if (!$disk->exists($newFile)) {
                    $disk->move($file, $newFile);
                    $renamedCount++;
                    $this->line("✔️ Rinomina: {$file} → {$newFile}");
                }
            }
        }

        $this->info("📂 File rinominati: {$renamedCount}");

        // --- 2️⃣ Aggiornamento database ---
        $mangas = DB::table('mangas')->get();
        $updated = 0;

        foreach ($mangas as $manga) {
            $currentPath = $manga->image_path;

            if (!$currentPath) {
                $this->warn("⚠️ Manga ID {$manga->id} ({$manga->nome}) non ha image_path");
                continue;
            }

            $fileName = basename($currentPath);
            $fixedName = str_replace('-', '_', $fileName);
            $newPath = 'images/' . $fixedName;

            if ($disk->exists($newPath)) {
                if ($currentPath !== $newPath) {
                    DB::table('mangas')->where('id', $manga->id)->update(['image_path' => $newPath]);
                    $updated++;
                    $this->line("📝 DB aggiornato per ID {$manga->id}: {$currentPath} → {$newPath}");
                }
            } else {
                $this->warn("❌ File mancante per ID {$manga->id}: {$newPath}");
            }
        }

        $this->info("✅ Database aggiornato per {$updated} manga.");
        $this->info('🎉 Controllo completato con successo!');
    }
}

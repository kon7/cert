<?php

namespace App\Console\Commands;

use App\Models\Vulnerabilite;
use App\Models\FeedSource;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncFeeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-feeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronise les flux RSS et API enregistrés.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         $sources = FeedSource::where('active', true)->get();

        if ($sources->isEmpty()) {
            $this->warn(' Aucune source active trouvée.');
            return;
        }

        foreach ($sources as $source) {
            $this->info("Synchronisation : {$source->name} ({$source->type})");

            try {
                if ($source->type === 'rss') {
                    $this->syncRss($source);
                } elseif ($source->type === 'api') {
                    $this->syncApi($source);
                }
            } catch (\Exception $e) {
                $this->error("Erreur sur {$source->name} : " . $e->getMessage());
            }
        }

        $this->info('Synchronisation terminée.');
    }

    protected function syncRss(FeedSource $source)
    {
        $rssData = simplexml_load_file($source->url);

        foreach ($rssData->channel->item as $item) {
            Vulnerabilite::updateOrCreate(
                ['link' => (string) $item->link],
                [
                    'feed_source_id' => $source->id,
                    'title'          => (string) $item->title,
                    'description'    => (string) $item->description,
                    // 'content'        => $item->asXML(),
                    'source'         => $source->name,
                    'published_at'   => date('Y-m-d H:i:s', strtotime($item->pubDate)),
                ]
            );
        }
    }

    protected function syncApi(FeedSource $source)
    {
        $response = Http::get($source->url);

        if ($response->failed()) {
            throw new \Exception("Impossible d’accéder à l’API");
        }

        $data = $response->json();

      
        foreach ($data['vulnerabilities'] ?? [] as $vuln) {
            $cve = $vuln['cve']['id'] ?? null;
            Vulnerabilite::updateOrCreate(
                ['cve_id' => $cve],
                [
                    'feed_source_id' => $source->id,
                    'title'          => $cve,
                    'description'    => $vuln['cve']['descriptions'][0]['value'] ?? '',
                  
                    'source'         => $source->name,
                ]
            );
        }
    }
              

}

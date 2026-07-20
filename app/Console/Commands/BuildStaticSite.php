<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BuildStaticSite extends Command
{
    protected $signature = 'static:build {--output=dist : Output directory, relative to the project root}';

    protected $description = 'Render every page route to static HTML for hosting on Cloudflare Pages';

    /** @var array<string, string> */
    protected array $routes = [
        '/' => 'index.html',
        '/over-ons' => 'over-ons/index.html',
        '/onderzoek' => 'onderzoek/index.html',
        '/toekomst' => 'toekomst/index.html',
        '/contact' => 'contact/index.html',
    ];

    public function handle(): int
    {
        config([
            'session.driver' => 'array',
            'cache.default' => 'array',
        ]);

        $outputDir = base_path($this->option('output'));

        if (! File::exists(public_path('build/manifest.json'))) {
            $this->error('public/build/manifest.json not found — run `npm run build` first.');

            return self::FAILURE;
        }

        File::ensureDirectoryExists($outputDir);

        if (File::exists(public_path('hot'))) {
            $this->error('public/hot exists (leftover from `npm run dev`) — remove it so @vite emits production asset tags.');

            return self::FAILURE;
        }

        $kernel = app(Kernel::class);

        // Requests are dispatched against a sentinel host (independent of
        // APP_URL) so the generated absolute URLs can be reliably rewritten
        // to root-relative paths below, working under any Cloudflare Pages domain.
        $sentinelHost = 'http://static-build.invalid';

        foreach ($this->routes as $path => $relativeFile) {
            $request = Request::create($sentinelHost.$path, 'GET');
            $response = $kernel->handle($request);

            if ($response->getStatusCode() !== 200) {
                $this->error("Route {$path} returned status {$response->getStatusCode()}.");

                return self::FAILURE;
            }

            $html = str_replace($sentinelHost, '', $response->getContent());
            $html = str_replace('href=""', 'href="/"', $html);

            $target = $outputDir.'/'.$relativeFile;
            File::ensureDirectoryExists(dirname($target));
            File::put($target, $html);

            $kernel->terminate($request, $response);

            $this->info("Rendered {$path} -> ".$this->option('output')."/{$relativeFile}");
        }

        File::copyDirectory(public_path('build'), $outputDir.'/build');

        foreach (['robots.txt', 'favicon.ico'] as $asset) {
            if (File::exists(public_path($asset))) {
                File::copy(public_path($asset), $outputDir.'/'.$asset);
            }
        }

        $this->info('Static build complete: '.$this->option('output'));

        return self::SUCCESS;
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

#[Signature('app:upload-committee {--L|localFile=} {--S|storageFile=}')]
#[Description('Command description')]
class UploadCommittee extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $file = null;
        $content = null;
        if ($this->option('localFile')) {
            $file = $this->option('localFile');
        } elseif ($this->option('storageFile')) {
            $file = $this->option('storageFile');
        } else {
            throw new \Exception('Need a file to import');
        }

        Log::info('File uploaded');
        $storageFile = Storage::get($file);
        $lines = explode("\n", $storageFile);
        $rows = [];
        foreach ($lines as $line) {
            $rows[] = str_getcsv($line);
        }
        dd($rows);

        return self::SUCCESS;
    }
}

<?php

namespace App\Console\Commands;

use App\Models\CommitteeMember;
use Exception;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

#[Signature('app:upload-committee
    {--L|localFile=}
    {--S|storageFile=}
    {--H|headerRow}
')]
#[Description('Command description')]
class UploadCommittee extends Command
{
    /**
     * Execute the console command.
     *
     * @throws Exception
     */
    public function handle(): int
    {
        $fileContents = false;
        if ($this->option('localFile')) {
            $fileContents = $this->getLocalFile();
        } elseif ($this->option('storageFile')) {
            $fileContents = $this->getStorageFile();
        } else {
            throw new Exception('Need a file to import');
        }

        $lines = explode("\n", $fileContents);
        $rows = [];

        foreach ($lines as $line) {
            $rows[] = str_getcsv($line);
        }

        if ($this->option('headerRow')) {
            array_shift($rows);
        }

        $rows = array_filter(
            $rows,
            fn ($row) => count($row) >= 3,
        );

        $this->withProgressBar($rows, function ($row, $_bar, $key) {
            try {
                /** @var string[] $row */
                CommitteeMember::query()->create([
                    'role' => $row[0],
                    'name' => $row[1],
                    'pronouns' => $row[2],
                    'is_active' => true,
                    'sort_order' => $key,
                ]);
            } catch (\Throwable $th) {
                report($th);
            }
        });

        return self::SUCCESS;
    }

    /**
     * @throws Exception
     */
    private function getLocalFile(): string
    {
        $content = file_get_contents($this->option('localFile'));
        if ($content === false) {
            throw new Exception('Content was not found');
        }

        return $content;
    }

    private function getStorageFile(): string
    {
        return Storage::get($this->option('storageFile'));
    }
}

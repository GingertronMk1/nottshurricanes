<?php

namespace App\Console\Commands;

use App\Models\CommitteeMember;
use Exception;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\SimpleExcel\SimpleExcelReader;

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

        $reader = SimpleExcelReader::create($fileContents);
        $reader->trimHeaderRow();

        CommitteeMember::query()->each(function (CommitteeMember $committeeMember) {
            $committeeMember->is_active = false;
            $committeeMember->save();
        });

        $reader->getRows()->each(function ($row, $key) {
            try {
                /** @var array<string, string> $row */
                CommitteeMember::query()->create([
                    'role' => $row['role'],
                    'name' => $row['name'],
                    'pronouns' => $row['pronouns'],
                    'is_active' => true,
                    'sort_order' => $key,
                ]);
            } catch (\Throwable $th) {
                report($th);
            }
        });

        $glob = glob($this->getStorageDir().'*');
        if ($glob) {
            array_map('unlink', $glob);
        }

        return self::SUCCESS;
    }

    /**
     * @throws Exception
     */
    private function getLocalFile(): string
    {
        return $this->option('localFile');
    }

    private function getStorageFile(): string
    {
        $filePath = $this->option('storageFile');
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $fileContents = Storage::get($this->option('storageFile'));
        $fileName = $this->getStorageDir()
            .md5($fileContents)
            .'.'
            .$extension;
        Log::info($fileName);
        mkdir($this->getStorageDir());
        file_put_contents($fileName, $fileContents);

        return $fileName;
    }

    private function getStorageDir(): string
    {
        return public_path('/storage/committee-uploads/');
    }
}

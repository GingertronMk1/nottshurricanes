<?php

use App\Console\Commands\UploadCommittee;
use App\Filament\Resources\CommitteeMembers\CommitteeMemberResource;
use App\Filament\Schemas\UploadCommitteeForm;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Concerns\RestrictsFileUploadsToSchemaComponents;
use Filament\Schemas\Contracts\HasSchemas;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Symfony\Component\Console\Command\Command;

new class extends Component implements HasSchemas {
    use InteractsWithSchemas;

    private const string FILE_NAME_KEY = 'filename';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make(self::FILE_NAME_KEY)
                    ->required(),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        /**
         * @var ?TemporaryUploadedFile $firstFile
         */
        $firstFile = Arr::first($this->data[self::FILE_NAME_KEY]);
        $path = $firstFile->store(path: 'committee-uploads');
        try {
            $handled = Artisan::call(UploadCommittee::class, ['--storageFile' => $path]);
            if ($handled === Command::SUCCESS) {
                redirect(CommitteeMemberResource::getUrl());
            }
        } catch (Throwable $th) {
            report($th);
        }
    }
};
?>

<div>
    <form wire:submit="create" class="flex flex-col gap-y-2">
        <h2>Upload a CSV containing the new committee</h2>
        <p>
            This CSV should have a header row, with columns marked:
        </p>
        <p>
            <code>role</code> | <code>name</code> | <code>pronouns</code>
        </p>

        <div>
            {{ $this->form }}
        </div>

        <button type="submit">
            Submit
        </button>
    </form>
</div>

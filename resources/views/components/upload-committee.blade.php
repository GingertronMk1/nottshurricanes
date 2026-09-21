<?php

use App\Console\Commands\UploadCommittee;
use App\Filament\Schemas\UploadCommitteeForm;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Concerns\RestrictsFileUploadsToSchemaComponents;
use Filament\Schemas\Contracts\HasSchemas;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

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
                \Filament\Forms\Components\FileUpload::make(self::FILE_NAME_KEY)
                    ->required(),
                \Filament\Forms\Components\Toggle::make('has_header_row')
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
        $args = [
            '--storageFile' => $path,
        ];
        if ($this->data['has_header_row']) {
            $args['--headerRow'] = 1;
        }
        Artisan::call(UploadCommittee::class, $args);
        redirect(\App\Filament\Resources\CommitteeMembers\CommitteeMemberResource::getUrl());
    }
};
?>

<div>
    <form wire:submit="create" class="flex flex-col gap-y-2">
        <h2>Upload a CSV containing the new committee</h2>
        <p>
            This CSV should have the role in the first column, the person's name in the second column, and the person's
            pronouns in the third column
        </p>

        <div>
            {{ $this->form }}
        </div>

        <button type="submit">
            Submit
        </button>
    </form>
</div>

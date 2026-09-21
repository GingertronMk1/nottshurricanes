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
                    ->required()
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
        Artisan::call(UploadCommittee::class, [
            '--storageFile' => $path
        ]);
    }

};
?>

<div>
    <form wire:submit="create">
        {{ $this->form }}

        <button type="submit">
            Submit
        </button>
    </form>
</div>

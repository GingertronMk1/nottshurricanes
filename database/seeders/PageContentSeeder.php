<?php

namespace Database\Seeders;

use App\Models\PageContent;
use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getPages() as $route => $content) {
            PageContent::query()->create([
                'route' => $route,
                'content' => $content,
            ]);
        }
    }

    /**
     * @return array<string, string>
     */
    private function getPages(): array
    {
        return [
            'touch-rugby.training-sessions' => <<<'MARKDOWN'
# Touch Rugby Training

7pm, at Canalside in Beeston.
At the moment it's silly season - not really doing much in the way of structured training in favour of a bit of throwing
the ball around and seeing what happens.
The idea is to return to more standard training early in the new year.
MARKDOWN,
            'rugby-union.training-sessions' => <<<'MARKDOWN'
# Rugby Union Training

More tackling and rucking work, let's get confident with contact. Seen some great stuff the last few weeks.
MARKDOWN,
        ];
    }
}

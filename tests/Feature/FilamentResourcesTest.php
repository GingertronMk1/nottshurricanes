<?php

use App\Filament\Resources\BlogPosts\BlogPostResource;
use App\Filament\Resources\BlogPosts\Pages\CreateBlogPost;
use App\Filament\Resources\BlogPosts\Pages\ListBlogPosts;
use App\Filament\Resources\CommitteeMembers\CommitteeMemberResource;
use App\Filament\Resources\Files\FileResource;
use App\Filament\Resources\Fixtures\FixtureResource;
use App\Models\BlogPost;
use App\Models\CommitteeMember;
use App\Models\File;
use App\Models\Fixture;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\FilamentTestCase;

class FilamentResourcesTest extends FilamentTestCase
{
    use RefreshDatabase;

    #[Test]
    public function resource_pages_are_available_to_an_authenticated_administrator(): void
    {
        $member = CommitteeMember::factory()->create();
        $records = [
            [BlogPostResource::class, BlogPost::factory()->create()],
            [CommitteeMemberResource::class, $member],
            [FileResource::class, File::factory()->create(['filename' => 'test.jpg', 'type' => 'attachment', 'fileable_type' => $member->getMorphClass(), 'fileable_id' => $member->id])],
            [FixtureResource::class, Fixture::factory()->create()],
        ];

        foreach ($records as [$resource, $record]) {
            $this->get($resource::getUrl('index'))->assertOk();
            $this->get($resource::getUrl('create'))->assertOk();
            $this->get($resource::getUrl('edit', ['record' => $record]))->assertOk();
        }
    }

    #[Test]
    public function guests_cannot_access_the_admin_panel(): void
    {
        auth()->logout();

        $this->get(BlogPostResource::getUrl('index'))->assertRedirect();
    }

    #[Test]
    public function blog_posts_can_be_created_and_listed(): void
    {
        Livewire::test(CreateBlogPost::class)
            ->fillForm(['title' => 'Club news', 'content' => 'A new season begins.'])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('blog_posts', ['title' => 'Club news', 'slug' => 'club-news']);

        Livewire::test(ListBlogPosts::class)
            ->assertCanSeeTableRecords(BlogPost::query()->where('slug', 'club-news')->get());
    }

    #[Test]
    public function blog_posts_require_a_title_and_content(): void
    {
        Livewire::test(CreateBlogPost::class)
            ->fillForm(['title' => '', 'content' => ''])
            ->call('create')
            ->assertHasFormErrors(['title' => 'required', 'content' => 'required']);

        $this->assertDatabaseCount('blog_posts', 0);
    }
}

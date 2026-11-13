<?php

use App\Models\BlogPost;
use App\Models\CommitteeMember;
use App\Models\Fixture;
use App\RugbyType;

beforeEach(function () {
    $this->withoutVite();
});

test('the blog lists posts and shows a post by slug', function () {
    $post = BlogPost::factory()->create(['title' => 'Club news', 'content' => 'Latest updates']);

    $this->get(route('blog.index'))->assertOk()->assertSee('Club news')->assertSee('Latest updates');
    $this->get(route('blog.show', $post->slug))->assertOk()->assertSee('Club news')->assertSee('Latest updates');
});

test('the blog index lists posts by creation date, not their update date', function () {
    BlogPost::factory()->create(['title' => 'Older story', 'created_at' => now()->subDays(3), 'updated_at' => now()]);
    BlogPost::factory()->create(['title' => 'Newer story', 'created_at' => now()->subDay(), 'updated_at' => now()->subDay()]);

    $this->get(route('blog.index'))->assertOk()->assertSeeInOrder(['Newer story', 'Older story']);
});

test('the committee page only shows active members in order', function () {
    CommitteeMember::factory()->create(['name' => 'Second', 'is_active' => true, 'sort_order' => 2]);
    CommitteeMember::factory()->create(['name' => 'First', 'is_active' => true, 'sort_order' => 1]);
    CommitteeMember::factory()->create(['name' => 'Inactive', 'is_active' => false]);

    $this->get(route('committee'))->assertOk()->assertSeeInOrder(['First', 'Second'])->assertDontSee('Inactive');
});

test('external links are shared with the page', function () {
    config(['external_links.links' => [['name' => 'Club shop', 'href' => 'https://example.com']]]);

    $this->get(route('external-links'))->assertOk()->assertSee('Club shop')->assertSee('https://example.com');
});

test('fixtures can be filtered by rugby type and shown individually', function () {
    $fixture = Fixture::factory()->create(['type' => RugbyType::TOUCH, 'opposition' => 'Touch opponents']);
    Fixture::factory()->create(['type' => RugbyType::UNION, 'opposition' => 'Union opponents']);

    $this->get(route('fixtures.index'))->assertOk()->assertSee('Touch opponents')->assertSee('Union opponents');
    $this->get(route('fixtures.index', ['type' => 'touch']))->assertOk()->assertSee('Touch opponents')->assertDontSee('Union opponents');
    $this->get(route('fixtures.index', ['type' => 'union']))->assertOk()->assertSee('Union opponents')->assertDontSee('Touch opponents');
    $this->get(route('fixtures.show', $fixture))->assertOk()->assertSee('Touch opponents')->assertSee('Tapping');
    $this->get(route('fixtures.index', ['type' => 'invalid']))->assertNotFound();
    $this->get('/fixtures?type[]=touch')->assertNotFound();
});

test('fixture pagination preserves the selected rugby type', function () {
    Fixture::factory()->count(11)->create(['type' => RugbyType::TOUCH]);

    $this->get(route('fixtures.index', ['type' => 'touch']))
        ->assertOk()
        ->assertSee('type=touch', false)
        ->assertSee('page=2', false);
});

test('the training page shows both rugby formats and the training venue', function () {
    $this->get(route('training-sessions'))
        ->assertOk()
        ->assertSee('Touch Rugby')
        ->assertSee('Rugby Union')
        ->assertSee('Nottingham Casuals');
});

test('the contact page provides general and touch contact details', function () {
    $this->get(route('contact'))
        ->assertOk()
        ->assertSee('NottsHurricanes@outlook.com')
        ->assertSee('HurricanesTouch@outlook.com');
});

<?php

use Laravel\Dusk\Browser;

test('visitors can navigate to training on desktop and mobile', function () {
    $this->browse(function (Browser $browser) {
        $browser->resize(1440, 900)
            ->visit('/')
            ->assertSee('Find your')
            ->clickLink('Come and train')
            ->waitForLocation('/training-sessions')
            ->assertPathIs('/training-sessions')
            ->assertSee('Training Sessions')
            ->resize(390, 844)
            ->visit('/')
            ->click('button[aria-label="Toggle navigation"]')
            ->clickLink('Training Sessions')
            ->waitForLocation('/training-sessions')
            ->assertPathIs('/training-sessions');
    });
});

<?php

use Laravel\Dusk\Browser;

test('visitors can navigate to training on desktop and mobile', function () {
    $this->browse(function (Browser $browser) {
        $browser->resize(1440, 900)
            ->visit('/')
            ->waitFor('main h1')
            ->click('main a[href$="/training-sessions"]')
            ->waitForLocation('/training-sessions')
            ->assertPathIs('/training-sessions')
            ->assertSee('Training Sessions')
            ->resize(390, 844)
            ->visit('/')
            ->click('button[aria-label="Toggle navigation"]')
            ->waitFor('nav[aria-label="Mobile navigation"] a[href$="/training-sessions"]')
            ->click('nav[aria-label="Mobile navigation"] a[href$="/training-sessions"]')
            ->waitForLocation('/training-sessions')
            ->assertPathIs('/training-sessions');
    });
});

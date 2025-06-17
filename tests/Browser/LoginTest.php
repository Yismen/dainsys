<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    // use WithFaker;
    /** @test */
    public function guest_can_see_login_page()
    {
        $this->browse(function (Browser $browser): void {
            $browser->visit('/login')
                ->assertSee('Sign In')
                ->assertSee('E-Mail Address')
                ->assertSee('Password');
        });
    }

    /** @test */
    public function a_user_can_sign_in()
    {
        $user = create(User::class);

        $this->browse(function (Browser $browser) use ($user): void {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Sign In')
                ->assertPathIs('/admin');
        });
    }
}

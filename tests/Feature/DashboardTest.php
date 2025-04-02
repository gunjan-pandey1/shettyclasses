<?php

use App\Models\CrmUser;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('guests are redirected to the login page', function () {
    $this->get('/dashboard')->assertRedirect('/login');
});

test('authenticated users can visit the dashboard', function () {
    $this->actingAs($user = CrmUser::factory()->create());

    $this->get('/dashboard')->assertOk();
});
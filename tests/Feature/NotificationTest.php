<?php

use App\Models\User;
use App\Notifications\TestNotification;

test('A notification can be sent to an user', function () {
    $user = User::factory()->create();
    $user->notify(new TestNotification());

    expect($user->notifications->count())->toBe(1);
});

test('A notification can be marked as read', function () {
    $user = User::factory()->create();
    $user->notify(new TestNotification());

    $notification = $user->notifications->first();
    $notification->markAsRead();

    expect($user->unreadNotifications->count())->toBe(0);
});

test('A notification can be marked as unread', function () {
    $user = User::factory()->create();
    $user->notify(new TestNotification());

    $notification = $user->notifications->first();
    $notification->markAsRead();
    $notification->markAsUnread();

    expect($user->unreadNotifications->count())->toBe(1);
});

test('A notification can be deleted', function () {
    $user = User::factory()->create();
    $user->notify(new TestNotification());

    $notification = $user->notifications()->first();
    $notification->delete();

    expect($user->notifications->count())->toBe(0);
});

test('A notification can be sent to multiple users', function () {
    $users = User::factory()->count(3)->create();
    $users->each(fn ($user) => $user->notify(new TestNotification()));

    expect($users->pluck('notifications')->flatten()->count())->toBe(3);
});

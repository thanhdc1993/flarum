<?php

use Flarum\Event\ConfigureLocales;
use Flarum\Event\DiscussionWillBeSaved;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Str;

return function (Dispatcher $events) {
    $events->listen(ConfigureLocales::class, function (ConfigureLocales $event)
    {
        $event->loadLanguagePackFrom(__DIR__);
    });

    $events->listen(DiscussionWillBeSaved::class, function (DiscussionWillBeSaved $event)
    {
        $event->discussion->slug = Str::slug($event->discussion->title);
    });
};

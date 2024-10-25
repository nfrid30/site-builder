<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::query()
            ->with('user')
            ->latest()
            ->get();

        $dates = $events->chunkWhile( function (Event $value, int $key, Collection $chunk) {
            return $value->created_at->format('Ymd') === $chunk->last()->created_at->format('Ymd');
        });
        return view('admin.events.index', compact('dates'));
    }

    public function destroy(Event $event)
    {
        //
    }
}

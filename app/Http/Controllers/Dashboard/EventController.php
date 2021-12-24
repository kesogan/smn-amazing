<?php

namespace App\Http\Controllers\Dashboard;

use App\Traits\ImageTrait;
use App\User;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EventUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    use ImageTrait;
    /**
     * Rendering the list of events
     */
    public function index()
    {
        $events = Event::all();
//        success_flash_message("The file should be higher than 0 byte");
        return view('dashboard.view.event.event-list', compact('events'));
    }

    public function show(Event $event)
    {
        return view('dashboard.view.event.event-show', compact('event'));
    }

    public function create()
    {
        return view('dashboard.view.event.event-create');
    }

    public function store(EventRequest $request)
    {
        try {
            $event = Event::create([
                'name' => $request->input('name'),
                'date' => \Carbon\Carbon::parse($request->input('date'))->format('Y-m-d'),
                'description' => $request->input('description'),
            ]);

            Auth::user()->events()->save($event);
        }
        catch (\Throwable $th) {
            error_flash_message("The event was not saved");

            return back()->withInput($request->input());
        }
        return $this->saveImage(
            $request,
            'event',
            $event,
            route("admin.event.list")
        );
    }

    public function edit(Event $event)
    {
        try {
//            $event = Event::find($id);

            if($event != null)  return view('dashboard.view.event.event-edit', compact('event'));
            else {
                error_flash_message("The event does not exits");

                return redirect(route("admin.event.list"));
            }
        }
        catch (\Throwable $th) {
            error_flash_message("The event does not exits");

            return redirect(route("admin.event.list"));
        }

    }

    public function udpate(EventUpdateRequest $request, Event $event)
    {
//        $event = Event::find($request->input('id'));

        if( !is_null($request->input('name')) ) $event->name = $request->input('name');
        if( !is_null($request->input('date')) ) $event->date = \Carbon\Carbon::parse($request->input('date'))->format('Y-m-d');
        if( !is_null($request->input('description')) ) $event->description = $request->input('description');

        $event->save();

        return $this->updateImage(
            $request,
            'event',
            $event,
            route('admin.event.list')
        );
    }

    public function delete(Event $event)
    {
        if($event->delete()) {

            success_flash_message("The event was successfully deleted");
        }
        else error_flash_message("The event does not exits");
        return redirect(route('admin.event.list'));
    }

}

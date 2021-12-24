<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Equipment;
use App\Models\Support;
use App\Models\Technique;
use App\Traits\ImageTrait;
use App\User;
use App\Models\Art;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ArtRequest;
use App\Http\Requests\ArtUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ArtController extends Controller
{
    use ImageTrait;
    /**
     * Rendering the list of arts
     */
    public function index()
    {
        $arts = Art::all();
//        success_flash_message("The file should be higher than 0 byte");
        return view('dashboard.view.art.art-list', compact('arts'));
    }

    public function show(Request $request, Art $art)
    {
        return view('dashboard.view.art.art-show', compact('art'));
    }

    public function create()
    {
        $equipments = Equipment::all();
        $supports = Support::all();
        $techniques = Technique::all();

        return view('dashboard.view.art.art-create', compact(
            'equipments',
            'supports',
            'techniques'
        ));
    }

    public function store(ArtRequest $request)
    {
        try {
            $time = explode("-", $request->input('time'));
            $time[0] = \Carbon\Carbon::parse($time[0])->format('Y-m-d H:m');
            $time[1] = \Carbon\Carbon::parse($time[1])->format('Y-m-d H:m');
//            $time[1] = \Carbon\Carbon::parse($time[1])->isoFormat('MMMM Do YYYY, h:mm:ss a');
            /*$art = Art::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
                'start_at' => $time[1],
                'end_at' => $time[0]
            ]);*/


            $art = Art::find(1);

            $art->techniques()->attach($request->input('technique'));

            /*$art->techniques()->attach(getRequestItem(
                $request,
                $art,
                'technique'
            ));
            $art->supports()->attach(getRequestItem(
                $request,
                $art,
                'support'
            ));*/

        }
        catch (\Throwable $th) {
            error_flash_message("The art was not saved");

            return back()->withInput($request->input());
        }
        return $this->saveImage(
            $request,
            'art',
            $art,
            route('admin.art.show', [$art])
        );
    }

    public function edit(Art $art)
    {
        try {
            if($art != null)  return view('dashboard.view.art.art-edit', compact('art'));
            else {
                error_flash_message("The art does not exits");

                return redirect(route("admin.art.list"));
            }
        }
        catch (\Throwable $th) {
            error_flash_message("The art does not exits");

            return redirect(route("admin.art.list"));
        }

    }

    public function udpate(ArtUpdateRequest $request, Art $art)
    {

        if( !is_null($request->input('name')) ) $art->name = $request->input('name');
        if( !is_null($request->input('description')) ) $art->description = $request->input('description');
        if( !is_null($request->input('price')) ) $art->price = $request->input('price');
        if( !is_null($request->input('quantity')) ) $art->quantity = $request->input('quantity');
        if( !is_null($request->input('technique')) ) $art->technique = $request->input('technique');
        if( !is_null($request->input('equipment')) ) $art->equipment = $request->input('equipment');
        if( !is_null($request->input('support')) ) $art->support = $request->input('support');

        $art->save();

        return $this->updateImage(
            $request,
            'art',
            $art,
            route('admin.art.show', [$art])
        );
    }

    public function delete(Art $art)
    {
        if($art->delete()) {

            $art->cart_items();
            foreach ($art->cart_items as $cart_item) {
                    $cart_item->delete();
            }

            success_flash_message("The art was successfully deleted");
        }
        else error_flash_message("The art does not exits");
        return redirect(route('admin.art.list'));
    }

}

<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

trait EquipmentTrait
{

    public function attachEquipement(
        Request $request,
        $art
    ) {

        $cpt = 0; $arr = [];

        foreach ($request->all() as $key => $base_64_image) {
            preg_match('/equipment/', $key, $matches);

            if(count($matches) > 0 && $base_64_image != null) {
                $arr[$key] = $base_64_image;
            }
        }
//        dd($arr);
        foreach ($arr as $key => $base_64_image) {

            // Get image name, image extension and convert to normal image for base 64 image
            $image_parts = explode(";base64,", $base_64_image);

            $image_type_aux = explode("image/", $image_parts[0]);

            $image_type = $image_type_aux[1];

            $normal_image_file = base64_decode($image_parts[1]);

            if($type == "art") {
                try {
                    $server_image_name = "Art_" . Str::random(20) . '.' . $image_type;
                    Storage::put('/public/images/arts/' . $server_image_name, $normal_image_file);

                    $model->images()->save(new Image([
                        'url' => $server_image_name,
                        'alt' => $server_image_name
                    ]));
                    $cpt++;
                }
                catch (\Throwable $th) {
//                        Art::latest()->first()->delete();
                    $model->delete();
                    error_flash_message("An error occur please try later");

                    return back()->withInput($request->all());
                }
            }
            else if ($type == 'event') {
                try {
                    $server_image_name = "Event_" . Str::random(20) . '.' . $image_type;

                    Storage::put('/public/images/events/' . $server_image_name, $normal_image_file);

                    $model->images()->save(new Image([
                        'url' => $server_image_name,
                        'alt' => $server_image_name
                    ]));
                    $cpt++;
                }
                catch (\Throwable $th) {
//                        Event::latest()->first()->delete();
                    $model->delete();
                    error_flash_message("An error occur please try later" . $th);

                    return back()->withInput($request->all());
                }
            }

            else if ($type == 'user') {
                try {
                    $server_image_name = "User_" .Str::random(20) . '.' . $image_type;

                    Storage::put('/public/images/users/' . $server_image_name, $normal_image_file);

                    $model->image()->save(new Image([
                        'url' => $server_image_name,
                        'alt' => $server_image_name
                    ]));
                    $cpt++;
                }
                catch (\Throwable $th) {
//                        User::latest()->first()->delete();
                    $model->delete();
                    error_flash_message("An error occur please try later" . $th);

                    return back()->withInput($request->all());
                }
            }
            else {
                try {
                    $server_image_name = "Other_" .Str::random(20) . '.' . $image_type;

                    Storage::put('/public/images/others/' . $server_image_name, $normal_image_file);

                    $model->image()->save(new Image([
                        'url' => $server_image_name,
                        'alt' => $server_image_name
                    ]));
                    $cpt++;
                }
                catch (\Throwable $th) {
                    $model->delete();
                    error_flash_message("An error occur please try later" . $th);

                    return back()->withInput($request->all());
                }
            }
        }

        if($cpt < 1) {
            $model->delete();

            error_flash_message("An error occur please try later");

            return back()->withInput($request->all());
        } else {

            if($type == "art") { success_flash_message("Art created successfully !"); }
            else if($type == "event") { success_flash_message("Event created successfully !"); }
            else if($type == "user") { success_flash_message("User created successfully !"); }
            else { success_flash_message("Object created successfully !"); }

            return redirect($successUrl);

        }

    }


    public function updateImage(
        Request $request,
        $type,
        $model,
        $successUrl
    ) {

        $cpt = 0;
        $arr = [];

        foreach ($request->all() as $key => $base_64_image) {
            preg_match('/image/', $key, $matches);

            if(count($matches) > 0 && $base_64_image != null) {
                $arr[$key] = $base_64_image;
            }
        }
//        dd($arr);
        foreach ($arr as $key => $base_64_image) {

            // Get image name, image extension and convert to normal image for base 64 image
            $image_parts = explode(";base64,", $base_64_image);

            $image_type_aux = explode("image/", $image_parts[0]);
            try{
                $image_type = $image_type_aux[1];
            } catch (\Throwable $th) {
                continue;
            }

            $normal_image_file = base64_decode($image_parts[1]);

            if($type == "art") {
                try {

                    $server_image_name = "Art_" . Str::random(10) . '.' . $image_type;
                    Storage::put('/public/images/arts/' . $server_image_name, $normal_image_file);

                    $model->images()->save(new Image([
                        'url' => $server_image_name,
                        'alt' => $server_image_name
                    ]));
                    $cpt++;
                }
                catch (\Throwable $th) {
                    error_flash_message("An error occur please try later");

                    return back()->withInput($request->all());
                }
            }
            else if ($type == 'event') {
                try {

                    $server_image_name = "Event_" .Str::random(10) . '.' . $image_type;

                    Storage::put('/public/images/events/' . $server_image_name, $normal_image_file);

                    $model->images()->save(new Image([
                        'url' => $server_image_name,
                        'alt' => $server_image_name
                    ]));
                    $cpt++;
                }
                catch (\Throwable $th) {
                    error_flash_message("An error occur please try later" . $th);

                    return back()->withInput($request->all());
                }
            }
            else if ($type == 'event') {
                try {
                    $server_image_name = "Event_" . Str::random(10) . '.' . $image_type;

                    Storage::put('/public/images/events/' . $server_image_name, $normal_image_file);

                    $model->images()->save(new Image([
                        'url' => $server_image_name,
                        'alt' => $server_image_name
                    ]));
                    $cpt++;
                }
                catch (\Throwable $th) {
                    error_flash_message("An error occur please try later" . $th);

                    return back()->withInput($request->all());
                }
            }

            else if ($type == 'user') {
                try {
                    $server_image_name = "User_" . Str::random(10) . '.' . $image_type;

                    Storage::put('/public/images/users/' . $server_image_name, $normal_image_file);

                    $model->image()->save(new Image([
                        'url' => $server_image_name,
                        'alt' => $server_image_name
                    ]));

                    $cpt++;
                }
                catch (\Throwable $th) {

                    error_flash_message("An error occur please try later" . $th);

                    return back()->withInput($request->all());
                }
            }
            else {
                try {
                    $server_image_name = "Other_" . Str::random(10) . '.' . $image_type;

                    Storage::put('/public/images/others/' . $server_image_name, $normal_image_file);

                    $model->image()->save([
                        'url' => $server_image_name,
                        'alt' => $server_image_name
                    ]);
                    $cpt++;
                }
                catch (\Throwable $th) {
                    error_flash_message("An error occur please try later" . $th);

                    return back()->withInput($request->all());
                }
            }
        }

        /*if($cpt < 1 && count($arr) <= 0) {
//            $model->delete();

            error_flash_message("An error occur please try later");

            return back()->withInput($request->all());
        } else {*/

        if($type == "art") { success_flash_message("Art updated successfully !"); }
        else if($type == "event") { success_flash_message("Event updated successfully !"); }
        else if($type == "user") { success_flash_message("User updated successfully !"); }
        else { success_flash_message("Object updated successfully !"); }

        return redirect($successUrl);

//        }
    }

}

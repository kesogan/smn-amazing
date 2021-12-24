<?php

use App\Models\Art;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

if(!function_exists('info_flash_message'))
{
    /**
     * @param $message
     * @param string $icon
     * @param string $enter
     * @param string $exit
     * @param int $delay
     */
    function info_flash_message($message, $delay = 5000)
    {
        flash_message($message, 'info', $delay);
    }
}

if(!function_exists('success_flash_message'))
{
    /**
     * @param $message
     * @param string $icon
     * @param string $enter
     * @param string $exit
     * @param int $delay
     */
    function success_flash_message($message, $delay = 4000)
    {
        flash_message($message, 'success', $delay);
    }
}

if(!function_exists('warning_flash_message'))
{
    /**
     * @param $message
     * @param string $icon
     * @param string $enter
     * @param string $exit
     * @param int $delay
     */
    function warning_flash_message($message, $delay = 5000)
    {
        flash_message($message, 'warning', $delay);
    }
}

if(!function_exists('danger_flash_message'))
{
    /**
     * @param $message
     * @param string $icon
     * @param string $enter
     * @param string $exit
     * @param int $delay
     */
    function error_flash_message($message = "An error occur please try later.", $delay = 5000)
    {
        flash_message($message, 'error', $delay);
    }
}

if(!function_exists('flash_message'))
{
    /**
     * @param $message
     * @param string $type
     * @param string $icon
     * @param string $enter
     * @param string $exit
     * @param int $delay
     */
    function flash_message($message, $type, $delay)
    {
        session()->flash('popup.type', $type);
        session()->flash('popup.delay', $delay);
        session()->flash('popup.message', $message);
        session()->flash('popup.title', config('app.name'));
    }
}

if(!function_exists('text_format'))
{
    /**
     * @param $text
     * @param $maxCharacters
     * @return string
     */
    function text_format($text, $maxCharacters)
    {
        if(strlen($text) > $maxCharacters) return mb_substr($text, 0, $maxCharacters, 'utf-8') . '...';
        return $text;
    }
}

if(!function_exists('getRequestItem'))
{
    /**
     * @param Request $request
     * @param $type
     * @return array
     */
    function getRequestItem(Request $request, $type)
    {
        $arr = [];

        foreach ($request->all() as $key => $item) {
            preg_match( '/' . $type . '/', $key, $matches);

            if(count($matches) > 0 && $item != null) {
                $arr[$key] = $item;
            }
        }
        return $arr;
    }
}

if(!function_exists('dateDiff'))
{
    /**
     * @param $date_start
     * @param $date_end
     * @return string
     */
    function dateDiff($date_start, $date_end)
    {
        return
            \Carbon\Carbon::parse($date_start)->diffForHumans($date_end,['syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE], false, 3);
    }
}

if(!function_exists('showArrayDetail'))
{
    /**
     * @param $array
     * @return string
     */
    function showTabDetail($array)
    {
        $value = "";

        foreach ($array as $item) {
            $value .= $item->name . ", ";
        }
        return $value;
    }
}


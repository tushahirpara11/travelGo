<?php

use App\User;

function imgRemove($path) {
    return public_path($path);
}

function replace_null_with_empty_string($array) {
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            if (empty($value)) {
                $array[$key] = (object) [];
            } else {
                $array[$key] = replace_null_with_empty_string($value);
            }
        } else {
            if (is_null($value)) {
                $array[$key] = "";
            }
        }
    }
    return $array;
}

function pagenotfound() {
    echo 404;
    exit;
}


function view_date($d) {
    return date("d/m/Y", strtotime($d));
}

function RandomString() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 6; $i++) {
        $randstring = $randstring . $characters[rand(0, 61)];
    }
    return $randstring;
}

function RandomPassword($length) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@*_";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}
function displayImage($imagename) {
    return url('public/storage') . "/" . $imagename;
}
function userProfileImageUpload($profile_img, $folder = "users") {
    $info = pathinfo($profile_img->getClientOriginalName());
    $ext = $info['extension'];
    $img_name = time() . "-" . rand(11111, 99999) . "." . $ext;
    $path = \Storage::disk('public')->putFileAs(
            $folder, $profile_img, $img_name
    );
    return $img_name;
}
function imgupload($profile_img, $folder = "packageimages") {
    $info = pathinfo($profile_img->getClientOriginalName());
    $ext = $info['extension'];
    $img_name = time() . "-" . rand(11111, 99999) . "." . $ext;
    $path = \Storage::disk('public')->putFileAs(
            $folder, $profile_img, $img_name
    );
    return $img_name;
}
function deleteImages($main = "", $thumb = "") {
    if (!empty($main)) {
        \Storage::disk('public')->delete($main);
    }
    if (!empty($thumb)) {
        \Storage::disk('public')->delete($thumb);
    }
}

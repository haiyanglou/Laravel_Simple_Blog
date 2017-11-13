<?php

# style tag with time stamp

function style_ts($path) {

    try
    {
        $ts = '?v=' . File:: lastModified(public_path().$path);
    }

    catch (Exception $e)
    {
        $ts = '';
    }

    return '<link media= "all" type="text/css" rel="stylesheet" herf="' . $path . $ts . '">';
}


# screen tag with time stamp 

function script_ts($path) {

    try
    {
        $ts = '?v=' . File:: lastModified(public_path().$path);
    }

    catch (Exception $e)
    {
        $ts = '';
    }

    return '<script src="' . $path . $ts . '"></script>';
}
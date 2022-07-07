<?php

namespace App\Repositories;

use Intervention\Image\Facades\Image;

class ImageMaker
{
    protected static $FILE;
    protected static $SQUARED;
    protected static $ENCODE;
    protected static $DESIRED_SIZE;

    public const STANDARD_SIZE = 600;

    public static function make($FILE, $SQUARED = null, $ENCODE = null, $DESIRED_SIZE = null)
    {
        static::$FILE = $FILE;
        static::$SQUARED = $SQUARED ?? false;
        static::$ENCODE = $ENCODE ?? 'JPG';
        static::$DESIRED_SIZE = $DESIRED_SIZE;

        $image = Image::make(static::$FILE);

        $image = static::resizeImage($image);

        $image = static::wantsSquaredImage($image);

        return $image->encode(static::$ENCODE);
    }

    private static function wantsSquaredImage($image)
    {
        if (static::$SQUARED) {
            $image = $image->crop(static::$DESIRED_SIZE, static::$DESIRED_SIZE);
        }

        return $image;
    }

    private static function resizeImage($image)
    {
        $max_size = static::$DESIRED_SIZE ? static::$DESIRED_SIZE : self::STANDARD_SIZE;
        $current_image_width = $image->width();
        $current_image_height = $image->height();
        $width = $max_size < $current_image_width ? $max_size : $current_image_width;
        $height = $max_size < $current_image_height ? $max_size : $current_image_height;

        $image = $image->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image = $image->resize(null, $height, function ($constraint) {
            $constraint->aspectRatio();
        });

        return $image;
    }
}

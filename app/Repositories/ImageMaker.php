<?php

namespace App\Repositories;

use Intervention\Image\Facades\Image;

class ImageMaker
{
    public const MAX_SIZE = 600;

    protected static $FILE;

    protected static $SQUARED;

    protected static $ENCODE;

    protected static $IMAGE;

    protected static int $WIDTH;

    protected static int $HEIGHT;

    public static function make($FILE, $SQUARED = false, $ENCODE = null, $WIDTH = null, $HEIGHT = null)
    {
        static::$FILE = $FILE;
        static::$IMAGE = Image::make(static::$FILE);
        static::$ENCODE = $ENCODE ?? 'JPG';
        static::$WIDTH = static::getDimension($WIDTH, 'width');
        static::$HEIGHT = static::getDimension($HEIGHT, 'height');

        static::resizeImage();

        if ($SQUARED) {
            static::wantsSquaredImage();
        }

        return self::$IMAGE->encode(static::$ENCODE);
    }

    private static function resizeImage()
    {
        self::$IMAGE = self::$IMAGE->resize(self::$WIDTH, null, function ($constraint): void {
            $constraint->aspectRatio();
        });

        self::$IMAGE = self::$IMAGE->resize(null, self::$HEIGHT, function ($constraint): void {
            $constraint->aspectRatio();
        });
    }

    private static function wantsSquaredImage()
    {
        $size = max(static::$WIDTH, static::$HEIGHT);

        self::$IMAGE = self::$IMAGE->crop($size, $size);
    }

    private static function getDimension($dimension, string $method)
    {
        if ($dimension) {
            return $dimension;
        }

        return self::$IMAGE->$method() < self::MAX_SIZE ? self::$IMAGE->$method() : self::MAX_SIZE;
    }
}

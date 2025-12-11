<?php

namespace Kucil;

use Kucil\FloatUtils\LengthOptions;
use Kucil\FloatUtils\RoundOptions;

use function is_float;
use function in_array;
use function explode;
use function strlen;
use function sprintf;
use function str_contains;
use function ceil;
use function floor;

/**
 * @author  menyongmenying <menyongmenying.main@email.com>
 * 
 * @version 0.0.1
 * 
 * 
 * 
 */
class FloatUtils
{
    /**
     * Meneruskan hasil pemeriksaan apakah nilai yang diberikan bertipe data float atau tidak.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  mixed $float Nilai yang akan dijadikan objek pemeriksaan.
     *
     * @return ?bool      Hasil pemeriksaan apakah nilai $float bertipe data float atau tidak.
     * 
     * @see    FloatUtilsTest::testIsFlt()
     * 
     * 
     */
    public static function isFlt(mixed $float = null): ?bool
    {
        $isFlt = is_float($float);
        return $isFlt;
    }



    /**
     * Meneruskan hasil pemeriksaan apakah nilai yang diberikan bertipe data float atau tidak.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  mixed $float Nilai yang akan dijadikan objek pemeriksaan.
     *
     * @return ?bool      Hasil pemeriksaan apakah nilai $float bertipe data float atau tidak.
     * 
     * @see    FloatUtilsTest::testIsFloat()
     * 
     * 
     */
    public static function isFloat(mixed $float = null): ?bool
    {
        $isFlt = self::isFlt($float);
        return $isFlt;
    }



    /**
     * Meneruskan hasil pemeriksaan apakah nilai float yang diberikan merupakan bilangan positif atau tidak.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?float $float Nilai float yang akan dijadikan objek pemeriksaan.
     *
     * @return ?bool         Hasil pemeriksaan apakah nilai $float merupakan bilangan positif atau tidak.
     * 
     * @see    FloatUtilsTest::testIsPositiveNumber()
     * 
     * 
     */
    public static function isPositiveNumber(?float $float = null): ?bool
    {
        $null = null;
        if ($float === $null) {
            return $null;
        }

        $minLimit = 0;
        return $minLimit < $float;
    }



    /**
     * Meneruskan bilangan positif dari nilai float yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?float $float Nilai float yang akan diteruskan bentuk bilangan positifnya.
     *
     * @return ?float        Bilangan positif dari nilai $float.
     * 
     * @see    FloatUtilsTest::testPositiveNumber()
     * 
     * 
     */
    public static function positiveNumber(?float $float = null): ?float
    {
        $null = null;
        if ($float === $null) {
            return $null;
        }

        $positiveNumber = abs($float);
        return $positiveNumber;
    }

    

    /**
     * Meneruskan panjang digit bilangan bulat dari nilai float yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?float $float Nilai float yang akan dihitung panjang digit bilangan bulat-nya.
     *
     * @return ?int          Panjang digit bilangan bulat dari nilai $float.
     * 
     * @see    FloatUtilsTest::testLengthInt()
     * 
     * 
     */
    public static function lengthInt(?float $float = null): ?int
    {
        $strFlt = (string) self::positiveNumber($float);

        $null = null;
        if ($float === $null) {
            return $null;
        }

        if (str_contains($strFlt, '.')) {
            $strFlt = explode('.', $strFlt)[0];
        }

        $lengthInt = strlen($strFlt);
        return $lengthInt;
    }

    

    /**
     * Meneruskan panjang digit bilangan desimal dari nilai float yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?float $float Nilai float yang akan dihitung panjang digit bilangan desimal-nya.
     *
     * @return ?int          Panjang digit bilangan desimal dari nilai $float.
     * 
     * @see    FloatUtilsTest::testLengthDec()
     * 
     *  
     */
    public static function lengthDec(?float $float = null): ?int
    {
        $strFlt = (string) self::positiveNumber($float);

        $null = null;
        if ($float === $null) {
            return $null;
        }
        
        $lengthDec = 0;

        if (!str_contains($strFlt, '.')) {
            return $lengthDec;
        }
        
        $lengthDec = strlen(explode('.', $strFlt)[1]);
        return $lengthDec;
    }



    /**
     * Meneruskan panjang digit bilangan dari nilai float yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?float $float Nilai float yang akan dihitung panjang digit bilangan-nya.
     *
     * @return ?int          Panjang digit bilangan dari nilai $float.
     * 
     * @see    FloatUtilsTest::testLengthDec()
     * 
     * 
     */
    public static function lengthAll(?float $float = null): ?int
    {
        $null = null;
        if ($float === $null) {
            return $null;
        }
        
        $positiveNumberFloat = self::positiveNumber($float);
        $strFlt = (string) $positiveNumberFloat;
        $length = strlen($strFlt);
        $subtractor  = 1;
        if (str_contains($strFlt, '.')) {
            return $length - $subtractor;
        }

        return $length;
    }



    /**
     * Meneruskan panjang digit bilangan  dari nilai float yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?float         $float  Nilai float yang akan dihitung panjang digit bilangan-nya.
     * @param  ?LengthOptions $option Tipe bilangan yang dihitung panjang digit-nya.
     *
     * @return ?int                   Panjang digit bilangan dari nilai $float.
     * 
     * @see    FloatUtilsTest::testLengthDec()
     * 
     * 
     */
    public static function length(?float $float = null, ?LengthOptions $option = LengthOptions::ALL): ?int
    {
        $null = null;
        if ($float === $null || $option === $null) {
            return $null;
        }

        $lengthAll = [self::class, 'lengthAll'];
        $lengthInt = [self::class, 'lengthInt'];
        $lengthDec = [self::class, 'lengthDec'];

        $length = match ($option) {
            LengthOptions::ALL => $lengthAll($float),
            LengthOptions::INT => $lengthInt($float),
            LengthOptions::DEC => $lengthDec($float)
        };

        return $length;
    }

    

    /**
     * Meneruskan pembulatan bilangan ke terdekat dari nilai float yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?float $float     Nilai float yang akan dijadikan objek pembulatan ke terdekat.      
     * @param  ?int   $precision Nilai presisi tingkat level digit pembulatan ke terdekat.
     *
     * @return ?float            Hasil pembulatan bilangan ke terdekat dari nilai $float.
     * 
     * @see    FloatUtilsTest::testRoundNearest()
     * 
     * 
     */
    public static function roundNearest(?float $float = null, ?int $precision = 0): ?float
    {
        $null = null;
        if ($float === $null || $precision === $null) {
            return $null;
        }

        $round = round($float, $precision);
        return $round;
    }

    

    /**
     * Meneruskan pembulatan bilangan ke atas dari nilai float yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?float $float     Nilai float yang akan dijadikan objek pembulatan ke atas.      
     * @param  ?int   $precision Nilai presisi tingkat level digit pembulatan ke atas.
     *
     * @return ?float            Hasil pembulatan bilangan ke atas dari nilai $float.
     * 
     * @see    FloatUtilsTest::testRoundUp()
     * 
     * 
     */
    public static function roundUp(?float $float = null, ?int $precision = 0): ?float
    {
        $factor = 10 ** $precision;

        $null = null;
        if ($float === $null || $precision === $null) {
            return $null;
        }

        $ceil = ceil($float * $factor) / $factor;
        return $ceil;
    }

    

    /**
     * Meneruskan pembulatan bilangan ke bawah dari nilai float yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?float $float     Nilai float yang akan dijadikan objek pembulatan ke bawah.      
     * @param  ?int   $precision Nilai presisi tingkat level digit pembulatan ke bawah.
     *
     * @return ?float            Hasil pembulatan bilangan ke bawah dari nilai $float.
     * 
     * @see    FloatUtilsTest::testRoundDown()
     * 
     * 
     */
    public static function roundDown(?float $float = null, ?int $precision = 0): ?float
    {
        $factor = 10 ** $precision;

        $null = null;
        if ($float === $null || $precision === $null) {
            return $null;
        }

        $floor = floor($float * $factor) / $factor;
        return $floor;
    }

    

    /**
     * Meneruskan pembulatan bilangan ke bawah dari nilai float yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?float        $float     Nilai float yang akan dijadikan objek pembulatan ke bawah.      
     * @param  ?int          $precision Nilai presisi tingkat level digit pembulatan ke bawah.
     * @param  ?RoundOptions $option    Jenis pembulatan.
     *
     * @return ?float                   Hasil pembulatan bilangan ke bawah dari nilai $float.
     * 
     * @see    FloatUtilsTest::testRound()
     * 
     * 
     */
    public static function round(?float $float = null, ?int $precision = 0, ?RoundOptions $option = RoundOptions::NEAREST): ?float
    {
        $null = null;
        if ($float === $null || $precision === $null) {
            return $null;
        }

        $roundNearest = [self::class, 'roundNearest'];
        $roundUp = [self::class, 'roundUp'];
        $roundDown = [self::class, 'roundDown'];
        
        $round = match ($float) {
            RoundOptions::NEAREST => $roundNearest($float, $precision),
            RoundOptions::UP => $roundUp($float, $precision),
            RoundOptions::DOWN => $roundDown($float, $precision)
        };

        return $round;
    }



    /**
     * Meneruskan hasil penyederhanaan bilangan dari nilai float yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?float $float  Nilai float yang akan disederhanakan.
     * @param  ?int   $length Panjang digit penyederhanaan bilangan dari nilai $int. 
     *
     * @return ?float         Hasil penyederhanaan bilangan dari nilai $int.
     * 
     * @see    FloatUtilsTest::testCut()
     * 
     * 
     */
    public static function cut(?float $float = null, ?int $length = 1): ?float
    {
        $null = null;
        $minLength = 0;
        if ($float === $null || $length === $null || $length <= $minLength) {
            return $null;
        }

        $lengthFlt = self::length($float);
        if ($length >= $lengthFlt) {
            return $float;
        }
        
        $strFlt = (string) $float;
        $intAdder = 1;
        $cut = '';

        $strFlt = str_split($strFlt);

        if ($strFlt[0] === '-') {
            $length = $length + $intAdder;
        }

        if (in_array('.', $strFlt)) {
            $length = $length + $intAdder;
        }

        for ($i = 0; $i < $length; $i++) {
            $cut .= (string) $strFlt[$i];
        }

        $floatCut = (float) $cut;
        return $floatCut;
    }


    
    /**
     * Meneruskan hasil konversi float ke integer dari nilai float yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?float   $float Nilai float yang akan dijadikan objek konversi float ke integer. 
     *
     * @return ?int            Hasil konversi float ke integer dari nilai $int.
     * 
     * @see FloatUtilsTest::testToInt()
     * 
     * 
     */
    public static function toInt(?float $float = null): ?int
    {
        $null = null;
        if ($float === $null) {
            return $null;
        }

        $intFlt = (int) $float;
        return $intFlt;
    }



    /**
     * Meneruskan hasil konversi float ke integer dari nilai float yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?float   $float Nilai float yang akan dijadikan objek konversi float ke integer. 
     *
     * @return ?int            Hasil konversi float ke integer dari nilai $int.
     * 
     * @see FloatUtilsTest::testToInteger()
     * 
     * 
     */
    public static function toInteger(?float $float = null): ?int
    {
        $intFlt = self::toInt($float);
        return $intFlt;
    }



    /**
     * Meneruskan hasil konversi float ke string dari nilai float yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?float   $float Nilai float yang akan dijadikan objek konversi float ke string. 
     *
     * @return ?string         Hasil konversi float ke string dari nilai $int.
     * 
     * @see FloatUtilsTest::testToStr()
     * 
     * 
     */
    public static function toStr(?float $float = null): ?string
    {
        $null = null;
        if ($float === $null) {
            return $null;
        }
        
        $strFlt = (string) sprintf('%.1f', $float);
        return $strFlt;
    }



    /**
     * Meneruskan hasil konversi float ke string dari nilai float yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?float   $float Nilai float yang akan dijadikan objek konversi float ke string. 
     *
     * @return ?string         Hasil konversi float ke string dari nilai $int.
     * 
     * @see FloatUtilsTest::testToString()
     * 
     * 
     */
    public static function toString(?float $float = null): ?string
    {
        $strFlt = self::toStr($float);
        return $strFlt;
    }
}
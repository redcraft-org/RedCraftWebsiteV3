<?php

namespace App\Http\Controllers\Skin;

use Illuminate\Support\Facades\Http;

class SkinUtils {
    public static function getUrlSkinFromUUID($uuid) {
        $url = "https://sessionserver.mojang.com/session/minecraft/profile/" . $uuid;
        $response = Http::get($url);
        $response = json_decode($response, true);
        if (isset($response["errorMessage"])) {
            $error = $response['errorMessage'];
            if (strpos($error, "Not a valid UUID") !== false) {
                throw new \Exception("invalid_uuid");
            }
        }
        if($response == null) {
            throw new \Exception("invalid_uuid");
        }
        $skin = $response["properties"][0]["value"];
        $skin = base64_decode($skin);
        $skin = json_decode($skin, true);
        $skin = $skin["textures"]["SKIN"]["url"];
        return $skin;
    }


    public static function getSkinFromUUID($uuid) {
        $url = Cache::remember('skin_url_' . $uuid, config('skin.cache.time'), function () use ($uuid) {
            return self::getUrlSkinFromUUID($uuid);
        });
        $response = Http::get($url);
        return $response;
    }

    public static function getHeadFromUUID($uuid, $scale = 1, $faceGear = false) {
        $skin = self::getSkinFromUUID($uuid);
        $skin = imagecreatefromstring($skin);
        $head = imagecreatetruecolor($scale*8, $scale*8);
        imagecopyresampled($head, $skin, 0, 0, 8, 8, $scale * 8, $scale * 8, 8, 8);
        if ($faceGear) {
            imagecopyresampled($head, $skin, 0, 0, 40, 8, $scale * 8, $scale * 8, 8, 8);
        }
        ob_start();
        imagepng($head);
        $head = ob_get_contents();
        ob_end_clean();
        return $head;
    }

    public static function getBodyFromUUID($uuid, $scale = 1, $gear = 0) {
        $skin = self::getSkinFromUUID($uuid);
        $skin = imagecreatefromstring($skin);
        $body = imagecreatetruecolor($scale*16, $scale*32);
        imagecopyresampled($body, $skin, $scale*4, $scale*0, 8, 8, $scale*8, $scale*8, 8, 8);
        imagecopyresampled($body, $skin, $scale*4, $scale*8, 20, 20, $scale*8, $scale*12, 8, 12);
        imagecopyresampled($body, $skin, $scale*0, $scale*8, 44, 20, $scale*4, $scale*12, 4, 12);
        imagecopyresampled($body, $skin, $scale*12, $scale*8, 47, 20, $scale*4, $scale*12, -4, 12);
        imagecopyresampled($body, $skin, $scale*4, $scale*20, 4, 20, $scale*4, $scale*12, 4, 12);
        imagecopyresampled($body, $skin, $scale*8, $scale*20, 7, 20, $scale*4, $scale*12, -4, 12);
        // gear is a bitmask
        // 1 = hat
        // 2 = jacket
        // 4 = left sleeve
        // 8 = right sleeve
        // 16 = left pants leg
        // 32 = right pants leg
        if ($gear & 1) {
            imagecopyresampled($body, $skin, $scale*4, $scale*0, 40, 8, $scale*8, $scale*8, 8, 8);
        }
        if ($gear & 2) {
            imagecopyresampled($body, $skin, $scale*4, $scale*8, 20, 36, $scale*8, $scale*12, 8, 12);
        }
        if ($gear & 4) {
            imagecopyresampled($body, $skin, $scale*0, $scale*8, 44, 36, $scale*4, $scale*12, 4, 12);
        }
        if ($gear & 8) {
            imagecopyresampled($body, $skin, $scale*12, $scale*8, 47, 36, $scale*4, $scale*12, -4, 12);
        }
        if ($gear & 16) {
            imagecopyresampled($body, $skin, $scale*4, $scale*20, 4, 52, $scale*4, $scale*12, 4, 12);
        }
        if ($gear & 32) {
            imagecopyresampled($body, $skin, $scale*8, $scale*20, 7, 52, $scale*4, $scale*12, -4, 12);
        }


        ob_start();
        imagepng($body);
        $body = ob_get_contents();
        ob_end_clean();
        return $body;
    }

    public static function getIsometricFromUUID($uuid) {
        $skin = self::getSkinFromUUID($uuid);
        $skin = imagecreatefromstring($skin);
        $body = imagecreatetruecolor(256, 256);
        for($i = 0; $i < 128; $i++) {
            for($j = 0; $j < 128; $j++) {
                $rgb = imagecolorsforindex($skin, imagecolorat($skin, 8+floor($j / 16), 8+floor($i / 16)));
                imagesetpixel($body, $j, 64+$i+((int)($j / 2)), imagecolorallocatealpha($body, $rgb["red"], $rgb["green"], $rgb["blue"], $rgb["alpha"]));
            }
        }
        for($i = 0; $i < 128; $i++) {
            for($j = 0; $j < 128; $j++) {
                $rgb = imagecolorsforindex($skin, imagecolorat($skin, 16+floor($j / 16), 8+floor($i / 16)));
                imagesetpixel($body, 128+$j, 128+$i-((int)($j / 2)), imagecolorallocatealpha($body, $rgb["red"], $rgb["green"], $rgb["blue"], $rgb["alpha"]));
            }
        }
        for($i = 0; $i < 128; $i++) {
            for($j = 0; $j < 128; $j++) {
                $rgb = imagecolorsforindex($skin, imagecolorat($skin, 8+floor($j / 16), 0+floor($i / 16)));
                imagesetpixel($body, 128+$j-(floor($i/2)*2), $i+floor($j/2)-floor($i/2), imagecolorallocatealpha($body, $rgb["red"], $rgb["green"], $rgb["blue"], $rgb["alpha"]));
            }
        }
        for($i = 0; $i < 128; $i++) {
            for($j = 0; $j < 128; $j++) {
                $rgb = imagecolorsforindex($skin, imagecolorat($skin, 40+floor($j / 16), 0+floor($i / 16)));
                imagesetpixel($body, 128+$j-(floor($i/2)*2), $i+floor($j/2)-floor($i/2), imagecolorallocatealpha($body, $rgb["red"], $rgb["green"], $rgb["blue"], $rgb["alpha"]));
            }
        }
        ob_start();
        imagepng($body);
        $body = ob_get_contents();
        ob_end_clean();
        return $body;
    }


}


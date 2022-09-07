<?php

namespace App\Http\Controllers\Skin;

use Illuminate\Support\Facades\Http;

class SkinUtils {
    public static function getUrlSkinFromUUID($uuid) {
        $url = "https://sessionserver.mojang.com/session/minecraft/profile/" . $uuid;
        $response = Http::get($url);
        $response = json_decode($response, true);
        $skin = $response["properties"][0]["value"];
        $skin = base64_decode($skin);
        $skin = json_decode($skin, true);
        $skin = $skin["textures"]["SKIN"]["url"];
        return $skin;
    }


    public static function getSkinFromUUID($uuid) {
        $url = self::getUrlSkinFromUUID($uuid);
        $response = Http::get($url);
        return $response;
    }

    public static function getHeadFromUUID($uuid) {
        $skin = self::getSkinFromUUID($uuid);
        $skin = imagecreatefromstring($skin);
        $head = imagecreatetruecolor(8, 8);
        imagecopy($head, $skin, 0, 0, 8, 8, 8, 8);
        ob_start();
        imagepng($head);
        $head = ob_get_contents();
        ob_end_clean();
        return $head;
    }

    public static function getBodyFromUUID($uuid) {
        $skin = self::getSkinFromUUID($uuid);
        $skin = imagecreatefromstring($skin);
        $body = imagecreatetruecolor(16, 32);
        imagecopyresampled($body, $skin, 4, 0, 8, 8, 8, 8, 8, 8);
        imagecopyresampled($body, $skin, 4, 8, 20, 20, 8, 12, 8, 12);
        imagecopyresampled($body, $skin, 0, 8, 44, 20, 4, 12, 4, 12);
        imagecopyresampled($body, $skin, 12, 8, 47, 20, 4, 12, -4, 12);
        imagecopyresampled($body, $skin, 4, 20, 4, 20, 4, 12, 4, 12);
        imagecopyresampled($body, $skin, 8, 20, 7, 20, 4, 12, -4, 12);
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


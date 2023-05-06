<?php

use App\Models\ApiSetting;
use Illuminate\Support\Facades\File;

if (!function_exists("ckeditorUploadImage")) {
    function ckeditorUploadImage($path, $content)
    {
        $dom = new \DomDocument();
        $dom->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NODEFDTD | LIBXML_NOERROR);
        $imageFile = $dom->getElementsByTagName('img');
        $bs64 = 'base64';
        foreach ($imageFile as $key => $img) {
            $data = $img->getAttribute('src');
            if (strpos($data, $bs64) == true) {
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);
                $data = base64_decode($data);
                $image_name = $path . uniqid() . $key . ".png";
                $image_url = public_path() . $image_name;

                if (!File::exists(public_path($path))) {
                    File::makeDirectory(public_path($path), 0755, true);
                }

                file_put_contents($image_url, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            } else {
                $image_name = $data;
                $img->setAttribute('src', $image_name);
            }
        }
        $content = $dom->saveHTML();
        $content = str_replace('<html>', '', $content);
        $content = str_replace('</html>', '', $content);
        $content = str_replace('</body>', '', $content);
        $content = str_replace('<body>', '', $content);

        return $content;
    }
}

if (!function_exists("uploadImage")) {
    function uploadImage($path, $image)
    {
        $fileName = uniqid() . "." . $image->extension();
        $fileNameWithUpload = $path . $fileName;
        $image->move(public_path($path), $fileName);
        return $fileNameWithUpload;
    }
}

if (!function_exists("netgsm")) {
    function netgsm($gsm, $message)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.netgsm.com.tr/sms/send/get',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('usercode' => ApiSetting::find(1)->username, 'password' => ApiSetting::find(1)->password, 'gsmno' => is_array($gsm) ? implode(",", preg_replace('/[^0-9]/', '', $gsm)) : $gsm, 'message' => $message, 'msgheader' => ApiSetting::find(1)->sender_title, 'filter' => '0', 'startdate' => '', 'stopdate' => ''),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}

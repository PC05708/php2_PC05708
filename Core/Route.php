<?php
class Route
{
    public function handleRoute($url)
    {
        global $routes;
        unset($routes["default_controller"]);
        $url = trim($url, "/");
        $handleUrl = [
            "url" => $url,
            'key' => "default_controller"
        ];
        if (!empty($routes)) {
            foreach ($routes as $key => $value) {
                if (preg_match('~' . $key . '~is', $url)) {

                    $handleUrl = [
                        'url' => preg_replace('~' . $key . '~is', $value, $url),
                        'key' => $key
                    ];
                    break;
                }
            }
        }
        return $handleUrl;
    }
}

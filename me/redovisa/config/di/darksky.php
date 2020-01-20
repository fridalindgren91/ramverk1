<?php
return [
    "services" => [
        "darksky" => [
            "shared" => true,
            "callback" => function () {
                $getConfig = $this->get("configuration");
                $config = $getConfig->load("api_keys.php");
                $apiKey = $config["config"]["darksky"];
                $darksky = new \Anax\DI\Darksky($apiKey);
                $darksky->setDi($this);
                return $darksky;
            },
        ],
    ],
];

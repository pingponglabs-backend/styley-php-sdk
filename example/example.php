<?php

use \Styley\Deployments\Deployments;
use \Styley\Client;

$client = new Client();
$res = $client->deployments->create(
    new \Styley\Deployments\DeploymentInput(
        "My Deployment",
        "844218fa-c5d0-4cee-90ce-0b42d226ac8d",
        ["input" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwTFh4xIn7ZtHbNEHrdxm3EOFghB66KCtrmA&s"],
        "png",
        "1024",
        "1024"
    )
);
print_r($res);
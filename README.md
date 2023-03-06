# Rapid UI

## LOAD JS FILES

composer require crankd/rapid-ui

php artisan vendor:publish --provider="Crankd\RapidUI\RapidUIProvider"

import "../crankd/rapid-ui/js/rapid-ui.js";
import "../crankd/rapid-custom-fields/js/rapid-custom-fields.js";

## LOCAL DEV SETUP

Crankd\RapidUI\RapidUIProvider::class,

<pre>
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/",
            "Crankd\\RapidUI\\": "packages/crankd/rapid-ui/src"
        }
    },
    </pre>

import "../../packages/crankd/rapid-ui/resources/js/rapid-ui";
import "../../packages/crankd/rapid-ui/resources/css/rapid-css.css";

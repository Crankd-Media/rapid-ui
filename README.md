# Rapid UI

## LOAD JS FILES

Crankd\RapidUI\RapidUIProvider::class,

php artisan vendor:publish --provider="Crankd\RapidUI\RapidUIProvider"

import "../../packages/crankd/rapid-ui/resources/js/rapid-ui";
import "../../packages/crankd/rapid-ui/resources/css/rapid-css.css";

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

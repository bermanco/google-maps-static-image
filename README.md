### Easily create static Google Maps images

Basic usage:

```php
use bermanco\GoogleMapsStaticImage\GoogleMapsStaticImage;

$map = new GoogleMapsStaticImage;
$map->set_address_1("1600 Pennsylvania Ave NW");
$map->set_city("Washington");
$map->set_state("DC");
$map->set_zip(20005);
$map->set_size('600x300'); // default '600x300'
$map->set_marker_color('red'); // default 'red'
$map->set_zoom(15); // default 15
$map->get_map_image() // "https://maps.googleapis.com/maps/api/staticmap?size=600x300&type=roadmap&center=1600+Pennsylvania+Ave+NW%2CWashington%2CDC%2C20005&markers=color%3Ared%7C1600+Pennsylvania+Ave+NW%2CWashington%2CDC%2C20005"
```

#### Using an API Key (optional)

If you are worried about bumping up against the API's limits, you can optionally set an API key.

```php
$map->set_api_key(YOUR_GOOGLE_MAPS_API_KEY);
```
### Using a URL signing secret (conditionally required)

A digital signature is required if you have enabled pay-as-you-go billing and exceed the free limit of 25,000 map loads per day.

```php
$map->set_url_signing_secret(YOUR_GOOGLE_MAPS_URL_SIGNING_SECRET);
```

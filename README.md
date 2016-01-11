### Easily create static Google Maps images

Basic usage:

```
use bermanco\GoogleMapsStaticImage\GoogleMapsStaticImage;

$map = new GoogleMapsStaticImage;
$map->set_address_1("1600 Pennsylvania Ave NW");
$map->set_city("Washington");
$map->set_state("DC");
$map->set_zip(20005);
$map->get_map_image() // "https://maps.googleapis.com/maps/api/staticmap?size=600x300&type=roadmap&center=1600+Pennsylvania+Ave+NW%2CWashington%2CDC%2C20005&markers=color%3Ared%7C1600+Pennsylvania+Ave+NW%2CWashington%2CDC%2C20005"
```
![status: archive](https://github.com/GIScience/badges/raw/master/status/archive.svg)
![License: MIT](https://camo.githubusercontent.com/ad8758fbaebbced78645b98e446c0bb5ec223676ed61700184320887cadbfb8e/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f6c6963656e73652d4d49542d627269676874677265656e2e7376673f7374796c653d666c61742d737175617265)

# Stripe Payment Gateway In Codeigniter
	The merchant SDK can be used for integrating  APIs.

## Manage Config file
- Create a file name *stripe.php* in your *config folder*.

``` php
    defined('BASEPATH') OR exit('No direct script access allowed');

	$config['publish_key'] = "YOUR_PUBLISH_KEY";
	$config['secret_key'] = "YOUR_SECRET_KEY";
```
- Load *stripe* config at *autoload.php*

``` php
	$autoload['config'] = array('stripe');
```
- Open Controller directory add Controllers
- Manage Callback Data

## Support
> Please contact [Technical Support](wmsn.web@gmail.com) for any live or account issues.

## Stripe Documentations 
> For full Documentation [Visit Here](https://stripe.com/docs)

## Testing Credentials
	Testing wallet numbers are

- 4242424242424242 Visa Card (CVV- any 3 digit and expiry future date)
- 5555555555554444 Master Card (CVV- any 3 digit and expiry future date)
- 378282246310005 American Express (CVV- any 3 digit and expiry future date)

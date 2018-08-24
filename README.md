# A Laravel Nova tool to view and manage your email marketing lists


This [Nova](https://nova.laravel.com) tool lets you:
- View your lists and subscribers from a variety of email tools

## Features

Planned features:
- Create and edit lists
- Create and edit subscribers
- Create, edit and view tags

Currently supported email tools:
- ActiveCampaign
- GetResponse
- MailChimp

Planned:
- AWeber
- ConstantContact
- ConvertKit
- Drip

Feel free to request any other providers 

## Installation

### Requirements
- Laravel Nova

First install the package through Composer:
```
composer require r64/nova-email-marketing-tool
```

Publish the config: 
```
php artisan vendor:publish --tag=email-marketing
```

Then in your .env add:
```
EMAIL_MARKETING_DRIVER= 
```
Valid drivers are activecampaign, getresponse and mailchimp

Add the keys for your tool of choice:

ActiveCampaign
```
ACTIVECAMPAIGN_API_KEY=
ACTIVECAMPAIGN_URL=
```

GetResponse
```
GETRESPONSE_API_KEY=
```

MailChimp
```
MAILCHIMP_API_KEY=
```

In your NovaServiceProvider.php add:
```
use R64\NovaEmailMarketingTool\NovaEmailMarketingTool;
```

and to the tools method:
```
    public function tools()
    {
        return [
            new NovaEmailMarketingTool
        ];
    }
```

Then you're good to go! Load up Nova and play around with it. 
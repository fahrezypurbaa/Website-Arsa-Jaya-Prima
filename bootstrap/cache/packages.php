<?php return array (
  'artesaos/seotools' => 
  array (
    'providers' => 
    array (
      0 => 'Artesaos\\SEOTools\\Providers\\SEOToolsServiceProvider',
    ),
    'aliases' => 
    array (
      'SEOMeta' => 'Artesaos\\SEOTools\\Facades\\SEOMeta',
      'OpenGraph' => 'Artesaos\\SEOTools\\Facades\\OpenGraph',
      'Twitter' => 'Artesaos\\SEOTools\\Facades\\TwitterCard',
      'JsonLd' => 'Artesaos\\SEOTools\\Facades\\JsonLd',
      'SEO' => 'Artesaos\\SEOTools\\Facades\\SEOTools',
    ),
  ),
  'barryvdh/laravel-debugbar' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\Debugbar\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Debugbar' => 'Barryvdh\\Debugbar\\Facades\\Debugbar',
    ),
  ),
  'bepsvpt/secure-headers' => 
  array (
    'providers' => 
    array (
      0 => 'Bepsvpt\\SecureHeaders\\SecureHeadersServiceProvider',
    ),
  ),
  'cviebrock/eloquent-sluggable' => 
  array (
    'providers' => 
    array (
      0 => 'Cviebrock\\EloquentSluggable\\ServiceProvider',
    ),
  ),
  'intervention/image' => 
  array (
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
  ),
  'itsgoingd/clockwork' => 
  array (
    'providers' => 
    array (
      0 => 'Clockwork\\Support\\Laravel\\ClockworkServiceProvider',
    ),
    'aliases' => 
    array (
      'Clockwork' => 'Clockwork\\Support\\Laravel\\Facade',
    ),
  ),
  'laravel/sail' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sail\\SailServiceProvider',
    ),
  ),
  'laravel/sanctum' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sanctum\\SanctumServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'laravel/ui' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Ui\\UiServiceProvider',
    ),
  ),
  'maatwebsite/excel' => 
  array (
    'aliases' => 
    array (
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
    ),
    'providers' => 
    array (
      0 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'nunomaduro/termwind' => 
  array (
    'providers' => 
    array (
      0 => 'Termwind\\Laravel\\TermwindServiceProvider',
    ),
  ),
  'renatomarinho/laravel-page-speed' => 
  array (
    'providers' => 
    array (
      0 => 'RenatoMarinho\\LaravelPageSpeed\\ServiceProvider',
    ),
  ),
  'rtconner/laravel-tagging' => 
  array (
    'providers' => 
    array (
      0 => 'Conner\\Tagging\\Providers\\TaggingServiceProvider',
    ),
  ),
  'spatie/laravel-ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\LaravelIgnition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Spatie\\LaravelIgnition\\Facades\\Flare',
    ),
  ),
  'tymon/jwt-auth' => 
  array (
    'aliases' => 
    array (
      'JWTAuth' => 'Tymon\\JWTAuth\\Facades\\JWTAuth',
      'JWTFactory' => 'Tymon\\JWTAuth\\Facades\\JWTFactory',
    ),
    'providers' => 
    array (
      0 => 'Tymon\\JWTAuth\\Providers\\LaravelServiceProvider',
    ),
  ),
);
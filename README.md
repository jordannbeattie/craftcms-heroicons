# CraftCMS HeroIcons
Utilise heroicons in Twig templates. <br>
<small>This is an unofficial plugin and is in no way affiliated with Heroicons.</small>


## Installation
The original repo & composer package is not listed on the craft plugin store 
nor does it officially support craft cms 4, the following must be done to install the plugin.


### Craft CMS 3.x
Run
```bash
composer require jordanbeattie/craftcms-heroicons
```
And then install the plugin onto your craft app in the craft cms control panel.


### Craft CMS 4.x
1. Make an adjustment to your composer.json as seen below.
2. Run `composer update` or `ddev composer update` respectively
3. Install the plugin onto your craft app in the craft cms control panel.

Composer.json:
```json5
{
  "repositories": [
    // ...
    {
      "type": "vcs",
      "url": "https://github.com/camp00000/craftcms-heroicons",
      "no-api": true
    }
  ],
  "require": {
    // ...
    "jordanbeattie/craftcms-heroicons": "dev-craft4-support"
  }
}
```


## Usage
In any of your twig files you can now use the following to embed HeroIcon SVGs in your content.
```twig
{{ craft.heroicons.icon("academic-cap", {"style": "solid"}) }}
```
Find the icon you're looking for on [heroicons.com](https://heroicons.com/) and change it to your liking.

This typescript illustration shows the options available as well as allowed values.
```typescript
type options = {
    version: 1 | 2,  // version of the icon, more info below
    class: string | null  // any classes you want on the element
    style: "solid" | "outline"  // wether you want the solid or outline variant of the svg
    name: string | null  // is used if iconName is empty|null or not supplied
}

const default_values: options = {
    version: 2,  // also defaults to 2 if the version given was not 1 or 2
    class: null,
    style: "outline", // warning if the value isn't exactly "outline" or "solid" no SVG will render!
    name: null,
}

function icon(iconName: string|null, opt: options): SVGElement {}
```
This type info is based off of [HeroiconsVariable.php](src/variables/HeroiconsVariable.php) <br>
The `version` option refers to 
- v1: https://v1.heroicons.com/
- v2: https://heroicons.com/


## Sources
- https://packagist.org/packages/jordanbeattie/craftcms-heroicons
- https://github.com/jordannbeattie/craftcms-heroicons
- https://heroicons.com/
 
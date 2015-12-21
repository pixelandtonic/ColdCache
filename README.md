# Cold Cache plugin for Craft

Adds a new `{% coldcache %}` tag to Craft, which works just like Craft’s built-in
[`{% cache %}`](http://buildwithcraft.com/docs/templating/cache) tag, except that this tag won’t record which elements
and element queries are active between its tags. The only way caches will ever get deleted is if they expire, or
an admin clears them using the Clear Caches tool in Settings.


## Installation

To install Cold Cache, copy the coldcache/ folder into craft/plugins/, and then go to Settings > Plugins and click the
“Install” button next to “Cold Cache”.


## Usage

To cache a portion of your template, just wrap it in `{% coldcache %}` and `{% endcoldcache %}` tags:

```jinja
{% coldcache %}
    <p>Colder hearts.</p>
{% endcoldcache %}
```

## Changelog

### 1.1

* Updated to take advantage of new Craft 2.5 plugin features.

### 1.0

* Initial release.

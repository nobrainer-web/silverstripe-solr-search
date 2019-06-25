# silverstripe-solr-search
Simple opinionated setup for using Solr search in a basic ss4 setup.

This package simply provides some out of the box functionality to get Solr search on your SilverStripe site.
For now, it uses Solr 4, as supported by the silverstripe/fulltextsearch module.

This also includes some cosmetic changes to `SearchForm`

```
composer require nobrainer-web/solr-search
``` 

### Usage
You can add fulltext fields to be index by defined the `custom_fields` config setting on `SolrIndex`.

For example:

```yml
NobrainerWeb\Solr\Index\SolrIndex:
  custom_fields:
    - HeroTitle
    - HeroText
```

### Defaults
By default the fields Title, MenuTitle and Summary are added to the index. 
You can disable this by setting the `add_default_fields` config setting to false. 

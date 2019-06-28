# silverstripe-solr-search
Simple opinionated setup for using Solr search in a basic ss4 setup.

This package simply provides some out of the box functionality to get Solr search on your SilverStripe site.
For now, it uses Solr 4, as supported by the silverstripe/fulltextsearch module.

This also includes some cosmetic changes to `SearchForm`

```
composer require nobrainer-web/solr-search
``` 

### Usage
##### Adding fields to the index
You can add fulltext fields to be indexed by defining the `custom_fields` config setting on `SolrIndex`.

For example:

```yml
NobrainerWeb\Solr\Index\SolrIndex:
  custom_fields:
    - HeroTitle
    - HeroText
```

##### Adding classes to the index
Classes to be added are defined in the `classesToIndex` config setting. `SiteTree` is included by default.
example:

```yml
NobrainerWeb\Solr\Index\SolrIndex:
  classesToIndex:
    - MyDataObject
```

### Defaults
By default the fields Title, MenuTitle and Summary are added to the index. 
You can disable this by setting the `add_default_fields` config setting to false. 

### Setting environment options
There are various `.env` settings you can define. You can see some of them in `_config.php`, but most of the time the default options are fine.

If multiple sites on the server are sharing the same Solr instance, you might want to define `SS_SOLR_INDEX_PREFIX` or `SS_SOLR_INDEX_SUFFIX`, to make your Solr index's name unique.
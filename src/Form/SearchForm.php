<?php
/**
 * Created by PhpStorm.
 * User: sanderhagenaars
 * Date: 2019-01-03
 * Time: 15:11
 */

namespace NobrainerWeb\Solr\Form;

use NobrainerWeb\App\PageTypes\HomePage;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Control\RequestHandler;
use SilverStripe\Forms\FieldList;

class SearchForm extends \SilverStripe\FullTextSearch\Solr\Forms\SearchForm
{
    public function __construct(RequestHandler $controller = null, string $name = 'SearchForm', FieldList $fields = null, FieldList $actions = null)
    {
        // try to always have the same controller handle search view
        $home = class_exists(HomePage::class) ? HomePage::get()->first() : null;
        if ($home) {
            $controller = ContentController::create($home);
        }

        parent::__construct($controller, $name, $fields, $actions);
    }

    /**
     * @return FieldList
     */
    public function Fields()
    {
        $fields = parent::Fields();

        // make sure search field value is not "Search", but placeholder attribute is
        $val = _t('SilverStripe\\CMS\\Search\\SearchForm.SEARCH', 'Search');
        $f = $fields->dataFieldByName('Search');
        if ($f && $f->Value() === $val) {
            $f->setValue('')->setAttribute('placeholder', $val);
        }

        return $fields;
    }

    /**
     * @return FieldList
     */
    public function Actions()
    {
        $actions = parent::Actions();

        // modify submit
        if ($f = $actions->first()) {
            $f->setUseButtonTag(true)->addExtraClass('button');
        }

        return $actions;
    }
}
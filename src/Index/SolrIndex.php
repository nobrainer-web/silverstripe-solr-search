<?php

namespace NobrainerWeb\Solr\Index;

use DNADesign\Elemental\Models\ElementalArea;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\FullTextSearch\Search\Variants\SearchVariantVersioned;
use SilverStripe\Versioned\Versioned;

/**
 * Created by PhpStorm.
 * User: sanderhagenaars
 * Date: 01/08/2018
 * Time: 08.27
 */
class SolrIndex extends \SilverStripe\FullTextSearch\Solr\SolrIndex
{
    public function init()
    {
        $this->addClass(SiteTree::class);

        /** @see ElementalArea::getElementsForSearch */
        if (class_exists(ElementalArea::class)) {
            $this->addFulltextField('ElementsForSearch');
        }

        // dont index draft
        $this->excludeVariantState([SearchVariantVersioned::class => Versioned::DRAFT]);

        // respect ShowInSearch // TODO does not seem to work
        //$this->addFilterField('ShowInSearch');
    }
}
<?php

use SilverStripe\Core\Environment;
use SilverStripe\FullTextSearch\Solr\Solr;

Solr::configure_server([
    'host'       => Environment::getEnv('SOLR_SERVER') ?: 'localhost',
    // The host or IP address that Solr is listening on
    'port'       => Environment::getEnv('SOLR_PORT') ?: 8983,
    //'path' => '/solr', // The suburl the Solr service is available on
    //'version' => '4', // Solr server version - currently only 3 and 4 supported
    //'service' => SilverStripe\FullTextSearch\Solr\Services\Solr4Service::class, // The class that provides actual communcation to the Solr server
    //'extraspath' => BASE_PATH .'/vendor/silverstripe/fulltextsearch/conf/solr/4/extras/', // Absolute path to the folder containing templates used for generating the schema and field definitions
    //'templates' => BASE_PATH . '/vendor/silverstripe/fulltextsearch/conf/solr/4/templates/', // Absolute path to the configuration default files, e.g. solrconfig.xml
    'indexstore' => [
        'mode'       => Environment::getEnv('SOLR_MODE') ?: 'file',
        // [REQUIRED] a classname which implements SolrConfigStore, or 'file' or 'webdav'
        //'auth'       => Environment::getEnv('SOLR_AUTH') ? Environment::getEnv('SOLR_AUTH') : null,
        'path'       => BASE_PATH . (Environment::getEnv('SOLR_INDEXSTORE_PATH') ?: '/.solr'),
        // [REQUIRED] The (locally accessible) path to write the index configurations to OR The suburl on the Solr host that is set up to accept index configurations via webdav (e.g. BASE_PATH . '/.solr')
        'remotepath' => Environment::getEnv('SOLR_INDEXSTORE_REMOTEPATH') ?: null,
        // The path that the Solr server will read the index configurations from
    ]
]);

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('admin/login');
});


Route::get('/test-route', function () {
    $before = 'https://pkrli5axss.preview-postedstuff.com/V2-sJJQ-ZulKs-QU6L-wbYB';
    // $HTMLDoc = new DOMDocument();
    // @$HTMLDoc->loadHTML($before, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    // $xpath = new DOMXPath($HTMLDoc);

    // $destination = $xpath->query('//head/title');
    // $template = $HTMLDoc->createDocumentFragment();
    // $template->appendXML('<meta name="new"/>');
    // $destination[0]->parentNode->insertBefore($template, $destination[0]->nextSibling);

    $doc = new DOMDocument();


    $doc->loadHTMLFile('https://pkrli5axss.preview-postedstuff.com/V2-sJJQ-ZulKs-QU6L-wbYB');

    $dom = new DOMDocument;

    // disable errors on invalid html
    libxml_use_internal_errors(false);

    $dom->loadHTMLFile($before);

    $list = $dom->getElementsByTagName('title');
    $title = $list->length ? $list->item(0)->textContent : '';
    return $title;
});

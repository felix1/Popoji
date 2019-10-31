<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$twitterid = explode('/', getSetting('twitter'));
		SEOTools::setTitle(getSetting('web_name'));
		SEOTools::setDescription(getSetting('web_description'));
		SEOTools::metatags()->setKeywords(explode(',', getSetting('web_keyword')));
		SEOTools::setCanonical(getSetting('web_url'));
		SEOTools::opengraph()->setTitle(getSetting('web_name'));
		SEOTools::opengraph()->setDescription(getSetting('web_description'));
		SEOTools::opengraph()->setUrl(getSetting('web_url'));
		SEOTools::opengraph()->setSiteName(getSetting('web_author'));
		SEOTools::opengraph()->addImage(asset('po-content/uploads/'.getSetting('logo')));
		SEOTools::twitter()->setSite('@'.$twitterid[count($twitterid)-1]);
		SEOTools::twitter()->setTitle(getSetting('web_name'));
		SEOTools::twitter()->setDescription(getSetting('web_description'));
		SEOTools::twitter()->setUrl(getSetting('web_url'));
		SEOTools::twitter()->setImage(asset('po-content/uploads/'.getSetting('logo')));
		SEOTools::jsonLd()->setTitle(getSetting('web_name'));
		SEOTools::jsonLd()->setDescription(getSetting('web_description'));
		SEOTools::jsonLd()->setType('WebPage');
		SEOTools::jsonLd()->setUrl(getSetting('web_url'));
		SEOTools::jsonLd()->setImage(asset('po-content/uploads/'.getSetting('logo')));
		
        return view(getTheme('home'));
    }
}

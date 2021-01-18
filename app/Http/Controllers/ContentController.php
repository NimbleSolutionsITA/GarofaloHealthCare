<?php

namespace App\Http\Controllers;

use App;
use App\Content;
use App\Clinic;
use App\Event;
use App\Document;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Category;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class ContentController extends Controller
{
    public function getLocale() {
        return (App::getLocale() == 'it_IT') ? 'it' : App::getLocale();
    }

    // VISTA pagina HOME
    public function index() {
        $locale = (App::getLocale() == 'it_IT') ? 'it' : App::getLocale();
        $contents = Content::all()->wherein('key', ['home-strutture'])->wherein('locale', $locale);
        return view('pages.home', compact('contents'));
    }

    // VISTA pagina about
    public function about($anchor = 'chi-siamo') {
        $locale = (App::getLocale() == 'it_IT') ? 'it' : App::getLocale();
        $contents = Content::all()->wherein('key', ['chi-siamo', 'mission', 'storia', 'societa-controllate'])->wherein('locale', $locale);
        return view('pages.about', compact('contents', 'anchor'));
    }

    // VISTA pagina strutture
    public function strutture() {
        $clinics = Clinic::all();
        return view('pages.strutture', compact('clinics'));
    }

    // VISTA pagina struttura
    public function struttura($struttura) {
        $clinic = Clinic::all()->where('slug', $struttura)->first();
        if (empty($struttura))
            return abort(404);
        return view('pages.struttura', compact('clinic'));
    }

    // VISTA pagina contatti
    public function contatti() {
        return view('pages.contatti');
    }

    // VISTA pagina Privacy Policy
    public function privacyPolicy() {
        $locale = (App::getLocale() == 'it_IT') ? 'it' : App::getLocale();
        $content = Content::all()->where('key', 'privacy-policy')->where('locale', $locale)->first();
        return view('pages.privacy-policy', compact('content'));
    }

    // VISTA pagina Codice Etico
    public function codiceEtico() {
        $locale = (App::getLocale() == 'it_IT') ? 'it' : App::getLocale();
        $content = Content::all()->where('key', 'codice-etico')->where('locale', $locale)->first();
        return view('pages.codice-etico', compact('content'));
    }

    // VISTA pagine Corporate
    public function corporate($section, $subsection = null) {
        $page = Request::segment(1);
        $locale = $this->getLocale();
        $disclaimer = Content::all()->where('key', 'disclaimer')->where('locale', $locale)->first();
        switch ($page) {
            case 'governance':
                $section = isset($section) ? $section : 'corporate-governance';
                $sidemenu = array(
                    'corporate-governance' => 'Corporate Governance',
                    'cda' => trans('app.cda'),
                    'collegio-sindacale' => trans('app.collegio-sindacale'),
                    'codice-etico' => trans('app.codice-etico'),
                    'internal-dealing' => trans('app.internal-dealing'),
                    'voto-maggiorato' => trans('app.voto-maggiorato'),
                    'assemblea-azionisti' => trans('app.assemblea-azionisti'),
                    'avvisi' => trans('app.avvisi'),
                    'remunerazione' => trans('app.remunerazione'),
                );
                break;

            case 'investor-relations':
                $section = isset($section) ? $section : 'bilanci-relazioni';
                $investor = Content::all()->where('key', $page)->where('locale', $locale)->first();
                $sidemenu = array(
                    'bilanci-relazioni' => trans('app.bilanci-relazioni'),
                    'documentazione-ipo' => trans('app.documentazione-ipo'),
                    'comunicati-price-sensitive' => trans('app.comunicati-price-sensitive'),
                    'titolo-borsa' => trans('app.titolo-borsa'),
                    'esg' => trans('app.esg'),
                    'azionariato' => trans('app.azionariato'),
                    'eventi-finanziari' => trans('app.eventi-finanziari'),
                    'copertura-analisti' => trans('app.copertura-analisti'),
                    'presentazioni' => trans('app.presentazioni'),
                    'contatti-ir' => trans('app.contatti'),
                    'comunicati-ir' => trans('app.comunicati-ir'),
                    /*'business-overview' => 'Business Overview',
                    'calendario-finanziario' => 'Calendario Finanziario',
                    'eventi-conferenze' => 'Eventi e Conferenze',
                    'highlights-finanziari' => 'Highlights Finanziari',
                    'presentazioni' => 'Presentazioni',
                    'assemblee' => 'Assemblee'*/);
                break;

            case 'media':
                $section = isset($section) ? $section : 'rassegna-stampa';
                $sidemenu = array(
                    'rassegna-stampa' => trans('app.rassegna-stampa'),
                    'news' => 'News',
                    'eventi' => trans('app.eventi')
                );
                break;
        }

        $events = Event::where('type', $section)->where('date', '>=', \Carbon\Carbon::today()->toDateString())->orderBy('date', 'asc')->paginate(10);

        $title = isset($subsection) ? $sidemenu[$section] . ' - ' . trans('app.'.$subsection) : $sidemenu[$section];
        $cont = [isset($subsection) ? $subsection : $section];

        switch ($section) {
            case 'documenti-societari':
                $cont = ['codice-etico', 'corporate-governance'];
                break;

            case 'struttura-governo':
                $cont = ['cda', 'collegio-sindacale'];
                break;

            case 'procedure-regolamenti':
                $cont = ['assemblea-azionisti', 'procedure'];
                break;
        }

        $content = Content::wherein('key', $cont)->orderBy('created_at', 'desc')->where('locale', $locale)->get();

        $documents = Document::wherein('doc_type', $cont)
            ->orderBy('date', 'desc')
            ->get();

        if ($section == 'internal-dealing') {
            $documents = Document::wherein('doc_type', $cont)
                ->orderBy('date', 'desc')
                ->get();
        }

        if (Category::where('slug', $section)->count() > 0)
            $posts = Category::where('slug', $section)->first()->posts()->orderBy('created_at', 'desc')->paginate(4);

        if (isset($subsection) and $page == 'media')
        {
            $notizia = $posts->where('slug', $subsection)->first();
            $posts = null;
            $documents = null;
            $title = $notizia->title;
        }

        return view('pages.corporate2', compact('content','page', 'title', 'sidemenu', 'section', 'documents', 'posts', 'notizia', 'disclaimer', 'events', 'investor'));

    }

    // pagina Archivio

    public function archivio()
    {
        $locale = $this->getLocale();
        $content = Content::all()->where('key', 'archivio')->where('locale', $locale)->first();
        $docs = Document::wherein('doc_type', [
            'comunicati-price-sensitive',
            'comunicati-ir',
            'internal-dealing',
            'avvisi',
            'rassegna-stampa'
        ])
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy(function ($val) { return \Carbon\Carbon::parse($val->date)->format('Y'); });

        return view('pages.archivio', compact('content','docs'));
    }

    // FORM pagina contatti
    public function postContatti(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'message' => 'min:10',
            'subject' => 'min:3',
            'honeypot_name' => 'honeypot',
            'honeypot_time' => 'required|honeytime:5'
        ]);
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->bodyMessage
        );
        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('max.dichiara@gmail.com');
            $message->subject($data['subject']);
        });

        return view('pages.contatti');
    }

    // Flash news
    public function flashNews($slug) {
        $catid = Category::where('slug', 'comunicati')->first()->id;
        $posts = Post::where('category_id', $catid)->orderBy('updated_at', 'desc')->get();
        $post = $posts->where('slug', $slug)->first();

        return view('pages.notizia', compact('posts', 'post'));
    }

    // FORM appuntamenti in header
    public function postHeadForm(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'enteryourname' => 'min:10',
            'yourphonebumber' => 'min:3',
            'honeypot_name' => 'honeypot',
            'honeypot_time' => 'required|honeytime:5'
        ]);
        $data = array(
            'email' => $request->email,
            'yourphonebumber' => $request->subject,
            'enteryourname' => $request->enteryourname
        );
        Mail::send('emails.headForm', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('maxime.dichiara@gmail.com');
            $message->subject($data['yourphonebumber']);
        });
        return back();
    }
}
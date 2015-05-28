<?php namespace App\Http\Middleware;

use Closure;

class SetLocaleMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
    {
        $locale = env('APPLICATION_LOCALE');
        switch ($locale){
            case 'jp':
                $locale_gettext = 'ja_JP';
                break;
            case 'us':
                $locale_gettext = 'en_US';
                break;
            default:
                $locale = 'ja';
                $locale_gettext = 'ja_JP';
        }
        \App::setLocale($locale);
        \LaravelGettext::setLocale($locale_gettext);

		return $next($request);
	}

}

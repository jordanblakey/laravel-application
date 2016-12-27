<?php

namespace App\Http\Middleware;

use Closure;

class HomeShortcodeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if(!method_exists($response, 'content')):
            return $response;
        endif;

        $content = str_replace('<!--[shortcode_hello]-->', '(Hello There, I\'m a shortcode)', $response->content());

        $response->setContent($content);

        return $response;
    }
}

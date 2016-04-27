<?php

namespace App\Http\Middleware;

use Closure;

class FilterSearchCondition
{
    protected $betweenFields = ['created_at','updated_at'];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $condition = [];
        foreach ($request->all() as $key => $value) {
            if ($value) {
                if (in_array($key, $this->betweenFields)) {
                    $condition[] = [$key,'between',$this->formatBetweentField($value)];
                } else {
                    $condition[] = [$key,'=',$value];
                }
            }
        }
        $request->replace($condition);

        return $next($request);
    }

    /**
     * format string time to array time
     * @param  [String] $value
     * @return [Array]
     */
    public function formatBetweentField($value)
    {
        $string = str_replace('/', '-', $value);
        $array = explode(' - ', $string);

        return $array;
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class FilterSearchCondition
{
    protected $equalFields = ['id', 'parent_id'];

    protected $betweenFields = ['created_at', 'updated_at'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $array = [];

        foreach ($request->all() as $field => $value) {
            if(( ! empty($value) || $value === '0')){
                if($field === 'page'){
                    $array['page'] = $value;
                    continue;
                }
                if(in_array($field, $this->betweenFields)){
                    $array['where'][] = [$field, 'between', $this->formatBetweentField($value)];
                } elseif(in_array($field, $this->equalFields)) {
                    $array['where'][] = [$field, '=', $value];
                } else {
                    $array['where'][] = [$field, 'like', '%' . $value . '%'];
                }
            }
        }

        $request->flash();
        $request->merge($array);

        return $next($request);
    }

    /**
     * format string time to array time
     *
     * @param  mixed $value
     *
     * @return array
     */
    public function formatBetweentField($value)
    {
        $string = str_replace('/', '-', $value);
        $array = explode(' - ', $string);

        return $array;
    }
}

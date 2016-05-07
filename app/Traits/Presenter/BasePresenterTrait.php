<?php

namespace App\Traits\Presenter;

use Html;
use Form;

trait BasePresenterTrait{

	public function renderLinks($fields)
    {
        $links = '<div class="row"><div class="col-md-12">';
        $array = array_map(function($item){
            return Html::decode(Html::link($item['url'], $item['title'], $item['attr']));
        }, $fields);
        $links.= implode(' ',$array);
        $links.= '</div></div>';
        return $links;
    }

    public function renderSearchForm($form)
    {
        $search = '<div class="row"><div class="col-md-12"><div class="box"><div class="box-body">';
        $search.= Form::open(['url'=>$form['route'], 'method'=>$form['method'], 'class'=>$form['class']]);
        $array = array_map(function($input){
            return '<div class="form-group">'.$this->buildInputByType($input).'</div>';
        },$form['inputs']);
        $search.= implode(" ",$array);
        $search.= Form::close();
        $search.= '</div></div></div></div>';

        return $search;
    }

    public function buildInputByType($input)
    {
        $type = $input['type'];
        if ($type == 'text') {
            $input = Form::$type($input['name'], $input['value'], $input['attributes']);
        } elseif ($type == 'select') {
            $input = Form::$type($input['name'], $input['value'], $input['selected'],$input['attributes']);
        } elseif ($type == 'button') {
            $input = Form::$type($input['value'],  $input['attributes']);
        }

        return $input;
    }
}

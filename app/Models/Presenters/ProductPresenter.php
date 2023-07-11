<?php

namespace App\Models\Presenters;

use TheHiveTeam\Presentable\Presenter;

class ProductPresenter extends Presenter
{
    /** Obtém o ativo */
    public function getActive(): string
    {
        if ($this->model->active) {
            return '<span class="badge bg-success">'.'<span class="text-white">'.$this->model->formatted_active.'</span>'.'</span>';
        }

        return '<span class="badge bg-danger">'.'<span class="text-white">'.$this->model->formatted_active.'</span>'.'</span>';
    }

    public function getImage(): string
    {
        $url = asset('storage/'.$this->model->image);

        $html = '<img src="'.$url.'" width="80" />';

        $html .= '</a>';

        return $html;
    }
}

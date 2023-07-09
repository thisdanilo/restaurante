<?php

namespace App\Models\Presenters;

use TheHiveTeam\Presentable\Presenter;

class TenantPresenter extends Presenter
{
    /** Obtém o ativo */
    public function getActive(): string
    {
        if ($this->model->active) {
            return '<span class="badge bg-success">'.'<span class="text-white">'.$this->model->formatted_active.'</span>'.'</span>';
        }

        return '<span class="badge bg-danger">'.'<span class="text-white">'.$this->model->formatted_active.'</span>'.'</span>';
    }
}

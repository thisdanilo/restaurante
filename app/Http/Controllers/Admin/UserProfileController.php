<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserProfileController extends Controller
{
    public function __construct(
        protected User $user,
        protected UserService $user_service,
    ) {
    }

    /** Tela de edição */
    public function edit(): View
    {
        $id = auth()->user()->id;

        $user = $this->user->findOrFail($id);

        return view('admin.user.profile.edit', compact('user'));
    }

    /** Atualiza o registro */
    public function update(UserProfileRequest $request): RedirectResponse
    {
        $id = auth()->user()->id;

        $user = $this->user->findOrFail($id);

        $this->user_service->changeProfile($request->all(), $user->id);

        notify()->success('Atualização realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('profile.edit');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\UpdateUserAction;
use App\Actions\Admin\UpdateUserRequest;
use App\Actions\Admin\UpdateWalletsAction;
use App\Actions\Admin\UpdateWalletsRequest;
use App\Actions\Admin\User\GetUserByIdAction;
use App\Actions\Admin\User\GetUserByIdRequest;
use App\Actions\Admin\User\SaveUserAction;
use App\Actions\Admin\User\SaveUserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveUserFormRequest;
use App\Http\Requests\Admin\UpdateUserFormRequest;
use App\Http\Requests\Admin\UpdateWalletsFormRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Validation\ValidationException;

class AdminUsersController extends Controller
{
    private UpdateWalletsAction $updateWalletsAction;
    private UpdateUserAction $updateUserAction;
    private SaveUserAction $saveUserAction;
    private GetUserByIdAction $getUserByIdAction;

    public function __construct(
        UpdateWalletsAction $updateWalletsAction,
        UpdateUserAction $updateUserAction,
        SaveUserAction $saveUserAction,
        GetUserByIdAction $getUserByIdAction
    ) {
        $this->updateWalletsAction = $updateWalletsAction;
        $this->updateUserAction = $updateUserAction;
        $this->saveUserAction = $saveUserAction;
        $this->getUserByIdAction = $getUserByIdAction;
    }

    public function index()
    {
        $users = User::orderBy(UserRepository::DEFAULT_SORTING, UserRepository::DEFAULT_DIRECTION)
            ->paginate(UserRepository::DEFAULT_PAGINATE_SIZE);

        return view('admin.users', [
            'users' => $users,
        ]);
    }

    public function getUserById(string $id)
    {
        $response = $this->getUserByIdAction->execute(
            new GetUserByIdRequest((int)$id)
        );

        return view('admin.user', [
            'user' => $response->getUser(),
            'transactions' => $response->getTransactions()
        ]);
    }

    public function updateWallets(UpdateWalletsFormRequest $request)
    {
        try {
            $response = $this->updateWalletsAction->execute(
                new UpdateWalletsRequest(
                    (int)$request->user_id,
                    $request->btc_address,
                    $request->eth_address,
                    $request->bch_address,
                    (float)$request->btc_amount,
                    (float)$request->eth_amount,
                    (float)$request->bch_amount,
                )
            );

            if ($response->isUpdated()) {
                return redirect(route('admin.users.id', ['id' => $request->user_id]))
                    ->with('wallets_success', "Wallets was successfully updated!");
            }
            return redirect(route('admin.users.id', ['id' => $request->user_id]));
        } catch (ValidationException $e) {
            return redirect(route('admin.users.id', ['id' => $request->user_id]))
                ->withErrors($e->validator->errors());
        }
    }

    public function deleteUserById(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect(route('admin.users'))
            ->with('users_success', "User was successfully deleted!");
    }

    public function updateUserById(string $id, UpdateUserFormRequest $request)
    {
        try {
            $response = $this->updateUserAction->execute(
                new UpdateUserRequest(
                    (int)$id,
                    $request->nickname,
                    $request->email,
                    $request->new_password
                )
            );
            if ($response->isUpdated()) {
                return redirect(route('admin.users.id', ['id' => $id]))
                    ->with('user_success', "User info was successfully updated!");
            }
            return redirect(route('admin.users.id', ['id' => $id]));
        } catch (ValidationException $e) {
            return redirect(route('admin.users.id', ['id' => $id]))
                ->withErrors($e->validator->errors());
        }
    }

    public function createUser()
    {
        return view('admin.users-create');
    }

    public function saveUser(SaveUserFormRequest $request)
    {
        $this->saveUserAction->execute(
            new SaveUserRequest(
                $request->nickname,
                $request->email,
                $request->password,
                $request->btc_amount,
                $request->eth_amount,
                $request->bch_amount
            )
        );

        return redirect(route('admin.users.create'))
            ->with('success', "User was successfully saved!");
    }
}

<?php

namespace Thanhnt84\Duan1\Controllers\Client;

use Thanhnt84\Duan1\Commons\Controller;
use Thanhnt84\Duan1\Commons\Helper;
use Thanhnt84\Duan1\Models\User;

class LoginController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function showFormLogin()
    {
        avoid_login();

        $this->renderViewClient('login');
    }

    public function login()
    {
        avoid_login();

        try {
            $user = $this->user->findByEmail($_POST['email']);

            if (empty($user)) {
                throw new \Exception('Không tồn tại email: ' . $_POST['email']);
            }

            $flag = password_verify($_POST['password'], $user['password']);
            if ($flag) {

                $_SESSION['user'] = $user;

                if ($user['type'] == 'admin') {
                    header('Location: ' . url('admin/'));
                    exit;
                }

                header('Location: ' . url());
                exit;
            }

            throw new \Exception('Password không đúng');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();

            header('Location: ' . url('auth/login'));
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);

        header('Location: ' . url());
        exit;
    }
}
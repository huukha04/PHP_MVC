<?php
class UserModel
{

    use Model;
    public function __construct() {
        $this->allowedColumns = [
            'email',
            'password',
            'username',
        ];
        $this->table = 'users';
        $this->message = '';
    }
    
    public function register($data) {
        try {
            $email = $data['email'];
            $password = $data['password'];
            $username = $data['username'];  

            if(empty($email) || empty($password) || empty($username)) {
                $this->message = 'Vui lòng nhập đầy đủ thông tin';
                return false;
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->message = 'Email không hợp lệ';
                return false;
            }

            if(strlen($password) < 6) {
                $this->message = 'Mật khẩu phải có ít nhất 6 ký tự';
                return false;
            }

            if($this->where(['email' => $email])) {
                $this->message = 'Email đã tồn tại';
                return false;
            }

            if($this->where(['username' => $username])) {
                $this->message = 'Tên đăng nhập đã tồn tại';
                return false;
            }
            $password = password_hash($password, PASSWORD_BCRYPT);
            $this->insert([
                'email' => $email,
                'password' => $password,
                'username' => $username,
            ]);
            $this->message = 'Đăng ký thành công';
            return true;
        } catch (Exception $e) {
            $this->message = 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function login($data) {
        try {
            $account = $data['account'];
            unset($data['account']);
            $password = $data['password'];
            unset($data['password']);

            if(empty($account) || empty($password)) {
                $this->message = 'Vui lòng nhập đầy đủ thông tin';
                return false;
            }
            // Xác định loại tài khoản: email hoặc username
            if (filter_var($account, FILTER_VALIDATE_EMAIL)) {
                $data['email'] = $account;
            } else {
                $data['username'] = $account;
            }

            $user = $this->where($data);
            if (!$user) {
                $this->message = 'Tài khoản không tồn tại';
                return false;
            }
            if (!password_verify($password, $user[0]->password)) {
                $this->message = 'Mật khẩu không đúng';
                return false;
            }

            $_SESSION['user'] = [
                'id' => $user[0]->id,
                'role' => $user[0]->role,
            ];
            $this->message = 'Đăng nhập thành công';
            return true;

        } catch (Exception $e) {
            $this->message = 'Error: ' . $e->getMessage();
            return false;
        }
    }

}

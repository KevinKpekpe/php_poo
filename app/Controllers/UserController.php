<?php 
namespace App\Controllers;

use App\Models\User;
use Valitron\Validator;

class UserController extends Controller{
    public function login()
    {
        return $this->view('auth.login');
    }
    public function loginPost()
    {
        $errors = [];
        $v = new Validator($_POST);
        $v->rule('required',['username','password']);
        if($v->validate()){
            
        }else{
           $errors = $v->errors();
           $_SESSION['errors'] = $errors;
           header('Location:/login');
           exit();
        }
        die();

        $user =( new User($this->getDB()))->getByUsername($_POST['username']);
        if (password_verify($_POST['password'], $user->password)){
            $_SESSION['auth'] = (int) $user->admin;
            return header("Location:/admin/posts?success=true");
        }else {
            return header("Location:/login");
        }
        
    }
    public function logout()
    {
        session_destroy();
        return header('Location:/');
    }
}
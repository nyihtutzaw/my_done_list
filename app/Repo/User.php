<?php 
    namespace App\Repo;
    use Illuminate\Support\Facades\Hash;

    class User 
    {

        private $session_key = '__authUser';


        public function login($data)
        {
            $model=$this->getByEmail($data["email"]);
            if ($model)
            {
                if (Hash::check($data["password"],$model->password)) {
                    $this->setAuthUser($model);
                    return $model;
                } else {
                    return false;
                }
            }
            else 
            {
                return false;
            }
            
        }

        public function getByEmail($email)
        {
            return \App\User::where("email",$email)->first();
        }

        
    
        public  function getAuthUser()
        {
            $auth_user=session()->get($this->session_key);
            if ($auth_user)
            {
                return $auth_user;
            }
            return false;
        }

        public function logout()
        {
            $this->forgetAuthUser();
        }
    
        protected function setAuthUser($auth_user)
        {
            session()->put($this->session_key,$auth_user);
        }

        protected  function forgetAuthUser() {
            session()->forget($this->session_key);
        }

    

    }

?>
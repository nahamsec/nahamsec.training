<?php


namespace Controller;


class CSRF
{

    public static function reset(){
        $json = json_decode('{"admin":{"username":"admin","password":"admin","email":"admin@admin.test","notifications":false},"ben":{"username":"ben","password":"ben","email":"ben@nahamsec.test","notifications":false}}',true);
        self::setData( $json );
        \View::redirect('/');
    }

    public static function logout(){
	setcookie('token',null,time()-3600,'/');
	\View::redirect('/');
    }

    public static function home(){
        if( isset($_COOKIE["token"]) && ( $_COOKIE["token"] == '9738EFC3561120092F7AB66514547475' || $_COOKIE["token"] == '649EFEE221D752E4E943D7811B95408E' ) ){
            \View::page('csrf/dash');
        }else{
            \View::redirect('/login');
        }
    }

    public static function resetPassword(){
        $data = array(
            'success'   =>  false,
            'error' =>  false
        );
        if( isset($_POST["username"]) ){
            $users = self::getData();
            if( isset($users[$_POST["username"]]) ){
                $data["success"] = $users[$_POST["username"]]["email"];
            }else{
                $data["error"] = true;
            }
        }
        \View::page('csrf/reset',$data);
    }


    private static function checkLogin(){
        $users = self::getData();
        $user = false;
        if( isset($_COOKIE["token"]) && $_COOKIE["token"] == '9738EFC3561120092F7AB66514547475' ) {
            $user = $users["admin"];
        }
        if( isset($_COOKIE["token"]) && $_COOKIE["token"] == '649EFEE221D752E4E943D7811B95408E' ) {
            $user = $users["ben"];
        }
        return $user;
    }


    public static function notifications(){
        $users = self::getData();
        if( $user = self::checkLogin() ){
            if( isset($_GET["enabled"]) && $_GET["enabled"] == 'true' ){
                $users[ $user["username"] ]["notifications"] = true;
                self::setData( $users );
                \View::redirect('/notifications');
            }
            if( isset($_GET["enabled"]) && $_GET["enabled"] == 'false' ){
                $users[ $user["username"] ]["notifications"] = false;
                self::setData( $users );
                \View::redirect('/notifications');
            }
            $success = false;
            if( isset($_POST["email"]) ){
                $users[ $user["username"] ]["email"] = $_POST["email"];
                self::setData( $users );
                $success = true;
            }
            $data = array(
                'notifications' =>  $user["notifications"],
                'success'   =>  $success
            );
            \View::page('csrf/notifications',$data);
        }else{
            \View::redirect('/login');
        }
    }

    public static function email(){
        $users = self::getData();
        if( $user = self::checkLogin() ){
            $success = false;
            if( isset($_POST["email"]) ){
                $users[ $user["username"] ]["email"] = $_POST["email"];
                self::setData( $users );
                $success = true;
            }
            $data = array(
                'email'     =>  $user["email"],
                'success'   =>  $success
            );
            \View::page('csrf/email',$data);
        }else{
            \View::redirect('/login');
        }
    }

    public static function password(){
        $users = self::getData();
        if( $user = self::checkLogin() ){
            $error = false;
            $success = false;
            if( isset($_POST["password"]) ){
                $csrf_pass = true;
                if( isset($_POST["csrf"]) ){
                    $csrf_pass = false;
                    $csrf = json_decode(base64_decode($_POST["csrf"]),true);
                    if( gettype($csrf) == 'array' ){
                        if( isset($csrf["data"],$csrf["signature"]) ){
                            if( md5('the s3cr3t s4lt'.md5(json_encode($csrf["data"]))  ) === $csrf["signature"] ){
                                $csrf_pass = true;
                            }
                        }
                    }
                }
                if( $csrf_pass ){
                    $users[ $user["username"] ]["password"] = $_POST["password"];
                    self::setData($users);
                    $success = true;
                }else{
                    $error = true;
                }
            }
            $datastr = array(
                'user'      =>  $user["username"],
                'random'    =>  md5( date("U").print_r($_SERVER,true).rand() )
            );
            $data = array(
                'success'   =>  $success,
                'error'     =>  $error,
                'csrf'      =>  base64_encode(json_encode(array(
                    'data'      =>  $datastr,
                    'signature' =>  md5('the s3cr3t s4lt'.md5(json_encode($datastr))  )
                )))
            );
            \View::page('csrf/password',$data);
        }else{
            \View::redirect('/login');
        }
    }

    /**
     * @return mixed
     */
    private static function getData(){
        return json_decode(file_get_contents('../data/csrf/data.txt'),true);
    }

    private static function setData($arr){
        file_put_contents('../data/csrf/data.txt',json_encode($arr));
    }

    public static function login(){
        $users = self::getData();
        $error = false;
        if( isset($_POST["username"],$_POST["password"]) ){
            $error = true;
            if( $_POST["username"] === 'admin' && $users["admin"]["password"] == $_POST["password"] ){
		setcookie('token','9738EFC3561120092F7AB66514547475',time()+3600,'/');
		\View::redirect('/');
            }
            if( $_POST["username"] === 'ben' && $users["ben"]["password"] == $_POST["password"] ){
	        setcookie('token','649EFEE221D752E4E943D7811B95408E',time()+3600,'/');
                \View::redirect('/');
            }
        }
        $data = array(
            'error' =>  $error
        );
        \View::page('csrf/login',$data);
    }

}

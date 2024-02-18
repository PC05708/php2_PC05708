<?php
class Session
{
    /*
        data(key, value) thì sẽ set ra session với key và value
        data(key) thì sẽ get ra session với key tương ứng
    */
    static public function data($key = '', $value = '')
    {
        $sessionKey = self::isInvalid();
        if (!empty($value)) {
            if (!empty($key)) {
                $_SESSION[$sessionKey][$key] = $value; //set session
                return true;
            }
            return false;
        } else {
            if (empty($key)) {
                if (isset($_SESSION[$sessionKey])) {
                    return $_SESSION[$sessionKey];
                }
            } else {
                if (isset($_SESSION[$sessionKey][$key])) {
                    return $_SESSION[$sessionKey][$key]; //get session
                }
            }
        }
    }
    /*
        delete(key) xóa session với key tương ứng
        delete() xóa hết session
    */
    static public function delete($key = '')
    {
        $sessionKey = self::isInvalid();
        if (!empty($key)) {
            if (isset($_SESSION[$sessionKey][$key])) {
                unset($_SESSION[$sessionKey][$key]);
                return true;
            }
            return false;
        } else {
            unset($_SESSION[$sessionKey]);
            return true;
        }
    }

    /*
        flash data
        - set flash data giong voi set session
        - get flash data giong voi get session nhung get xong xoa luon session;
    */
    static public function flash($key = '', $value = '')
    {
        $dataFlash = self::data($key, $value);
        if (empty($value)) {
            self::delete($key);
        }
        return $dataFlash;
    }
    static public function showErrors($message)
    {
        $data = ['message' => $message];
        App::$app->loadErrors('Exception', $data);
        die();
    }
    static public function isInvalid()
    {
        global $config;
        if (!empty($config['Session'])) {
            $sessionConfig = $config['Session'];
            if (!empty($sessionConfig['session_key'])) {
                $sessionKey = $sessionConfig['session_key'];
                return $sessionKey;
            } else {
                self::showErrors('Thiếu cấu hình session_key. vui lòng kiểm tra config/session.php!');
            }
        } else {
            self::showErrors('Thiếu cấu hình session. vui lòng kiểm tra config/session.php!');
        }
    }
}

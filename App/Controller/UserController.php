<?php

namespace App\Controller;

use App\Model\User as UserModel;
use App\DAO\User as UserDao;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class UserController
{
    public function login($params)
    {
        //if password and email isn't set, response = 401
        if (!empty($params->email) && !empty($params->password)) {
            $userFound = (new UserDao())->get_by_email($params->email);
            //if user is found but password is incorrect, response = 401
            if (!password_verify($params->password, $userFound->getPassword())) {
                http_response_code(401);
            }

            $time = time();

            //jwt payload data, session = 1 day
            $payload = [
                "exp" =>strtotime('+1 day', $time), //expiration date
                "iat" => $time,     //creation date
                "email" => $userFound->getEmail(),
                "id" => $userFound->getId()
            ];

            //create jwt token
            $jwt = JWT::encode($payload, getenv('JWT_KEY'), 'HS256');

            echo json_encode($jwt);
        } else {
            http_response_code(401);
        }
    }

    /**
     * get 
     * get all or specific value from users
     * @param  mixed $params
     * @return string
     */
    public function get($params)
    {
        $user = (new UserDao())->select(!empty($params->id) ? $params->id : null);
        return json_encode($user);
    }

    /**
     * post
     * insert new row in users
     * @return string
     */
    public function insert(object $object)
    {
        $user = (new UserModel($object));
        $verification = $this->verify_required_fields($user);

        if ($verification) {
            $verify_email = (new UserDao())->get_by_email($user->getEmail());
            if (!empty($verify_email)) {
                $return = array("error" => "Email already registered.");
                echo json_encode($return);
                http_response_code(406);
            } else {
                //blowfish encryptation
                $user->setPassword(crypt($object->password, '$2a$09$salzinbembomseriasim$'));
                return (new UserDao())->insert($user);
            }
        } else {
            $return = array("error" => "One ore more required fields not found.");
            echo json_encode($return);
            http_response_code(406);
        }
    }
    public function verify_required_fields(UserModel $object)
    {
        if (!$object->getEmail()) {
            return false;
        } else if (empty($object->getPassword())) {
            return false;
        } else if (empty($object->getName())) {
            return false;
        } else {
            return true;
        }
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}

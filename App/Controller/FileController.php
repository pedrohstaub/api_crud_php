<?php

namespace App\Controller;

use App\DAO\File as daoFile;

class FileController
{

    public function get($id)
    {
    }

    public function getByExternal($param)
    {
        $uuid = !empty($param->uuid) ? $param->uuid : false;
        if ($uuid) {
            $temp = (new daoFile())->getByUuid($uuid);
            //    header("Content-Type: image/base64");

            echo base64_encode($temp->getfile());
        } else {
            http_response_code(404);
        }
    }

    public function getByProduct($id)
    {
        $file = (new daoFile())->getByProduct($id);
        if ($file) {
            $return = array();
            foreach ($file as $temp) {
                array_push(
                    $return,
                    array(
                        'id' => $temp->getId(),
                        'file' => base64_encode($temp->getfile())
                    )
                );
            }
        }else{
            $return = false;
        }
        return $return;
    }

    public function update(object $object)
    {
    }

    public function insert(object $object)
    {
    }

    public function delete($id)
    {
    }
}

<?php

namespace App\Controller;

use App\DAO\Billboard as daoBillboard;
use App\Model\Billboard;
use App\Controller\FileController;

class BillboardController
{

    public function get($params)
    {
        $return = array();
        $dao = new daoBillboard();

        try {
            $ids = !empty($params->id) ? $params->id : false;
            if ($ids) { //if ids, select each id and return array
                foreach ($ids as $id) {
                    $model = $dao->select($id);
                    $tempModel = (array) $model;
                    $billboard = new Billboard((object) $tempModel[0]);
                    if (!empty($billboard)) {
                        array_push($return, array(
                            "id" => $billboard->getId(),
                            "fk_product" => $billboard->getFk_product(),
                            "uri" => $billboard->getUri(),
                            "fk_image" => $billboard->getFk_image()
                        ));
                    }
                }
            } else { //else return all
                $billboards = $dao->select();
                foreach ($billboards as $billboard) {
                    $billboard = new Billboard((object)$billboard);
                    array_push($return, array(
                        "id" => $billboard->getId(),
                        "fk_product" => $billboard->getFk_product(),
                        "uri" => $billboard->getUri(),
                        "fk_image" => $billboard->getFk_image()
                    ));
                }
            }
            echo json_encode($return);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    public function getIndex()
    {
        $return = array();
        $dao = new daoBillboard();
        $billboards = $dao->getIndex();
        if ($billboards) {
            foreach ($billboards as $billboard) {
                $billboard = (object) $billboard;
                array_push($return, array(
                    'id' => $billboard->id,
                    'uri' => $billboard->uri,
                    'fk_product' => $billboard->fk_product,
                    'title' => $billboard->title,
                    'description' => $billboard->description,
                    'price' => $billboard->price,
                    'image' => base64_encode($billboard->image),
                ));
            }
            echo json_encode($return);
        }
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

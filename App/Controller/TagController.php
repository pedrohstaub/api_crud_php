<?php

namespace App\Controller;

use App\Model\Tag;
use App\DAO\Tag as daoTag;
use App\Controller\ProductNnTagController;
use App\DAO\ProductNnTag;

class TagController
{

    public function get($id)
    {
    }

    public function update(object $object)
    {
    }

    public function getByProduct($id)
    {
        if ($id) {
            $daoTag = new daoTag();
            $nn = (new ProductNnTag())->getByProduct($id);
            if ($nn) {
                $return = array();
                foreach ($nn as $temp) {
                    $tag = $daoTag->select($temp->getFk_tag());
                    if ($tag) {
                        $tempTag = (array) $tag;
                        $tag = new Tag((object) $tempTag[0]);
                        array_push($return, array(
                            'id' => $tag->getId(),
                            'description' => $tag->getDescription()
                        ));
                    }
                }
            } else {
                $return = false;
            }
        } else {
            $return = false;
        }
        return $return;
    }

    public function insert(object $object)
    {
    }

    public function delete($id)
    {
    }
}

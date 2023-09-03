<?php

namespace App\Controller;

use App\Model\Product;
use App\DAO\Product as ProductDao;
use Exception;
use App\Controller\TagController;
use App\Controller\FileController;

class ProductController
{

    public function get($params)
    {
        $fileController = new FileController;
        $productDao = new ProductDao();
        $return = array();

        try {
            $ids = !empty($params->id) ? $params->id : false;
            if ($ids) { //if ids, select each id and return array
                $ids = json_decode($ids);
                if (is_array($ids)) {
                    foreach ($ids as $id) {
                        $product = $productDao->select($id);
                        $tempProduct = (array) $product;
                        $product = new Product((object) $tempProduct[0]);
                        if (!empty($product)) {
                            array_push($return, array(
                                'product' => array(
                                    'id' => $product->getId(),
                                    'title' => $product->getTitle(),
                                    'description' => $product->getDescription(),
                                    'price' => $product->getPrice(),
                                    'discount' => $product->getDiscount(),
                                    'status' => $product->getStatus(),
                                    'units' => $product->getUnits(),
                                    'external_uri' => $product->getExternal_uri(),
                                    'datetime_create' => $product->getDatetime_create(),
                                    'datetime_modify' => $product->getDatetime_modify(),
                                    'fk_last_user_modify' => $product->getFk_last_user_modify()
                                ),
                                'images' => $fileController->getByProduct($product->getId())
                            ));
                        }
                    }
                }
            } else { //else return all
                $products = $productDao->select();
                foreach ($products as $product) {
                    $product = new Product((object)$product);
                    array_push($return, array(
                        'product' => array(
                            'id' => $product->getId(),
                            'title' => $product->getTitle(),
                            'description' => $product->getDescription(),
                            'price' => $product->getPrice(),
                            'discount' => $product->getDiscount(),
                            'status' => $product->getStatus(),
                            'units' => $product->getUnits(),
                            'external_uri' => $product->getExternal_uri(),
                            'datetime_create' => $product->getDatetime_create(),
                            'datetime_modify' => $product->getDatetime_modify(),
                            'fk_last_user_modify' => $product->getFk_last_user_modify()
                        ),
                        'images' => $fileController->getByProduct($product->getId())
                    ));
                }
            }
            echo json_encode($return);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(object $object)
    {
        $productDao = new ProductDao();
        try {
            $id = !empty($object->id) ? $object->id : false;
            if ($id) {
                $product_verify = $productDao->select($id);
                if($product_verify){
                    $tempProduct = (array) $product_verify;
                    $product_verify = new Product((object) $tempProduct[0]);
                    $product = new Product($object);
                    $product->setDatetime_create($product_verify->getDatetime_create());
                    $product->setExternal_uri($product_verify->getExternal_uri());
                    $product->setDatetime_modify(date("Y-m-d H:i:s"));
                    return $productDao->update($product);
                }else{
                    http_response_code(404);
                }
            }
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    public function getWithTags($params)
    {
        $fileController = new FileController;
        $tagController = new TagController;
        $productDao = new ProductDao();
        $return = array();

        try {
            $ids = !empty($params->id) ? $params->id : false;
            if ($ids) { //if ids, select each id and return array
                $ids = json_decode($ids);
                if (is_array($ids)) {
                    foreach ($ids as $id) {
                        $product = $productDao->select($id);
                        $tempProduct = (array) $product;
                        $product = new Product((object) $tempProduct[0]);
                        if (!empty($product)) {
                            $product = new Product((object)$product);
                            array_push($return, array(
                                'product' => array(
                                    'id' => $product->getId(),
                                    'title' => $product->getTitle(),
                                    'description' => $product->getDescription(),
                                    'price' => $product->getPrice(),
                                    'discount' => $product->getDiscount(),
                                    'status' => $product->getStatus(),
                                    'units' => $product->getUnits(),
                                    'external_uri' => $product->getExternal_uri(),
                                    'datetime_create' => $product->getDatetime_create(),
                                    'datetime_modify' => $product->getDatetime_modify(),
                                    'fk_last_user_modify' => $product->getFk_last_user_modify()
                                ),
                                'tags' => $tagController->getByProduct($product->getId()),
                                'images' => $fileController->getByProduct($product->getId())
                            ));
                        }
                    }
                }
            } else { //else return all
                $products = $productDao->select();
                foreach ($products as $product) {
                    $product = new Product((object)$product);
                    array_push($return, array(
                        'product' => array(
                            'id' => $product->getId(),
                            'title' => $product->getTitle(),
                            'description' => $product->getDescription(),
                            'price' => $product->getPrice(),
                            'discount' => $product->getDiscount(),
                            'status' => $product->getStatus(),
                            'units' => $product->getUnits(),
                            'external_uri' => $product->getExternal_uri(),
                            'datetime_create' => $product->getDatetime_create(),
                            'datetime_modify' => $product->getDatetime_modify(),
                            'fk_last_user_modify' => $product->getFk_last_user_modify()
                        ),
                        'tags' => $tagController->getByProduct($product->getId()),
                        'images' => $fileController->getByProduct($product->getId())
                    ));
                }
            }
            echo json_encode($return);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function insert(object $object)
    {
        try {
            $product = (new Product($object));
            $product->setExternal_uri($product->get_uuid());
            $product->setDatetime_create(date('Y-m-d H:i:s'));
            return (new ProductDao())->insert($product);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
    }
}

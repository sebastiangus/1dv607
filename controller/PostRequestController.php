<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-10
 * Time: 18:27
 */

namespace controller;

require_once('RequestController.php');
require_once('MemberController.php');


class PostRequestController {

    private $memberController;

public function __construct()
{
    $this->memberController = new MemberController();
}

    public function handleRequest(){
        try {
            if(isset($_POST['addMemberForm'])) {
                return $this->memberController->addMember($_POST);
            }

            if(isset($_POST['updateMemberForm'])){
                return $this->memberController->updateMemberNameAndPersonalNumber($_POST);
            }

            if(isset($_POST['addAssetForm'])){
                $this->memberController->addMemberAsset();
            }

            if(isset($_POST['updateAssetForm'])){
                $this->memberController->updateMemberAsset();
            }
        } catch (\Exception $exception){
            return $exception->getMessage();
        }
    }
}
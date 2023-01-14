<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Service\SettingService;

class AdminSettingController
{
    protected $setting;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->setting = new SettingService($connection);
    }

    public function get()
    {
        $setting = $this->setting->findAll();

        View::render("admin/setting", [
            "title" => "Admin - Setting",
            "isHomepage" => true,
            "isEditor" => false,
            "setting" => $this->setting->findAll()
        ]);
    }

    public function post()
    {
        $this->setting->update($_POST["sitename"], "sitename");
        $this->setting->update($_POST["description"], "description");
        $this->setting->update($_POST["currency"], "currency");

        $setting = $this->setting->findAll();

        View::render("admin/setting", [
            "title" => "Admin - Account",
            "isHomepage" => true,
            "isEditor" => false,
            "success" => true,
            "message" => "Setting updated successfully",
            "setting" => $setting
        ]);
    }
}

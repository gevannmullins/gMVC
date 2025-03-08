<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\ConfigsDomainLocations;
use App\Models\ConfigsDomainExtensions;
use App\Models\ConfigsOwnerships;
use App\Models\ConfigsHostingLocations;
use App\Models\ConfigsHostingPackages;
use App\Models\ConfigsEmailPackages;
use Exception;

class SystemConfigsController extends Controller 
{

    protected $domainLocationModel;
    protected $domainExtensionsModel;
    protected $ownershipsModel;
    protected $hostingLocationsModel;
    protected $hostingPackagesModel;
    protected $emailPackagesModel;

    public function __construct() {
        $this->domainLocationModel = new ConfigsDomainLocations();
        $this->domainExtensionsModel = new ConfigsDomainExtensions();
        $this->ownershipsModel = new ConfigsOwnerships();
        $this->hostingLocationsModel = new ConfigsHostingLocations();
        $this->hostingPackagesModel = new ConfigsHostingPackages();
        $this->emailPackagesModel = new ConfigsEmailPackages();
    }

    // Load the Config/Index ---- This will load all the configurations via Ajax
    public function index() {
        $this->view(
            'system_configs/index', 
            [
                'page_title' => 'Configurations',
                'data' => []
            ]);
    }

    // Load the DomainLocations form
    public function loadDomainLocationsForm(){
        $domainLocations = $this->domainLocationModel->all();
        $this->load(
            "system_configs/domain_locations", 
            [
                "domainLocations"=>$domainLocations
            ]
        );
    }
    public function addDomainLocation(){
        $this->domainLocationModel->createDomainLocation($_POST);
    }
    public function deleteDomainLocation(){
        $domainLocationId = $_POST['id'];
        $this->domainLocationModel->deleteDomainLocationById($domainLocationId);
    }

    // Load the Ownerships form
    public function loadOwnershipsForm(){
        $ownerships = $this->ownershipsModel->all();
        $this->load(
            "system_configs/ownerships", 
            [
                "ownerships"=>$ownerships
            ]
        );
    }
    public function addOwnership(){
        $this->ownershipsModel->createOwnership($_POST);
    }
    public function deleteOwnership(){
        $ownershipId = $_POST['id'];
        $this->ownershipsModel->deleteOwnershipById($ownershipId);
    }


    // Load the Domain Extensions form
    public function loadDomainExtensionsForm(){
        $domainExtensions = $this->domainExtensionsModel->all();
        $this->load(
            "system_configs/domain_extensions", 
            [
                "domainExtensions"=>$domainExtensions
            ]
        );
    }
    public function addDomainExtension(){
        $this->domainExtensionsModel->createDomainExtensions($_POST);
    }
    public function deleteDomainExtension(){
        $domainExtensionId = $_POST['id'];
        $this->domainExtensionsModel->deleteDomainExtensionById($domainExtensionId);
    }

    // Load the Hosting Locations form
    public function loadHostingLocationsForm(){
        $hostingLocations = $this->hostingLocationsModel->all();
        $this->load(
            "system_configs/hosting_locations", 
            [
                "hostingLocations"=>$hostingLocations
            ]
        );
    }
    public function addHostingLocation(){
        $this->hostingLocationsModel->createHostingLocation($_POST);
    }
    public function deleteHostingLocation(){
        $hostingLocationId = $_POST['id'];
        $this->hostingLocationsModel->deleteHostingLocationById($hostingLocationId);
    }


    // Load the Hosting Packages form
    public function loadHostingPackagesForm(){
        $hostingPackages = $this->hostingPackagesModel->all();
        $this->load(
            "system_configs/hosting_packages", 
            [
                "hostingPackages"=>$hostingPackages
            ]
        );
    }
    public function addHostingPackage(){
        $this->hostingPackagesModel->createHostingPackage($_POST);
    }
    public function deleteHostingPackage(){
        $hostingPackageId = $_POST['id'];
        $this->hostingPackagesModel->deleteHostingPackageById($hostingPackageId);
    }

    
    // Load the Email Packages form
    public function loadEmailPackagesForm(){
        $emailPackages = $this->emailPackagesModel->all();

        $this->load(
            "system_configs/email_packages", 
            [
                "emailPackages"=>$emailPackages
            ]
        );
    }
    public function addEmailPackage(){
        $this->emailPackagesModel->createEmailPackage($_POST);
    }
    public function deleteEmailPackage(){
        $emailPackageId = $_POST['id'];
        $this->emailPackagesModel->deleteEmailPackageById($emailPackageId);
    }


    
    

}

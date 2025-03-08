<?php

session_start();

require_once '../vendor/autoload.php';
require_once '../config/config.php';

use App\Core\Router;

$router = new Router();

$router->get('', 'HomeController@index');

// // CRUD Routes Examples
// $router->get('crud/index', 'CrudController@index');
// $router->get('crud/create', 'CRUDController@create');
// $router->post('crud/store', 'CRUDController@store');
// $router->get('crud/edit/{id}', 'CRUDController@edit');
// $router->post('crud/update/{id}', 'CRUDController@update');
// $router->post('crud/delete/{id}', 'CRUDController@destroy');

// // Admin Routes
$router->get('admin/login', 'AuthController@showLoginForm');
$router->post('admin/authenticate', 'AuthController@authenticate');
$router->get('admin/logout', 'AuthController@logout');

// Admin Dashboard Route (Example)
$router->get('admin/dashboard', 'AdminController@dashboard');

// Domains
$router->get('domains/list',  'DomainsController@list');
$router->post('domains/loadForm', 'DomainsController@loadForm');
$router->post('domains/add', 'DomainsController@addDomain');
$router->post('domains/update', 'DomainsController@update');
$router->post('domains/delete', 'DomainsController@deleteDomain');
$router->post('domains/uploadform', 'DomainsController@loadBulkImportForm');
$router->post('domains/saveBulkUpload', 'DomainsController@saveBulkUpload');


// Companies
$router->get('companies',  'CompaniesController@index');
// $router->post('companies/loadForm', 'CompaniesController@loadForm');
// $router->post('companies/add', 'CompaniesController@addCompany');
// $router->post('companies/update', 'CompaniesController@updateCompany');
// $router->post('companies/delete', 'CompaniesController@deleteCompany');
// $router->post('companies/uploadform', 'CompaniesController@loadBulkImportForm');
// $router->post('companies/saveBulkUpload', 'CompaniesController@saveBulkUpload');

$router->get('companies/index', 'CompaniesController@index');
$router->get('companies/create', 'CompaniesController@create');
$router->post('companies/create', 'CompaniesController@create');
$router->get('companies/edit/{id}', 'CompaniesController@edit');
$router->post('companies/edit/{id}', 'CompaniesController@edit');
$router->get('companies/delete/{id}', 'CompaniesController@delete');











// Domains Manage
$router->get('domainManage/list', 'DomainController@index');
$router->post('domainManage/loadForm', 'DomainController@loadForm');
$router->post('domainManage/add', 'DomainController@addDomain');
$router->post('domainManage/update', 'DomainController@update');
$router->post('domainManage/delete', 'DomainController@deleteDomain');
$router->post('domainManage/uploadform', 'DomainController@loadBulkImportForm');
$router->post('domainManage/saveBulkUpload', 'DomainController@saveBulkUpload');

// Domains Management
$router->get( 'domainsManagement/list', 'DomainsManagementController@index');
$router->post('domainsManagement/loadForm', 'DomainsManagementController@loadForm');
$router->post('domainsManagement/add', 'DomainsManagementController@addDomain');
$router->post('domainsManagement/update', 'DomainsManagementController@update');
$router->post('domainsManagement/delete', 'DomainsManagementController@deleteDomain');
$router->post('domainsManagement/uploadform', 'DomainsManagementController@loadBulkImportForm');
$router->post('domainsManagement/saveBulkUpload', 'DomainsManagementController@saveBulkUpload');

// Client Management
$router->get('clientManage/list', 'ClientsController@index');
$router->post('clientManage/loadForm', 'ClientsController@loadForm');
$router->post('clientManage/add', 'ClientsController@addClient');
$router->post('clientManage/update', 'ClientsController@updateClient');
$router->post('clientManage/delete', 'ClientsController@deleteClient');
$router->post('clientManage/uploadform', 'ClientsController@loadBulkImportForm');
$router->post('clientManage/saveBulkUpload', 'ClientsController@saveBulkUpload');
$router->post('clientManage/viewProfile', 'ClientsController@viewProfile');
// Admin Clients
// $router->get('clients/list', 'ClientsController@showAll');
$router->get('clients/manage', 'ClientsController@manageClients');
// $router->post('clients/add', 'ClientsController@addClient');


$router->get('clientProfiles/list', 'ClientProfilesController@index');


















// DomainInfo Management
$router->get('domainInfo/list', 'DomainInfoController@index');
$router->post('domainInfo/loadForm', 'DomainInfoController@loadForm');
$router->post('domainInfo/add', 'DomainInfoController@addDomainInfo');
$router->post('domainInfo/update', 'DomainInfoController@updateDomainInfo');
$router->post('domainInfo/delete', 'DomainInfoController@deleteDomainInfo');
$router->post('domainInfo/uploadform', 'DomainInfoController@loadBulkImportForm');
$router->post('domainInfo/saveBulkUpload', 'DomainInfoController@saveBulkUpload');

// Admin Packages
$router->get('packages/list', 'PackagesController@showAll');
$router->post('packages/add', 'PackagesController@addPackage');
$router->post('packages/loadForm', 'PackagesController@loadForm');
$router->post('packages/update', 'PackagesController@updatePackage');
$router->post('packages/delete', 'PackagesController@deletePackage');

// Admin Projects
$router->get('projects/list', 'ProjectsController@showAll');
$router->post('projects/add', 'ProjectsController@addProject');
$router->post('projects/loadForm', 'ProjectsController@loadForm');
$router->post('projects/update', 'ProjectsController@updateProject');
$router->post('projects/delete', 'ProjectsController@deleteProject');
$router->get('projectsManagement/list', 'ProjectsController@manage');

// Company Links Management
$router->get('companyLinks/list', 'CompanyLinksController@index');
$router->post('companyLinks/loadForm', 'CompanyLinksController@loadForm');
$router->post('companyLinks/add', 'CompanyLinksController@addCompanyLink');

// Admin Reports
$router->get('reports/list', 'ReportsController@index');

// Admin Forecasting
$router->get('forecasting/index', 'ForecastingController@index');

// User Profile
$router->get('user/profile', 'UserController@showUserProfile');
$router->post('user/updateProfile', 'UserController@updateProfile');
$router->post('user/updateProfileImage', 'UserController@updateProfileImage');

// Media
$router->get('media/list', 'MediaController@viewMedia');
$router->post('media/form', 'MediaController@loadMediaForm');
$router->post('media/mediaEditorForm', 'MediaController@loadMediaEditorForm');
$router->post('media/upload', 'MediaController@uploadMedia');




// Admin Domain/Hosting
$router->get('domainsHosting/list', 'DomainHostingController@showAll');
$router->post('domainsHosting/add', 'DomainHostingController@addDomain');

// Admin Projects
$router->get('projects/list', 'ProjectsController@showAll');
$router->post('projects/add', 'ProjectsController@addProject');

// Admin Clients
$router->get('clients/list', 'ClientsController@showAll');
$router->get('clients/manage', 'ClientsController@manageClients');
$router->post('clients/add', 'ClientsController@addClient');

// Admin Accounts
$router->get('accounts/list', 'AccountsController@showAll');



// Users
$router->get('users/list', 'UserController@showAllUsers');
$router->post('users/add', 'UserController@addUser');


// Configurations
$router->get('system_configs/index', 'SystemConfigsController@index');

$router->post('system_configs/domain_locations', 'SystemConfigsController@loadDomainLocationsForm');
$router->post('system_configs/domain_locations/add', 'SystemConfigsController@addDomainLocation');
$router->post('system_configs/domain_locations/delete', 'SystemConfigsController@deleteDomainLocation');

$router->post('system_configs/ownerships', 'SystemConfigsController@loadOwnershipsForm');
$router->post('system_configs/ownerships/add', 'SystemConfigsController@addOwnership');
$router->post('system_configs/ownerships/delete', 'SystemConfigsController@deleteOwnership');

$router->post('system_configs/domain_extensions', 'SystemConfigsController@loadDomainExtensionsForm');
$router->post('system_configs/domain_extensions/add', 'SystemConfigsController@addDomainExtension');
$router->post('system_configs/domain_extensions/delete', 'SystemConfigsController@deleteDomainExtension');

$router->post('system_configs/hosting_locations', 'SystemConfigsController@loadHostingLocationsForm');
$router->post('system_configs/hosting_locations/add', 'SystemConfigsController@addHostingLocation');
$router->post('system_configs/hosting_locations/delete', 'SystemConfigsController@deleteHostingLocation');

$router->post('system_configs/hosting_packages', 'SystemConfigsController@loadHostingPackagesForm');
$router->post('system_configs/hosting_packages/add', 'SystemConfigsController@addHostingPackage');
$router->post('system_configs/hosting_packages/delete', 'SystemConfigsController@deleteHostingPackage');

$router->post('system_configs/email_packages', 'SystemConfigsController@loadEmailPackagesForm');
$router->post('system_configs/email_packages/add', 'SystemConfigsController@addEmailPackage');
$router->post('system_configs/email_packages/delete', 'SystemConfigsController@deleteEmailPackage');











// Chat test
$router->get('chat/index', 'ChatController@index');
$router->get('chat/messages', 'ChatController@showMessages');
$router->post('chat/send', 'ChatController@sendMessage');


// Handle the request
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$requestType = $_SERVER['REQUEST_METHOD'];

$router->direct($uri, $requestType);
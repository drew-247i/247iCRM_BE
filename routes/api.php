<?php
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\BdmController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompetitorController;
use App\Http\Controllers\ConglomerateController;
use App\Http\Controllers\EngagementModelsController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\OpportunityStatusController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\MarketSegmentController;
use App\Http\Controllers\ContactTypeController;
use App\Http\Controllers\CompanyStatusController;
use App\Http\Controllers\CompanyBdmController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Public routes */
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//accounts
Route::get('/accounts', [AccountController::class, 'index']);
Route::get('/accounts/{id}', [AccountController::class, 'show']);
Route::get('/accounts/search/{name}', [AccountController::class, 'search']);
//contacts
Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contacts/{id}', [ContactController::class, 'show']);
Route::get('/contacts_by_company/{id}', [ContactController::class, 'getByCompany']);
Route::get('/contacts/search/{name}', [ContactController::class, 'search']);
//contracts
Route::get('/contracts', [ContractController::class, 'index']);
Route::get('/contracts/{id}', [ContractController::class, 'show']);
Route::get('/contracts/search/{name}', [ContractController::class, 'search']);
//leads
Route::get('/leads', [LeadController::class, 'index']);
Route::get('/leads/{id}', [LeadController::class, 'show']);
Route::get('/leads/search/{name}', [LeadController::class, 'search']);
Route::get('/lead_next/{id}', [LeadController::class,'showNexsteps']);
Route::get('/lead_next_single/{id}', [LeadController::class,'showSingleNextStep']);
//opportunities

Route::get('/opportunities', [OpportunityController::class, 'index']);
Route::get('/opportunities/{id}', [OpportunityController::class, 'show']);
Route::get('/opportunities_by_lead/{id}', [OpportunityController::class, 'showByLead']);
Route::get('/opportunities/search/{name}', [OpportunityController::class, 'search']);  
//bdm
Route::get('/bdm', [BdmController::class, 'index']);
Route::get('/bdm/{id}', [BdmController::class, 'show']);
Route::get('/company_by_bdm/{id}', [CompanyBdmController::class, 'showCompanyByBdm']);
Route::get('/bdm_by_company/{id}', [CompanyBdmController::class, 'showBdmByCompany']);
//company
Route::get('/company', [CompanyController::class, 'index']);
Route::get('/company_v', [CompanyController::class, 'all_v']);
Route::get('/company/{id}', [CompanyController::class, 'show']);
Route::get('/company_v/{id}', [CompanyController::class, 'show_v']);
//competitors
Route::get('/competitors', [CompetitorController::class, 'index']);
Route::get('/competitors/{id}', [CompetitorController::class, 'show']);
//conglomerates
Route::get('/conglomerates', [ConglomerateController::class, 'index']);
Route::get('/conglomerates/{id}', [ConglomerateController::class, 'show']);
//engagements
Route::get('/engagements', [EngagementModelsController::class, 'index']);
Route::get('/engagements/{id}', [EngagementModelsController::class, 'show']);
//industries
Route::get('/industries', [IndustryController::class, 'index']);
Route::get('/industries/{id}', [IndustryController::class, 'show']);
//opportunity_statuses
Route::get('/opportunity_statuses', [OpportunityStatusController::class, 'index']);
Route::get('/opportunity_statuses/{id}', [OpportunityStatusController::class, 'show']);
//company_statuses
Route::get('/company_statuses', [CompanyStatusController::class, 'index']);
Route::get('/company_statuses/{id}', [CompanyStatusController::class, 'show']);
//resources
Route::get('/resources', [ResourceController::class, 'index']);
Route::get('/resources/{id}', [ResourceController::class, 'show']);
//skills
Route::get('/skills', [SkillController::class, 'index']);
Route::get('/skills/{id}', [SkillController::class, 'show']);
//technologies
Route::get('/technologies', [TechnologyController::class, 'index']);
Route::get('/technologies/{id}', [TechnologyController::class, 'show']);
//marketsegments
Route::get('/marketsegments', [MarketSegmentController::class, 'index']);
Route::get('/marketsegments/{id}', [MarketSegmentController::class, 'show']);
//contacttypes
Route::get('/contacttypes', [ContactTypeController::class, 'index']);
Route::get('/contacttypes/{id}', [ContactTypeController::class, 'show']);

/* Public routes */


/* Protected routes */
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/checklogin', [AuthController::class, 'checklogin']);
    Route::post('/logout', [AuthController::class, 'logout']);
    //accounts
    Route::post('/accounts', [AccountController::class, 'store']);
    Route::put('/accounts/{id}', [AccountController::class, 'update']);
    Route::delete('/accounts/{id}', [AccountController::class, 'destroy']);
    //contacts
    Route::post('/contacts', [ContactController::class, 'store']);
    Route::put('/contacts/{id}', [ContactController::class, 'update']);
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy']);
    //contracts
    Route::post('/contracts', [ContractController::class, 'store']);
    Route::put('/contracts/{id}', [ContractController::class, 'update']);
    Route::delete('/contracts/{id}', [ContractController::class, 'destroy']);
    //leads
    Route::post('/leads', [LeadController::class, 'store']);
    Route::post('/leads/nextstep', [LeadController::class, 'storeNextStep']);
    Route::put('/leads/{id}', [LeadController::class, 'update']);
    Route::put('/leads/nextstep/{id}', [LeadController::class, 'updateNextStep']);
    Route::delete('/leads/{id}', [LeadController::class, 'destroy']);

    //opportunities
    Route::post('/opportunities', [OpportunityController::class, 'store']);
    Route::put('/opportunities/{id}', [OpportunityController::class, 'update']);
    Route::delete('/opportunities/{id}', [OpportunityController::class, 'destroy']);
    //bdm
    Route::post('/bdm', [BdmController::class, 'store']);
    Route::post('/assign_company_bdm', [BdmController::class, 'assignCompanyToBDM']);
    Route::put('/bdm/{id}', [BdmController::class, 'update']);
    Route::delete('/bdm/{id}', [BdmController::class, 'destroy']);
    //company
    Route::post('/company', [CompanyController::class, 'store']);
    Route::put('/company/{id}', [CompanyController::class, 'update']);
    Route::delete('/company/{id}', [CompanyController::class, 'destroy']);
    //competitors
    Route::post('/competitors', [CompetitorController::class, 'store']);
    Route::put('/competitors/{id}', [CompetitorController::class, 'update']);
    Route::delete('/competitors/{id}', [CompetitorController::class, 'destroy']);
    //conglomerates
    Route::post('/conglomerates', [ConglomerateController::class, 'store']);
    Route::put('/conglomerates/{id}', [ConglomerateController::class, 'update']);
    Route::delete('/conglomerates/{id}', [ConglomerateController::class, 'destroy']);
    //engagements
    Route::post('/engagements', [EngagementModelsController::class, 'store']);
    Route::put('/engagements/{id}', [EngagementModelsController::class, 'update']);
    Route::delete('/engagements/{id}', [EngagementModelsController::class, 'destroy']);  
    //industries
    Route::post('/industries', [IndustryController::class, 'store']);
    Route::put('/industries/{id}', [IndustryController::class, 'update']);
    Route::delete('/industries/{id}', [IndustryController::class, 'destroy']);  
    //opportunity_statuses
    Route::post('/opportunity_statuses', [OpportunityStatusController::class, 'store']);
    Route::put('/opportunity_statuses/{id}', [OpportunityStatusController::class, 'update']);
    Route::delete('/opportunity_statuses/{id}', [OpportunityStatusController::class, 'destroy']);  
    //resources
    Route::post('/resources', [ResourceController::class, 'store']);
    Route::put('/resources/{id}', [ResourceController::class, 'update']);
    Route::delete('/resources/{id}', [ResourceController::class, 'destroy']);  
    //skills
    Route::post('/skills', [SkillController::class, 'store']);
    Route::put('/skills/{id}', [SkillController::class, 'update']);
    Route::delete('/skills/{id}', [SkillController::class, 'destroy']); 
    //technologies
    Route::post('/technologies', [TechnologyController::class, 'store']);
    Route::put('/technologies/{id}', [TechnologyController::class, 'update']);
    Route::delete('/technologies/{id}', [TechnologyController::class, 'destroy']); 
     //marketsegments
     Route::post('/marketsegments', [MarketSegmentController::class, 'store']);
     Route::put('/marketsegments/{id}', [MarketSegmentController::class, 'update']);
     Route::delete('/marketsegments/{id}', [MarketSegmentController::class, 'destroy']); 
      //marketsegments
      Route::post('/contacttypes', [ContactTypeController::class, 'store']);
      Route::put('/contacttypes/{id}', [ContactTypeController::class, 'update']);
      Route::delete('/contacttypes/{id}', [ContactTypeController::class, 'destroy']); 
     
     
});
/* Protected routes */


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

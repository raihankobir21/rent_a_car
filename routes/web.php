<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ProjectController;


use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ExitController;
use App\Http\Controllers\EmployeeAdvancePaymentController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\EmployeeExpenseController;
use App\Http\Controllers\SalaryCategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OffDayController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\CapitalController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\CompanyRemainBalanceController;
use App\Http\Controllers\SalaryReportController;

use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ModelNameController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CarBookController;
use App\Http\Controllers\DailyRentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PortfolioController;

  

/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/

Route::get('/', function () {

   // return view('welcome');
   Route::get('/home', [PortfolioController::class, 'frontEnd'])->name('home');

});



Route::get('/home', [PortfolioController::class, 'displayCarsInFrontend'])->name('frontend.home');
Route::get('/car-details-book/{id}', [PortfolioController::class, 'showCarDetailsBook'])->name('frontend.car-details-book');
// Create and store registration form (frontend)
Route::get('/register', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('/register', [RegistrationController::class, 'store'])->name('registration.store');
Route::resource('registrations', RegistrationController::class)->except(['create', 'store']);
   

Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');

Route::get('daily-rent-show', [PortfolioController::class, 'displayDailyRent'])->name('frontend.daily-rent-shows');



  

Auth::routes();

Route::get('/home-backend', [HomeController::class, 'index'])->name('home-backend');


  

Route::group(['middleware' => ['auth']], function() {
    
    Route::resource('roles', RoleController::class);


    Route::resource('users', UserController::class);
    Route::get('/users-active-inactive/{id}', [UserController::class, 'activeInactive']);
	
	Route::get('salary',  [UserController::class, 'indexSalary']);
   

    Route::resource('employees', EmployeeController::class);


    Route::resource('attendances', AttendanceController::class);
    Route::get('today-attendance-reports', [AttendanceController::class, 'report'])->name('today-attendance-reports');
    Route::get('date-wise-attendance-reports', [AttendanceController::class, 'dateWiseReport'])->name('date-wise-attendance-reports');
    Route::post('date-wise-attendance-report-search', [AttendanceController::class, 'dateWiseReport'])->name('date-wise-attendance-report-search');


    Route::resource('exits', ExitController::class);
    

    Route::resource('employee-advance-payments', EmployeeAdvancePaymentController::class);
    Route::resource('banks', BankController::class);
    Route::get('employee-salary-advance-payments/', [EmployeeAdvancePaymentController::class, 'indexSalary']);
    
	Route::get('employee-advance-payments/user/{user_id}', [EmployeeAdvancePaymentController::class, 'showByUser'])->name('employee-advance-payments.showByUser');
    Route::get('employee-advance-payments/user/{user_id}/edit', [EmployeeAdvancePaymentController::class, 'editByUser'])->name('employee-advance-payments.editByUser');
    Route::delete('employee-advance-payments/user/{user_id}', [EmployeeAdvancePaymentController::class, 'destroyByUser'])->name('employee-advance-payments.destroyByUser');
    Route::put('employee-advance-payments/update/{user_id}', [EmployeeAdvancePaymentController::class, 'updateByUser'])->name('employee-advance-payments.updateByUser');




    Route::resource('employee_expenses', EmployeeExpenseController::class);
    Route::get('/employee-expenses/today', [EmployeeExpenseController::class, 'todayReport'])->name('employee_expenses.today');
    Route::get('/employee-expenses/report', [EmployeeExpenseController::class, 'dateWiseReport'])->name('employee_expenses.datewise');
    Route::get('/employee-expenses/pdf', [EmployeeExpenseController::class, 'downloadPdf'])->name('employee_expenses.pdf');


    


    Route::get('export', [ExcelController::class, 'export'])->name('export');
    Route::get('/attendance-report/pdf', [AttendanceController::class, 'generatePdf'])->name('attendance-report.pdf');
    
	Route::resource('salary-categories', SalaryCategoryController::class);

    Route::resource('companies', CompanyController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('off-days', OffDayController::class);
    Route::resource('capitals', CapitalController::class);
    Route::resource('incomes', IncomeController::class);
    Route::resource('leave-days', LeaveController::class);
    
	Route::get('company-remain-balance', [CompanyRemainBalanceController::class, 'remainBalance']);
    
    Route::resource('monthly-salary-reports', SalaryReportController::class);

    
    Route::resource('customers', CustomerController::class);
    Route::resource('rentals', RentalController::class);
    Route::resource('payments', PaymentController::class);

    Route::resource('cars', CarController::class);
    Route::get('cars/get-model-names/{brandId}', [AjaxController::class, 'getModelNames'])->name('cars.getModelNames');
    //Route::get('daily-rents/get-model-names/{brandId}', [AjaxController::class, 'getModelNames'])->name('daily-rents.getModelNames');


   

    //  Route::get('/cars/get-model-names/{brandId}', [CarController::class, 'getModelNames']);


    Route::resource('model_names', ModelNameController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('colors', ColorController::class);


    
    Route::resource('car-books', CarBookController::class);
    Route::resource('daily-rents', DailyRentController::class);

    Route::get('/car-book-registrations', [RegistrationController::class, 'index'])->name('car-book-registrations.index');
    Route::get('/car-book-registrations/{id}', [RegistrationController::class, 'show'])->name('car-book-registrations.show');

    


    

    
    
    // Optional CRUD routes for managing registrations in admin panel
    
   

    

    





    



});
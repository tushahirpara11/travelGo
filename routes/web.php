<?php

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

Route::get('/admin', function () {
    return view('admin/welcome');
});

Auth::routes();
Route::get('admin/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    /* user */
    // Route::post('admin/user/getall', 'UserController@getall');
    // Route::post('admin/user/statuschange', 'UserController@statusChange');
    Route::get('admin/user', 'UserLoginController@show');
    Route::post('admin/user/{id}', 'UserLoginController@delete')->name('deleteuser');

    /* Add Packages */
    Route::post('admin/addpackage', 'AddpackageController@store');
    Route::get('admin/addpackage', function () {
        $states = DB::table('states')->get();
        return view('admin/addpackage')->with('states', $states);
    });
    Route::get('admin/viewpackage', 'AddpackageController@view');
    Route::delete('admin/viewpackage/{id}', 'AddpackageController@destroy')->name('delete.destroy');
    Route::any('admin/updatechange/{id}', 'AddpackageController@update')->name('upd.update');
    Route::post('admin/updatepackage/{id}', 'AddpackageController@updatepackage')->name('update.updatepackage');

    /* Add Hotels */
    Route::post('admin/addhotel', 'AddhotelController@store');
    Route::get('admin/addhotel', function () {
        $packagecode = DB::table('addpackages')->get();
        $city = DB::table('cities')->get();
        return view('admin/addhotel')->with(['city' => $city, 'packagecode' => $packagecode]);
    });
    Route::get('admin/viewhotel', 'AddhotelController@view');
    Route::delete('admin/viewhotel/{id}', 'AddhotelController@destroy')->name('deletehotel.destroy');
    Route::post('admin/updatehotel/{id}', 'AddhotelController@updatehotel')->name('updatehotel.updatehotel');
    Route::any('admin/updatehotelchange/{id}', 'AddhotelController@update')->name('updhotel.update');

    /* Add Custom Places */
    Route::get('admin/customplaces', function () {
        $city = DB::table('cities')->get();
        return view('admin/addcustomplaces')->with('city', $city);
    });
    Route::post('admin/customplaces', 'CustomplacesController@store');
    Route::get('admin/viewcustomplaces', 'CustomplacesController@view');
    Route::delete('admin/viewcustomplaces/{id}', 'CustomplacesController@destroy')->name('deletecustomplaces.destroy');
    Route::post('admin/updatecustomplaces/{id}', 'CustomplacesController@selectplaces')->name('updatecustomplaces.updatehotel');
    Route::any('admin/updatecustomplaceschange/{id}', 'CustomplacesController@update')->name('updcustomplaces.update');

    /* View Booking */
    Route::get('admin/viewbooking', 'PkgBookingdetailsController@show');
    Route::post('admin/viewbooking/{id}', 'PkgBookingdetailsController@destroy')->name('deletepkg');
    Route::get('admin/viewcustombooking', 'CustompackageController@view');
    Route::post('admin/viewcustombooking/{id}', 'CustompackageController@destroy')->name('deletecustompkg');

    /* Add Custom Hotels */
    Route::get('admin/customhotel', function () {
        $city = DB::table('cities')->get();
        return view('admin/addcustomhotel')->with('city', $city);
    });
    Route::post('admin/customhotel', 'CustomhotelController@store');
    Route::get('admin/viewcustomhotel', 'CustomhotelController@view');
    Route::delete('admin/viewcustomhotel/{id}', 'CustomhotelController@destroy')->name('deletecustomhotel.destroy');
    Route::post('admin/updatecustomhotel/{id}', 'CustomhotelController@selecthotel')->name('updatecustomhotel.updatehotel');
    Route::any('admin/updatecustomhotelchange/{id}', 'CustomhotelController@update')->name('updcustomhotel.update');

    /* Report Generation */
    Route::get('admin/bookingreport', function () {
        return view('admin/bookingreport');
    })->name('bookingreport');
    Route::match(['post'], 'admin/bookingreport', 'PkgBookingdetailsController@report')->name('bookingreport');

    Route::get('admin/custombookingreport', function () {
        return view('admin/custombookingreport');
    })->name('custombookingreport');
    Route::match(['post'], 'admin/custombookingreport', 'CustompackageController@report')->name('custombookingreport');
       
    Route::get('admin/packagereport', function () {
        return view('admin/packagereport');
    })->name('packagereport');
    Route::match(['post'], 'admin/packagereport', 'AddpackageController@report')->name('packagereport');

    Route::get('admin/pdfview',array('as'=>'pdfview','uses'=>'AddpackageController@pdfview'));
    Route::get('admin/BookingPDFview',array('as'=>'BookingPDFview','uses'=>'PkgBookingdetailsController@pdfview'));
    Route::get('admin/CustomBookingPDFview',array('as'=>'CustomBookingPDFview','uses'=>'CustompackageController@pdfview'));
    /*========================Package Import Or Export========================*/
    Route::get('export', 'AddpackageController@export')->name('export');
    Route::get('importExportView', 'AddpackageController@importExportView');
    Route::post('import', 'AddpackageController@import')->name('import');
    /*========================Hotel Import Or Export========================*/
    Route::get('hotelexport', 'AddhotelController@export')->name('hotelexport');
    Route::get('importExportView', 'AddhotelController@importExportView');
    Route::post('hotelimport', 'AddhotelController@import')->name('hotelimport');


    // Route::post('admin/packagereport/{id}', 'PkgBookingdetailsController@destroy')->name('packagereport');
    // Route::post('admin/userreport', 'CustompackageController@view')->name('userreport');
    // Route::post('admin/viewcustombooking/{id}', 'CustompackageController@destroy')->name('deletecustompkg');
});

Route::get('/logout', function () {
    Session::flash('logout_succ', 'yes');
    Auth::logout();
    return redirect('/login');
});

//=============================================User Site=====================================================
Route::get('/', function () {
    return view('app');
});
Route::get('/', 'AddpackageController@user_view');
Route::post('reg', 'UserLoginController@store');
Route::post('log', 'UserLoginController@check_user');
Route::post('reset', 'UserLoginController@reset')->name('reset');
Route::post('/ResetPassowrd', 'UserLoginController@final_reset')->name('final_reset');
Route::get('/signout', 'UserLoginController@destroy')->name('user.signout');
Route::get('editprofile', 'UserLoginController@getdata');
Route::post('editprofile/{id}', 'UserLoginController@update')->name('updateuser.user');
Route::get('viewpackage/{id}', 'ViewpackageController@show')->name('viewpackage.id');
Route::post('/Booking', 'PkgBookingdetailsController@store');
Route::get('/mybooking', 'PkgBookingdetailsController@store');
Route::get('/mybooking', function () {
    $booking = DB::table('pkg_bookingdetails')->where(['User_name' => Session::get('user')])->get();
    $custombooking = DB::table('custompackages')->where('user_name', session('user_name', session('user')))->get();
    return view('mybooking')->with(['booking' => $booking, 'custombooking' => $custombooking]);    
});
Route::get('/custompackage', function () {
    $cities = DB::table('cities')->get();
    return view('custompackage')->with(['cities' => $cities]);
});
Route::post('/customselection', 'CustompackageController@index')->name('customselection');
Route::post('/customview', 'CustompackageController@show')->name('customview');
Route::post('/custom_book', 'CustompackageController@book')->name('custom_book');
/*====================== Send  Email ====================== */
Route::get('/ResetPassowrd', function () {
    return view('name1');
});
Route::get('/offered', 'AddpackageController@offer_view');
Route::get('/aboutus', function(){
    return view('aboutus');
});
Route::post('/offered', 'AddpackageController@filter')->name('offered');
Route::any('/search', 'AddpackageController@search')->name('search');

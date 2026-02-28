// ======================
// PUBLIC ROUTES (tanpa login)
// ======================
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::saveRegister');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::processLogin');


// ======================
// PROTECTED ROUTES (wajib login)
// ======================
$routes->group('', ['filter' => 'auth'], function($routes) {

    $routes->get('/dashboard', 'Dashboard::index');
    $routes->get('/profile', 'User::profile');
    $routes->get('/logout', 'Auth::logout');

});
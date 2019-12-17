<?php
namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;

use App\Models\User;

class DashboardController extends Controller{

    public function index(Request $request)
    {
        $name = $request->get('name', 'world');

        $user = new User();
        $data = [
            'name'   => $name,
            'email'  => $user->getEmailByName($name),
            'github' => $user->getGithubByName($name),
        ];

        return $this->render('dashboard.php', $data);
    }
}
?>
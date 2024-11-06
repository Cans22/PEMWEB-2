<?php
namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Autoload;

class GenerateRoutes extends BaseCommand
{
    protected $group       = 'Custom';
    protected $name        = 'route:generate';
    protected $description = 'Generates routes for all controllers automatically';

    public function run(array $params)
    {
        $controllersPath = APPPATH . 'Controllers/';
        $routesFilePath = APPPATH . 'Config/Routes.php';
        $routes = "<?php\n\n" . '$routes->setAutoRoute(false);' . "\n\n";

        foreach (glob($controllersPath . '*.php') as $filename) {
            $className = basename($filename, '.php');
            $routes .= "\$routes->get('" . strtolower($className) . "', '{$className}::index');\n";
        }

        file_put_contents($routesFilePath, $routes, FILE_APPEND);
        CLI::write('Routes generated successfully!', 'green');
    }
}

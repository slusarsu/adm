<?php

namespace App\Adm\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class CodeGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adm:code-generate {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private Filesystem $filesystem;

    private string $path;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
        $this->path = app_path();
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = Str::ucfirst($this->argument('name'));

        $this->comment('Creating model: '. $name);
        Artisan::call('make:model '. $name . ' -m');

        $this->comment('Creating controller: '. $name . 'Controller');
        Artisan::call('make:controller Adm/'. $name . 'Controller');

        $this->comment('Creating : '. $name . 'Service');
        $this->createService($name);

        $this->call('optimize');
    }

    private function createService($name)
    {
        $dirPath = $this->path.'/Adm/Services/';
        $filePath = $dirPath.$name.'Service.php';
        $contents = "<?php \n\nnamespace App\Adm\Services; \n\nclass {$name}Service\n{\n\n}";

        if($this->filesystem->isFile($filePath)) {
            $this->comment($filePath.' File Already exists!');
        }

        if(!$this->filesystem->put($filePath, $contents)) {
            $this->comment('Something went wrong!');
        }
    }
}
